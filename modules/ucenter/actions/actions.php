<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Model;
use FC;
use Frame\Db\Driver\Mongo;
use FC\Comm;
use Frame;





/**
 * 用户中心
 */
class ucenterActions extends Frame\Foundation\Action
{

    public $fangcDb;

    public function preExecute(Application $application, Request $request)
    {
        $this->fangcDb = DB();
    }

    public function executeIndex(Application $application, Request $request)
    {
        // 首先都按照自己看自己的资料来做
        FC\Session::initSession();
        $passport_id = $request->get('passport_id');
        $from = $request->get('from');
        if (empty($passport_id)){
            $passport_id = $_SESSION['userinfo']['passport_id'];
            $passport_type = $_SESSION['userinfo']['passport_type'];
        }else {
//          $user = FC\GetValue::getinfo('fangcheng_v2', 'passport', $passport_id);
            $udb = new \Model\Passport();
            $user = $udb->find($passport_id);
            
            if (!empty($user)){
                if($user['passport_in_blacklist'] == 1){ // 黑名单，内部跳转到404页面
                    $this->forward('error', '404');
                    return;
                }
                $passport_id = $user['passport_id'];
                $passport_type = $user['passport_type'];
            }else {
                $this->headerTo('/error/404');
            }
        }
        
        // 记录log -- add by Jason
        if($passport_id != $_SESSION['userinfo']['passport_id']){ // 自己看自己不记录
            \FC\Dynamic\Dynamic::addLog(
                1, 
                ['passport_id'=> $passport_id]
            );
        }
        
         // 获得个人的信息
        $selectArr = [
            'passport_name',
            'passport_status',
            'passport_sex',
            'area_id',
            'passport_company',
            'passport_first_name',
            'passport_private_mode',
            'passport_job_title',
            'passport_job_area',
            'category_ids',
            'category_ids_other',
            'passport_id',
            'passport_picture'
        ];
        $whereArr = [
            'passport_id' => $passport_id
        ];
        $passport_res = $this->fangcDb->select($selectArr)
            ->from('passport')
            ->where($whereArr)
            ->query();
        /**隐私模式的判断**/
        if ($_SESSION['userinfo']['passport_id'] != $passport_res[0]['passport_id']){
            if ($passport_res[0]['passport_private_mode'] == 1){
                $passport_res[0]['passport_name'] = makeName($passport_res[0]['passport_sex'], $passport_res[0]['passport_first_name']);
            }
        }
        $area = FC\GetValue::getinfo('fangcheng_v2', 'area', $passport_res[0]['area_id']);
        $area = $area['resuleMsg']['area_name'];
        if ($passport_type == 1) { // 品牌个人中心
            $this->setView('indexbrand');
            $brandinfo = $this->getBrandInfoById($passport_id);
            $territory = $this->getBrandAreaByID($passport_id);
            $territory = $territory['str']. ' ' . $passport_res[0]['passport_job_area']; // 如果有passport_job_area 要拼接上去 显示全部的负责的区域
            //获得所有品牌的id
            $this->resultArray = [];
            $this->resultArray['area'] = $area;
            $this->resultArray['userinfo'] = $passport_res[0];
            $this->resultArray['brandinfo'] = $brandinfo;
            $this->resultArray['territory'] = $territory;
        } elseif ($passport_type == 2 || $passport_type == 3) { // 商业体项目招商和上商业体总部招商
            $this->setView('businessbrand');
            $catearr = explode(',', $passport_res[0]['category_ids']);
            // 处理负责业态的信息
            $cate = [];
            foreach ($catearr as $key => $val) {
                if (!empty($val)){
                $c = FC\GetValue::getinfo("fangcheng_v2", "category", $val);
                if ($c['resuleMsg']['category_deep'] == 1) {
                    $cone[] = $c['resuleMsg']['category_name'];
                } else 
                    if ($c['resuleMsg']['category_deep'] == 2 || $c['resuleMsg']['category_deep'] == 3) {
                        $ctwo[] = $c['resuleMsg']['category_name'];
                    }
                }
            }
            $cate['cone'] = implode(',', $cone);
            $cate['ctwo'] = implode(',', $ctwo);
            if (!empty($passport_res[0]['category_ids_other'])){
                $cate['ctwo'] .= $passport_res[0]['category_ids_other'];
            }
            // 获得用户负责的商业体的信息
            $mallinfo = $this->getBusinessMall($passport_id);
            $this->resultArray = [];
            $this->resultArray['userinfo'] = $passport_res[0];
            $this->resultArray['mallinfo'] = $mallinfo;
            $this->resultArray['cate'] = $cate;
            $this->resultArray['area'] = $area;
            if ($passport_type == 3) { // 如果是总部招商 需要添加一个负责区域的处理
                $territory = $this->getBrandAreaByID($passport_id);
                $territory = $territory['str']. ' ' . $passport_res[0]['passport_job_area'];
                $this->resultArray['territory'] = $territory;
                $this->resultArray['passport_type'] = $passport_type;
            }
        } elseif ($passport_type == 4) { // 第三方
            $this->setView('third');
            $brandinfo = $this->getBrandInfoById($passport_id);
            $mallinfo = $this->getBusinessMall($passport_id);
            $this->resultArray = [];
            $this->resultArray['userinfo'] = $passport_res[0];
            $this->resultArray['brandinfo'] = $brandinfo;
            $this->resultArray['mallinfo'] = $mallinfo;
        }
        
        $this->resultArray['from'] = $from;
        $this->resultArray['url'] = \Frame\Util\UString::base64_decode($request->get('url'));
        $getReferer = $request->getReferer();
        if (strstr($getReferer,'editbasicinfo') || strstr($getReferer,'editbrandandbusiness') ){
            $tomine = 1;
        }else {
            $tomine = 0;
        }
    }

    /**
     * 编辑用户个人资料基本信息[姓名,性别等等]
     *
     * *
     */
    public function executeEditbasicinfo(Application $application, Request $request)
    {
        FC\Session::initSession();
        $this->setView('editbasicinfo');
        $selectArr = [
            'passport_picture',
            'passport_first_name',
            'passport_last_name',
//             'passport_private_mode',
            'passport_sex',
            'area_id',
            'passport_job_title',
            'passport_type',
            'category_ids',
            'category_ids_other'
        ];
        $whereArr = [
            'passport_id' => $_SESSION['userinfo']['passport_id']
        ];
        $result = $this->fangcDb->select($selectArr)
            ->from('passport')
            ->where($whereArr)
            ->query();
        $area_str = \FC\GetValue::getinfo("fangcheng_v2", 'area', $result[0]['area_id']);
        $area_str = $area_str['resuleMsg']['area_name'];
        $cat_ids=explode(',', $result[0]['category_ids']);
        $cat = FC\Comm::getCategoryDeepName($cat_ids);
        $cat .= empty($result[0]['category_ids_other'])?'':'其他-'.$result[0]['category_ids_other'];
        
        /**
         * 获得可不可以编辑姓名
         */
        
        $this->resultArray = [];
        $this->resultArray['userinfo'] = $result[0];
        $this->resultArray['area_str'] = $area_str;
        $this->resultArray['category_ids_str'] = $cat;
        // 获取用户各个字段最后修改的时间
        $isupdate = Comm::checkColumnCanUpdate('passport_name', 180);
        $this->resultArray['editInfo'] = $this->getPassportEditLastDate($_SESSION['userinfo']['passport_id']);
        $this->resultArray['isupdate'] = $isupdate;
        $this->resultArray['url'] = $request->get('url');
    }

    /**
     * 后台处理基本信息添加
     */
    public function executeDoeditbasicinfo(Application $application, Request $request)
    {
        FC\Session::initSession();
        $updateArr['passport_picture'] = $passport_picture = $request->get('passport_picture');
        $updateArr['passport_job_title'] = $passport_job_title = $request->get('passport_job_title');  //职位信息
        if ($request->get('category_ids')){
            $updateArr['category_ids'] = $category_ids= $request->get('category_ids'); //业态 
        }
        if ($request->get('category_ids_other')){
            $updateArr['category_ids_other'] = $category_ids_other =$request->get('category_ids_other'); //其他业态
        }
        $updateArr['passport_first_name'] = $passport_first_name = $request->get('passport_first_name');
        $updateArr['passport_last_name'] = $passport_last_name = $request->get('passport_last_name');
        $updateArr['passport_name'] = $passport_first_name.$passport_last_name;
        $updateArr['passport_name'] = $passport_first_name.$passport_last_name;
//         $updateArr['passport_private_mode'] = $passport_private_mode = $request->get('passport_private_mode');
        $updateArr['passport_sex'] = $passport_sex = $request->get('passport_sex');
        $updateArr['area_id'] = $area_id = $request->get('area_id');
        $searchArr = [
            'passport_picture',
            'passport_first_name',
            'passport_last_name',
//             'passport_private_mode',
            'passport_sex',
            'area_id'
        ];
        if ( ($updateArr['passport_first_name'] != $_SESSION['userinfo']['passport_first_name']) || ($updateArr['passport_last_name'] != $_SESSION['userinfo']['passport_last_name'])){
            $isupdate = Comm::checkColumnCanUpdate('passport_name', 180);
            if (!$isupdate){
                $updateArr['passport_first_name'] =  $_SESSION['userinfo']['passport_first_name'];
                $updateArr['passport_last_name'] =  $_SESSION['userinfo']['passport_last_name'];
                $updateArr['passport_name'] = $_SESSION['userinfo']['passport_first_name'].$_SESSION['userinfo']['passport_last_name'];
            }else {
                $canLog = true;
            }
        }
        $beforeSource = $this->fangcDb->select($searchArr)
            ->from('passport')
            ->where([
            'passport_id' => $_SESSION['userinfo']['passport_id']
        ])
            ->query();
            $changge = 0;
        foreach ($updateArr as $key => $val) {
            if ($beforeSource[0][$key] != $val) {
            	
                $changge = 1;
            } else {
                
            }
        }
        if (!$changge){
            return ['result'=>1,'resultMsg'=>'数据没有改变'];
        }
        /* $res = $this->fangcDb->update('passport')
            ->set($updateArr)
            ->where(['passport_id' => $_SESSION['userinfo']['passport_id']])
            ->query(); */
        
        $passport = new \Model\Passport($_SESSION['userinfo']['passport_id']);
        $res = $passport->edit($updateArr);
        
        if ($res >= 0){
            if ($canLog){
                log_passport_update('passport_name', $_SESSION['userinfo']['passport_name'],  $updateArr['passport_name']);
            }
            $_SESSION['userinfo']['passport_first_name'] = $updateArr['passport_first_name'];
            $_SESSION['userinfo']['passport_last_name'] =  $updateArr['passport_last_name'];
            $_SESSION['userinfo']['passport_name'] = $updateArr['passport_first_name']. $updateArr['passport_last_name'];
            $_SESSION['userinfo']['passport_picture'] =$updateArr['passport_picture'];
            $_SESSION['userinfo']['area_id'] =$updateArr['area_id'];
            return ['result'=>1,'resultMsg'=>'修改成功'];
        }else {
            return ['result'=>0,'resultMsg'=>'修改失败 ,请稍后再试'];
        }
    }

    /**
     * 编辑职位和公司名称角色
     */
    public function executeEditjobandcompany(Application $application, Request $request)
    {
        FC\Session::initSession();
        $this->setView('editjobandcompany');
        $passport_id = $_SESSION['userinfo']['passport_id'];
        $typeArr = [
            1 => '品牌拓展',
            2 => '商业体项目招商',
            3 => '商业体总部招商',
            4 => '第三方'
        ];
        $searchArr = [
            'passport_type',
            'passport_company',
            'passport_business_card'
        ];
        $whereArr = [
            'passport_id' => $passport_id
        ];
        $result = $this->fangcDb->select($searchArr)
            ->from('passport')
            ->where($whereArr)
            ->query();
       $passport_type_str = $typeArr[$result[0]['passport_type']];
       $this->resultArray = [];
       $this->resultArray['passport_type_str'] = $passport_type_str;
       $this->resultArray['info'] = $result[0];
    }

    /**
     * 后台处理职位和公司名称额修改
     * *
     */
    public function executeDoeditjobandcompany(Application $application, Request $request)
    {
        FC\Session::initSession();
        $filter = [
            'passport_type',
            'passport_company',
            'passport_business_card'
        ];
        $whereArr = [
            'passport_id' => $_SESSION['userinfo']['passport_id']
        ];
        $beforeResult = $this->fangcDb->select($filter)
            ->from('passport')
            ->where($whereArr)
            ->query();
        $updateArr = [];
        $logArr = [];
        foreach ($filter as $key => $val) {
            $updateArr[$val] = $request->get($val);
            if ($beforeResult[0][$val] != $updateArr[$val]){
                $logArr[$val] = [
                	'old' => $beforeResult[0][$val],
                    'new' => $updateArr[$val]
                ];
                $change = 1 ;
            }
        }
        if (empty($change)){
            return [
            		'result'=>1,'resultMsg'=>'数据没有改变'
                ];
            }
            $updateArr['passport_status'] = 1;
            $updateArr['passport_status_before'] = $_SESSION['userinfo']['passport_status'];
        /* $res = $this->fangcDb->update('passport')
            ->set($updateArr)
            ->where($whereArr)
            ->query(); */
        
        $passport = new \Model\Passport($_SESSION['userinfo']['passport_id']);
        $res = $passport->edit($updateArr);
        
        if ($res) {
            //当更新成功之后同步更新session中间的数据
            $_SESSION['userinfo']['passport_type'] = $request->get('passport_type');
            $_SESSION['userinfo']['passport_company'] = $request->get('passport_company');
            $_SESSION['userinfo']['passport_status'] = 1;
            if (!empty($logArr)){
                foreach ($logArr as $key=>$val){
                    log_passport_update($key, $val['old'], $val['new']);
                }
            }
            return [
                'result' => 1,
                'resultMsg' => '成功'
            ];
        } else {
            return [
                'result'=>0,'resultMsg'=>'失败'];
        }
    }

    /**
     * 项目和品牌的修改
     * *
     */
    public function executeEditbrandandbusiness(Application $application, Request $request)
    {
        FC\Session::initSession();
        $passport_id = $_SESSION['userinfo']['passport_id'];
        $passport_type = $_SESSION['userinfo']['passport_type'];
        $passport_srarch_arr = [
            'passport_job_area',
            'passport_type',
            'passport_company',
            'category_ids_other',
            'passport_job_title',
            'category_ids',
            'category_ids_other'
        ];
        $whersArr = [
            'passport_id' => $_SESSION['userinfo']['passport_id']
        ];
        $passportRes = $this->fangcDb->select($passport_srarch_arr)
            ->from('passport')
            ->where($whersArr)
            ->query();
        if ($passport_type == 1) {
        	$this->setView('brandjob');
        	//获得区域信息
        	$areainfo = $this->getBrandAreaByID($passport_id);
        	$jobareaStr = $areainfo['str'] .' '.$passportRes[0]['passport_job_area'];
        	$jobareaIds = $areainfo['ids'];	
        	//获得品牌业态信息
        	$brandinfo = $this->getBrandInfoById($passport_id);
        	$brand_ids = [];
        	foreach ($brandinfo as $key => $val){
        	    $brand_ids[] = $val['passport_brand_id'];
        	}
        	$this->resultArray = [];
        	$this->resultArray['passportInfo'] = $passportRes[0];
        	$this->resultArray['jobareaStr'] = $jobareaStr;
        	$this->resultArray['jobareaIds'] = $jobareaIds;
            //如果没有数据的时候 也默认显示一个添加页
        	if (empty($brandinfo)){
        	    $brandinfo = array(array());
        	}
        	$this->resultArray['brandInfo'] = $brandinfo;
        	$this->resultArray['passport_brand_ids'] = implode(',', $brand_ids);
        	$this->resultArray['userrank'] = '我为品牌拓展';
        } elseif ($passport_type == 2 || $passport_type == 3) {
        	$this->setView('businessjob');
        	$cateArr = explode(',', $passportRes[0]['category_ids']);
        	$cateStr = Comm::getCategoryDeepName($cateArr);
        	if (!empty($passportRes[0]['category_ids_other'])){
        	    $cateStr .= '其他-'.$passportRes[0]['category_ids_other'];
        	}
        	//获取负责地区的信息
        	if ($_SESSION['userinfo']['passport_type'] == 3){
            	$areainfo = $this->getBrandAreaByID($passport_id);
            	$jobareaStr = $areainfo['str'] .' '.$passportRes[0]['passport_job_area'];
            	$jobareaIds = $areainfo['ids'];	
        	}
        	//获取负责的商业体的信息
        	$mallinfo = $this->getBusinessMall($passport_id);
        	$passport_mall_ids = [];
        	foreach ($mallinfo as $key => $val){
        	    $passport_mall_ids[] = $val['passport_mall_id'];
        	}
        	$passport_mall_ids = implode(',', $passport_mall_ids);
            $this->resultArray = [];
            //如果没有数据的时候 也默认显示一个添加页
            if (empty($mallinfo)){
                $mallinfo = array(array());
            }
            $this->resultArray['mallinfo'] = $mallinfo;
            $this->resultArray['cateStr'] = $cateStr;
            $this->resultArray['passportInfo'] = $passportRes[0];
            $this->resultArray['passportType'] = $_SESSION['userinfo']['passport_type']; 
            if ($passport_type == 3){
                $this->resultArray['jobareaStr'] = $jobareaStr;
                $this->resultArray['jobareaIds'] = $jobareaIds;
                $this->resultArray['userrank'] = "我为商业体总部招商";
            }else {
                $this->resultArray['userrank'] = "我为商业体项目招商";
            }
            $this->resultArray['passport_mall_ids'] = $passport_mall_ids;
        } elseif ($passport_type == 4) {
            $this->setView('thridjob');
            //获得所有的品牌信息 
            $brandinfo = $this->getBrandInfoById($passport_id);
            $mallinfo = $this->getBusinessMall($passport_id);
            $brand_ids = [];
            foreach ($brandinfo as $key => $val){
            	$brand_ids[] = $val['passport_brand_id'];
            }
            $passport_mall_ids = [];
            foreach ($mallinfo as $key => $val){
            	$passport_mall_ids[] = $val['passport_mall_id'];
            }
          
            $passport_mall_ids = implode(',', $passport_mall_ids);
            $this->resultArray = [];
            $this->resultArray['passportInfo'] = $passportRes[0];
            $this->resultArray['brandinfo'] = $brandinfo;
            $this->resultArray['mallinfo'] = $mallinfo;
            $this->resultArray['passport_brand_ids'] = implode(',', $brand_ids);
            $this->resultArray['passport_mall_ids'] = $passport_mall_ids;
            $this->resultArray['userrank'] = "我为第三方";
            ////如果没有数据的时候 也默认显示一个添加页
            if (empty($brandinfo) && empty($mallinfo)){
                $mallinfo = array(array());
            }
        }
        $passport_type_update = Comm::checkColumnCanUpdate('passport_type', 2);
        $passport_company_update = Comm::checkColumnCanUpdate('passport_company', 2);
        if ($passport_company_update !=1 || $passport_type_update!= 1){
            $isupdate = 0;   
        }else {
            $isupdate = 1;
        }
        $this->resultArray['isupdate'] = $isupdate;
        $this->resultArray['url'] = $request->get('url');
    }

    /**
     * 处理品牌添加
     */
    public function executeDobrandjob(Application $application, Request $request)
    {
        FC\Session::initSession();
        $passport_id = $_SESSION['userinfo']['passport_id'];
        $possport_arr = [];
        $possport_arr['passport_job_title'] = $request->get('passport_job_title');
        $possport_arr['passport_job_area'] = $request->get('passport_job_area');
        $passportArea_arr = [];
        $area_id = $request->get('area_id');
        $area_id = explode(',', $area_id);
        foreach ($area_id as $key => $val) {
            $passportArea_arr[$key]['area_id'] = $val;
            $passportArea_arr[$key]['passport_id'] = $passport_id;
        }
        
        $passportBrand_arr = [];
        $passportBrandAdd_arr = [];
        $brand_name = $request->get('brand_name');
        $brand_id = $request->get('brand_id');
        $category_ids = $request->get('category_ids');
        $category_ids_other = $request->get('category_ids_other');
        $area_ids = $request->get('area_ids');
        $passport_brand_style = $request->get('passport_brand_style');
        $passport_brand_id = $request->get('passport_brand_id');
        $passport_brand_ids = $request->get('passport_brand_ids');
        $passport_brand_ids_del = $request->get('passport_brand_ids_del');
        $passport_brand_ids_update = $request->get('passport_brand_ids_update');
        
        //兼容前端未传数据 - 品牌
        $passport_brand_ids = explode(',', $passport_brand_ids);
        $passport_brand_ids_del = explode(',', $passport_brand_ids_del);
        foreach ($passport_brand_ids as $key=>$val){
        	if (!in_array($val, $passport_brand_ids_del)){
        		$middUpdatebrand[] = $val;
        	}
        }
        $passport_brand_ids_update = $middUpdatebrand;
        foreach ($brand_name as $key => $val) {
                if (!empty($passport_brand_id[$key])){
                    if (in_array($passport_brand_id[$key], $passport_brand_ids_update)){
                        $passportBrand_arr[$key]['brand_name'] = $brand_name[$key];
                        $passportBrand_arr[$key]['brand_id'] = $brand_id[$key];
                        $passportBrand_arr[$key]['category_ids'] = $category_ids[$key];
                        $passportBrand_arr[$key]['category_ids_other'] = $category_ids_other[$key];
                        $passportBrand_arr[$key]['passport_brand_style'] = $passport_brand_style[$key];
                        $passportBrand_arr[$key]['passport_brand_id'] = $passport_brand_id[$key];
                        $passportBrand_arr[$key]['area_ids'] = $area_ids[$key];
                        $passportBrandWhere_arr[$key] = ['passport_brand_id' => $passport_brand_id[$key],'passport_id'=>$passport_id];
                    }
                }else {
                    $passportBrandAdd_arr[$key]['brand_name'] = $brand_name[$key];
                    $passportBrandAdd_arr[$key]['brand_id'] = $brand_id[$key];
                    $passportBrandAdd_arr[$key]['category_ids'] = $category_ids[$key];
                    $passportBrandAdd_arr[$key]['category_ids_other'] = $category_ids_other[$key];
                    $passportBrandAdd_arr[$key]['passport_brand_style'] = $passport_brand_style[$key];
                    $passportBrandAdd_arr[$key]['passport_id'] = $passport_id;
                    $passportBrandAdd_arr[$key]['passport_brand_ctime'] = date('Y-m-d H:i:s',time());
                    $passportBrandAdd_arr[$key]['area_ids'] = $area_ids[$key];
                }
        }
        $passportBrandDel_arr = [];
        if (!empty($passport_brand_ids_del)){
            foreach ($passport_brand_ids_del as $key => $val){
                $passportBrandDel_arr[$key]['passport_brand_id'] = $val;
                $passportBrandDel_arr[$key]['passport_id'] = $passport_id;
            }
        }
       
        $this->fangcDb->beginTransaction();
        // 删除 passport_area 数据
        $p_area_del = $this->fangcDb->delete('passport_area')
            ->where(['passport_id' => $passport_id])
            ->query();
        // 向 passport_area 添加 数据
        $p_area_add = $this->fangcDb->insert($passportArea_arr)
            ->into('passport_area')
            ->query();
        // 跟新passport数据表数据
        /* $p = $this->fangcDb->update('passport')
            ->set($possport_arr)
            ->where([
            'passport_id' => $passport_id
        ])
            ->query(); */
        $passport = new \Model\Passport($passport_id);
        $p = $passport->edit($possport_arr);
        
        // 更新passport_brand 数据
        $p_brand_update = 1;
        if (! empty($passportBrand_arr)) {
            foreach ($passportBrand_arr as $key => $val) {
                $re = $this->fangcDb->update('passport_brand')
                    ->set($val)
                    ->where($passportBrandWhere_arr[$key])
                    ->query();
                if ($re < 0) {
                    $p_brand_update = 0;
                }
            }
        }
        $p_brand_add = 1;
        if (! empty($passportBrandAdd_arr)) {
            foreach ($passportBrandAdd_arr as $key => $val) {
                $c = $this->fangcDb->insert($val)
                    ->into('passport_brand')
                    ->query();
                if ($c < 0) {
                    $p_brand_add = - 1;
                }
            }
        }
        $p_brand_del = 1;
        if (! empty($passportBrandDel_arr)) {
            foreach ($passportBrandDel_arr as $key => $val) {
                $c = $this->fangcDb->update('passport_brand')
                    ->set([
                    'passport_brand_status' => 0
                ])
                    ->where($val)
                    ->query();
                if ($c < 0){
                    $p_brand_del = -1;
                }
            }
        }
        /* * 
         * $p_area_del          删除passport_area 删除当前passport_id 的数据
         * $p_area_add          添加passport_area 添加当前passport_id的数据
         * $p 更新 passport       更新 passport_job_title 和 passport_job_area 字段
         * $p_brand_add = 1     插入 passport_brand
         * $p_brand_update = 1  更新 passport_brand
         * $p_brand_del = 1     删除passport_brand
         * 
         * */
        if ($p_area_del >= 0 && $p_area_add > 0 && $p >= 0 && $p_brand_add >= 0 && $p_brand_update >= 0 && $p_brand_del >= 0) {
            if ($possport_arr['passport_job_title'] != $_SESSION['userinfo']['passport_job_title']){
                log_passport_update('passport_job_title', $_SESSION['userinfo']['passport_job_title'], $possport_arr['passport_job_title']);
            }
            $_SESSION['userinfo']['passport_job_title'] = $possport_arr['passport_job_title'];
            $this->fangcDb->commit();
            return [
                'result' => 1,
                'resultMsg' => "修改成功",
                
            ];
        } else {
            $this->fangcDb->rollback();
            return [
                'result' => 0,
                'resultMsg' => "修改失败"
            ];
        }
    }
    public function executeManageproject(Application $application, Request $request){
        
        FC\Session::initSession();
        $passport_id = $_SESSION['userinfo']['passport_id'];
        $q=$request->get('q');
        switch ($q){
            case 'del': 
                $passport_brand_id= $request->get('passport_brand_id');
                $c = $this->fangcDb->update('passport_brand')
                ->set([
                    'passport_brand_status' => 0
                ])
                ->where(['passport_brand_id'=>$passport_brand_id])
                ->query();
                return $c;
                break;
            case 'add':
                $data=[];
                $data['brand_name'] = $request->get('brand_name');
                $data['brand_id'] = $request->get('brand_id');
                $data['category_ids'] = $request->get('category_ids');
                $data['category_ids_other'] = $request->get('category_ids_other');
                $data['passport_brand_style'] = $request->get('passport_brand_style');
                $data['passport_id'] = $passport_id;
                $data['passport_brand_ctime'] = date('Y-m-d H:i:s',time());
                $data['area_ids'] = $request->get('area_ids');
                $c = $this->fangcDb->insert($data)
                    ->into('passport_brand')
                    ->query();
                return $c;
                break;
            case 'edit':
                $data=[];
                $data['brand_name'] = $request->get('brand_name');
                $data['brand_id'] = $request->get('brand_id');
                $data['category_ids'] = $request->get('category_ids');
                $data['category_ids_other'] = $request->get('category_ids_other');
                $data['passport_brand_style'] = $request->get('passport_brand_style');
                $data['passport_brand_utime'] = date('Y-m-d H:i:s',time());
                $data['area_ids'] = $request->get('area_ids');
                $where = ['passport_brand_id' => $request->get('passport_brand_id'),'passport_id'=>$passport_id];
                $c = $this->fangcDb->update('passport_brand')
                ->set($data)
                ->where($where)
                ->query();
                return $c;
                break;
        }
                
    }
    /**
     * 处理商业体是招商
     * */
    public function executeDobusinessjob(Application $application, Request $request){
        FC\Session::initSession();
        $passportArr = [];
        $passport_id = $_SESSION['userinfo']['passport_id'];
        $passport_type = $_SESSION['userinfo']['passport_type'];
        $passportArr['passport_job_title'] = $request->get('passport_job_title');
        $passportArr['category_ids'] = $request->get('category_ids');
        $passportArr['category_ids_other'] = $request->get('category_ids_other');
        if ($passport_type == 3){
            $passportArr['passport_job_area'] = $request->get('passport_job_area');
        }
        $whereArr = ['passport_id' => $passport_id];
        $mallArr = [];
        $mall_name = $request->get('mall_name');
        $mall_id = $request->get('mall_id');
        $area_id = $request->get('area_id');
        $passport_mall_id = $request->get('passport_mall_id');
        $passport_mall_ids = $request->get('passport_mall_ids');
        $passport_mall_ids_del = $request->get('passport_mall_ids_del');
        $passport_mall_ids_update = $request->get('passport_mall_ids_update');
        //兼容前端未传数据  -商业体
        $passport_mall_ids = explode(',', $passport_mall_ids);
        $passport_mall_ids_del = explode(',', $passport_mall_ids_del);
        $passport_mall_ids_update = explode(',', $passport_mall_ids_update);
        foreach ($passport_mall_ids as $key=>$val){
        	if (!in_array($val, $passport_mall_ids_del)){
        		$middUpdateMall[] = $val;
        	}
        }
        $passport_mall_ids_update = implode(',', $middUpdateMall);
        foreach ($mall_name as $key => $val){
                if ($passport_mall_id[$key] != '' ){
                    $mallArr[$key]['mall_name'] = $mall_name[$key];
                    $mallArr[$key]['mall_id'] = $mall_id[$key];
                    $mallArr[$key]['area_id'] = $area_id[$key];
                    $mallArrWhere[$key] = ['passport_mall_id' => $passport_mall_id[$key],'passport_mall_id'=>$passport_mall_id[$key]];
                }else {
                    $mallArrAdd[$key]['mall_name'] = $mall_name[$key]; 
                    $mallArrAdd[$key]['mall_id'] = $mall_id[$key]; 
                    $mallArrAdd[$key]['area_id'] = $area_id[$key]; 
                    $mallArrAdd[$key]['passport_id'] = $passport_id; 
                    $mallArrAdd[$key]['passport_mall_ctime'] = date('Y-m-d H:i:s',time()); 
            }
        }
        $passportMallDel = [];
        if (!empty($passport_mall_ids_del)){
            foreach ($passport_mall_ids_del as $key => $val){
                $passportMallDel[$key]['passport_mall_id'] = $val;
                $passportMallDel[$key]['passport_id'] = $passport_id;
                $passportMallDelSet[$key]['passport_mall_status'] = 0;
            }
        }
        $this->fangcDb->beginTransaction();
        $p = $this->fangcDb->update('passport')
            ->set($passportArr)
            ->where($whereArr)
            ->query();
        
        if ($passport_type == 3){
            $passportArea_arr = [];
            $area_ids_list = explode(',', $request->get('area_ids_list'));
            
            foreach ($area_ids_list as $key => $val) {
            	$passportArea_arr[$key]['area_id'] = $val;
            	$passportArea_arr[$key]['passport_id'] = $passport_id;
            }
            // 删除 passport_area 数据
            $p_area_del = $this->fangcDb->delete('passport_area')
            ->where([
            		'passport_id' => $passport_id
            		])
            		->query();
            // 向 passport_area 添加 数据
            foreach ($passportArea_arr as $key => $val){
                $p_area_add = $this->fangcDb->insert($val)
                ->into('passport_area')
                ->query();
            }
        }
        $m_update = 1;
        if (!empty($mallArr)){
            foreach ($mallArr as $key => $val){
                $c = $this->fangcDb->update('passport_mall')
                    ->set($val)
                    ->where($mallArrWhere[$key])
                    ->query();
                if ($c < 0){
                    $m_update = -1;
                }
            }
        }
        $m_add = 1;
        if (!empty($mallArrAdd)){
            foreach ($mallArrAdd as $key => $val) {
                $m = $this->fangcDb->insert($val)
                    ->into('passport_mall')
                    ->query();
                if ($m < 0){
                    $m_add = -1;
                }
            }
        }
            
            //
        if (! empty($passportMallDelSet)) {
            foreach ($passportMallDelSet as $key => $val) {
                $this->fangcDb->update('passport_mall')
                    ->set([
                    'passport_mall_status' => 0
                ])
                    ->where($passportMallDel[$key])
                    ->query();
            }
        }
        if ($passport_type == 3){
            if ($p >= 0 && $m_update >=0 && $m_add>=0 && $p_area_del>=0 && $p_area_add >=0){
                if ($passportArr['passport_job_title'] != $_SESSION['userinfo']['passport_job_title']){
                	log_passport_update('passport_job_title', $_SESSION['userinfo']['passport_job_title'], $passportArr['passport_job_title']);
                }
                $_SESSION['userinfo']['passport_job_title'] = $passportArr['passport_job_title'];
            	$this->fangcDb->commit();
            	return ['result' => 1,
            			'resultMsg' => "修改成功"];
            }else {
            	$this->fangcDb->rollback();
            	return [
            			'result' => 0,
            			'resultMsg' => "修改失败"
            			];
            }
        }else {
            if ($p >= 0 && $m_update >=0 && $m_add>=0){
                if ($passportArr['passport_job_title'] != $_SESSION['userinfo']['passport_job_title']){
                	log_passport_update('passport_job_title', $_SESSION['userinfo']['passport_job_title'], $passportArr['passport_job_title']);
                }
                $_SESSION['userinfo']['passport_job_title'] = $passportArr['passport_job_title'];
            	$this->fangcDb->commit();
            	return ['result' => 1,
            			'resultMsg' => "修改成功"];
            }else {
            	$this->fangcDb->rollback();
            	return [
            			'result' => 0,
            			'resultMsg' => "修改失败"
            			];
            }
        }
    }

    /**
     * 处理第三方编辑
     * *
     */
    public function executeDothridjob(Application $application, Request $request)
    {
        FC\Session::initSession();
        $passport_id = $_SESSION['userinfo']['passport_id'];
        $passport_job_title = $request->get('passport_job_title');
        $passport_mall_ids = $request->get('passport_mall_ids');
        $passport_mall_ids_del = $request->get('passport_mall_ids_del');
        $passport_mall_ids_update = $request->get('passport_mall_ids_update');
        //兼容前端未传数据  -商业体
        $passport_mall_ids_a = explode(',', $passport_mall_ids);
        $passport_mall_ids_del_a = explode(',', $passport_mall_ids_del);
        $passport_mall_ids_update_a = explode(',', $passport_mall_ids_update);
        foreach ($passport_mall_ids_a as $key=>$val){
            if (!in_array($val, $passport_mall_ids_del_a)){
                $middUpdateMall[] = $val; 
            }   
        }
        $passport_mall_ids_update = implode(',', $middUpdateMall);
        $mall_name = $request->get('mall_name');
        $mall_id = $request->get('mall_id');
        $area_id = $request->get('area_id');
        $passport_mall_id = $request->get('passport_mall_id');
        $passport_brand_ids = $request->get('passport_brand_ids');
        $passport_brand_ids_del = $request->get('passport_brand_ids_del');
        $passport_brand_ids_update = $request->get('passport_brand_ids_update');
        //兼容前端未传数据 - 品牌
        $passport_brand_ids_a = explode(',', $passport_brand_ids);
        $passport_brand_ids_del_a = explode(',', $passport_brand_ids_del);
        $passport_brand_ids_update_a = explode(',', $passport_brand_ids_update);
        foreach ($passport_brand_ids_a as $key=>$val){
        	if (!in_array($val, $passport_brand_ids_del_a)){
        		$middUpdatebrand[] = $val;
        	}
        }
        $passport_brand_ids_update = implode(',', $middUpdatebrand);
        $brand_name = $request->get('brand_name');
        $brand_id = $request->get('brand_id');
        $category_ids = $request->get('category_ids');
        $category_ids_other = $request->get('category_ids_other');
        $passport_brand_id = $request->get('passport_brand_id');
        $area_ids = $request->get('area_ids');
        $passportArr = [
            'passport_job_title' => $passport_job_title
        ];
        $passportWhere = [
            'passport_id' => $passport_id
        ];
        $passport_mall_del_arr = [];
        $passport_mall_update_arr = [];
        $passport_mall_add_arr = [];
        // 组合要删除的passport_mall数据
        if (! empty($passport_mall_ids_del)) {
            $passport_mall_ids_del = explode(',', $passport_mall_ids_del);
            foreach ($passport_mall_ids_del as $key => $val) {
                $passport_mall_del_arr[$key]['passport_mall_id'] = $val;
                $passport_mall_del_arr[$key]['passport_id'] = $passport_id;
            }
        }
        // 组合要修改个添加的商业体数据
        $passport_mall_ids_update = explode(',', $passport_mall_ids_update);
        foreach ($mall_name as $key => $val) {
            if (! empty($passport_mall_id[$key]) && in_array($passport_mall_id[$key], $passport_mall_ids_update)) {
                $passport_mall_update_arr[$key]['mall_name'] = $mall_name[$key];
                $passport_mall_update_arr[$key]['mall_id'] = $mall_id[$key];
                $passport_mall_update_arr[$key]['area_id'] = $area_id[$key];
                $passport_mall_update_Where[$key]['passport_mall_id'] = $passport_mall_id[$key];
                $passport_mall_update_Where[$key]['passport_id'] = $passport_id;
            } else {
                $passport_mall_add_arr[$key]['mall_name'] = $mall_name[$key];
                $passport_mall_add_arr[$key]['mall_id'] = $mall_id[$key];
                $passport_mall_add_arr[$key]['area_id'] = $area_id[$key];
                $passport_mall_add_arr[$key]['passport_id'] = $passport_id;
                $passport_mall_add_arr[$key]['passport_mall_ctime'] = date('Y-m-d H:i:s',time());
            }
        }
        $passport_brand_del_arr = [];
        $passport_brand_update_arr = [];
        $passport_brand_add_arr = [];
        // 组合要删除的passport_brand数据
        if (! empty($passport_brand_ids_del)) {
            $passport_brand_ids_del = explode(',', $passport_brand_ids_del);
            foreach ($passport_brand_ids_del as $key => $val) {
                $passport_brand_del_arr[$key]['passport_brand_id'] = $val;
                $passport_brand_del_arr[$key]['passport_id'] = $passport_id;
            }
        }
        //
        $passport_brand_ids_update = explode(',', $passport_brand_ids_update);
        foreach ($brand_name as $key => $val) {
            if (! empty($passport_brand_id[$key]) && in_array($passport_brand_id[$key], $passport_brand_ids_update)) {
                $passport_brand_update_arr[$key]['brand_name'] = $brand_name[$key];
                $passport_brand_update_arr[$key]['brand_id'] = $brand_id[$key];
                $passport_brand_update_arr[$key]['category_ids'] = $category_ids[$key];
                $passport_brand_update_arr[$key]['category_ids_other'] = $category_ids_other[$key];
                $passport_brand_update_arr[$key]['area_ids'] = $area_ids[$key];
                $passport_brand_update_Where[$key]['passport_brand_id'] = $passport_brand_id[$key];
                $passport_brand_update_Where[$key]['passport_id'] = $passport_id;
            } else {
                $passport_brand_add_arr[$key]['brand_name'] = $brand_name[$key];
                $passport_brand_add_arr[$key]['brand_id'] = $brand_id[$key];
                $passport_brand_add_arr[$key]['category_ids'] = $category_ids[$key];
                $passport_brand_add_arr[$key]['category_ids_other'] = $category_ids_other[$key];
                $passport_brand_add_arr[$key]['area_ids'] = $area_ids[$key];
                $passport_brand_add_arr[$key]['passport_id'] = $passport_id;
                $passport_brand_add_arr[$key]['passport_brand_ctime'] = date('Y-m-d H:i:s',time());
            }
        }
        $this->fangcDb->beginTransaction();
            // 处理passport数据
        $p = $this->fangcDb->update('passport')
            ->set($passportArr)
            ->where($passportWhere)
            ->query();
        // 处理mall数据
        $m_a = 1;
        if (! empty($passport_mall_add_arr)) {
            foreach ($passport_mall_add_arr as $key => $val) {
                $c = $this->fangcDb->insert($val)
                    ->into('passport_mall')
                    ->query();
                if ($c < 0) {
                    $m_a = - 1;
                }
            }
        }
        $m_d = 1;
        if (! empty($passport_mall_del_arr)) {
            foreach ($passport_mall_del_arr as $key => $val) {
                $c = $this->fangcDb->update('passport_mall')
                    ->set([
                    'passport_mall_status' => 0
                ])
                    ->where($val)
                    ->query();
                if ($c < 0) {
                    $m_d = - 1;
                }
            }
        }
        $m_u = 1;
        if (! empty($passport_mall_update_arr)) {
            foreach ($passport_mall_update_arr as $key => $val) {
                $c = $this->fangcDb->update('passport_mall')
                    ->set($passport_mall_update_arr[$key])
                    ->where($passport_mall_update_Where[$key])
                    ->query();
                if ($c < 0) {
                    $m_u = - 1;
                }
            }
        }
        $b_a = 1;
        if (! empty($passport_brand_add_arr)) {
            foreach ($passport_brand_add_arr as $key => $val) {
                $c = $this->fangcDb->insert($val)
                    ->into('passport_brand')
                    ->query();
                if ($c<0){
                    $b_a = -1;
                }
            }
        }
        $b_d = 1;
        if (!empty($passport_brand_del_arr)){
            foreach ($passport_brand_del_arr as $key=>$val){
                $c = $this->fangcDb->update('passport_brand')
                    ->set([
                    'passport_brand_status' => 0
                ])
                    ->where($val)
                    ->query();
                if ($c < 0){
                    $b_d = -1;
                }
            }
        }
        $b_u = 1;
        if (! empty($passport_brand_update_arr)) {
            foreach ($passport_brand_update_arr as $key => $val) {
                $c = $this->fangcDb->update('passport_brand')
                    ->set($val)
                    ->where($passport_brand_update_Where[$key])
                    ->query();
            }
        }
        if ($p >= 0 && $m_a>=0 && $m_d>=0 && $m_u >=0 && $b_a >=0 && $b_d >=0 && $b_u >=0){
            $this->fangcDb->commit();
            if ($passport_job_title != $_SESSION['userinfo']['passport_job_title']){
            	log_passport_update('passport_job_title', $_SESSION['userinfo']['passport_job_title'], $passport_job_title);
            }
            $_SESSION['userinfo']['passport_job_title'] = $passport_job_title;
            return [
                'result' => 1,
    			'resultMsg' => "修改成功"
            ];
        }else {
            $this->fangcDb->rollback();
            return [
            	'result' => 0,
                'resultMsg' => '修改失败'
            ];
        }
        
    }

    /**
     * 个人中心 ->我的
     */
    public function executeInformationofmine(Application $application, Request $request)
    {
        FC\Session::initSession();
        $passport_id = $_SESSION['userinfo']['passport_id'];
        $passport_type = $_SESSION['userinfo']['passport_type'];
        $brandinfo = [];
        $mallinfo = [];
        $wheremall = [
            'passport_id' => $passport_id,
            'passport_mall_status' => 1
        ];
        $selectmall = [
            'passport_mall_id',
            'mall_name',
            'mall_id'
        ];
        $wherebrand = [
            'passport_id' => $passport_id,
            'passport_brand_status' => 1
        ];
        $selectbrand = [
            'passport_brand_id',
            'brand_name',
            'brand_id'
        ];
        if ($passport_type == 1) {
            $brandinfo = $this->fangcDb->select($selectbrand)
                ->from('passport_brand')
                ->where($wherebrand)
                ->query();
        } elseif ($passport_type == 2 || $passport_type == 3) {
            $mallinfo = $this->fangcDb->select($selectmall)
                ->from('passport_mall')
                ->where($wheremall)
                ->query();
        } elseif ($passport_type == 4) {
            $brandinfo = $this->fangcDb->select($selectbrand)
            ->from('passport_brand')
            ->where($wherebrand)
            ->query();
            $mallinfo = $this->fangcDb->select($selectmall)
            ->from('passport_mall')
            ->where($wheremall)
            ->query();
        }
        $pinfo =  $this->fangcDb->select(['passport_weixin_push'])
                      ->from('passport')
                        ->where('passport_id = ?',$_SESSION['userinfo']['passport_id'])
            ->query();
        
        // 查询当前用户的信息
        $p = $this->fangcDb->select()
            ->from('passport')
            ->where([
            'passport_id' => $_SESSION['userinfo']['passport_id']
        ])
            ->query();
        //查询当前用户的账户信息
        $getAccountInfo = \FC\Cs::getAccountInfo();
        $asign = [];
        $asign['passport_money']['passport_money_total'] = ceil($getAccountInfo[0]['passport_money_total']/100);  //总资产
        $asign['passport_money']['passport_money_withdraw'] = ceil($getAccountInfo[0]['passport_money_withdraw']/100); //可提现资产
        //待收赏金 = 总资产 - 可提现资产;
        $asign['passport_money']['passport_money_wait']=$asign['passport_money']['passport_money_total']-$asign['passport_money']['passport_money_withdraw'];
        
        $this->resultArray = [];
        $this->resultArray['asign'] = $asign;
        $this->resultArray['userinfo'] = $p[0];
        $this->resultArray['brandinfo'] = $brandinfo;
        $this->resultArray['mallinfo'] = $mallinfo;
        $this->resultArray['passport_weixin_push'] = $pinfo[0]['passport_weixin_push'];
        $this->resultArray['url'] = \Frame\Util\UString::base64_encode($_SERVER['REQUEST_URI']);
    }

    /**
     * 个人中心 ->我 负责的品牌
     */
    public function executeMybrand(Application $application, Request $request){
        FC\Session::initSession();
        $passport_id = $_SESSION['userinfo']['passport_id'];
        $passport_type = $_SESSION['userinfo']['passport_type'];
        $wherebrand = [
            'passport_id' => $passport_id,
            'passport_brand_status' => 1
        ];
        $selectbrand = [
            'passport_brand_id',
            'brand_name',
            'brand_id'
        ];
        $this->resultArray = [];
        $brandinfo= $this->getBrandInfoById($passport_id);
        $this->resultArray['passport_type'] = $passport_type;
        $this->resultArray['brandinfo'] = $brandinfo;
    }
    /**
     * 个人中心 ->我 负责的商业体
     */
    public function executeMymall(Application $application, Request $request){
        FC\Session::initSession();
        $passport_id = $_SESSION['userinfo']['passport_id'];
        $passport_type = $_SESSION['userinfo']['passport_type'];
        $wheremall = [
            'passport_id' => $passport_id,
            'passport_mall_status' => 1
        ];
        $selectmall = [
            'passport_mall_id',
            'mall_name',
            'mall_id'
        ];
        $mallinfo=$this->getBusinessMall($passport_id);
        /* $mallinfo = $this->fangcDb->select($selectmall)
        ->from('passport_mall')
        ->where($wheremall)
        ->query(); */
        $this->resultArray = [];
        $this->resultArray['passport_type'] = $passport_type;
        $this->resultArray['mallinfo'] = $mallinfo;
    }
    /**
     * 个人中心 ->我发布的需求
     */
    public function executeDemandlistofmine(Application $application, Request $request)
    {
        FC\Session::initSession();
        $passport_id = $_SESSION['userinfo']['passport_id'];
        $passport_type = $_SESSION['userinfo']['passport_type'];
        $returnurl = Frame\Util\UString::base64_encode(urlFor($request->get('jf_app_route'),$request->get()));
        $page = $request->get('page',1);
        if ($page<1){
            $page = 1;
        }
        $pageSize = 20;
        $where = [];
        $where = [
            'demand_type' => [
                'IN',
                [
                    1,
                    2
                ]
            ],
            'demand_status' => [
                '!=',
                0
            ],
            'passport_id' => (int) $passport_id
        ];
        
        $mdb = MDB();
        $result = $mdb->select()
            ->from('demand')
            ->where($where)
            ->orderBy('demand_ctime desc')
            ->limit(($page-1)*$pageSize,$pageSize)
            ->query();
        $count = $mdb->select("count(1)")
            ->from('demand')
            ->where($where)
            ->query();
        $countpage = ceil($count/$pageSize);
        $pre = 1;
        $next = 1;
        if ($page <= 1){
            $pre = 0;            
        } 
        if ($countpage == 1){
            $pre = 0;
            $next = 0;
        }
        if ($page >= $countpage){
            $next = 0;
        }
        foreach ($result as $key => $val){
//                $result[$key]['category_ids_str'] = $this->getStrcatebyid($val['category_ids']);
               $result[$key]['category_ids_str'] = FC\Comm::getCategoryDeepName($val['category_ids']);
               $result[$key]['category_ids_str'] .= empty($val['category_ids_other'])?'':'其他-'.$val['category_ids_other'];
               $result[$key]['demand_ctime'] = explode(' ',$val['demand_ctime'] );
               $result[$key]['demand_desc'] = FC\Comm::compressHtml( $result[$key]['demand_desc']);
               //--计算相似需求的数量和组织查询条件
//                $demand_type_arr = [
//                		1=>2,
//                		2=>1
//                		];
//                	$args['demand_type'] = (int) $demand_type_arr[$result[$key]['demand_type']];
//                	$args['area_id'] = FC\Comm::toIntArray($result[$key]['area_id']);
//                	if (!empty($result[$key]['category_ids'])){
//                		$args['category_ids'] = FC\Comm::toIntArray($result[$key]['category_ids']);
//                	}
               	$searchNum = \FC\Demand::searchDemandNum((string)$val['_id']);
               	if ($searchNum > 0){
               		$searchArgs = (string)$val['_id'];
               	}
               	$result[$key]['searchNum'] = $searchNum;
               	$result[$key]['searchArgs'] = $searchArgs;
               	$result[$key]['returnurl'] = $returnurl;
//                	相似匹配结束
        }
        $this->resultArray = [];
        $this->resultArray['projectInfo'] = $result;
//         __dd($result);
        if($page > 1)
        {
        	$this->setLayout("");
        	($demand_type == 1 ) ? $this->setView('demandlistbrand') : $this->setView('demandlistmall');
        }
        $next_page = $page+1;
        $this->resultArray['data_scroll_url'] = ($page >= 1 && $page < $countpage) ? "/ucenter/demandlistofmine/page/{$next_page}" : "";
        $this->resultArray['userinfo'] = $_SESSION['userinfo'];
        $this->resultArray['next'] =$next;
        $this->resultArray['pre'] = $pre;
        $this->resultArray['page'] = $page;
//         \FC\Comm::webCache(900);
    }

    /**
     * 个人中心 - 我的关注
     */
    public function executeMyattention(Application $application, Request $request)
    {
        FC\Session::initSession();
        $passport_id = $_SESSION['userinfo']['passport_id'];
        $passport_type = $_SESSION['userinfo']['passport_type'];
        $attentiontype = $request->get('attentiontype', 1); // 1位品牌的关注 2:关注的商业体
        $page = $request->get('page',1);
        if($page > 1)
        {
        	$this->setLayout('');
        	($attentiontype == 1) ? $this->setView('myattenbrand') : $this->setView('myattenmall');
        }
        $pagesize = 20;
        $where = [
            'passport_id' => $passport_id,
            'passport_follow_status' => 1
            ];
        if ($attentiontype == 1){
            $where['brand_id'] = ['!=',''];
        }elseif ($attentiontype == 2){
            $where['mall_id'] = ['!=',''];
        }
        $result = $this->fangcDb->select()
            ->from('passport_follow')
            ->where($where)
            ->limit(($page-1)*$pagesize,$pagesize)
            ->query();
        $count = $this->fangcDb->select('count(1) as count')
            ->from('passport_follow')
            ->where($where)
            ->query();
        $count = empty($count[0]['count'])?0:$count[0]['count'];
        $totalpage = ceil($count/$pagesize);
        $reutrn = [] ; //当前需要循环的变量
        foreach ($result as $key => $val){
            if ($attentiontype == 1){
                if (!empty($val['brand_id'])){
                    $url = C('SERVICE_IP') . '/info/brand/id/' . $val['brand_id'];
                    $basicResult = file_get_contents($url);
                    $basicResult = json_decode($basicResult, true);
                    $reutrn[] = $basicResult['info'];

                }
            }elseif ($attentiontype == 2){
                if (!empty($val['mall_id'])){
                    $url = C('SERVICE_IP') . '/info/mall/id/' . $val['mall_id'];
                    $basicResult = file_get_contents($url);
                    $basicResult = json_decode($basicResult, true);
                    $reutrn[] = $basicResult['info'];

                }
            } 
        }
        
        $this->resultArray = [];
        $this->resultArray['attention'] = $reutrn;
        $this->resultArray['attentiontype'] = $attentiontype;
        $this->resultArray['page'] = $page;
        $this->resultArray['totalpage'] = $totalpage;
        $this->resultArray['attentiontype'] = $attentiontype;
        $next_page = $page+1;
        $this->resultArray['data_scroll_url'] = ($page >= 1 && $page < $totalpage) ? "/ucenter/myattention/attentiontype/{$attentiontype}/page/{$next_page}" : "";

    }
    
    public function executeMyh5(Application $application, Request $request)
    {
        FC\Session::initSession();
        $passport_id = $_SESSION['userinfo']['passport_id'];
        $act_passport_db = DB();
        $where = [
        	'passport_id' => $passport_id,
            'act_id' => 1
        ];
        $result = $act_passport_db
                            ->select()
                            ->from('act_passport')
                            ->where($where)
                            ->orderBy('act_passport_ctime desc')
                            ->query();
        $setArr = [];
        foreach ($result as $key=>$val){
            $setArr[$key]['act_passport_id'] = $val['act_passport_id'];
            $ctime = explode(' ', $val['act_passport_ctime']);
            $setArr[$key]['act_passport_ctime'] = $ctime[0];
            $setArr[$key]['brand_id'] = $val['brand_id'];
            $setArr[$key]['brand_name'] = $val['brand_name'];
            $h5info  = unserialize($val['act_passport_options']);
            $brand_logo = C('UPLOAD_URL').$h5info['brand_logo'];
            $setArr[$key]['brand_logo'] = $brand_logo;
        }
        $this->resultArray = [];
        $this->resultArray['info'] = $setArr;
    }

    /**
     * 个人中心 - 修改密码
     */
    public function executeUnsetpwd(Application $application, Request $request)
    {
        FC\Session::initSession();
        $passport_id = $_SESSION['userinfo']['passport_id'];
        $oldpassword = trim($request->get('oldpassword'));
        $newpassword = trim($request->get('newpassword'));
        $newpasswordtwo = trim($request->get('newpasswordtwo'));
        if (empty($oldpassword) || empty($newpassword) || empty($newpasswordtwo)) {
            return [
                'result' => 0,
                'resultMsg' => '数据错误'
            ];
        }
        if ($newpassword != $newpasswordtwo) {
            return [
                'result' => 0,
                'resultMsg' => '输入的新密码不一致'
            ];
        }
        $pwdlen = mb_strlen($newpassword, 'utf-8');
        if ($pwdlen < 6 || $pwdlen > 16) {
            return [
                'result' => 0,
                'resultMsg' => '密码必须是6-16位'
            ];
        }
        $db = DB();
        $result = $db->select([
            'passport_password'
        ])
            ->from('passport')
            ->where([
            'passport_id' => $passport_id
        ])
            ->query();
        $oldpassword = FC\LoginIn::md5Pwd($oldpassword);
        if ($oldpassword != $result[0]['passport_password']) {
            return [
                'result' => 0,
                'resultMsg' => '您原来的密码输入错误'
            ];
        }
        $update = [
            'passport_password' => FC\LoginIn::md5Pwd($newpassword)
        ];
        $where = [
            'passport_id' => $passport_id
        ];
        $res = $db->update('passport')
            ->set($update)
            ->where($where)
            ->query();
        if ($res >= 0) {
            return [
                'result' => 1,
                'resultMsg' => '密码修改成功'
            ];
        } else {
            return [
                'result' => 0,
                'resultMsg' => '密码修改失败,请稍后再试'
            ];
        }
    }

    /**
     * 个人中心 - 需求
     * *
     */
    public function executeDemandshow(Application $application, Request $request)
    {
//         FC\Session::initSession();
        $demandid = $request->get('demandid');
        try {
            $id = new MongoId($demandid);
        }catch (Exception $e){
            $this->headerTo('/error/404');
        }       
        $returnurl = Frame\Util\UString::base64_encode(urlFor($request->get('jf_app_route'),$request->get()));        
        $db = MDB();
        $res = $db->select()
            ->from('demand')
            ->where([
            '_id' => $id
        ])
            ->query();
        $res = array_values($res);
        $demand_search_res = $res[0];
        $demand_res = $res;
        if(empty($res)){
            $this->headerTo("/");
        } elseif($res[0]['demand_status'] == 0){
            $this->headerTo("/error/404");
        }
        
        // 记录log -- add by Jason
        $logArgs = ['demand_id' => $demandid];
        if($res[0]['brand_id']>0){
            $logArgs['brand_id'] = $res[0]['brand_id'];
        } else if ($res[0]['mall_id']>0) {
            $logArgs['mall_id'] = $res[0]['mall_id'];
        }
        if(isset($logArgs['brand_id']) || $logArgs['mall_id']){
            \FC\Dynamic\Dynamic::addLog(3, $logArgs);
        }
//         计算相似需求 -- 
//             组合查询相似需求条件
            $demand_type_arr = [
            	1=>2,
                2=>1
            ];
            if ($_SESSION['userinfo']['passport_id'] == $demand_res[0]['passport_id']){
//                 $args['demand_type'] = (int) $demand_type_arr[$demand_res[0]['demand_type']];
//                 $args['area_id'] = FC\Comm::toIntArray($demand_res[0]['area_id']);
//                 if (!empty($demand_res[0]['category_ids'])){
//                 	$args['category_ids'] = FC\Comm::toIntArray($demand_res[0]['category_ids']);
//                 }
                $searchNum = \FC\Demand::searchDemandNum($demand_res[0]['_id']);
                if ($searchNum > 0){
                	$searchArgs = $demandid;
                }
            }
//         $passportinfo=FC\GetValue::getinfo('fangcheng_v2','passport',intval($res[0]['passport_id']),['passport_first_name','passport_name','passport_picture','passport_status','passport_job_title','passport_sex','passport_private_mode']);
       /*  $passport = new \Model\Passport(intval($res[0]['passport_id']));
        $passportinfo = $passport->info(); */
            
            /* 发布需求者的名字、加V改为读取对应用户的最新资料，而非缓存*/
            $passportDb = new \Model\Passport();
            $passportinfo = $passportDb->select()
            ->where('passport_id=?', intval($res[0]['passport_id']))
            ->query();
            $passportinfo = $passportinfo[0];
            
        if ($passportinfo['passport_private_mode'] == 1){
            if ($passportinfo['passport_sex'] == 1){
                $res[0]['passport_name'] = $passportinfo['passport_first_name'].'先生';
            }elseif ($passportinfo['passport_sex'] == 2) {
                $res[0]['passport_name'] = $passportinfo['passport_first_name'].'女士';
            }
        }else {
            $res[0]['passport_name']=$passportinfo['passport_name'];
        }
        $res[0]['passport_in_blacklist']=$passportinfo['passport_in_blacklist'];
        $res[0]['passport_picture']=$passportinfo['passport_picture'];
        $res[0]['passport_status']=intval($passportinfo['passport_status']);
        $res[0]['passport_job_title']=$passportinfo['passport_job_title'];
        $res[0]['ctime'] = explode(' ', $res[0]['demand_ctime']);
        $res[0]['demand_expiry_at'] = str_replace('/', '-', $res[0]['demand_expiry_at']);
        $carr = [];
        if (!empty($res[0]['category_ids'])){
            foreach ($res[0]['category_ids'] as $key => $val){
                $a = Comm::getCategoryName($val);
                array_push($carr, $a);
            }
        }
        $carr = array_unique($carr);
        if (!empty($carr)){
            $titleCategory = FC\GetValue::getInfoList('fangcheng_v2', 'category', $carr, 1);
            if ($titleCategory['result'] == 1){
                $titleCategory = $titleCategory['resuleMsg'];
            }else {
                $titleCategory = '';
            }
        }else {
            $titleCategory = "";
        }
        
        
        if ($res[0]['demand_type'] == 1){ //拓展需求
            //处理首选物业数据
            foreach ($res[0]['tag']['group_36'] as $key => $val){
            	$r  = FC\GetValue::getinfo('fangcheng_v2','tag',$val);
            	$group_36[] = $r['resuleMsg']['tag_name'];
            	$res[0]['tag']['group_36_str'] = implode(',', $group_36);
            }
            //处理所在城市
             $r = FC\GetValue::getinfo('fangcheng_v2','area',$res[0]['area_id'], '', 1);
//              $res[0]['area_name'] = $r['resuleMsg']['area_name'];
             $res[0]['area_name'] = $r;
            //店铺类型
             $r = FC\GetValue::getinfo('fangcheng_v2', 'tag', $res[0]['tag']['group_116'][0]);
             $res[0]['tag']['group_116_str'] = $r['resuleMsg']['tag_name'];
             //店铺规格
             foreach ($res[0]['tag']['group_46'] as $key=>$val){
                 $r = FC\GetValue::getinfo('fangcheng_v2', 'tag', $val);
                 $group_46[] = $r['resuleMsg']['tag_name'];
                 $res[0]['tag']['group_46_str'] = implode(',', $group_46);
             }
             
             
        }elseif ($res[0]['demand_type'] == 2){
            //需求业态
//             $categorystr = FC\GetValue::getInfoList('fangcheng_v2', 'category', $res[0]['category_ids'], 1);
            $categorystr = Comm::getCategoryDeepName($res[0]['category_ids']);
            if (!empty($categorystr)){
                $res[0]['category_ids_str'] = $categorystr;
            }
            if (!empty($res[0]['category_ids_other'])){
                $res[0]['category_ids_str'] .= ' 其他-'.$res[0]['category_ids_other'];
            }
            //店铺类型
            $shop = [1=>'主力店',2=>'次主力店',3=>'普通店铺'];
            if (!empty($res[0]['demand_shop_type'])){
                $res[0]['demand_shop_type'] = is_array($res[0]['demand_shop_type']) ? $res[0]['demand_shop_type'] : explode(',', $res[0]['demand_shop_type']);
                foreach ( $res[0]['demand_shop_type']  as $key=>$val){
                    $shoptype[$key] = $shop[$val];
                }
            }
            $res[0]['demand_shop_type_str'] = implode(',', $shoptype);
            //处理所在城市
            $r = FC\GetValue::getinfo('fangcheng_v2','area',$res[0]['area_id']);
            $res[0]['area_name'] = $r['resuleMsg']['area_name'];
        }
        $res[0]['demand_desc'] = FC\Comm::compressHtml($res[0]['demand_desc']);
        $this->resultArray = [];
        
        $this->resultArray['jumpUrl'] = urlFor([
            	'module'   =>  'passport',
            	'action'   =>  'loginjump',
            	'jump'     =>  \Frame\Util\UString::base64_encode(urlFor('', $request->get())),
        	]);
        
        $jsStatus = 0;
        $myRs = \FC\LoginIn::isLogin();
        if($myRs){
            $passportIdMy = $myRs['passport_id'];
            $passportMy = new \FC\Passport($passportIdMy);
            $info = $passportMy->find();
            if($info['passport_status'] != 2) {
            	// 如果是未认证用户
            	if(empty($info['passport_business_card'])){
            		// 没有名片
            		$jsStatus = 1;
            	} else if($info['passport_status'] == -1){
            		// 有名片， 认证不通过
            		$jsStatus = 3;
            	} else {
            		// 有名片， 未认证或者待认证
            		$jsStatus = 2;
            	}
            	 
            }
            $this->resultArray['jsStatus'] = $jsStatus;
        }
        $this->resultArray['demand'] = $res[0];
        $this->resultArray['login_passport_id'] = $_SESSION['userinfo']['passport_id']; 
        $shareinfo  = makeShareLink(['demandid'=> $demandid],['ucenter'=>'demandshow']);
        $this->resultArray['shareinfo'] = $shareinfo;
        $this->resultArray['shareinfo']['area_name'] = $res[0]['area_name'];
        $this->resultArray['from'] = $request->get('from');
        $jumpurl = ($_SESSION['userinfo']['passport_type'] == 1)?"/demand/brandneed":"/demand/businessneed";
        $this->resultArray['jumpurl'] = $jumpurl;
        $this->resultArray['shareinfo']['categorystr'] = empty($titleCategory)?"业态不限":$titleCategory;
        if ($res[0]['demand_type'] == 1){
            $title = '【好牌拓店】'.$res[0]['area_name'].'-'.$res[0]['brand_name'].'-'.$this->resultArray['shareinfo']['categorystr'];
            if (!empty($res['0']['tag']['group_41']['lower']) &&  !empty($res['0']['tag']['group_41']['upper'])){
                   $titlemiddle = '-'.($res['0']['tag']['group_41']['lower']/C('MULTIPLY_DOUBLE')).'-'.($res['0']['tag']['group_41']['upper']/C('MULTIPLY_DOUBLE')).'㎡';
                   $title .= $titlemiddle;
            }   
            $logo = getLogoimage(['brand_id' =>$res[0]['brand_id']]);
            $share = new FC\WeiXin\share();
            $desc = $share->makeDemandDesc(['type' =>'brand','info'=>$demand_res]);
        }elseif ($res[0]['demand_type'] == 2){
            $title = '【好Mall招商】'.$res[0]['area_name'].'-'. $res[0]['mall_name'].'-'.$this->resultArray['shareinfo']['categorystr'];
            $title .= empty($res['0']['tag']['group_126'][0])?'':'-'.($res['0']['tag']['group_126'][0]/C('MULTIPLY_DOUBLE')).'㎡';
            $logo = getLogoimage(['mall_id' =>$res[0]['mall_id']]);
            $share = new FC\WeiXin\share();
            $desc = $share->makeDemandDesc(['mall_id' =>$res[0]['mall_id']]);
        }
        $this->resultArray['title'] = $title;
        $this->resultArray['logo'] = $logo;
        $this->resultArray['desc'] = $desc;
        $url = $request->get('url');
        $this->resultArray['url'] = \Frame\Util\UString::base64_decode($request->get('url'));
        $intStart = strpos($this->resultArray['url'], 'ajax/1');
        if ($intStart){
            $this->resultArray['url']  = str_replace('ajax/1', 'ajax/', $this->resultArray['url']);
        }
        if(empty($this->resultArray['url']) && empty($this->resultArray['from'])){
            $this->resultArray['url'] = '/news/broadcast';
        }
        if ($this->resultArray['from'] != 1 && empty($this->resultArray['url'])){
            $this->resultArray['url'] = '/news/broadcast';
        }
        $this->resultArray['letterurl'] = "/ucenter/demandshow/demandid/{$res[0]['_id']}/";
        if(!empty($url)){
            $this->resultArray['letterurl'] .= "url/{$url}/";
        }
        $this->resultArray['letterurl'] = \Frame\Util\UString::base64_encode($this->resultArray['letterurl']);
        
        
        /**检测用户信息有没有变**/
        $ddb = new Model\Passport();
        $demandUserinfo['resuleMsg'] = $ddb->find($res[0]['passport_id']);
//         $demandUserinfo = FC\GetValue::getinfo('fangcheng_v2', 'passport', $res[0]['passport_id']);
        if (!empty($demandUserinfo)){
            if ($_SESSION['userinfo']['passport_id'] == $res[0]['passport_id']){
                $change = 0;
            }else {
                $demand_passport_company = $demandUserinfo['resuleMsg']['passport_company'];
                $demand_passport_type = $demandUserinfo['resuleMsg']['passport_type'];
                if ($demand_passport_type != $res[0]['passport_type'] || $demand_passport_company!= $res[0]['passport_company']){
                    $change = 1;
                }else {
                    $change = 0;
                }
            }
        }else {
            $change = 0;
        }
        $this->resultArray['change'] = $change;
//         v1.4更改
        //联系人电话
        if ($res[0]['allow_moible'] == 1){
            $demand_passport_mobile = FC\GetValue::getinfo('fangcheng_v2', 'passport', $res[0]['passport_id'],['passport_mobile']);
        }
        $this->resultArray['demand_passport_mobile'] = $demand_passport_mobile['passport_mobile'];
        //品牌添加所属业态
        if ($res[0]['demand_type'] == 1){
            if (!empty($res[0]['category_ids'])){
               $brand_demand_category =  FC\Comm::getCategoryDeepName($res[0]['category_ids']);
                $this->resultArray['brand_demand_category'] = $brand_demand_category;
            }
        }
        $this->resultArray['searchNum'] = $searchNum;
        $this->resultArray['searchArgs'] = $searchArgs;
        $this->resultArray['returnurl'] = $returnurl;
        if(!empty($request->get('link'))){
           $this->resultArray['letterurl'] = Frame\Util\UString::base64_encode(urlFor($request->get('jf_app_route'),$request->get()));
           $this->resultArray['link'] = Frame\Util\UString::base64_decode($request->get('link'));
        }
       //v1.8 新加功能
        if ($demand_search_res['passport_id'] != $_SESSION['userinfo']['passport_id']){ //自己发布的需求不需要计算相似需求和发布者发布的需求
            //计算相似需求  2012/11/5 leiy
            $likedemand = \FC\Comm::getLikeDemandList($demand_search_res);
            $likelistinfo = $this->getDemandInfoByIdList($likedemand);
            $this->resultArray['res'] = $likelistinfo;
            //计算需求发布者发布的其他的需求 2012/11/5 leiy
            $mydemandList = $this->getDemandListByPid($res[0]['passport_id'],$res[0]['demand_type'],(string)$res[0]['_id'],6);
            $mydemandList = array_values($mydemandList);
            $mydemandList_count = count($mydemandList);
            if ($mydemandList_count == 6){
                unset($mydemandList[5]);
            }
            $this->resultArray['resMy'] = $mydemandList;
            if ($request->get('from') != 4 && $request->get('from') !=5){
            	$referer = $_SERVER['HTTP_REFERER'];
            	if (strpos($referer,'news/broadcast') > 1){
            		$this->resultArray['checkPage'] = 4;
            	}elseif (strpos($referer,'ucenter/demandlistofmine') > 1){
            		$this->resultArray['checkPage'] = 5;
            	}
            }else {
            	$this->resultArray['checkPage'] = $request->get('from');
            }
            if ($request->get('from') == 4 || $request->get('from') == 5){
            	$this->resultArray['from'] = $request->get('from');
            }
        }
    }
    /**
     * 编辑头像
     * **/
    public function executeEditfacephoto(Application $application, Request $request){
        FC\Session::initSession();
    }
        /*
     * 个人中心 - 删除 需求 *
     */
    public function executeDeldemand(Application $application, Request $request)
    {
        FC\Session::initSession();
        $passport_id = $_SESSION['userinfo']['passport_id'];
        $demandid = $request->get('id');
        $db = MDB();
        $demandid = new MongoId($demandid);
        $res = $db->select()
            ->from('demand')
            ->where([
            '_id' => $demandid
        ])
            ->query();
        $res = array_values($res);
        if ($res[0]['passport_id'] == $passport_id) {
            $update = [
                'demand_status' =>(int) 0
            ];
            $where = [
                '_id' => $demandid
            ];
            $r = $db->update('demand')
                ->set($update)
                ->where($where)
                ->query();
            if ($r){
                return ['result'=>1,'resultMsg'=>'删除成功'];
            }else {
                return ['result'=>0,'resultMsg'=>'删除失败'];
            }
        }else {
            return ['result'=>0,'resultMsg'=>'您没有权限'];
        }
    }

    /**
     * 个人中心 -- 延长日期
     * *
     */
    public function executeAddtime(Application $application, Request $request)
    {
        FC\Session::initSession();
        $passport_id = $_SESSION['userinfo']['passport_id'];
        $demandid = $request->get('id');
        $demandid = new MongoId($demandid);
        $db = MDB();
        $res = $db->select()
            ->from('demand')
            ->where([
            '_id' => $demandid
        ])
            ->query();
        $res = array_values($res);
        $totime = date("Y-m-d", strtotime("+1months", strtotime($res[0]['demand_expiry_at'])));
        $update = [
            'demand_expiry_at' => $totime
        ];
        $where = [
            '_id' => $demandid
        ];
        $r = $db->update('demand')
            ->set($update)
            ->where($where)
            ->query();
      if ($r){
                return ['result'=>1,'resultMsg'=>'成功'];
            }else {
                return [
                'result' => 0,
                'resultMsg' => '失败'
            ];
        }
    }

    /**
     * 设置微信推送开关
     */
    public function executeSetwinxinpush(Application $application, Request $request)
    {
        $this->setLayout();
        $this->setView();
        FC\Session::initSession();
        $type = $request->get('type');
        if ($type == 'on') {
            $data = [
                'passport_weixin_push' => 1
            ];
        } else 
            if ($type == 'off') {
                $data = [
                    'passport_weixin_push' => 0
                ];
            }
        $where = [
            'passport_id' => $_SESSION['userinfo']['passport_id']
        ];
        $result = $this->fangcDb
                        ->update('passport')
                        ->set($data)
                        ->where($where)
                        ->query();
        if ($result){
            return [
            	'result' => 1,
                'resultMsg' => '成功'
            ];
        }else {
            return [
            		'result' => 0,
            		'resultMsg' => '失败'
            		];
        }
    }
    
    /**
     * 获得业态数据
     * */
    function getStrcatebyid($id){
    	//     	$cateArr = json_decode($this->categorylists,true);
    	$rerurn = '';
    	if (is_array($id)){
    		foreach ($id as $key=>$val){
    			$cateinfo = FC\GetValue::getinfo('fangcheng_v2', "category", $val);
    			$rerurn .= $cateinfo['resuleMsg']['category_name'].',';
    		}
    		$rerurn = mb_substr($rerurn, 0,-1,'utf-8');
    	}else {
    		$rerurn = $cateArr[$id][0];
    	}
    	return $rerurn;
    }

    
    /**
     * 根据passport_id 来获得用户的 品牌也业态信息
     */
    private function getBrandInfoById($passport_id)
    {
        $return = [];
        $selectArr = [
            'brand_name',
            'brand_id',
            'category_ids',
            'category_ids_other',
            'passport_brand_style',
            'passport_brand_id',
            'area_ids'
        ];
        $whereArr = [
            'passport_id' => $passport_id,
            'passport_brand_status' => 1
        ];
        $resultBrand = $this->fangcDb->select($selectArr)
            ->from('passport_brand')
            ->where($whereArr)
            ->query();
        foreach ($resultBrand as $key => $val) {
            $cateids = explode(',', $val['category_ids']);
            $return[$key]['brand_name'] = $val['brand_name'];
            $return[$key]['passport_brand_id'] = $val['passport_brand_id'];
            $return[$key]['brand_id'] = $val['brand_id'];
            $return[$key]['category_ids_other'] = $val['category_ids_other'];
            $return[$key]['passport_brand_style'] = $val['passport_brand_style'];
            $return[$key]['passport_brand_id'] = $val['passport_brand_id'];
            $cc = FC\Comm::getCategoryDeepName($cateids);
            if (count(explode('-', $cc)) > 1){
            $return[$key]['c_all'] = empty($val['category_ids_other'])? $cc : $cc . "<p>{$val['category_ids_other']}</p>";
            preg_match_all('/<p>([^-]*)-([^<]*)?<\/p>/', $cc, $m);
            $cone = implode(',', $m[1]);
            $ctwo = implode(',', $m[2]);
            }else {
                $cc = str_replace('<p>', '', $cc);
                $cc = str_replace('</p>', '', $cc);
                $cone = $cc;
                $return[$key]['c_all'] = empty($val['category_ids_other'])? $cc : $cc . "<p>{$val['category_ids_other']}</p>";
            }
            /* $cc = str_replace('<p>', '', $cc);
            $cc = str_replace('</p>', '', $cc);
            $cc = explode('-', $cc);
            if (count($cc) == 2){
            	$cone = $cc[0];
            	$ctwo = $cc[1];
            }else {
            	$cone = $cc[0];
            } */
            
            if (!empty($val['category_ids_other'])){
                $cone = $cone . " ".'其他'; 
                $return[$key]['cone'] = $cone;
                $ctwo = $ctwo . $val['category_ids_other'];
                $return[$key]['ctwo'] = $ctwo;
            }else {
                $return[$key]['cone'] =  $cone;
                $return[$key]['ctwo'] = $ctwo;
            }
            $return[$key]['category_ids'] = implode(',',$cateids);
            unset($cone);
            unset($ctwo);
            /**解析身份*/
            if ($val['passport_brand_style'] == 1){
                $return[$key]['passport_brand_style_str'] = '直营';
            }elseif ($val['passport_brand_style'] == 2){
                $return[$key]['passport_brand_style_str'] = '加盟';
            }elseif ($val['passport_brand_style'] == 3){
                $return[$key]['passport_brand_style_str'] = '代理';
            }
            $brand_area = FC\GetValue::getInfoList('fangcheng_v2', 'area', $val['area_ids'], 'area_name');
            $return[$key]['area_ids'] = $val['area_ids'];
            $return[$key]['area'] = $brand_area['result'] ? $brand_area['resuleMsg'] : '';
        }
        return $return;
    }
    // 在passport_area表获得品牌所负责城市的数据
    private function getBrandAreaByID($passport_id)
    {
        $passport_area = new \Model\Area();
        $result = $this->fangcDb->select()
            ->from('passport_area')
            ->where([
            'passport_id' => $passport_id
        ])
            ->query();
        $return = [];
        $return1 = [];
        if (! empty($result)) {
            foreach ($result as $key => $val) {
                if (!empty($val['area_id'])){
                $c = FC\GetValue::getinfo('fangcheng_v2', 'area', $val['area_id']);
                $return[] = $c['resuleMsg']['area_name'];
                $return1[] = $val['area_id'];
                }
            }
        }
        $returnStr = implode(',', $return);
        $return1Str = implode(',', $return1);
        $re['str'] = $returnStr;
        $re['ids'] = $return1Str;
        return $re;
    }

    /**
     * 商业体用户获得商业体 和商业体所在的城市
     */
    private function getBusinessMall($passport_id)
    {
        $selectArr = [
            'mall_name',
            'area_id',
            'mall_id',
            'passport_mall_id'
        ];
        $whereArr = [
            'passport_id' => $passport_id,
            'passport_mall_status' => 1
        ];
        $resultMall = $this->fangcDb->select($selectArr)
            ->from('passport_mall')
            ->where($whereArr)
            ->query();
        $return = [];
        foreach ($resultMall as $key => $val) {
            $return[$key]['mall_name'] = $val['mall_name'];
            $c = FC\GetValue::getinfo('fangcheng_v2', 'area', $val['area_id']);
            $return[$key]['area_name'] = $c['resuleMsg']['area_name'];
            $return[$key]['area_id'] = $val['area_id'];
            $return[$key]['mall_id'] = $val['mall_id'];
            $return[$key]['passport_mall_id'] = $val['passport_mall_id'];
        }
        return $return;
    }
    
    /**
     * 获取用户各个字段编辑的时间，没有编辑过就为空
     * @param int $passportId
     * @return multitype:Ambigous <mixed>
     */
    private function getPassportEditLastDate($passportId)
    {
        $rs =  $this->fangcDb->select('log_passport_update_ctime, log_passport_update_column, passport_id')
                            ->from('log_passport_update')
                            ->where('passport_id=?', $passportId)
                            ->groupBy('log_passport_update_column')
                            ->orderBy('log_passport_update_id desc')
                            ->query();
        $result = [];
        foreach ($rs as $line){
            $result[$line['log_passport_update_column']] = $line['log_passport_update_ctime'];
        }
        return $result;
    }
    
    
    /**
     * 相似需求数据处理
     * */
    public function getDemandInfoByIdList($arr){
        $count = count($arr['hits']);
        $mdb = MDB();
        $passportDb = new \Model\Passport();
        $list = [];
        $mall_tag = new FC\Demand();
        foreach ($arr['hits'] as $k=> $v){
            $id = new MongoId($v['_id']);
            $res = [];
            $res = $mdb->select()
            ->from('demand')
            ->where([
            		'_id' => $id
            		])
            		->query();
            $res = array_values($res);
            if (empty($res[0])){
                --$count;
            }else {
            $list[(string)$res[0]['_id']] = $res[0];
            }
        }
        $res = [];
        $res = $list;
        foreach ($list as $key => $val) {
        	/* 发布需求者的名字、加V改为读取对应用户的最新资料，而非缓存*/
            $passportinfo = [];
//             $val['passport_id'] = 2277;
            if (!empty($val['passport_id'])){
                $passportinfo = $passportDb->select()
                ->where('passport_id=?', $val['passport_id'])
                ->query();
            }
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
        return $res;
    }

    public function getDemandListByPid($passport_id, $type,$exp_id, $limit = 5)
    {
        $mall_tag = new FC\Demand();
        $db = new \Model\Passport($passport_id);
        $mdb = MDB();
        $passport_info = $db->find();
        $search['demand_type'] = (int) $type;
        $search['passport_id'] = (int) $passport_id;
        $search['demand_status'] = ['!=',0];
        $res = $mdb->select()
                    ->from('demand')
                    ->where($search)
                    ->orderBy('demand_ctime DESC')
                    ->limit((int)$limit)
                    ->query();
        foreach ($res as $key => $val) {
        	/* 发布需求者的名字、加V改为读取对应用户的最新资料，而非缓存*/
            if ($key == $exp_id){
                unset($res[$key]);
                continue;
            }
            $passportinfo = [];
//             $val['passport_id'] = 2277;
            if (!empty($val['passport_id'])){
                $passportinfo = $db->select()
                ->where('passport_id=?', $val['passport_id'])
                ->query();
            }
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
        return $res;
    }
}


















