<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Model;
use FC\LoginIn;
use FC\Comm;
use FC;



/**
 * 用户接口
 *
 * @author yulei
 * @version 0.2.0
 */
class apiActions extends Frame\Foundation\Action
{

    public function preExecute(Application $application, Request $request)
    {}

    /**
     * 查询品牌搜索
     *
     * @param
     *            string brand 根据品牌名称 [brand和mall 两个参数数二选一 必填项]
     * @param
     *            string mall 更具商业体名称
     * @return Json
     */
    public function executeSearch(Application $application, Request $request)
    {
        $this->setView(null);
        $this->setLayout(null);
//         $brand = $request->get('brand', '');
//         $mall = $request->get('mall', '');
        $type = $request->get('type',0);
        $name = urlencode($request->get('name',''));
        $areaId = intval($request->get('area'));
        $limit = $request->get('limit',5);
        if (empty($type) || empty($name)){
            return [
            		'result' => 0,
            		"resultMsg" => "您查询的数据不正确"
            		];
        }
        if ($type == 1){
            $url = C('SERVICE_IP').'/search/brand/w/' . $name. '/area_id/'.$areaId.'/limit/'.$limit;
        }else if ($type == 2){
            $url = C('SERVICE_IP').'/search/mall/w/' . $name. '/area_id/'.$areaId.'/limit/'.$limit;
        }
        $result = file_get_contents($url);
        $result = json_decode($result,true); 
        $uploadUrl = C('UPLOAD_URL');
        if ($result['result'] == 1){
            if ($type == 2){
                foreach ($result['info'] as $key => $val){
                	$return[$key]['name'] = $result['info'][$key]['mall_name'];
                	$return[$key]['tip'] =  '';
                	$return[$key]['imgSrc'] = getLogoimage(['mall_id'=> $result['info'][$key]['mall_id']],'48x48');
                	$return[$key]['value'] = $result['info'][$key]['mall_id'];
                	$mname = FC\GetValue::getInfoList('fangcheng_v2', 'area', $result['info'][$key]['area_id'], 1);
                	if ($mname['result'] == 1){
                	    $return[$key]['area_name'] = $mname['resuleMsg'];
                	}else {
                	    $return[$key]['area_name'] = '';
                	}
                	$return[$key]['area_id'] = $result['info'][$key]['area_id'];
//                 	添加商圈信息  2015/11/3 leiy
                    $circleInfo = FC\GetValue::getInfoList('fangcheng_v2', 'business_circle', $result['info'][$key]['business_circle_id'], 1);
                    if ($circleInfo['result'] == 1){
                        $return[$key]['business_circle_name'] = $circleInfo['resuleMsg'];
                        $return[$key]['business_circle_id'] = $result['info'][$key]['business_circle_id'];
                    }else {
                        $return[$key]['business_circle_name'] = '';
                        $return[$key]['business_circle_id'] = '';
                    }
                }
            }elseif ($type == 1){
                foreach ($result['info'] as $key => $val){
                    $return[$key]['name'] = $result['info'][$key]['brand_name'];
                    $category = \FC\GetValue::getInfoList('fangcheng_v2', 'category', $val['category_id'], 'category_name');
                    $return[$key]['tip'] = $category['result'] ? $category['resuleMsg'] : '';
                    $return[$key]['imgSrc'] = getLogoimage(['brand_id'=> $result['info'][$key]['brand_id']],'48x48');
                    $return[$key]['value'] = $result['info'][$key]['brand_id'];
                    /* $return[$key]['category_str'] = Comm::getCategoryDeepName($val['category_id']);
                    $return[$key]['category_ids'] = implode(',',$val['category_id']);
                    $return[$key]['category_ids'] = Comm::getCategoryDeepIds($val['category_id']); */

                    $return[$key]['category_str'] = Comm::getCategoryDeepName($val['category_id']);
                    $return[$key]['category_ids'] = implode(',',$val['category_id']);
                    $return[$key]['category_ids_other'] = '';
                }
            }
        }
        // 添加600秒的web缓存
        \FC\Comm::webCache(600);
        
        if (!empty($return)){
            return [
            	'result' => 1,
                'resultMsg' => $return
            ];
        }else {
            return [
            	'result' => 0,
                'resultMsg' => '没有查询到数据'
            ];
        }
    }
    
    //搜索商业体和品牌翻页接口
    public function executeGetdata(Application $application, Request $request)
    {
            $this->setLayout('');
    	    $searchtype = $request->get('searchtype', 0);
    	    if($searchtype == 0)
    	    {
    	    	return FALSE;
    	    }
    	    $p = $request->get('p', 1);
    	    $w = urlencode($request->get('w', ''));
    		
    	    $where  = !empty($w) ? "/w/{$w}" : '';
    		if($searchtype == 1){
    		    $this->resultArray = $this->data_info('searchbrand', 1, $p, $where);
    		    $list = $this->resultArray['list'];
    		    if($list){
        		    foreach($list as $key=>$value)
        		    { 
        		        $this->resultArray['list'][$key]['brand_logo'] = getLogoimage(['brand_id'=>$value['brand_id']],'48x48');
        		        $this->resultArray['list'][$key]['category'] = str_replace(['<p>','</p>'], ['',''], Comm::getCategoryDeepName($value['category_id']));
        		        $this->resultArray['list'][$key]['category_ids'] = implode(',', $value['category_id']);
        		        
        		        if($value['area_id']) {
        		        	$areaName = FC\GetValue::getinfo('fangcheng_v2', 'area', $value['area_id']);
        		        	$this->resultArray['list'][$key]['areaname'] = $areaName['resuleMsg']['area_name'];
        		        }
        		    }
        		    $this->setView('mybrand');
    		    }else{
    		    	return false;
    		    }
    		}elseif($searchtype == 2){
    		    $this->resultArray = $this->data_info('searchmall', 2, $p, $where);
    		    $list = $this->resultArray['list'];
    		    if($list){
        		    foreach ($list as $key=>$value)
        		    {   
        		        if($key==0){
        		        }
        		        $this->resultArray['list'][$key]['mall_logo'] = getLogoimage(['mall_id'=>$value['mall_id']],'48x48');
        		        
        		        
        		        $circleInfo = FC\GetValue::getInfoList('fangcheng_v2', 'business_circle', $list[$key]['business_circle_id'], 1);
        		        if ($circleInfo['result'] == 1){
        		        	$this->resultArray['list'][$key]['business_circle'] = $circleInfo['resuleMsg'];
        		        	$this->resultArray['list'][$key]['business_circle_id'] = $list[$key]['business_circle_id'];
        		        }
        		        if($value['area_id']) {
        		        	$areaName = FC\GetValue::getinfo('fangcheng_v2', 'area', $value['area_id']);
        		        	$this->resultArray['list'][$key]['areaname'] = $areaName['resuleMsg']['area_name'];
        		        }
        		    }
        		    $this->setView('mymall');
    		    }else{
    		    	return false;
    		    }
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
    	$data_scroll_url = ($pageNow >= 1 && $pageNow < $page['total']) ? "/api/getdata/{$data}/p/{$next_page}" : "";
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
    

    /**
     * 发送手机验证码
     *
     * @param
     *            string mobname 短信收信人姓名 [非必填]
     * @param
     *            string mobnumber 收信人手机号码 [必填]
     *            
     */
    public function executeSendcheckmsg(Application $application, Request $request)
    {
        $log_sms_to_mobile = $request->get('mobnumber', '');
        $log_sms_to_name = $request->get('mobname', '');
        // 验证手机号码
        if (empty($log_sms_to_mobile)) {
            return [
                'result' => 0,
                'resultMsg' => '手机号码不能为空'
            ];
        }
        $reg = '/1[\d]{10}/';
        if (! preg_match($reg, $log_sms_to_mobile)) {
            return [
                'result' => '0',
                'resultMsg' => '手机号码不正确'
            ];
        }
        sendNumSMS($log_sms_to_mobile, 10, $log_sms_to_name);
        if ($log_sms_id > 0) {
            return [
                'result' => 1,
                'resultMsg' => '短信发送成功'
            ];
        }
    }

    /**
     * 发送邮件
     */
    public function executeSendemail(Application $application, Request $request)
    {}

    /**
     * 检测唯一性的方法
     *
     * @param
     *            string passportKey 要查询的数据表的key
     * @param
     *            string passportVal 要校验的值
     *            *
     */
    public function executeIstheone(Application $application, Request $request)
    {
        $this->setView();
        $this->setLayout();
        $passportKey = $request->get('passportkey', '');
        $passportVal = $request->get('passportval', '');
        $serach = [
            $passportKey => $passportVal
        ];
        $db = DB();
        try {
            $passport_id = $db->select("passport_id")
            ->from("passport")
            ->where($serach)
            ->query();
            if (!empty($passport_id[0]['passport_id'])){
                return [
                    'result' => 1,
                    'resultMsg' => '手机号码已经存在'
                ];
            }else {
                return [
                    'result' => 0,
                    'resultMsg' => '-1'
                ];
            }
        }catch (Exception $e){
            return [
                'result' => 1,
                'resultMsg' => $e->getMessage()
            ];
        }
        
    }

    /**
     * 检测验证码是不是正确的
     *
     * @param
     *            int checkcode 短信验证码
     * @return json
     *
     */
    public function executeChecknumsms(Application $application, Request $request)
    {
        $checkcode = $request->get('checkcode', '');
        if ($checkcode == '') {
            return [
                'result' => 0,
                'resultMsg' => '数据不完整'
            ];
        }
        if ($_SESSION['check']['msgcheckcode'] == $checkcode) {
            return [
                'result' => 1,
                'resultMsg' => '验证通过'
            ];
        } else {
            return [
                'result' => 0,
                'resultMsg' => '验证错误'
            ];
        }
    }

    /**
     * 根据 category_id 获得他的子业态
     *
     * @param
     *            int category_id
     * @return json
     *
     */
    public function executeGetcategorybyid(Application $application, Request $request)
    {
        FC\Session::initSession();
        $category_id = $request->get('category_id', 0);
        $cateDB = DB();
        if (empty($category_id)) {
            $result = $cateDB->select([
                'category_id',
                'category_name',
                'category_id_parent'
            ])
                ->from('category')
                ->where('category_deep = ? and category_status = ?', 1, 1)
                ->orderBy("category_order ASC")
                ->query();
        } else {
            $result = $cateDB->select([
                'category_id',
                'category_name',
                'category_id_parent'
            ])
                ->from('category')
                ->where('category_id_parent = ?', $category_id)
                ->orderBy('category_order ASC')
                ->query();
        }
        if (empty($result)) {
            return [
                'result' => 0,
                'resultMsg' => '没有查询出数据'
            ];
        } else {
            return [
                'result' => 1,
                'resultMsg' => $result
            ];
        }

    }

    /**
     * 根据area_id 获得他下面的城市数据
     */
    public function executeGetcitysonbyid(Application $application, Request $request)
    {
        $area_id = $request->get('area_id', 0);
        $cityDB = DB();
        $area_id = empty($area_id) ? 86000000 : $area_id;
        // 在没有传ID的时候返回国内的一级城市
        $result = $cityDB->select([
            'area_id',
            'area_name',
            'area_id_parent'
        ])
            ->from('area')
            ->where('area_id_parent = ?', $area_id)
            ->orderBy('area_order ASC')
            ->query();
        if (empty($result)) {
            return [
                'result' => 0,
                'resultMsg' => '没有查询出数据'
            ];
        } else {
            return [
                'result' => 1,
                'resultMsg' => $result
            ];
        }
    }

    /**
     * 根据passport_id 来获得当前用户注册时填写的品牌和业态
     * 如果他是有brand_id 的就在
     *
     * @param
     *            int passport_id
     * @return mixed json
     */
    public function executeGetbrandbypid(Application $application, Request $request)
    {
        FC\Session::initSession();
        $passport_id = $_SESSION['userinfo']['passport_id'];
        if (empty($passport_id)) {
            return [
                'result' => 0,
                'resultMsg' => '数据传入不完整'
            ];
        }
        $passportDB = DB();
        $result = $passportDB->select([
            'brand_id',
            'brand_name',
            'category_ids',
            'category_ids_other',
        ])
            ->from('passport_brand')
            ->where('passport_id = ? and passport_brand_status = 1', $passport_id)
            ->query();
        foreach ($result as $key => $val){
            /* # 产品功能取消了 
               if (!empty($val['category_ids'])){
                $category_ids_arr = explode(',', $val['category_ids']);
                $category_str = Comm::getCategoryDeepName($category_ids_arr);
                $category_str_ids = Comm::getCategoryDeepIds($category_ids_arr);
            } */
            $category_str_ids = $val['category_ids'];
            $category_ids_arr = explode(',', $val['category_ids']);
            $category_str = Comm::getCategoryDeepName($category_ids_arr);
            if (!empty($val['category_ids_other'])){
                $category_str = $category_str.' '. $val['category_ids_other'];
            }
            $result[$key]['category_str'] = $category_str;
            $result[$key]['category_ids'] = $category_str_ids;
        }
        if (empty($result)) {
            return [
                'result' => 0,
                'resultMsg' => '没有数据'
            ];
        } else {
            return [
                'result' => 1,
                'resultMsg' => $result
            ];
        }
    }

    /**
     * 根据passport_id 获得用户所负责的商业体
     * 
     * @param
     *            int passport_id
     * @return mixed json
     *        
     */
    public function executeGetmallbypid(Application $application, Request $request)
    {
        FC\Session::initSession();
        $passport_id = $_SESSION['userinfo']['passport_id'];
        if (empty($passport_id)) {
            return [
                'result' => 0,
                'resultMsg' => '数据传入不完整'
            ];
        }
        $passportDB = DB();
        $result = $passportDB->select([
            'mall_id',
            'mall_name',
            'area_id'
        ])
            ->from('passport_mall')
            ->where('passport_id = ? and passport_mall_status = 1', $passport_id)
            ->query();
        if (empty($result)) {
            return [
                'result' => 0,
                'resultMsg' => '没有数据'
            ];
        } else {
            return [
                'result' => 1,
                'resultMsg' => $result
            ];
        }
    }
    /**
     * 二维码生成
     * @param string url 要转行的路径
     * @return image/png
     * */
    public function executeGetqrimg(Application $application, Request $request)
    {
        ob_clean();
        include JF_DIR_LIB . '/FC/QRcode.php';
        $value = $request->get('url', ''); // 二维码内容
        $value = base64_decode($value);
        $errorCorrectionLevel = 'H'; // 容错级别
        $matrixPointSize = 3; // 生成图片大小
//         QRcode::png($value, 'qrcode.png', $errorCorrectionLevel, $matrixPointSize, 2);
        ob_start();
        QRcode::png($value, false, $errorCorrectionLevel, $matrixPointSize, 2);
        $QR = ob_get_clean();
        $logo = JF_DIR_WEB . '/img/apple-touch-icon-57-precomposed.png'; // 准备好的logo图片
       // 已经生成的原始二维码图
        if (!empty($logo)) {
            $QR = imagecreatefromstring($QR);
            $logo = imagecreatefromstring(file_get_contents($logo));
            $QR_width = imagesx($QR); // 二维码图片宽度
            $QR_height = imagesy($QR); // 二维码图片高度
            $logo_width = imagesx($logo); // logo图片宽度
            $logo_height = imagesy($logo); // logo图片高度
            $logo_qr_width = $QR_width / 5;
            $scale = $logo_width / $logo_qr_width;
            $logo_qr_height = $logo_height / $scale;
            $from_width = ($QR_width - $logo_qr_width) / 2;
            // 重新组合图片并调整大小
            imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
        }
        // 输出图片
        Header("Content-type: image/png");
        ImagePng($QR);
        exit();
    }
    
    /**
     * 上传图片功能
     */
    public function executeUploadimage(Application $application, Request $request)
    {
        $x = $request->get('x',0);
        $y = $request->get('y',0);
        $height = $request->get('height',0);
        $width = $request->get('width',0);
        $resize = !empty($width) && !empty($height)?true:false;
    	if (isset($_FILES) && ! empty($_FILES)) {
    	    $upload = upload();
    	    if ($resize){
    	        $upload = $upload->setCutSize($x,$y,$width,$height);
    	    }
    		$upload = $upload->setSmallPic(100, 100)->setSmallPic(50, 50);
    		$return = $upload->uploadFile('photo');
    		$src = $upload->getSavePath($return);
    		$src = $src[0];
    		return [
    				'result' => 1,
    				"resultMsg" => $src,
    		        'src' => C(UPLOAD_URL).$src,
    				];
    	} else {
    		return [
    				'result' => 0,
    				"resultMsg" => "没有上传"
    				];
        }
    }

    /**
     * 检测验证码是不是正确的
     */
    public function executeCheckimgcode(Application $application, Request $request)
    {
        $checkCode = strtoupper($request->get('imgcode'));
        $res = Comm::checkimgCode($checkCode);
        if ($res) {
            return [
                'result' => 1,
                'resultMsg' => '验证码正确'
            ];
        } else {
            return [
                'result' => 0,
                'resultMsg' => '验证码错误'
            ];
        }
    }

    /**
     * 添加品牌
     */
    public function executeAddbrand(Application $application, Request $request)
    {
        FC\Session::initSession();
        $c = FC\Session::getUserSession();
        $passport_type = $c['resultMsg']['passport_type'];
        $passport_id = $c['resultMsg']['passport_id'];
        if ($c['resultMsg']['passport_type'] == 2 || $c['resultMsg']['passport_type'] == 3) {
            return [
                'result' => 0,
                'resultMsg' => "您没有权限"
            ];
        }
        $passport_Arr = [];
        $brand_name = $request->get('brand_name');
        $brand_id = $request->get('brand_id');
        $category_ids = $request->get('category_ids');
        $category_ids_other = $request->get('category_ids_other');
        if (empty($brand_name) || empty($passport_id)) {
            return [
                'result' => 0,
                'resultMsg' => "数据不完整"
            ];
        }
        $passport_Arr['brand_name'] = $brand_name;
        $passport_Arr['brand_id'] = $brand_id;
        $passport_Arr['passport_id'] = $passport_id;
        $passport_Arr['category_ids'] = $category_ids;
        $passport_Arr['category_ids_other'] = $category_ids_other;
        $passport_Arr['passport_brand_ctime'] = date('Y-m-d H:i:s', time());
        // 添加加测当前用户是不是有了 2015/11/12 leiy
        $db = DB();
        $checkarr = [];
        if (! empty($brand_id)) {
            $checkarr['brand_id'] = $brand_id;
        }else {
            $checkarr['brand_name'] = $brand_name;
        }
        $checkarr['passport_id'] = $passport_id;
        $checkarr_result = $db->select('count(1) as count')
                              ->from('passport_brand')
                              ->where($checkarr)
                              ->query();
        if ($checkarr_result[0]['count'] > 0){
            return [
                'result' => 1,
                'resultMsg' => '数据已经存在'
            ];
        }
        $result = $db->insert($passport_Arr)
            ->into('passport_brand')
            ->query();
        if ($result){
            return [
                'result' => 1,
                'resultMsg' => "添加完成",
                'id'=>$result
            ];
        }else {
            return [
        		'result' => 0,
        		'resultMsg' => "添加失败"
        		];
        }
    }
    /**
     * 添加商业体
     */
    public function executeAddmall(Application $application, Request $request)
    {
        FC\Session::initSession();
        $c = FC\Session::getUserSession();
        $passport_type = $c['resultMsg']['passport_type'];
        $passport_id = $c['resultMsg']['passport_id'];
        if ($c['resultMsg']['passport_type'] == 1) {
            return [
                'result' => 0,
                'resultMsg' => "您没有权限"
            ];
        }
        $passport_Arr = [];
        $mall_name = $request->get('mall_name');
        $mall_id = $request->get('mall_id');
        $area_id = $request->get('area_id');
        if (empty($mall_name) || empty($passport_id)) {
            return [
                'result' => 0,
                'resultMsg' => "数据不完整"
            ];
        }
        $passport_Arr['mall_name'] = $mall_name;
        $passport_Arr['mall_id'] = $mall_id;
        $passport_Arr['passport_id'] = $passport_id;
        $passport_Arr['area_id'] = $area_id;
        $passport_Arr['passport_mall_ctime'] = date('Y-m-d H:i:s',time());
        // 添加加测当前用户是不是有了 2015/11/12 leiy
        $db = DB();
        $checkarr = [];
        if (! empty($mall_id)) {
        	$checkarr['mall_id'] = $mall_id;
        }else {
            $checkarr['mall_name'] = $mall_name;
        }
        $checkarr['passport_id'] = $passport_id;
        $checkarr_result = $db->select('count(1) as count')
        ->from('passport_mall')
        ->where($checkarr)
        ->query();
        if ($checkarr_result[0]['count'] > 0){
        	return [
        			'result' => 1,
        			'resultMsg' => '数据已经存在'
        			];
        }
//         $db = DB();
        $result = $db->insert($passport_Arr)
            ->into('passport_mall')
            ->query();
        if ($result){
            return [
                'result' => 1,
                'resultMsg' => "添加完成",
                'id'=>$result
            ];
        }else {
            return [
        		'result' => 0,
        		'resultMsg' => "添加失败"
        		];
        }
    }

    /**
     * 添加关注
     */
    public function executeAddattention(Application $application, Request $request)
    {
        FC\Session::initSession();
        $passport_id = $_SESSION['userinfo']['passport_id'];
        if (empty($passport_id)) {
            return [
                "result" => 0,
                'resultMsg' => '添加失败'
            ];
        }
        $brand_id = $request->get('brand_id');
        $mall_id = $request->get('mall_id');
        if (empty($brand_id) && empty($mall_id)) {
            return [
                'result' => 0,
                'resultMsg' => '添加失败'
            ];
        }
        $DB = DB();
        if (! empty($brand_id)) {
            $passport_follow = [
                'brand_id' => $brand_id,
                'passport_id' => $passport_id,
                'passport_follow_status' => 1
            ];
        } elseif (! empty($mall_id)) {
            $passport_follow = [
                'mall_id' => $mall_id,
                'passport_id' => $passport_id,
                'passport_follow_status' => 1
            ];
        }
            // 判断是不数据库中有没有数据
        unset($passport_follow['passport_follow_ctime']);
        $isset = $DB->select('count(1) as count')
                ->from('passport_follow')
                ->where($passport_follow)
                ->query();
        if ($isset[0]['count'] > 0){
            return [
        		'result' => 1,
        		'resultMsg' => '添加成功'
        		];
        }else {
            $passport_follow['passport_follow_ctime'] = date('Y-m-d H:i:s',time());
        }
        $res = $DB->insert($passport_follow)
            ->into('passport_follow')
            ->query();
        if ($res){
            
            // 记录log -- add by Jason
            $logArgs = [];
            if(!empty($brand_id)){
                $logArgs['brand_id'] = $brand_id;
            } else {
                $logArgs['mall_id'] = $mall_id;
            }
            if(!empty($logArgs)){
                \FC\Dynamic\Dynamic::addLog(4, $logArgs);
            }
            
            
            return [
        		'result' => 1,
        		'resultMsg' => '添加成功'
        		];
        }else {
            return [
            'result' => 0,
            'resultMsg' => '添加失败'
            ];
        }
    }

    /**
     * 取消关注
     */
    public function executeDelattention(Application $application, Request $request)
    {
        FC\Session::initSession();
        $passport_id = $_SESSION['userinfo']['passport_id'];
        if (empty($passport_id)) {
            return [
                "result" => 0,
                'resultMsg' => '取消失败'
            ];
        }
        $brand_id = $request->get('brand_id');
        $mall_id = $request->get('mall_id');
        if (empty($brand_id) && empty($mall_id)) {
            return [
                'result' => 0,
                'resultMsg' => '添加失败'
            ];
        }
        if (! empty($brand_id)) {
            $set = [
                'passport_follow_status' => 2
            ];
            $where = [
                'passport_id' => $passport_id,
                'brand_id' => $brand_id,
                'passport_follow_status' => 1
            ];
        }
        if (! empty($mall_id)) {
            $set = [
                'passport_follow_status' => 2
            ];
            $where = [
                'passport_id' => $passport_id,
                'mall_id' => $mall_id,
                'passport_follow_status' => 1
            ];
        }
        $db = DB();
        $re = $db->update('passport_follow')
            ->set($set)
            ->where($where)
            ->query();
        if ($re) {
            return [
                'result' => 1,
                'resultMsg' => '取消成功'
            ];
        } else {
            return [
                'result' => 0,
        		'resultMsg' => '取消失败'
        		];
        }
    }
    
    /**发送*/
    
    public function executeSms(Application $application, Request $request)
    {
    	$mobile = $request->get('mobile', '0');
    	$type = $request->get('type', '0');
    	$source = $request->get('source', '1');
    	$min = 15; // 定义失效分钟数
    	$ischeckalone = $request->get('ischeckalone', 0);
    	if(DIRECTORY_SEPARATOR == '\\' ){   //  如果是windows环境，就是本机测试。
    	    $code = '1111';
    	    $_SESSION['SMS'][$mobile]['code'] = $code;
    	    $_SESSION['SMS'][$mobile]['expre_time'] = time()+($min*60);
    	} else {
        	$sourceArr = [
        			'',
        			'Ihuyi',
        			'YunPian'
        			];
        	$source = $sourceArr[$source];
        	
        	if ($ischeckalone) {
        		$mobilecheckresult = LoginIn::isTheOne(DB(), 'passport_mobile', $mobile);
        		if ($mobilecheckresult['result'] == 1) {
        			return [
        					'result' => 0,
        					'resultMsg' => '手机号已经存在'
        					];
        		}
        	}
        	if (isset($_SESSION['SMS'][$mobile]) && (time() < $_SESSION['SMS'][$mobile]['expre_time'])) {
        		$code = $_SESSION['SMS'][$mobile]['code'];
        		$_SESSION['SMS'][$mobile]['expre_time'] = time()+($min*60);
        	} else {
        		$codeNumList = range(0, 9);
        		$code = implode('', array_rand($codeNumList, 4));
        		$_SESSION['SMS'][$mobile]['code'] = $code;
        		$_SESSION['SMS'][$mobile]['expre_time'] = time()+($min*60);
        	}
    	
        	$data = [
        			'code' => $code,
        			'min' => $min
        			];
        	$sum = [
        			'mobile' => $mobile,
        			'data' => \Frame\Util\UString::json($data),
        			'source' => $source,
        			'type' => $type
        			];
        	$url = C('SERVICE_IP') . '/public/sms/';
        	$rs = \Frame\Util\HTTP::post($url, $sum);
        	$rs = json_decode($rs, true);
    	}
    	if ($rs['result']) {
    		return [
    				'result' => 1,
    				'resultMsg' => '发送成功'
    				];
    	} else {
    		return [
    				'result' => 0,
    				'resultMsg' => '发送失败'
    				];
    	}
    }

    /* 发送短信登录验证 */
    public function executeLoginsms(Application $application, Request $request)
    {
        $mobile = $request->get('mobile', '0');
        $type = $request->get('type', '0');
        $source = $request->get('source', '1');
        $min = 15; // 定义失效分钟数
        $ischeckalone = $request->get('ischeckalone', 0);
        if(DIRECTORY_SEPARATOR == '\\' ){   //  如果是windows环境，就是本机测试。
            $code = '1111';
            $_SESSION['SMS'][$mobile]['code'] = $code;
            $_SESSION['SMS'][$mobile]['expre_time'] = time()+($min*60);
        } else {
            $sourceArr = [
                '',
                'Ihuyi',
                'YunPian'
            ];
            $source = $sourceArr[$source];

            if ($ischeckalone) {
                $mobilecheckresult = LoginIn::isTheOne(DB(), 'passport_mobile', $mobile);
                if ($mobilecheckresult['result'] == 1) {
                    if (isset($_SESSION['SMS'][$mobile]) && (time() < $_SESSION['SMS'][$mobile]['expre_time'])) {
                        $code = $_SESSION['SMS'][$mobile]['code'];
                        $_SESSION['SMS'][$mobile]['expre_time'] = time()+($min*60);
                    } else {
                        $codeNumList = range(0, 9);
                        $code = implode('', array_rand($codeNumList, 4));
                        $_SESSION['SMS'][$mobile]['code'] = $code;
                        $_SESSION['SMS'][$mobile]['expre_time'] = time()+($min*60);
                    }

                    $data = [
                        'code' => $code,
                        'min' => $min
                    ];
                    $sum = [
                        'mobile' => $mobile,
                        'data' => \Frame\Util\UString::json($data),
                        'source' => $source,
                        'type' => $type
                    ];
                    $url = C('SERVICE_IP') . '/public/sms/';
                    $rs = \Frame\Util\HTTP::post($url, $sum);
                    $rs = json_decode($rs, true);

                    if ($rs['result']) {
                        return [
                            'result' => 1,
                            'resultMsg' => '发送成功'
                        ];
                    } else {
                        return [
                            'result' => 0,
                            'resultMsg' => '发送失败'
                        ];
                    }
                }else{
                    return [
                        'result' => 3,
                        'resultMsg' => '该手机号不存在，请注册'
                    ];
                }
            }
        }
        return [
            'result' => 1,
            'resultMsg' => '发送成功'
        ];
    }
    
    /**检测**/
    
    public function executeChecksms(Application $application, Request $request)
    {
    	$mobile = $request->get('mobile');
    	$code = $request->get('code');
    	return Comm::checkSMS($mobile, $code);
    }

    public function executeSmslogin(Application $application, Request $request){
        $mobile = $request->get('mobile');
        $code = $request->get("code");
        $isCheck = $request->get('isCheck')? true: false;
        $res = Comm::checkSMS($mobile,$code);
        if($res['result'] == 1){
            $where = [
                'passport_mobile' => $mobile
            ];

            $db = DB();
            $check = $db->select('passport_id,passport_password')
                        ->from('passport')
                        ->where($where)
                        ->query();
            $passportInfp = LoginIn::loginByCode($mobile,$check[0]['passport_password'],$isCheck);
            if($passportInfp){
                return [
                    'result'=> 1,
                    'desc' => '验证成功'
                ];
            }else{
                return [
                    'result' => 0,
                    'desc' => '验证失败'
                ];
            }
        }else{
            return $res;
        }
    }
    /**
     * 转发二维码dom
     * **/
    public function executeMakeqcodedom(Application $application, Request $request){
        $this->setLayout();
        $imgSrc = $request->get('imgSrc');
        $url = $request->get('url');
        $title = $request->get('title','转发需求');
        $this->url = $url;
        $this->imgSrc = $imgSrc;
        $this->title = $title;
    }
    /**
     * 返回微信的配置
     *
    public function executeGetweixinconfig(Application $application, Request $request){
        include_once JF_DIR_LIB.DIRECTORY_SEPARATOR.'FC'.DIRECTORY_SEPARATOR.'Plugin'.DIRECTORY_SEPARATOR.'jssdk.php';
        $weixinconfig = C('WeiXin');
        $jssdk = new JSSDK($weixinconfig['appId'], $weixinconfig['appSecret']);
        $signPackage = $jssdk->GetSignPackage();
        if (empty($signPackage)){
            $date = [
				'result' => 0,
				'resultMsg' => '获取配置失败'
				];
        }else {
            $date = [
            		'result' => 1,
            		'resultMsg' => [
            			'appId' => $signPackage['appId'],
            		    'nonceStr' => $signPackage['nonceStr'],
            		    'timestamp' => $signPackage['timestamp'],
            		    'signature' => $signPackage['signature']
            		]
            		];
        }
        return $date;
    } */

    /**
     * 微信上传图片处理
     * *
     */
    public function executeWeixinuploadimage(Application $application, Request $request)
    {
        $this->setLayout();
        $this->setView();
        //判断是不是需要裁剪
//         $x = $request->get('x',0);
//         $y = $request->get('y',0);
//         $height = $request->get('height',0);
//         $width = $request->get('width',0);
//         $resize = !empty($x) && !empty($y)?true:false;
        $jssdk = \FC\WeiXin::instance();
        $accessToken = $jssdk->getAccessToken();
        $serviceId = $request->get('serviceId');
        $rs = file_get_contents("http://file.api.weixin.qq.com/cgi-bin/media/get?access_token={$accessToken}&media_id={$serviceId}");
        
        $CopyPath = C('UPLOAD_DIR') . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . date('Y-m-d', time()) . DIRECTORY_SEPARATOR . 'src';
        $smallPicDir = C('UPLOAD_DIR') . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . date('Y-m-d', time());
        $name = substr(md5(microtime()), 0, 18) . ".jpeg";
        $filePathName = $CopyPath . DIRECTORY_SEPARATOR . $name;
        \Frame\Storage\Storage::put($filePathName, $rs);
        if (file_exists($filePathName)){
//             if ($resize){
//                 $cutSize = [
//                 	'x' => $x,
//                     'y' => $y,
//                     'w' => $width,
//                     'h' => $height
//                 ];
//                 upload()->cutImg($filePathName,$cutSize);
//             }
            return [
            		'result' => 1,
            		'resultMsg' => DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . date('Y-m-d', time()) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . $name,
                    'src' => C(UPLOAD_URL).DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . date('Y-m-d', time()) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . $name,
            		];
        }else {
            return [
            		'result' => 0,
            		'resultMsg' => '错误请检测'
            		];
        }

    }

    /**
     * 裁剪微信上传的图片
     */
    public function executeCutimg(Application $application, Request $request)
    {
        $this->setLayout();
        $this->setView();
        $x = $request->get('x', 0);
        $y = $request->get('y', 0);
        $height = $request->get('height', 0);
        $width = $request->get('width', 0);
        $url = $request->get('url');
        $filePathName = C('UPLOAD_DIR') . $url;
        if (empty($url)) {
            return [
                'result' => 0,
                'resultMsg' => '系统错误'
            ];
        }
        $cutSize = [
            'x' => $x,
            'y' => $y,
            'w' => $width,
            'h' => $height
        ];
        $result = upload()->cutImg($filePathName, $cutSize);
        if ($result) {
            return [
                'result' => 1,
                'resultMsg' => $url,
                'src' => C(UPLOAD_URL) . $url
            ];
        } else {
            return [
                'result' => 0,
                'resultMsg' => '系统错误'
            ];
        }
    }

    /**
     * 取消或者允许推送
     */
    public function executeSetweixinpush(Application $application, Request $request)
    {
        $demandid = $request->get('demandid');
        $id = new MongoId($demandid);
        $db = MDB();
        $res = $db->select()
            ->from('demand')
            ->where([
            '_id' => $id
        ])
            ->query();
        $res = array_values($res);
        if ($res[0]['weixin_push'] == 1) {
            $set_arr = [
                'weixin_push' => (int) 0
            ];
        } else 
            if ($res[0]['weixin_push'] == 0) {
                $set_arr = [
                    'weixin_push' => (int) 1
                ];
            }
        $return = $db->update('demand')
            ->set($set_arr)
            ->where([
            '_id' => $id
        ])
            ->query();
        if ($return){
            return [
                'result' => 1,
                'resultMsg' => '成功'
            ];
        }else {
            return [
                'result' => 0,
                'resultMsg' => '稍后再试'
            ];
        }
    }
}


















