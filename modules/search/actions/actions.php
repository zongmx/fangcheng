<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Frame\Foundation\Action;
use FC\Session;
use FC\Comm;
use Frame\Dao\Model;
use FC;

class SearchActions extends Action
{
    public function preExecute(Application $application, Request $request)
    {
        /* $this->user = FC\Session::initSession(true);
        $userinfo = FC\Session::getUserSession();
        $this->usertype = $userinfo['resultMsg']['passport_type']; */
        $this->usertype = $_SESSION['userinfo']['passport_type'];
    }
  
    public function executeIndex(Application $application, Request $request)
    {
        $this->setLayout('layout');
        $user = \FC\Session::getUserSession();
        $area_id = $user['resultMsg']['area_id'];
        $CITY_ONLINE = C('CITY_ONLINE');
        if(isset($CITY_ONLINE[$area_id])){
            $this->areaId = $area_id;
            $this->areaName = $CITY_ONLINE[$area_id];
        } else {
            $this->areaId = 86999030;
            $this->areaName = '北京';
        }
        $this->setView('list');
        if($this->usertype == 1)
        {
        	$this->searchtype = 2;
        	$this->keyword  = '请输入商业体关键词';
        }elseif($this->usertype == 2 || $this->usertype == 3)
        {
        	$this->searchtype = 1;
        	$this->keyword = '请输入品牌关键词';
        }else{
        	$this->searchtype = 2;
        	$this->keyword = '请输入商业体关键词';
        }
        $this->actionUrl = '/search/getdata/';
        \FC\Comm::webCache();
    }

    public function executeGetdata(Application $application, Request $request)
    {
            $this->setLayout();
            $from = $request->get('from', '');
    	    $searchtype = $request->get('searchtype', 0);
    	    if($searchtype == 0)
    	    {
    	    	return FALSE;
    	    }
    	    $p = $request->get('p', 1);
    	    $w = urlencode($request->get('w', ''));
    	    $area_id = $request->get('area_id', 0);
    	    $areaName = '';
    	    if($area_id) {
        	    $areaName = FC\GetValue::getinfo('fangcheng_v2', 'area', $area_id);
        	    $areaName = $areaName['resuleMsg']['area_name'];
    	    }
    	    $category_id = $request->get('category_id', 0);
    		
    	    $where  = !empty($w) ? "/w/{$w}" : '';
    	    $where .= !empty($area_id) ? "/area_id/{$area_id}" : '';
    	    $where .= !empty($category_id) ? "/category/{$category_id}" : '';
    	    $where .= !empty($from) ? "/from/{$from}" : '';
    		if($searchtype == 1){
    		    $this->setView('brand');
    		    $this->resultArray = $this->data_info('searchbrand', 1, $p, $where);//__d($this->resultArray);
    		    $list = $this->resultArray['list'];
    		    foreach($list as $key=>$value)
    		    { 
    		        $this->resultArray['list'][$key]['brand_logo'] = getLogoimage(['brand_id'=>$value['brand_id']],'48x48');
    		        $this->resultArray['list'][$key]['category'] = str_replace(['<p>','</p>'], ['',''], Comm::getCategoryDeepName($value['category_id']));
    		        $this->resultArray['list'][$key]['category_ids'] = implode(',', $value['category_id']);
    		        $this->resultArray['list'][$key]['category_ids_other'] = '';
    		        $this->resultArray['list'][$key]['count_needs'] = $this->count_needs(['brand_id'=>intval($value['brand_id'])]);
    		        $this->resultArray['list'][$key]['has_contact'] = ($list[$key]['brand_has_contact'] == 1) ? '联系人已认证' : '';    		  
    		        $this->resultArray['list'][$key]['areaName'] = $areaName;    		  
    		    }
//     		    $this->result=$reslult; 
    		    //array_splice($this->resultArray['list'], 1,0,$reslult);
    		}elseif($searchtype == 2){
    		    $this->setView('mall');
    		    $this->resultArray = $this->data_info('searchmall', 2, $p, $where);
    		    $list = $this->resultArray['list'];
    		    foreach ($list as $key=>$value)
    		    {   if($key==0){
        		        
    		        }
    		        
    		        $this->resultArray['list'][$key]['mall_logo'] = getLogoimage(['mall_id'=>$value['mall_id']],'48x48');
    		    	$this->resultArray['list'][$key]['business_circle'] = $this->business_info($list[$key]['business_circle_id']);
    		    	
    		    	$one_yearago = date('Y-m-d', strtotime('-1 years'));
    		    	$now_date = date('Y-m-d');
    		        if($value['mall_opening_date'] <= $one_yearago)
    		        {
    		            $this->resultArray['list'][$key]['mall_status'] = '';
    		        }elseif($value['mall_opening_date'] > $one_yearago && $value['mall_opening_date'] < $now_date)
    		        {
    		            $this->resultArray['list'][$key]['mall_status'] = '新开业';
    		        }elseif($value['mall_opening_date'] > $now_date)
    		        {
    		            $this->resultArray['list'][$key]['mall_status'] = '即将开业';
    		        }
    		        $this->resultArray['list'][$key]['mall_opening_date'] = $list[$key]['mall_opening_date'];
    		        $this->resultArray['list'][$key]['mall_building_size'] = empty($value['mall_building_size']) ? '' : number_format($value['mall_building_size']).'㎡';
    		        $this->resultArray['list'][$key]['count_needs'] = $this->count_needs(['mall_id'=>intval($list[$key]['mall_id'])]);
    		        $this->resultArray['list'][$key]['has_contact'] = ($list[$key]['mall_has_contact'] == 1) ? '联系人已认证' : '';
    		        $this->resultArray['list'][$key]['areaName'] = $areaName;
    		    }
//     		    $this->result=$reslult; 
    		   // array_splice($this->resultArray['list'], 1,0,$reslult);    		
    		}
    	\FC\Comm::webCache(900);
    }
    
    private function data_info($search_name, $searchtype, $p, $where)
    {
    	$data_where = "{$search_name}{$where}";
    	$data = $this->get_data($data_where, $p);
    	$url = "searchtype/{$searchtype}{$where}";
    	$data_info['list'] = $data['list'];
    	$data_info['data_scroll_url'] = $this->page_info($data['page'], $url);
    	return $data_info;
    }
    
    
    /**
	 * 分页处理
	 * @param unknown $url
	 * @param unknown $pageNow
	 * @param unknown $resultArray
	 * @return string
	 */
	
    private function page_info($page, $data)
	{
        $pageNow = $page['now'];
	    /* 分页  */
	    $next_page = $pageNow+1 ;
	    $data_scroll_url = ($pageNow >= 1 && $pageNow < $page['total']) ? "/search/getdata/{$data}/p/{$next_page}" : "";
	    return $data_scroll_url;   
	}
    
    private function get_data($where, $p)
    {
        $url = C('SERVICE_IP');
        $data = json_decode(file_get_contents("{$url}/search/{$where}/p/{$p}"), true);
        if($data['result'] == 1)
        {
        	$data_info = $data['info'];
        }
        return $data_info;
    }
    
    private function business_info($id)
    {
        $business = new \Model\Business\Circle();
        $data = $business->find($id);
        return $data['business_circle_name'];
    }
    
    private function count_needs($where)
    {
        $mdb = MDB('DEFAULT');
        $where['demand_status'] = ['!=',0];
        $rs = $mdb->select('count(1)')->from('demand')->where($where)->cache('mem')->query();
        return $rs;
    }
    
}