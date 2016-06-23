<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Frame\Foundation\Action;
use FC;
use FC\GetValue;

class NewsAction extends Action
{
    
    public function executeBroadcast(Application $application, Request $request){  
		 $passport_info = \FC\Session::getUserSession();
        $passport_id = $passport_info['resultMsg']['passport_id'];
        if((int)$passport_id){
        	//先判断是不是有未读消息
        	$this->countnoread = $this->getNoReadMess(1);
        }      
        //判断穿过来的参数,如果request过来的数据少,那么应该给与默认值
        if ($request->get('ajax')){
            $this->setLayout();
            $this->ajax = 1;
            $this->setView('dobroadcast');
        }
//         $area_arr = ['0'=>'全部城市','86999030'=>'北京','86999031' => '上海',
//             '86007050' => '南京',
//             '86016140' => '广州',
//             '86016125' => '深圳'
//         ];


        $ajax_url_arr = [
            'demand_type'=>'',
            'category'=>'',
            'categorytwo'=>'',
            'city'=>'',
            'size'=>'',
            'pagetype'=>'next',
            'currentpage'=>'',
            'totalpage'=>'',
            'isyetai'=>'',
            'status'=>'',
            'ajax'=>'1'
        ]; 
        if (count($request->get()) < 8){
            //默认状态
            if ($_SESSION['userinfo']['passport_type'] == 1){
            	$init['demand_type'] = 2;
            }else {
            	$init['demand_type'] = 1;
            }
            //默认城市
//             if (array_key_exists($_SESSION['userinfo']['area_id'], $area_arr)){
//             	$init['area_id'] = (int)$_SESSION['userinfo']['area_id'];
//             }else {
//             	$init['area_id'] = 86999030;
//             }
            $init['city'] = 0;
            //添加截止日期的判断
//             $init['demand_expiry_at'] = ['>=',date('Y-m-d',time())];
            // 获得展示数据
            $init['demand_status'] = ['!=',(int) 0];
            foreach ($init as $key => $val){
                $request->set($key, $val);
            }
            //组合下一页link 
            $ajax_url_arr['demand_type'] = $init['demand_type'];
            $ajax_url_arr['city'] = $init['city'];
            $ajax_url_arr['currentpage'] = 2;
        }else {
            $request_arr = $request->get();
            if (empty($request_arr['currentpage'])){
                $request_arr['currentpage'] = 2;
            }else {
                $request_arr['currentpage'] = ($request_arr['currentpage']+1);
            }
            foreach ($ajax_url_arr as $key=>$val){
                if (!empty($request_arr[$key])){
                $ajax_url_arr[$key] = $request_arr[$key];
                }
            }

        }
        $sizeArr = ['1'=>["<=",50*C('MULTIPLY_DOUBLE')],'2'=>[['<=',100*C('MULTIPLY_DOUBLE')],['>=',50*C('MULTIPLY_DOUBLE')],'and'],'3'=>[['<=',200*C('MULTIPLY_DOUBLE')],['>=',100*C('MULTIPLY_DOUBLE')],'and'],'4'=>[['<=',300*C('MULTIPLY_DOUBLE')],['>=',200*C('MULTIPLY_DOUBLE')],'and'],'5'=>[['<=',500*C('MULTIPLY_DOUBLE')],['>=',300*C('MULTIPLY_DOUBLE')],'and'],'6'=>['>=',500*C('MULTIPLY_DOUBLE')]];
        $demand_type = $request->get('demand_type');
        $category = $request->get('category');
        $categorys = $category;
        $categorytwo = $request->get('categorytwo');
//         $city = $request->get('city');
        $size = $request->get('size');
        $pagetype = $request->get('pagetype');
        $currentpage = $request->get('currentpage');
        $status = $request->get('status');
        $isyetai  = $request->get('isyetai');
        $province = $request->get('province','全部城市');
        $city = $request->get('city',0);
        $this->resultArray = [];
        $searchArr = [];
//         $searchArr['area_id'] = $city;
        if (empty($city)){
        	$currentcityname = '全部城市';
        }else {
        	$cityInfo = GetValue::getInfoList('fangcheng_v2', 'area', $city);
        	$currentcityname = $cityInfo['resuleMsg'][0]['area_name'];
        	if ($cityInfo['resuleMsg'][0]['area_deep'] == 1){
        	    $citys = $this->getChildCitys($cityInfo['resuleMsg'][0]['area_id']);
        	    $citys = FC\Comm::toIntArray($citys);
        	    $searchArr['area_id'] = ['IN',$citys];
        	}else if ($cityInfo['resuleMsg'][0]['area_deep'] == 2){
        	    $searchArr['area_id'] = (int)$city;
        	}
        }
        //组合查询条件
        if ($categorytwo!="" || $category!=''){ //业态
              /* if ($categorytwo == ""){
                  $step = $this->getStep($category);
                  $categorySearchArr = [['<=',((int)$category+$step)],['>=',((int)$category)],'and'];
                  
                  $searchArr['category_ids'] = $categorySearchArr;
              }else {
                  $searchArr['category_ids'] = (int)$categorytwo;
              } */
            $db = DB();
            $categorytwo && $category = $categorytwo;
            if($category != 1000000){
                $step = $this->getStep($category);
    //             __dd(['category_id' => ['between', [$category, $category+$step]]]);
                $rs = $db->select('category_id')->from('category')->where(['category_id' => ['between', [$category, $category+$step]]])->query();
                $tmpCatArr = [];
                foreach ($rs as $catV){
                    $tmpCatArr[] = intval($catV['category_id']);
                }
                $searchArr['category_ids'] = ['in', $tmpCatArr];
            }
        }
//         if ($city!=""){ //城市
//             $searchArr['area_id'] = intval($city);
//             $currentcityname = $area_arr[$searchArr['area_id']];
//         }else {
//             if (array_key_exists($_SESSION['userinfo']['area_id'], $area_arr)){
//             	$searchArr['area_id'] = (int)$_SESSION['userinfo']['area_id'];
//             	$city = (int)$_SESSION['userinfo']['area_id'];
//             	$currentcityname = $area_arr[$_SESSION['userinfo']['area_id']];
//             }else {
//                 $searchArr['area_id'] = 86999030;//默认为北京
//                 $currentcityname = $area_arr['86999030'];
//                 $city = (int)86999030;
//             }
//         }        
        if ($status == ""){
//             $searchArr['demand_status'] = 1;
        }else {
            $searchArr['demand_status'] = (int) $status;
        }
        /**面积处理*/
        $sizeStrArr = [
        	0 => '全部',
            1 => '50㎡以下',
            2 => '50-100㎡',
            3 => '100-200㎡',
            4 => '200-300㎡',
            5 => '300-500㎡',
            6 => '500㎡以上'
        ];
        if (empty($size)){
            $currentsizename = "全部";
        }else {
            $currentsizename = $sizeStrArr[$size];
        }
        $this->resultArray['currentsizename'] = $currentsizename;
//         if ($size!==""){ //面积 
//             $searchArr['tag.group_126'] = $sizeArr[$size];
//         }
        if (!empty($demand_type)){
            $searchArr['demand_type'] = (int)$demand_type;
        }else {
            if ($_SESSION['userinfo']['passport_type'] == 1){
            	$searchArr['demand_type'] = 1;
            }else {
            	$searchArr['demand_type'] = 2;
            }
        }
        $this->resultArray['type'] = $searchArr['demand_type'];
        $this->resultArray['category'] = $categorys;
        $this->resultArray['categorytwo'] = $categorytwo;
        $this->resultArray['city'] = $request->get('city');
        $this->resultArray['size'] = $size;
        $this->resultArray['status'] = $searchArr['demand_status'];
        if (empty($currentpage)){
            $currentpage = 1;
        }
        if ($pagetype != ''){
            if($pagetype == "next"){ //下一页
                $currentpage = $currentpage-1;
            	$limit = $currentpage*6;
            }else if ($pagetype == "pre"){
            	$currentpage = $currentpage-1;
            	$limit = ($currentpage-1)*6;
            }else {
            	$limit = 0;
            }
        }else {
            $limit = 0;
        }

        $mdb = MDB();
        if (empty($searchArr['demand_status'])){
            $searchArr['demand_status'] = ['!=',(int) 0];
        }
//         $searchArr['demand_expiry_at'] = ['>=',date('Y-m-d',time())];
        if ($searchArr['area_id'] == 0){
            unset($searchArr['area_id']);
        }
        
        $res = $mdb->select()->from('demand')->where($searchArr)->orderBy("demand_ctime DESC")->limit($limit,6)->query();
        $countRes = $mdb->select("count(1)")->from('demand')->where($searchArr)->query();
        $passportDb = new \Model\Passport();
        $resids = []; 
        /**
         * 添加排行榜数据
         * */
        if ($currentpage == 1 && $demand_type == 2){
        	$resource = new \FC\Resoure();
        	$r_list = $resource->getResource(2);
        	$res = array_merge($r_list,$res);
        }
        $mall_tag = new FC\Demand();
        foreach ($res as $key => $val) {
            foreach ($val['_id'] as $j=>$k){
                array_push($resids, $k);
            }
            
            /* 发布需求者的名字、加V改为读取对应用户的最新资料，而非缓存*/
            $passportinfo = $passportDb->select()
                     ->where('passport_id=?', $val['passport_id'])
                     ->query();
            $res[$key]['userinfo'] = $passportinfo[0];
        	if ($res[$key]['userinfo']['passport_private_mode'] == 1 && (!empty($res[$key]['userinfo']['passport_name']))){
        		if ($res[$key]['userinfo']['passport_sex'] == 1){
        			$res[$key]['userinfo']['passport_name'] = $res[$key]['userinfo']['passport_first_name'].'先生';
        		}elseif ($res[$key]['userinfo']['passport_sex'] == 2) {
        			$res[$key]['userinfo']['passport_name'] = $res[$key]['userinfo']['passport_first_name'].'女士';
        		}
        	}
        	
        	if ($val['category_ids']){
        		$res[$key]["catestr"] = $this->getStrcatebyid($val['category_ids']);
        	}
        	$res[$key]["catestr"] .= $val['category_ids_other'];
        	$res[$key]["demand_desc"] = FC\Comm::compressHtml($val['demand_desc']);
//         	v1.4更改 ->商业体
            if ($val['demand_type'] == 2) {
                $mall_building_size_info = $mall_tag->getMallInfo($val['mall_id']);
                $tag_new_info = $mall_tag->foramtTagInfo($mall_building_size_info);
                $res[$key]["tag_build_size"] = $tag_new_info['size'];
                $res[$key]["tag_build_city"] = $tag_new_info['city'];
                $res[$key]["tag_build_address"] = $tag_new_info['address'];
                if(!$res[$key]["tag_build_city"])
                {
                    $res[$key]["tag_build_city"] = FC\GetValue::getInfo('fangcheng_v2', 'area', $val['area_id'], 'area_name');
                }
                $id_arr = [
                	'mall_id' => $res[$key]["mall_id"]
                ];
                $res[$key]["tag_build_logo"] = getLogoimage($id_arr,'48x48');
            }
//             v1.4更改->品牌
            if ($val['demand_type'] == 1) {
                $id_arr = [
                		'brand_id' => $res[$key]["brand_id"]
                		];
//                 品牌logo
                $res[$key]["tag_brand_logo"] = getLogoimage($id_arr,'48x48');
                $tag_brand_area_name = FC\GetValue::getInfoList('fangcheng_v2', 'area', $val['area_id'], true);
//                 拓展城市
                if ($tag_brand_area_name['result'] == 1){
                    $res[$key]["tag_brand_area_name"] = $tag_brand_area_name['resuleMsg'];
                }
//                 首选物业
                $group_36_info = FC\GetValue::getInfoList('fangcheng_v2', 'tag', $res[$key]['tag']['group_36'], true);
                if ($group_36_info['result'] == 1){
                    $res[$key]["tag_brand_group_36"] = $group_36_info['resuleMsg'];
                }
                
            }
            $demand_ctime = explode(' ', $res[$key]['demand_ctime']);
            $res[$key]['demand_ctime'] = $demand_ctime[0];
        }
        if ($countRes <= 6 ){
            $pageShow = 0;
        }else {
            $pageShow = 1;
        }
        if ($countRes <=6){
        	$this->resultArray['pageShow'] = $pageShow;
        }else {
        	$this->resultArray['pageShow'] = 1;
        	$this->resultArray['currentPage'] = $currentpage;
        	$this->resultArray['total'] = $countRes;
        	$this->resultArray['totalPage'] = ceil($countRes/6);
        }
        if ($ajax_url_arr['currentpage'] < ceil($countRes/6)){
            $ajax_url_arr['totalpage'] =  ceil($countRes/6);
            $ajaxurl = urlFor('default',$ajax_url_arr);
            $ajaxurl = str_replace('/dev.php', '', $ajaxurl);
            $ajaxurl = str_replace('dobroadcast', 'broadcast', $ajaxurl);
        }
        $searchArrTwo = [];
//         $searchArrTwo['demand_expiry_at'] = ['>=',date('Y-m-d',time())];
        if ($countRes > 0  && $countRes < 6 && $isyetai == 1){
                $searchArrTwo['area_id'] = intval($city);
                $searchArrTwo['demand_type'] = intval($demand_type);
                if ($searchArrTwo['area_id'] == 0){
                    unset($searchArrTwo['area_id']);
                }
                $resTwo = $mdb->select()->from('demand')->where($searchArrTwo)->orderBy("demand_ctime DESC")->limit(12)->query();
                $this->resultArray['isresTwo'] = 1;
        }elseif ($countRes <= 0 && $isyetai == 1){
                $searchArrTwo['area_id'] = intval($city);
                $searchArrTwo['demand_type'] = intval($demand_type);
                if ($searchArrTwo['area_id'] == 0){
                	unset($searchArrTwo['area_id']);
                }
                $resTwo = $mdb->select()->from('demand')->where($searchArrTwo)->orderBy("demand_ctime DESC")->limit(12)->query();
                $this->resultArray['isresTwo'] = 1;
        }
        $resTwonum = 0;
        foreach ($resTwo as $key => $val) {
            /**v1.4*/
            //         	v1.4更改 ->商业体
            if ($val['demand_type'] == 2) {
            	$mall_building_size_info = $mall_tag->getMallInfo($val['mall_id']);
            	$tag_new_info = $mall_tag->foramtTagInfo($mall_building_size_info);
            	
            	$resTwo[$key]["tag_build_size"] = $tag_new_info['size'];
            	$resTwo[$key]["tag_build_city"] = $tag_new_info['city'];
            	$resTwo[$key]["tag_build_address"] = $tag_new_info['address'];
            	$id_arr = [
            			'mall_id' => $resTwo[$key]["mall_id"]
            			];
            	$resTwo[$key]["tag_build_logo"] = getLogoimage($id_arr,'48x48');
            }
            //             v1.4更改->品牌
            if ($val['demand_type'] == 1) {
            	$id_arr = [
            			'brand_id' => $resTwo[$key]["brand_id"]
            			];
            	//                 品牌logo
            	$resTwo[$key]["tag_brand_logo"] = getLogoimage($id_arr,'48x48');
            	$tag_brand_area_name = FC\GetValue::getInfoList('fangcheng_v2', 'area', $val['area_id'], true);
            	//                 拓展城市
            	if ($tag_brand_area_name['result'] == 1){
            		$resTwo[$key]["tag_brand_area_name"] = $tag_brand_area_name['resuleMsg'];
            	}
            	//                 首选物业
            	$group_36_info = FC\GetValue::getInfoList('fangcheng_v2', 'tag', $resTwo[$key]['tag']['group_36'], true);
            	if ($group_36_info['result'] == 1){
            		$resTwo[$key]["tag_brand_group_36"] = $group_36_info['resuleMsg'];
            	}
            
            }
            $demand_ctime = explode(' ', $resTwo[$key]['demand_ctime']);
            $resTwo[$key]['demand_ctime'] = $demand_ctime[0];
/**v1.4*/
            foreach ($val["_id"] as $j=>$h){
                if (in_array($h, $resids)){
                    $double = true;
                }else {
                    $double = false;
                }
            }
            if (!$double && $resTwonum < 6){
                $resTwo[$key]['userinfo'] = $passportDb->find($val['passport_id'], true, [
                		'passport_name',
                		'passport_sex',
                		'passport_job_title',
                		'passport_status'
                		]);
                
                
                if ($val['category_ids']){
                	$resTwo[$key]["catestr"] = $this->getStrcatebyid($val['category_ids']);
                }
                $resTwo[$key]["catestr"] .= $val['category_ids_other'];
            ++$resTwonum;
            }else {
                unset($resTwo[$key]);
            }

        }
        
        $this->resultArray['res'] = $res;
        $this->resultArray['resTwo'] = $resTwo;
        $this->resultArray['passport_type'] = $_SESSION['userinfo']['passport_type'];
        
        if ($demand_type == 2){
        	$demand_type_name = '招商需求';
        }elseif ($demand_type == 1) {
        	$demand_type_name = '拓展需求';
        }

        $this->resultArray['currentcityname'] = $currentcityname;
        $this->resultArray['currentcityid'] = $city;
        $this->resultArray['province'] = $province;
//         $this->resultArray['area_arr'] = $area_arr;
        $this->resultArray['demand_type_arr'] = [1 => '拓展需求', 2=> '招商需求'];;
        $this->resultArray['demand_type_name_a'] = $demand_type_name;
        /*业态的名字**/
        if (!empty($categorytwo)){
            $c = $categorytwo;
        }elseif (!empty($categorys)) {
            $c = $categorys;
        }
        if (!empty($c)){
            $cresult = FC\GetValue::getinfo('fangcheng_v2', 'category', $c);
            if ($cresult['result'] == 1){
                $this->resultArray['cshowname'] = $cresult['resuleMsg']['category_name'];
            }
        }else {
                $this->resultArray['cshowname'] = '全部业态';
         }
        
         $url = \Frame\Util\UString::base64_encode($_SERVER['REQUEST_URI']);
         $this->resultArray['url'] = $url;
         $this->resultArray['action'] = $request->get('action');
         $this->resultArray['query'] = urlFor('default', $request->get());      
         $this->resultArray['ajaxurl'] = $ajaxurl;  
         $this->resultArray['ajax'] = $request->get('ajax');
         if ($request->get('ajax')){
             \FC\Comm::webCache(900);
         }
         if($demand_type == 1)
         {
            $title .= '拓店搜索';
         }elseif($demand_type == 2){
         	$title .= '招商搜索';
         }
         if($currentcityname)
         {
         	$title .= $currentcityname == '全部城市' ? '' : '-'.$currentcityname;
         }
         if($this->resultArray['cshowname'] && $this->resultArray['cshowname'] != '全部业态')
         {
         	$title .= $title ? '-'.$this->resultArray['cshowname'] : $this->resultArray['cshowname'];
         }
         if($title== '拓店搜索' || $title== '招商搜索')
         {
         	$title = $demand_type == 1 ? '拓展需求-方橙科技' : '招商需求-方橙科技';
         }
         $imgLink = C('WEB_URL').'/img/apple-touch-icon-144-precomposed.png';
         $this->resultArray['weixinzhuanfa'] = ['title'=>$title, 'logo'=>$imgLink, 'link'=>C('WEB_URL').$this->resultArray['query'], 'desc'=>'招商选址用方橙'];
    }
    
    function getStrcatebyid($id){
        $rerurn = '';
        if (!is_array($id)){
        	$id = explode(',', $id);
        }
        foreach ($id as $key => $val){
        	if (empty($val)){
        		unset($id[$key]);
        	}
        }
        $rerurn  = FC\Comm::getCategoryDeepNameCast($id);
        return $rerurn;
    }
    
    private function getStep($categoryId){
        $step = 0;
        if ($categoryId){
        	if($categoryId%1000000 == 0){
        		$step = 1000000 - 1 - ($categoryId%1000000);
        	} else if($categoryId%10000 == 0){
        		$step = 10000 - 1 - ($categoryId%10000);
        	} else if($categoryId%100 == 0){
        		$step = 100 - 1 - ($categoryId%100);
        	}
        }
        return $step;
    }
    
private function getChildCitys($id){
    $return = [];
	$db = new \Model\Area();
	$result = $db->select('area_id')->from('area')->where(['area_id_parent' => $id])->query();
	foreach ($result as $key => $val){
	    $return[] = $val['area_id'];
	}
	return $return;
    }

}





