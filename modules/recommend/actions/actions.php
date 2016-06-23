<?php 
use Frame\Foundation\Application;
use Frame\Http\Request;
use Frame\Foundation\Action;
use FC\Comm;
use FC\Session;
use Frame\Dao\Model;
use Model\Chengtv;
use FC\GetValue;

class RecommendActions extends Action
{
	
	public function preExecute(Application $application, Request $requst)
	{
	    //$this->user = \FC\Session::initSession(true); //测试阶段先关闭
	    $this->passport_info = \FC\Session::getUserSession();
	    $this->passport_id = $this->passport_info['resultMsg']['passport_id'];
	    $this->recommend = new \Model\Recommend();
	    $this->comment = new \Model\Recommend\Comment();
	    $this->module = new \Model\Recommend\Module();
	    $this->moduleargs = new \Model\Recommend\Module\Args();
		$this->listurl = '/recommend/';
		$this->pageSize = 10;
	}
	
	public function executeList(Application $application, Request $request)
	{
	    headerto('/');
	}
	
	/**
	 * 今日推荐页面
	 * 
	 * @param Application $application
	 * @param Request $request
	 */
	public function executeIndex(Application $application, Request $request)
	{
	    $this->setLayout('indexLayout');
	    $this->setView('list');
	    if((int)$this->passport_id){
    	    //先判断是不是有未读消息	    
    	    $this->countnoread = $this->getNoReadMess(1);
	    }
	    //查哪天的推荐
	    $get_date = $request->get('get_date', 0);
	    
	    $chengtv = new \Model\Chengtv();
	    $this->chengtvinfo = $chengtv->select()->orderBy('chengtv_order asc, chengtv_id desc')->where('chengtv_status = 1')->limit(4)->query();
	    foreach($this->chengtvinfo as $k=>&$v) 
	    {
	        $v['chengtv_img_big'] = C('UPLOAD_URL').$v['chengtv_img_big'];
	    }
	    $pageNow = $request->get('pageNow', 1);
	    $request->set('p', '<--PAGENO-->');
	    $query = urlFor('rest', $request->get());
	    $data = $this->get_data($pageNow, $query, $get_date);
	    $this->list = $data['list'];
	    $this->data_scroll_url = $data['data_scroll_url'];
	    $this->module = $request->get('module');
	    $this->query = '/';
	}
	
	
	
	/**
	 * 翻页数据
	 * @param Application $application
	 * @param Request $request
	 */
	public function executeRecommend(Application $application, Request $request)
	{
	    $this->setLayout();
	    $this->setView('recommendinfo');
	    $pageNow = $request->get('p', 1);
	    $request->set('p', '<--PAGENO-->');
	    $query = urlFor('rest', $request->get());
	    $data = $this->get_data($pageNow, $query);
	    $this->recommend_num = ($pageNow == 1) ? '' : $data['recommend_num'];
		$this->list = $data['list'];
		$this->data_scroll_url = $data['data_scroll_url'];
		
		\FC\Comm::webCache(600);
	}
	
	/**
	 * 今日推荐数据分页处理
	 * 
	 * @param unknown $pageNow
	 * @param unknown $query
	 * @return string
	 */
	private function get_data($pageNow, $query, $get_date)
	{
	    $date = empty($get_date) ? date('Y-m-d', strtotime("1day")) : date('Y-m-d', strtotime("1day", strtotime($get_date)));
	    $recommend_info = $this->recommend->pageList(2, $pageNow, $query, "recommend_publish_at desc", "recommend_publish_at < '{$date}' and recommend_module_status=1");
	    $where['recommend_module_id'] = 1;
	  
	    foreach($recommend_info['list'] as $key => $value)
	    {
	    	$num = $value['recommend_publish_at'];
	    	if(!empty($value['recommend_id_rel'])){
	    		$value['recommend_id'] = $value['recommend_id_rel'];
	    	}
	    	$where['recommend_id'] = $value['recommend_id'];
	    	$info = $this->moduleargs->select()->where($where)->orderBy('recommend_comment_args_order asc')->query();
	    	foreach ($info as $k => $v)
	    	{
	    	  $options = unserialize($v['recommend_module_args_options']);
	    	  $options['img'] = getLogoimage(['brand_id'=>$options['brand_id']],'src');
	    	  $data[$num][] = $options;
	    	}
	    }
	    
	    
	    $recommend_data['data_scroll_url'] = $this->page_info($recommend_info['page']);
	    $recommend_data['list'] = $data;
	    
	    return $recommend_data;
	}
	
	/**
	 * 分页处理
	 * @param unknown $url
	 * @param unknown $pageNow
	 * @param unknown $resultArray
	 * @return string
	 */
	
	private function page_info($resultArray)
	{
		$pageNow = $resultArray['now'];
		/* 分页  */
		$next_page = $pageNow+1 ;
		$data_scroll_url = ($pageNow >= 1 && $pageNow < $resultArray['total']) ? "/recommend/recommend/p/{$next_page}" : "";
		return $data_scroll_url;
	}
	
	public function executeBackup(Application $application, Request $request)
	{
	    
	    $module = $this->module();
	    $recommend_id = $request->get('recommend_id');
	    $recommend_module_id = $request->get('recommend_module_id');
	    $recommend_id = 1;
	    $recommend_module_id = 1;
	    
	    $recomminfo = $this->recommend->find($recommend_id);
	    foreach($recomminfo['recommend_module_ids'] as $key =>$value)
	    {
	    	$info[$key]['value'] = $this->moduleargs->select()->where('recommend_id =? and recommend_module_id =?', $recommend_id, $recomminfo['recommend_module_ids'][$key])->query();
	    	$info[$key]['name'] = $module[$key];
	    }
	    
	    $this->resultArray = $info;
	}
	
	public function executeSendcomment(Application $application, Request $request)
	{
		if(REQUEST_METHOD == 'GET')
		{
		    
		    $this->setLayout('reglayout');
			$this->setView('getAddEdit');
			$this->method = 'POST';
			$this->submitType = 'submit';
			$this->actionUrl = $this->listurl.'Sendcomment/';
			$this->resultArray = $this->passportinfo($this->passport_info['passport_id']);
			
		}else{
		    $recommend_id = $request->get('recommend_id');
		    $recommend_info = $this->recommend->find($recommend_id);
		    $request->set('recommend_num', $recommend_info['recommend_num']);
		    $request->set('passport_id', $this->passport_info['passport_id']);
		    $request->set('recommend_id', 1);
		    $request->set('recommend_num', 1);
		    $imgCheckcode = $request->get("img_code", 0);
		    
		    // 检测图形验证码
		    $CheckRes = Comm::checkCode($imgCheckcode);
		    if ($CheckRes == false) {
		    	return [
		    			'result' => 0,
		    			'resultMsg' => "验证码错误"
		    			];
		    }
		    
		    $this->resultArray = $this->comment->add($request->get());
		    if($this->resultArray > 0){
		        $this->headerTo($this->listurl.'Sendcomment/');
		    }else{
		        comm::msg($request->getRequestUri(),'添加数据失败');
		    }
		}
		
	}
	
	public function executeCommentlist(Application $application, Request $request)
	{
	    $request->set('recommend_id', 1);
		$this->setLayout('reglayout');
	    $this->setView('Commentlist');
	    $pageNow = $request->get('p', 1);
	    $request->set('p', '<--PAGENO-->');
	    $query = urlFor('rest', $request->get());
	    $search = $this->comment->search($request->get());
	    $this->resultArray = $this->comment->pageList(10, $pageNow, $query, 0, $search['where']);
	    foreach($this->resultArray['list'] as $key => $value){
	        if($this->resultArray['list'][$key]['recommend_comment_show'] == 1)
	        {
	        	$this->resultArray['list'][$key]['name'] = '匿名用户';
	        }else{
	            $data = $this->passportinfo($this->resultArray[$key]['passport_id']);
	            $this->resultArray['list'][$key]['name'] = $data['passport_name'];
	        }
	    }
	}
	
	private function passportinfo($passport_id)
	{
	    
	    $passport = new \Model\Passport();
	    $rs = $passport->relation('PassportBrand,PassportMall')->find($passport_id);
	    $count = 0;
	    foreach ($rs['PassportBrand'] as $key => $value)
	    {
	    	$rs['project'] .= $rs['PassportBrand'][$key]['brand_name'].'、';
	    	$rs['project'] .= $rs['PassportMall'][$key]['mall_name'];
	    	$count = $count+1;
	    	$rs['project_count'] = $count;
	    }
	    return $rs;
	     
	}
	
	private function module(Application $application, Request $request)
	{
	    $module = $this->module->select()->query();
	    foreach($module as $key=>$value)
	    {
	    	$module_info[$key] =$module[$key]['recommend_module_name'];
	    }
	    return $module_info;
	}
	
	public function executefind(Application $application, Request $request)
	{
		$this->setLayout('indexLayout');
		$this->setView('list');
		$data = $this->ids();

		if(!empty($data['brand_id']) && empty($data['mall_id']))
		 {
		$this->user = 'brand';
		}elseif(!empty($data['mall_id']) && empty($data['brand_id']))
		{
		$this->user = 'mall';
		}elseif(empty($data['mall_id']) && empty($data['brand_id']))
		{
		$this->user = 'thirdparty';
		}
		$this->user = 'mall';
	}
	
	
}



?>