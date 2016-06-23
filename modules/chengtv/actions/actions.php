<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Frame\Foundation\Action;
use FC\Comm;
use Frame\Dao\Model;

class ChengTvActions extends Action
{
    public function preExecute(Application $application, Request $request)
    {
        $this->apply = new \Model\Apply();
    	$this->chengtv = new \Model\Chengtv();
    	$this->apply_chengtv = new \Model\Apply\Chengtv();
    	$this->area = new \Model\Area();
        $this->listUrl = '/chengtv/index';
        $this->brand = new \Model\Passport\Brand();
    }

    /**
     * 橙TV列表
     *
     * @param Application $application            
     * @param Request $request            
     */
    public function executeIndex(Application $application, Request $request)
    {
        $this->setView('list');
        $category_id = $request->get('category_id', 0);
        $page = $request->get('page', 1);
        if ($page > 1){
            $this->setLayout();
            \FC\Comm::webCache(900);
        }else {
            $this->setLayout('registerLayout');
        }
        $pageSize = 10;
        $db = DB();
        $category_Arr = [
            '0' => '全部业态',
            '10000' => '餐饮',
            '20000' => '购物',
            '30000' => '亲子儿童',
            '40000' => '教育培训',
            '50000' => '休闲娱乐',
            '60000' => '生活服务',
            '70000' => '美妆丽人',
            '80000' => '酒店公寓',
            '90000' => '百货超市',
            '100000' => '其他'
        ];
        if (empty($category_id)) {
            $list = $db->select()
                ->from('chengtv')
                ->where('chengtv_status = ?', 1)
                ->orderBy('chengtv_order asc')
                ->limit(($page - 1) * $pageSize, $pageSize)
                ->query();
            $count = $db->select('count(1) as count')
                ->from('chengtv')
                ->where('chengtv_status = ?', 1)
                ->orderBy('chengtv_order asc')
                ->query();
        } else {
            $list = $db->select()
                ->from('chengtv as c')
                ->leftJoin('brand_category as b', 'c.brand_id = b.brand_id')
                ->where("b.category_id >= ? AND b.category_id < ? AND chengtv_status = ?", (int) $category_id, $category_id + 10000,1)
                ->orderBy('chengtv_order asc')
                ->limit(($page - 1) * $pageSize, $pageSize)
                ->query();
            $count = $db->select('count(1) as count')
                ->from('chengtv as c')
                ->leftJoin('brand_category as b', 'c.brand_id = b.brand_id')
                ->where("b.category_id >= ? AND b.category_id < ? AND chengtv_status = ?", (int) $category_id, $category_id + 10000,1)
                ->orderBy('chengtv_order asc')
                ->query();
        }
        $currentCount = $page * $pageSize;
        if ($currentCount >= $count[0]['count']){
            $ajax_url = '';
        }else {
            $nextPage = $page+1;
            $ajax_url = "/chengtv/index/category_id/$category_id/page/$nextPage";
        }
//         $this->list = $this->chengtv->select()->orderBy('chengtv_order asc, chengtv_id desc')->where('chengtv_status = 1')->query();
            foreach($list as $k=>$value)
            {
                $list[$k]['chengtv_img_small'] = getLogoimage(['brand_id'=>$value['brand_id']],'src');
            }
        $userinfo = FC\Session::getUserSession();
        //判断是否可以申请橙TV
        $this->list = $list;
        $this->cateName = $category_Arr[$category_id];
        $this->category_id = $category_id;
        $this->ajax_url = $ajax_url;
        $this->page = $page;
        $this->brand_pass = ($userinfo['resultMsg']['passport_type'] == 1) ? "href=/chengtv/info/from/index data-ajax=false" : "href=/chengtv/info";
        $this->jumpurl = \Frame\Util\UString::base64_encode(urlFor('', $request->get()));
    }
    
    /**
     * 数据获取处理
     * 
     * @param Application $application
     * @param Request $request
     */
    public function executedata(Application $application, Request $request)
    {
    	$pageNow = $request->get('p', 0);
    	$request->set('p', '<--PAGENO-->');
        $query = urlFor('rest', $request->get());
        $this->resultArray = $this->chengtv->pageList($this->pageSize, $pageNow, $query, 1, 'chengtv_status = 1');
        
        if(strlen($this->resultArray) > 1)
        {
        	foreach($this->resultArray['list'] as $k=>$value)
        	{
        		$this->resultArray['list'][$k]['chengtv_img_big'] = C(UPLOAD_URL).$this->resultArray['list'][$k]['chengtv_img_big'];
        		$this->resultArray['list'][$k]['chengtv_img_small'] = C(UPLOAD_URL).$this->resultArray['list'][$k]['chengtv_img_small'];
        	}
        }
        
    }
    
    /**
     * 展示橙TV介绍
     *     
     * @param Application $application
     * @param Request $request
     */
    public function executeInfo(Application $application, Request $request)
    {
        $from = $request->get();
        $this->url = ($from['from'] == 'view') ? "/chengtv/add/from/view/chengtv_id/{$from['chengtv_id']}" : "/chengtv/add/from/index";
        $this->setView('info');
    }
    
    /**
     * 申请橙TV/品牌推荐
     * 
     * @param Application $application
     * @param Request $request
     * @return multitype:number string
     */
    public function executeAdd(Application $application, Request $request)
    {
        $userinfo = $this->userinfo();
        $from = $request->get();
        $recomm = $request->get('recomm', 0);
        $this->name = $recomm ? '品牌推荐' : '橙TV';
        $this->apply_cat = $recomm ? 2 : 1;
        $this->jumpurl = \Frame\Util\UString::base64_encode(urlFor('', $request->get()));
        if($recomm)
        {
            $this->url = '/';
        }else{
            $this->url = ($from['from'] == 'view') ? "/chengtv/view/chengtv_id/{$from['chengtv_id']}" : "/chengtv/index";
        }
        if($userinfo['passport_type'] != 1)
        {
        	$this->setView('errinfo');
        	return;
        }
        if(REQUEST_METHOD == 'GET')
        {
            $this->method = 'POST';
            $this->submitType = 'SUBMIT';
            $this->acitonUrl = '/chengtv/add';
            $where = array('passport_id' => $userinfo['passport_id'], 'passport_brand_status'=>1);
            $brandData = $this->brand->select('brand_id,brand_name')->where($where)->query();
            if($brandData[0]['brand_id'])
            {
                foreach($brandData as $key=>$value)
                {
                	$brandData1[] = ['name' => $value['brand_name'],
                	                 'value'  => $value['brand_id'],                    
                	];
                } 
                
                $this->branddefault = $brandData1[0];
                $this->brandData = urlencode(\Frame\Util\UString::json($brandData1));
                $area_info = $this->area->select()->query();
                
                $this->setLayout('layout');
                $this->setView('add');
            }else{
                $this->setView('addbrand');
                return;
            }
        }else{
            
            // 已经申请过了的不可以重复申请
            $where = array('passport_id'=> $userinfo['passport_id'], 'brand_id'=>$request->get('brand_id'), 'apply_cat' => $request->get('apply_cat'));
            $data = $this->apply_chengtv->select()->where($where)->query();
            if($data)
            {
            	return [
    	        			'result'    => 1,
    	        			'resultMsg' => "您已经提交过此品牌的申请，请等待方小橙与您联系"
    	        	   ];  
            } 
            
            //数据填写是否完整
            $args['ApplyChengtv'] = $request->get();
            $args['ApplyChengtv']['passport_id'] = $userinfo['passport_id'];
            
            if(empty($args['ApplyChengtv']['brand_name']) || empty($args['ApplyChengtv']['apply_chengtv_address']))
            {
                return [
                		'result'    => 0,
                		'resultMsg' => "请检查数据填写是否完整"
                		];  
            }
            
            $args['passport_id'] = $userinfo['passport_id'];
            $args['apply_type_id'] = 3;
            
            $this->resultArray = $this->apply->relation('ApplyChengtv')->add($args);
            
            if($this->resultArray > 0)
            {
                $resultMsg = $args['ApplyChengtv']['apply_cat']==1 ?  '您已成功提交橙TV的报名申请，感谢您对橙TV的关注。<br/>方小橙将尽快与您联系！' : '您已成功提交品牌推荐的报名申请，感谢您对方橙的关注。<br/>方小橙将尽快与您联系！';
                //comm::msg($this->listUrl);
                return [
    	        			'result'    => 1,
    	        			'resultMsg' => $resultMsg,
    	        		   ];
            }else{
                //comm::msg('', '添加失败');
                return [
    	        			'result'    => 1,
    	        			'resultMsg' => "由于系统原因，您进行的操作未成功，请重新尝试。如果多次出现此提示，请联系方橙客服。<br><br>错误编号：233"
    	        		   ];
            }
            
        }
    }
    
    
    /**
     * 展示橙TV
     * 
     * @param Application $application
     * @param Request $request
     */
    public function executeView(Application $application, Request $request)
    {
        $this->setLayout('detailsbrandlayout');
        $this->setView('view');
        $id = $request->get('chengtv_id', 0);
        
        $this->resultArray = $this->chengtv->find($id);

        //品牌LOGO
        $this->resultArray['brand_logo'] = getLogoimage(['brand_id'=>$this->resultArray['brand_id']],'src');
        
        //视屏图片处理
        $this->resultArray['chengtv_img_big'] = empty($this->resultArray['chengtv_img_big']) ? '/img/detail/1.png' : C(UPLOAD_URL).$this->resultArray['chengtv_img_big'];
        
        //业态处理
        $this->resultArray['category_ids'] = implode(',', $this->resultArray['category_ids']);
        
        //分享视屏
        $shareinfo  = makeShareLink(['chengtv_id'=> $id],['chengtv'=>'view']);
        $this->resultArray['shareinfo'] = $shareinfo;
        $this->letter_brand = "href=/details/userlist/brand_id/{$this->resultArray['brand_id']}  data-ajax=false";
        
        $this->resultArray['action'] = $request->get('action');
        
        $userinfo = FC\Session::getUserSession();
        $this->brand_pass = ($userinfo['resultMsg']['passport_id']) ? "href=/chengtv/info/from/view/chengtv_id/{$id} data-ajax=false" : "href=/chengtv/info" ;
        
        //页头title显示
        $this->resultArray['brandbasicinfo']['brand_name'] = $this->resultArray['brand_name'] ? $this->resultArray['brand_name'] : '';
    }
    
    
    /**
     * 判断是否品牌用户
     * @return multitype:string
     */
    private function is_brand()
    {
        $userinfo = $this->userinfo();
    	$brand_id = [];
    	$where['passport_id'] = $userinfo['passport_id'];
    	$brand = $this->brand->select('brand_id,category_ids')->where($where)->query();
    	foreach ($brand as $key=>$value)
    	{
    		$brand_id[] = $brand[$key]['brand_id'];
    	}
    	$is_brand = empty(implode(',',$brand_id)) ? 0 : 1;
    	return  $is_brand;
    }
    
    /**
     * 检测用户登陆状态及获取session信息
     * 
     */
   private function userinfo()
   {
       $this->user = FC\Session::initSession(TRUE);
       $passportinfo = FC\Session::getUserSession();
       $data['passport_type'] = $passportinfo['resultMsg']['passport_type'];
       $data['passport_id'] = $passportinfo['resultMsg']['passport_id'];
       return $data;
   }
    
    
}