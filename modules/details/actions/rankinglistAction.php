<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Frame\Foundation\Action;
use FC;
use FC\Comm;

/**
 * 用户认证
 */
class DetailsAction extends Action
{

    public function preExecute(Application $application, Request $request)
    {
        $this->db = DB();
    	$this->top = new \Model\Top();
    	$this->top_type = new \Model\Top\Type();
    }

    /**
     * 需求排行榜
     * 
     * @param Application $application            
     * @param Request $request            
     */
    public function executeRankinglist(Application $application, Request $request)
    {
        $this->setLayout('layout');
        $res['area_id'] = $request->get('area_id', 86999030);

        $this->area_arr = [
            '86999030' => '北京',
            '86999031' => '上海', 
            '86007050' => '南京', 
            '86016140' => '广州', 
            '86016125' => '深圳'];
        
        //当前城市 
        $res['area_name'] = $this->area_arr[$res['area_id']];
        
        if ($_SESSION['userinfo']['passport_type'] == 1){
        	$res['flag'] = 2;
        }else {
        	$res['flag'] = 1;
        }
        $res['flag'] = $request->get('type') ? $request->get('type') : $res['flag'];
         
        $day = date('Y-m-d');
        
        //查出当前要显示的一期期号
    	$top = $this->top->select('top_id, top_title')->where("top_status=1 and top_publish_at<='{$day}'")->orderBy('top_id desc')->limit(1)->query(); 
    	if($top[0]['top_id'])
    	{
    	    //查出都有哪些榜单
    	    $top_type = $this->top_type->select('top_type_id, top_type_name')->where('top_type_flag = ? and top_type_status = 1', $res['flag'])->query();
    	    foreach($top_type as $key=>&$val)
    	    {
    	        $val['top_title'] = $top[0]['top_title'];
    	        
    	        //条件搜索
    	        $where['top_list_status'] = 1;
    	        $where['top_id'] = $top[0]['top_id'];
    	        $where['top_type_id'] = $val['top_type_id'];
    	        $res['area_id'] ? $where['area_id']=$res['area_id'] : '';
    	        //查出榜单里的数据
    	    	$val['data'] = $this->db->select()->from('top_list')->where($where)->orderBy('top_list_order asc, top_list_id desc')->limit(5)->query();
    	    	foreach($val['data'] as $k=>&$v)
    	    	{
    	    		$v['top_list_options'] = unserialize($v['top_list_options']);
    	    		$v['name'] = $v['brand_name'] ? $v['brand_name'] : $v['mall_name'];
    	    		$v['name'] = mb_strlen($v['name'], 'utf-8')>7 ? mb_substr($v['name'], 0 , 7, 'utf-8').'...' : $v['name'];
    	    		$v['name'] .= $v['top_list_options']['acreage'] ? ' / '.$v['top_list_options']['acreage'] : '';
    	    		$v['name'] .= $v['top_list_options']['category'] ? ' / '.$v['top_list_options']['category'] : '';
    	    	}
    	    }
    	    /*
    	     * 添加需求推广数据
    	    * */
    	    if ($res['flag'] == 2){
    	    	$resource = new \FC\Resoure();
    	    	$r_list = $resource->getResource(2);
    	    	 
    	    	$extenResult = [];
    	    	$ex_arr_str = '';
    	    	$ex_arr = [];
    	    	$r_list = array_values($r_list);
    	    	foreach ($r_list as $key => $val){
    	    		if (mb_strlen($val['mall_name']) > 7){
    	    			$ex_arr_str .= $extenResult[$key]['mall_name'] =  Frame\Util\UString::substr($val['mall_name'], 0,7).'...';
    	    		}else {
    	    			$ex_arr_str .= $extenResult[$key]['mall_name'].'/';
    	    		}
    	    		$extenResult[$key]['tag_126']['lower'] =  $val['tag']['group_126']['lower']/C('MULTIPLY_DOUBLE');
    	    		$extenResult[$key]['tag_126']['upper'] =  $val['tag']['group_126']['upper']/C('MULTIPLY_DOUBLE');
    	    		if (!empty($extenResult[$key]['tag_126']['lower']) && !empty($extenResult[$key]['tag_126']['upper'] )){
    	    			$ex_arr_str .= $extenResult[$key]['tag_126']['lower'].'㎡-'.$extenResult[$key]['tag_126']['upper'].'㎡'.'/';
    	    		}else if (!empty($extenResult[$key]['tag_126']['lower'])){
    	    			$ex_arr_str .= $extenResult[$key]['tag_126']['lower'].'㎡'.'/';
    	    		}elseif (!empty($extenResult[$key]['tag_126']['upper'])){
    	    			$ex_arr_str .=  $extenResult[$key]['tag_126']['upper'].'㎡'.'/';
    	    		}
    	    		$extenResult[$key]['catstr'] =  FC\Resoure::getStrcatebyid($val['category_ids']);
    	    		$extenResult[$key]['catstr'] = str_replace('<p>', '', $extenResult[$key]['catstr']);
    	    		$extenResult[$key]['catstr'] = str_replace('</p>', '', $extenResult[$key]['catstr']);
    	    		$ex_arr_str .= $extenResult[$key]['catstr'];
    	    		$ex_arr[$key]['name'] = $ex_arr_str;
    	    		$ex_arr[$key]['top_list_key'] = $val['_id'];
    	    		unset($ex_arr_str);
    	    	}
    	    }
    	    $res['list'] = $top_type;
    	    $link = urlFor();
    	    $res['link'] = \Frame\Util\UString::base64_encode($link);
    	    $this->resultArray = $res;
    	    $this->ex = $ex_arr;
    	}
    	
    	
    }
    
    
    
}