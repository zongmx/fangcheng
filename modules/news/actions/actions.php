<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Frame\Foundation\Action;
use FC\Comm;
use FC\Session;

/**
 * 热点资讯函数
 * @author Administrator
 *
 */
class NewsActions extends Action
{
    /**
     * 预备处理理函数数
     * (non-PHPdoc)
     * @see \Frame\Foundation\Action::preExecute()
     */
	public function preExecute(Application $application, Request $request)
	{
		$this->user = FC\Session::initSession(true);
	    $this->passportinfo = FC\Session::getUserSession();
	    $this->passporttype = $this->passportinfo['resultMsg']['passport_type'];
	    $this->passport_id = $this->passportinfo['resultMsg']['passport_id'];
	    $this->mall = new Model\Passport\Mall();
	    $this->brand = new Model\Passport\Brand();
	    $ids = $this->ids();
	    $mall_id = $ids['mall_id'];
	    $brand_id = $ids['brand_id'];
	    //$category_id = $ids['category_id'];
	    $category_id = 1000000;
	    $this->category_option = !empty($category_id) ? "category_id/{$category_id}/" : '';
	    $this->mall_option = !empty($mall_id) ? "mall_id/{$mall_id}/" : '';
	    $this->brand_option = !empty($brand_id) ? "brand_id/{$brand_id}/" : '';
	    $this->serviceurl = C('SERVICE_IP');
	}
	
	/**
	 * 首页展示
	 * @param Application $application
	 * @param Request $request
	 */
	
	public function executeIndex(Application $application, Request $request)
	{
	    $this->setLayout('indexLayout');
	    $this->setView('list');
	    //先判断是不是有未读消息
	    $this->countnoread = $this->getNoReadMess(1);
	    $pageNow = $request->get('p', 1);
	    
	    if($this->passporttype == 1)
	    {
	    	$this->my_title = '我的品牌及入驻的商业体';
	    }elseif($this->passporttype == 2){
	        $this->my_title = '我的商业体及入驻品牌';
	    }elseif($this->passporttype == 4){
	        $this->my_title = '我的项目及相关资讯';
	    }
	    
	    
	    $mynews = $this->data_get('mynews', "{$this->mall_option}{$this->brand_option}p/{$pageNow}");
	    $this->mynews_list = $mynews['list'];
	    $this->mynews_page = $this->page_info('mynews', 'my_prev_page', 'my_next_page', $pageNow ,$mynews);

	    $cnews = $this->data_get('categorynews', "{$this->category_option}p/{$pageNow}");
	    $this->cnews_list = $cnews['list'] ;
	    $this->cnews_page = $this->page_info('cnews', 'c_prev_page', 'c_next_page', $pageNow ,$cnews);
	}
    
	/**
	 * 我的资讯
	 * @param Application $application
	 * @param Request $request
	 */
	public function executeMynews(Application $application, Request $request)
	{
	    $this->setLayout();
	    $this->setView('myinfo');
	    $pageNow = $request->get('p', 1);
	    
	    if($this->passporttype == 1)
	    {
	    	$this->my_title = '我的品牌及入驻的商业体';
	    }elseif($this->passporttype == 2){
	    	$this->my_title = '我的商业体及入驻品牌';
	    }elseif($this->passporttype == 4){
	    	$this->my_title = '我的项目及相关资讯';
	    }
	    
	    $mynews = $this->data_get('mynews', "{$this->mall_option}{$this->brand_option}p/{$pageNow}");
	    $this->mynews_page = $this->page_info('mynews', 'my_prev_page', 'my_next_page', $pageNow, $mynews);
	    $this->mynews_list = $mynews['list'];
	    
	}
	
	/**
	 * 行业资讯
	 * @param Application $application
	 * @param Request $request
	 */
	public function executeCnews(Application $application, Request $request)
	{
	    
	    $this->setLayout();
	    $this->setView('cinfo');
	    $pageNow = $request->get('p', 1);
	    
	    $cnews = $this->data_get('categorynews', "{$this->category_option}p/{$pageNow}");
	    $this->cnews_page = $this->page_info('cnews', 'c_prev_page', 'c_next_page', $pageNow, $cnews);
	    $this->cnews_list = $cnews['list'];
	    
	}
	
	/**
	 * 分页处理
	 * @param unknown $url
	 * @param unknown $pageNow
	 * @param unknown $resultArray
	 * @return string
	 */
	private function page_info($url, $prev_id, $next_id, $pageNow ,$resultArray)
	{
	    
	    /* 分页  */
	    $prev_page = $pageNow-1 ;
	    $next_page = $pageNow+1 ;
	    $page['prev_page_url'] = ($pageNow <= 1) ? '' : "href=/news/{$url}/p/{$prev_page}";
	    $page['next_page_url'] = ($pageNow >= 1 && $pageNow < $resultArray['page']['total']) ? "href=/news/{$url}/p/{$next_page}" : "";
	    $page['prev_class'] = ($pageNow <= 1) ? 'page_btn page_gray' : 'page_btn btn_able';
	    $page['next_class'] = ($pageNow >= 1 && $pageNow < $resultArray['page']['total']) ? 'page_btn btn_able' : 'page_btn page_gray';
	    $page['prev_id'] = (empty($page['prev_page_url'])) ? '' : $prev_id;
	    $page['next_id'] = (empty($page['next_page_url'])) ? '' : $next_id;
	    return $page;
	    
	}

	/**
	 * 获取当前用户的品牌、商业体、业态ID
	 * @return multitype:string
	 */
	private function ids()
	{
	    $category_id = [];
	    $brand_id = [];
	    $mall_id = [];
	    $where['passport_id'] = $this->passport_id;
		$mall = $this->mall->select('mall_id,category_ids')->where($where)->query();
	    $brand = $this->brand->select('brand_id,category_ids')->where($where)->query();
	    foreach ($brand as $key=>$value)
	    {
	        $brand_id[] = $brand[$key]['brand_id'];
	        $category_id[] = $brand[$key]['category_ids'];
	    }
	    foreach ($mall as $key=>$value)
	    {
	        $mall_id[] = $mall[$key]['mall_id'];
	        $category_id[] =$mall[$key]['category_ids'];
	    }
	    $category_id = array_merge($category_id, array('1000000')); 
	    $resultCat = [];
	    foreach ($category_id as $v){
	        if(intval($v)>0){
	            $resultCat[] = intval($v);
	        }
	    }
	    return array(  'brand_id' => implode(',',$brand_id),
	                   'mall_id' => implode(',', $mall_id),
	                   'category_id' => implode(',', $resultCat)
	    );
	}
    
    private function data_get($name, $where)
    {
      return  json_decode(file_get_contents("{$this->serviceurl}/news/{$name}/{$where}"),true);
    }
}
?>