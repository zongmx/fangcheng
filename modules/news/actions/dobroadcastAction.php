<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Frame\Foundation\Action;
use FC;

class NewsAction extends Action
{
    
    public function executeDobroadcast(Application $application, Request $request){
        //FC\Session::initSession();
        $sizeArr = ['1'=>["<=",50*C('MULTIPLY_DOUBLE')],'2'=>[['<=',100*C('MULTIPLY_DOUBLE')],['>=',50*C('MULTIPLY_DOUBLE')],'and'],'3'=>[['<=',200*C('MULTIPLY_DOUBLE')],['>=',100*C('MULTIPLY_DOUBLE')],'and'],'4'=>[['<=',300*C('MULTIPLY_DOUBLE')],['>=',200*C('MULTIPLY_DOUBLE')],'and'],'5'=>[['<=',500*C('MULTIPLY_DOUBLE')],['>=',300*C('MULTIPLY_DOUBLE')],'and'],'6'=>['>=',500*C('MULTIPLY_DOUBLE')]];
        $demand_type = $request->get('demand_type');
        $category = $request->get('category');
        $categorys = $category;
        $categorytwo = $request->get('categorytwo');
        $city = $request->get('city');
        $size = $request->get('size');
        $pagetype = $request->get('pagetype');
        $currentpage = $request->get('currentpage');
        $status = $request->get('status');
        $isyetai  = $request->get('isyetai');
        $this->resultArray = [];
        $searchArr = [];
        $searchArr['area_id'] = $city;
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
        $area_arr = ['86999030'=>'北京','86999031'=>'上海','86007050'=>'南京','86016140'=>'广州','86016125'=>'深圳'];
        if ($city!=""){ //城市
            $searchArr['area_id'] = intval($city);
            $currentcityname = $area_arr[$city];
        }else {
            if (array_key_exists($_SESSION['userinfo']['area_id'], $area_arr)){
            	$searchArr['area_id'] = (int)$_SESSION['userinfo']['area_id'];
            	$city = (int)$_SESSION['userinfo']['area_id'];
            	$currentcityname = $area_arr[$_SESSION['userinfo']['area_id']];
            }else {
                $searchArr['area_id'] = 86999030;//默认为北京
                $currentcityname = $area_arr['86999030'];
                $city = (int)86999030;
            }
        }        
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
        if ($size!==""){ //面积 
            $searchArr['tag.group_126'] = $sizeArr[$size];
        }
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
        $this->resultArray['city'] = $searchArr['area_id'];
        $this->resultArray['size'] = $size;
        $this->resultArray['status'] = $searchArr['demand_status'];
        if (empty($currentpage)){
            $currentpage = 1;
        }
        if ($pagetype != ''){
            if($pagetype == "next"){ //下一页
            	$limit = $currentpage*6;
            	$currentpage = $currentpage+1;
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
        $searchArr['demand_expiry_at'] = ['>=',date('Y-m-d',time())];
        $res = $mdb->select()->from('demand')->where($searchArr)->orderBy("demand_ctime DESC")->limit($limit,6)->query();
        $countRes = $mdb->select("count(1)")->from('demand')->where($searchArr)->query();
        $passportDb = new \Model\Passport();
        $resids = []; 
        foreach ($res as $key => $val) {
            foreach ($val['_id'] as $j=>$k){
                array_push($resids, $k);
            }
            
            /* 发布需求者的名字、加V改为读取对应用户的最新资料，而非缓存*/
            $passportinfo = $passportDb->select()
            ->where('passport_id=?', $val['passport_id'])
            ->query();
            $res[$key]['userinfo'] = $passportinfo[0];
            
        	/* $res[$key]['userinfo'] = $passportDb->find($val['passport_id'], true, [
        	        'passport_first_name',
        	        'passport_name',
        			'passport_sex',
        			'passport_job_title',
        			'passport_status',
        	        'area_id',
        	        'passport_private_mode'
        			]); */
        
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
        $searchArrTwo = [];
        $searchArrTwo['demand_expiry_at'] = ['>=',date('Y-m-d',time())];
        if ($countRes > 0  && $countRes < 6 && $isyetai == 1){
                $searchArrTwo['area_id'] = intval($city);
                $searchArrTwo['demand_type'] = intval($demand_type);
                $resTwo = $mdb->select()->from('demand')->where($searchArrTwo)->orderBy("demand_ctime DESC")->limit(12)->query();
                $this->resultArray['isresTwo'] = 1;
        }elseif ($countRes <= 0 && $isyetai == 1){
                $searchArrTwo['area_id'] = intval($city);
                $searchArrTwo['demand_type'] = intval($demand_type);
                $resTwo = $mdb->select()->from('demand')->where($searchArrTwo)->orderBy("demand_ctime DESC")->limit(12)->query();
                $this->resultArray['isresTwo'] = 1;
        }
        $resTwonum = 0;
        foreach ($resTwo as $key => $val) {
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
        $this->resultArray['area_arr'] = $area_arr;
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

}





