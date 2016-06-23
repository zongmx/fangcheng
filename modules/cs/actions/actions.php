<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Frame\Foundation\Action;

/**
 * 用户的所有动作行为
 */
use FC;
use FC\Comm;
use Frame\Dao\Model;


/**
 * 用户的所有动作行为
 */
class CsActions extends Action
{

    public $demand;

    public $demandDb;

    public $passport_id;

    public function preExecute(Application $application, Request $request)
    {

//        $this->cs = new \Model\demand();
        $this->listUrl = '/cs/';
        $this->demandDb = DB();
        $this->passport_id = $_SESSION['userinfo']['passport_id'];

    }

    /**
     * 品牌发布需求
     */
    public function executeCsneed(Application $application, Request $request)
    {
        $this->setLayout('registerLayout');
        FC\Session::initSession();

        // 获得当前人要展示的信息
        $this->setView('csneed');
        $this->resultArray = [];
        $this->resultArray['passport_name'] = $_SESSION['userinfo']['passport_name'];
        $this->resultArray['passport_job_title'] = $_SESSION['userinfo']['passport_job_title'];
        $this->resultArray['passport_status'] = $_SESSION['userinfo']['passport_status'];
        $this->resultArray['passport_type'] = $_SESSION['userinfo']['passport_type'];
        $this->resultArray['passport_picture'] =  C('UPLOAD_URL') . $_SESSION['userinfo']['passport_picture'];

        $this->resultArray['csType'] = $request->get('type', '') == 'cs' ? 1 : 0;
        $csType = $request->get('type', '') ;
        $this->resultArray['csTypeUrl'] = $csType == 'cs' ? "?type=cs" : '' ;
        if ($_SESSION['userinfo']['passport_type'] == 2 || $_SESSION['userinfo']['passport_type'] == 3){
            //$this->headerTo('/cs/Csneed' . $this->resultArray['csTypeUrl']);
        }
        $this->demand_id = $request->get("csid",'');
        $this->showModel = 'cs';
    }

    /**
     * 品牌发布需求
     */
    public function executeCsinvite(Application $application, Request $request)
    {
        $this->setLayout('registerLayout');
        FC\Session::initSession();

        // 获得当前人要展示的信息
        $this->setView('csinvite');
        $this->resultArray = [];
        $this->resultArray['passport_name'] = $_SESSION['userinfo']['passport_name'];
        $this->resultArray['passport_job_title'] = $_SESSION['userinfo']['passport_job_title'];
        $this->resultArray['passport_status'] = $_SESSION['userinfo']['passport_status'];
        $this->resultArray['passport_type'] = $_SESSION['userinfo']['passport_type'];
        $this->resultArray['passport_picture'] =  C('UPLOAD_URL') . $_SESSION['userinfo']['passport_picture'];

        $this->resultArray['csType'] = $request->get('type', '') == 'cs' ? 1 : 0;
        $csType = $request->get('type', '') ;
        $this->resultArray['csTypeUrl'] = $csType == 'cs' ? "?type=cs" : '' ;
        if ($_SESSION['userinfo']['passport_type'] == 2 || $_SESSION['userinfo']['passport_type'] == 3){
            //$this->headerTo('/cs/Csneed' . $this->resultArray['csTypeUrl']);
        }
        $this->demand_id = $request->get('demand_id','');
        if(empty($this->demand_id)){
           $this->headerTo('/error/404');
        }
        $this->demand_type = $request->get('demand_type',1);
        $this->showModel = 'cs';
    }


    /**
     * 品牌发布需求
     */
    public function executeCsneeds(Application $application, Request $request)
    {
        $this->setLayout('registerLayout');
        FC\Session::initSession();

        // 获得当前人要展示的信息
        $this->setView('csneed');
        $this->resultArray = [];
        $this->resultArray['passport_name'] = $_SESSION['userinfo']['passport_name'];
        $this->resultArray['passport_job_title'] = $_SESSION['userinfo']['passport_job_title'];
        $this->resultArray['passport_status'] = $_SESSION['userinfo']['passport_status'];
        $this->resultArray['passport_type'] = $_SESSION['userinfo']['passport_type'];
        $this->resultArray['passport_picture'] =  C('UPLOAD_URL') . $_SESSION['userinfo']['passport_picture'];

        $this->resultArray['csType'] = $request->get('type', '') == 'cs' ? 1 : 0;
        $csType = $request->get('type', '') ;
        $this->resultArray['csTypeUrl'] = $csType == 'cs' ? "?type=cs" : '' ;
        if ($_SESSION['userinfo']['passport_type'] == 2 || $_SESSION['userinfo']['passport_type'] == 3){
            //$this->headerTo('/cs/Csneed' . $this->resultArray['csTypeUrl']);
        }
        $this->showModel = 'cs';
    }

    /**
     * 商业体发布需求
     */
    public function executeBusinessneed(Application $application, Request $request)
    {
        $this->setLayout('registerLayout');
        FC\Session::initSession();

        if ($_SESSION['userinfo']['passport_type'] == 2 ) {
            $db = DB();
            $select = [
                'mall_id',
                'mall_name',
                'area_id'
            ];
            $where = [
                'passport_id' => $_SESSION['userinfo']['passport_id'],
                'passport_mall_status' => 1
            ];
            $result = $db->select($select)
                ->from('passport_mall')
                ->where($where)
                ->limit(1)
                ->query();
        }

        $this->setView('businessneed');
        $this->resultArray = [];
        $this->resultArray['passport_name'] = $_SESSION['userinfo']['passport_name'];
        $this->resultArray['passport_job_title'] = $_SESSION['userinfo']['passport_job_title'];
        $this->resultArray['passport_status'] = $_SESSION['userinfo']['passport_status'];
        $this->resultArray['passport_type'] = $_SESSION['userinfo']['passport_type'];
        $this->resultArray['passport_picture'] =  C('UPLOAD_URL') . $_SESSION['userinfo']['passport_picture'];
        $this->resultArray['mallinfo'] = $result[0];
        $this->resultArray['csType'] = $request->get('type', '') == 'cs' ? 1 : 0;
        $csType = $request->get('type', '') ;
        $this->resultArray['csTypeUrl'] = $csType == 'cs' ? "?type=cs" : '' ;

        if ($_SESSION['userinfo']['passport_type'] == 1) {
//             $this->headerTo('/demand/brandneed' . $this->resultArray['csTypeUrl']);
        }

        $this->showModel = 'cs';

    }

    /**
     * 后台处理品牌数据
     */
    public function executeDodemand(Application $application, Request $request)
    {
        FC\Session::initSession();
        // 获得是什么身份提交的数据

        $submittype = $request->get('submittype', '');
        // 获得demand数据库的数据
        $brand_name = $request->get('brand_name', '');
        $brand_id = $request->get('brand_id', 0);
        $area_id = $request->get('area_id', 0);
        $demand_desc = $request->get('demand_desc', '');
        $allow_moible = $request->get('allow_mobile',0);
        $yx_mall = $request->get('yx_mall');
        $yx_mall = $request->get('yx_mall');
        $yx_mall_id = $request->get('yx_mall_id');
//         $demand_expiry_at = $request->get('demand_expiry_at', '');
        $category_ids = $request->get('category_ids', '');
        $category_ids_other = $request->get('category_ids_other', '');
        $imgcode = $request->get('imgcode', '');
//         $demand_type = $request->get('demand_type', '');
        $demand_type = 1;
        empty($brand_name) && exit(json_encode(['result'=>0,"resultMsg"=>'品牌名称为空']));
        empty($category_ids) && empty($category_ids_other) && exit(json_encode(['result'=>0,"resultMsg"=>'业态为空']));
        empty($area_id) &&  exit(json_encode(['result'=>0,"resultMsg"=>'城市为空']));
        empty($request->get('group_36')) &&  exit(json_encode(['result'=>0,"resultMsg"=>'首选物业为空']));
//         $shopsize = $request->get('group_41');
//         empty($shopsize['lower']) &&  exit(json_encode(['result'=>0,"resultMsg"=>'店铺面积填写不完整']));
//         empty($shopsize['upper']) &&  exit(json_encode(['result'=>0,"resultMsg"=>'店铺面积填写不完整']));
//         empty($request->get('group_116')) && exit(json_encode(['result'=>0,"resultMsg"=>'店铺类型为空']));
        empty($request->get('group_46')) && exit(json_encode(['result'=>0,"
            resultMsg"=>'店铺规格为空']));
//         empty($request->get('demand_expiry_at')) && exit(json_encode(['result'=>0,"resultMsg"=>'截止日期为空']));

        $CheckRes = Comm::checkCode($imgcode);
        if ($CheckRes == false) {
            return [
                'result' => 0,
                'resultMsg' => "验证码错误"
            ];
        }
        if ($_SESSION['userinfo']['passport_status'] == 2){
            $demand_status_var = 2;
        }else {
            $demand_status_var = 1;
        }
        $pics = $request->get('pics');
        if (! empty($pics)) {
            foreach ($pics as $key => $val) {
                $picArr[] = [
                    'type' => 2,
                    'name' => '品牌图片',
                    'path' => $val
                ];
            }
        }
        //检测是否有此项目,没有的话添加
        /* $brand = new \Model\Passport\Brand();
        if($brand_id)
        {
        	$brandwhere['brand_id'] = $brand_id;
        }elseif(!$brand_id && $brand_name)
        {
        	$brandwhere['brand_name'] = $brand_name;
        }
        $brandwhere['passport_id'] = $_SESSION['userinfo']['passport_id'];
        $brandresult = $brand->select('passport_brand_id, passport_brand_status')->where($brandwhere)->query();
        if(!$brandresult[0])
        {
        	$arr = array(
        		'passport_id' => $_SESSION['userinfo']['passport_id'],
        	    'brand_id' => $brand_id,
        	    'brand_name' => $brand_name,
        	    'category_ids' => $category_ids,
        	);
        	$brand->add($arr);
        }elseif($brandresult[0]['passport_brand_id'] && !$brandresult[0]['passport_brand_status'])
        {
            $setarr = array('passport_brand_status' => 1 );
        	$brand->update()->set($setarr)->where('passport_brand_id = ?', $brandresult[0]['passport_brand_id'])->query();
        } */


        $demandArr = [
            'demand_ctime' => date("Y-m-d H:i:s", time()),
            'demand_utime' => date("Y-m-d H:i:s", time()),
//             'demand_expiry_at' => str_replace('/', '-', $demand_expiry_at),
            'passport_id' => (int) $this->passport_id,
            'brand_id' => (int) $brand_id,
            'brand_name' => $brand_name,
            'category_ids' => $this->changeStrToArray($category_ids),
            'category_ids_other' => $category_ids_other,
            'area_id' => \FC\Comm::toInt($area_id, true),
            'demand_desc' => $demand_desc,
            'demand_show_mobile' => 1, // 在不在需求中间显示手机号码
            'demand_level' => 1,
            'demand_status' => (int) $demand_status_var, //状态：2已认证|1未认证|0删除
            'demand_type' => (int) $demand_type,
            'passport_type' => (int) $_SESSION['userinfo']['passport_type'],
            'passport_company' => $_SESSION['userinfo']['passport_company'],
            'allow_moible'=> (int) $allow_moible,
            'weixin_push'=> (int) 1,
            'file' => $picArr,
            'yx_mall' => $yx_mall,
            'yx_mall_id' => $yx_mall_id
        ];
        //组织悬赏需求数据
        if ($request->get('ispay') == 1){
            $pay = $request->get('pay');
            $pay_date = $request->get('pay_date');
            if (empty($pay) || is_int($pay)){
                return [
                    'result' => 0,
                    'resultMsg' => "请填写悬赏预算"
                ];
            }
            if (empty($pay_date)){
                return [
                    'result' => 0,
                    'resultMsg' => "请填写悬赏截止日期"
                ];
            }
            $cs = [
                'expire_at' => $pay_date,
                'passport_bank_id' => '',//充值个人银行卡ID
                'money_task' => 0,//任务赏金
                'money_traffic' => 0,//车马费
                'money_traffic_pre' => 0,//每次车马费多少钱
                'money_traffic_num_has' => 0,//还剩下多少个车马费名额
                'money_traffic_num' => 0,//前多少名可以获得车马费
                'money_traffic_used' => 0,
                'money_commission' => 0, //平台佣金
                'money_total' => $pay*100, //总计
                'result' => 1,
                'pay_status' => 0,
                'pay_info' => '', //付款说明公示
                'passport_id_win' => 0,
                'reason' => '',
                'status' => 0,
    	        'status_extend' => 0,
            ];
            $demandArr['cs'] = $cs;
            $demandArr['demand_status'] = 0;
        }
        $requestinfo = $request->get();
        $multiply= ['group_41','group_40']; //需要加倍的ID
        foreach ($requestinfo as $key => $val) {
            if (strpos($key, 'group') === 0) {
                if (in_array($key, $multiply)){
                    $demandArr['tag'][$key] = $this->changeStrToArray($val,1);
                }else {
                    $demandArr['tag'][$key] = $this->changeStrToArray($val);
                }

            }
        }
        $db = MDB();
        $result = $db->insert($demandArr)
            ->into('demand')
            ->query();
        if ($result) {
            //添加新需求队列--给数据团队
            \FC\Demand::addQueue($demandArr, $result, $this->passport_id);
//             发送短信与微信
            //1 获得关注本品牌的人
            $demandUser = new FC\Demand();
            $returnPidArr = $demandUser->getAttentionUserList(['brand_id'=>$brand_id]);
            if (!empty($returnPidArr)){
                $passport_db = new \Model\Passport();
                foreach ($returnPidArr as $key => $val){
                    if ($val['passport_id'] != $_SESSION['userinfo']['passport_id']){
                        $CheckRes_wei_sms = new  FC\WeiXin();
                        $check_return = $CheckRes_wei_sms->checkIsSendAttentionMsg($val['passport_id'],['brand_id'=>$brand_id]);
                        if ($check_return['weixin']) {
                            // 发送微信
                            $json_weixin_content = [
                                'first' => [
                                    'value' => '您关注的项目发布了新的需求'
                                ],
                                'keyword1' => [
                                    'value' => $brand_name
                                ],
                                'keyword2' => [
                                    'value' => '品牌'
                                ],
                                'keyword3' => [
                                    'value' => $_SESSION['userinfo']['passport_name']
                                ],
                                'keyword4' => [
                                    'value' => date("Y年m月d日 H:i", time())
                                ],
                                'keyword5' => [
                                    'value' => $demand_desc
                                ],
                                'remark' => [
                                    'value' => '为了防止骚扰，每天最多向您推送3条新需求通知。'
                                ]
                            ];
                            //查询openId
                            $logweixincontent = [
                                'log_weixin_ctime' => date("Y-m-d H:i:s",time()),
                                'passport_id' => $val['passport_id'],
                                'passport_weixin_open_id' => $demandUser->getOpenId($val['passport_id']),
                                'log_weixin_type' => 5,
                                'log_weixin_url' => C('WEB_URL').'/ucenter/demandshow/demandid/'.$result,
                                'log_weixin_content' => json_encode($json_weixin_content),
                                'log_weixin_status' => 1
                            ];
                            $log_weixin_db = new \Model\Log\Weixin();
                            $log_weixin_db->add($logweixincontent); //添加微信类容
                        }
                        if ($check_return['sms']){
                            // 发送短信 记录短信log
                            $passport_res_a = $passport_db->select()->from('passport')->where(['passport_id'=>$val['passport_id']])->query();
                            $passport_res = $passport_res_a[0];
                            //添加需求短信开关  2015/11/02 leiy
                            if ($passport_res['passport_msg_push_demand'] == 1){
                                $is_send = false;
                                $is_send = SendSMS($passport_res['passport_mobile'], 7, ['project'=>$brand_name], 1);
                                if (! $is_send) {
                                    $is_send = SendSMS($passport_res['passport_mobile'], 7, ['project'=>$brand_name], 2);
                                }
                                if ($is_send) {
                                    // 记录短信发送
                                    $smsArgs = array(
                                        'log_sms_ctime' => date('Y-m-d H:i:s'),
                                        'passport_id' => $val['passport_id'],
                                        'passport_id_sender' => '',
                                        'log_sms_to_mobile' => $passport_res['passport_mobile'],
                                        'log_sms_type' => 7,
                                        'log_sms_content' => \Frame\Util\UString::json(['brand_id'=>$brand_id])
                                    );
                                    $smsObj = new \Model\Log\Sms();
                                    $smsObj->add($smsArgs);
                                }
                            }
                        }
                    }
                }
            }

//             //计算匹配条数
//             if (!empty($category_ids)){
//                 $args['category_ids'] = $this->changeStrToArray($category_ids);
//             }
//             $args['area_id'] = \FC\Comm::toInt($area_id);
//             $args['demand_type'] = (int) 2;
            $countMatch = \FC\Demand::searchDemandNum($result);
            return [
                'result' => 1,
                'resultMsg' => $result,
                'count' => $countMatch
            ];
        } else {
            return [
                'result' => 0,
                'resultMsg' => "需求添加失败"
            ];
        }
    }

    /**
     * 商业体招商需求
     */
    public function executeDobusinessdemand(Application $application, Request $request)
    {
        FC\Session::initSession();
        $mall_name = $request->get('mall_name', '');
        $mall_id = $request->get('mall_id', 0);
        $area_id = $request->get('area_id', 0);
        $category_ids = $request->get('category_ids', '');
        $category_ids_other = $request->get('category_ids_other', '');
        $demand_desc = $request->get('demand_desc', '');
        $demand_shop_type = $request->get('demand_shop_type', '');
        $allow_moible = $request->get('allow_moible',0);
//         2016/2/25新添加的两个字段
        $mall_address = $request->get('mall_address');
        $yx_brand = $request->get('yx_brand');
        $yx_brand_id = $request->get('yx_brand_id');
        $pics = $request->get('pics');
        if (! empty($pics)) {
            foreach ($pics as $key => $val) {
                $picArr[] = [
                    'type' => 1,
                    'name' => '商铺图片',
                    'path' => $val
                ];
            }
        }
        if (empty($area_id) && !empty($mall_id)){
            $url = C("SERVICE_IP").'/info/mall/id/'.$mall_id;
            $mall_result = file_get_contents($url);
            $mall_result = json_decode($mall_result,true);
            $area_id = $mall_result['info']['area_id'];
        }

//         $demand_type = $request->get('demand_type'); //需求的类型  1：品牌拓展需求 2：商业体招商需求
        $demand_type = 2;
        $imgcode = $request->get('imgcode');
        $demand_shop_type = explode(',', $demand_shop_type);
        foreach ($demand_shop_type as $key=>$val){
            $demand_shop_type[$key] = (int) $val;
        }
        empty($mall_name) && exit(json_encode(['result'=>0,"resultMsg"=>'商业体为空']));
        empty($category_ids) && empty($category_ids_other) && exit(json_encode(['result'=>0,"resultMsg"=>'业态为空']));
//         isset($request->get('group_126')) && exit(json_encode());
        $size = $request->get('group_126');
        if (!isset($size['lower']) || !isset($size['upper'])){
            return ['result'=>0,"resultMsg"=>'面积为空'];
        }
        empty($request->get('demand_shop_type')) && exit(json_encode(['result'=>0,"resultMsg"=>'招商类型为空']));
        $CheckRes = Comm::checkCode($imgcode);
        if ($CheckRes == false) {
            return [
                'result' => 0,
                'resultMsg' => "验证码错误"
            ];
        }
        if ($_SESSION['userinfo']['passport_status'] == 2){
            $demand_status_var = 2;
        }else {
            $demand_status_var = 1;
        }

        //检查是否自己负责的项目，不是的话添加
        /* $mall = new \Model\Passport\Mall();
        if($mall_id)
        {
        	$mallwhere['mall_id'] = $mall_id;
        }elseif(!$mall_id && $mall_name)
        {
        	$mallwhere['mall_name'] = $mall_name;
        }
        $mallwhere['passport_id'] = $_SESSION['userinfo']['passport_id'];
        $mallresult = $mall->select('passport_mall_id, passport_mall_status')->where($mallwhere)->query();
        if(!$mallresult[0])
        {
        	$arr = array(
        		'passport_id' => $_SESSION['userinfo']['passport_id'],
        	    'mall_id' => $mall_id,
        	    'mall_name' => $mall_name,
        	    'area_id' => $area_id,
        	    'category_ids' => $category_ids,
        	);
        	$mall->add($arr);
        }elseif($mallresult[0]['passport_mall_id'] && !$mallresult[0]['passport_mall_status'])
        {
            $setarr = array('passport_mall_status'=>1);
        	$mall->update()->set($setarr)->where('passport_mall_id = ?', $mallresult[0]['passport_mall_id'])->query();
        } */



        // 组合demand表的插入 数据
        $demandArr = [
            'demand_ctime' => date("Y-m-d H:i:s", time()),
            'demand_utime' => date("Y-m-d H:i:s", time()),
            'passport_id' => (int) $this->passport_id,
            'mall_id' => (int) $mall_id,
            'mall_name' => $mall_name,
            'area_id' => [intval($area_id)],
            'demand_desc' => $demand_desc,
            'demand_show_mobile' => 1, // 在不在需求中间显示手机号码
            'demand_level' => 1,
            'demand_status' => (int) $demand_status_var,
            'category_ids' => $this->changeStrToArray($category_ids),
            'category_ids_other' => $category_ids_other,
            'demand_shop_type'=> $demand_shop_type,
            'demand_type' => (int) $demand_type,
            'passport_type' => (int) $_SESSION['userinfo']['passport_type'],
            'passport_company' => $_SESSION['userinfo']['passport_company'],
            'allow_moible' => (int) $allow_moible,
            'weixin_push'=> (int) 1,
            'mall_address' => $mall_address,
            'yx_brand_name' => $yx_brand,
            'yx_brand_id' => $yx_brand_id,
            'file' => $picArr
        ];

        //组织悬赏需求数据
        if ($request->get('ispay') == 1){
            $pay = $request->get('pay');
            $pay_date = $request->get('pay_date');
            if (empty($pay) || is_int($pay)){
                return [
                    'result' => 0,
                    'resultMsg' => "请填写悬赏预算"
                ];
            }
            if (empty($pay_date)){
                return [
                    'result' => 0,
                    'resultMsg' => "请填写悬赏截止日期"
                ];
            }
            $cs = [
                'expire_at' => $pay_date,
                'passport_bank_id' => '',//充值个人银行卡ID
                'money_task' => 0,//任务赏金
                'money_traffic' => 0,//车马费总计多少
                'money_traffic_pre' => 0,//每次车马费多少钱
                'money_traffic_num_has' => 0,//还剩多少个名额
                'money_traffic_num' => 0,//前多少名可以获得车马费
                'money_traffic_used' => 0,
                'money_commission' => 0, //平台佣金
                'money_total' => $pay*100, //总计
                'result' => 1,
                'pay_status' => 0,
                'pay_info' => '', //付款说明公示
                'passport_id_win' => 0,
                'reason' => '',
                'status' => 0,
                'status_extend' => 0,
            ];
            $demandArr['cs'] = $cs;
            $demandArr['demand_status'] = 0;
        }
        $requestinfo = $request->get();
        foreach ($requestinfo as $key => $val) {
            if (strpos($key, 'group') === 0) {
                if ($key == 'group_126'){
                    $demandArr['tag'][$key] = $this->changeStrToArray($val,1);
                }else {
                    $demandArr['tag'][$key] = $this->changeStrToArray($val);
                }

            }
        }
        $db = MDB();
        $result = $db->insert($demandArr)
            ->into('demand')
            ->query();
        if ($result) {
            //添加新需求队列--给数据团队
            \FC\Demand::addQueue($demandArr, $result, $this->passport_id);
            //             发送短信与微信
            //1 获得关注本品牌的人
            $demandUser = new FC\Demand();
            $returnPidArr = $demandUser->getAttentionUserList(['mall_id'=>$mall_id]);
            if (!empty($returnPidArr)){
                $passport_db = new \Model\Passport();
                foreach ($returnPidArr as $key => $val){
                    if ($val['passport_id'] != $_SESSION['userinfo']['passport_id']){
                        $CheckRes_wei_sms = new  FC\WeiXin();
                        $check_return = $CheckRes_wei_sms->checkIsSendAttentionMsg($val['passport_id'],['mall_id'=>$mall_id]);
                        if ($check_return['weixin']) {
                            // 发送微信
                            $json_weixin_content = [
                                'first' => [
                                    'value' => '您关注的项目发布了新的需求'
                                ],
                                'keyword1' => [
                                    'value' => $mall_name
                                ],
                                'keyword2' => [
                                    'value' => '商业体'
                                ],
                                'keyword3' => [
                                    'value' => $_SESSION['userinfo']['passport_name']
                                ],
                                'keyword4' => [
                                    'value' => date("Y年m月d日 H:i", time())
                                ],
                                'keyword5' => [
                                    'value' => $demand_desc
                                ],
                                'remark' => [
                                    'value' => '为了防止骚扰，每天最多向您推送3条新需求通知。'
                                ]
                            ];
                            //查询openId
                            $logweixincontent = [
                                'log_weixin_ctime' => date("Y-m-d H:i:s",time()),
                                'passport_id' => $val['passport_id'],
                                'passport_weixin_open_id' => $demandUser->getOpenId($val['passport_id']),
                                'log_weixin_type' => 5,
                                'log_weixin_url' => C('WEB_URL').'/ucenter/demandshow/demandid/'.$result,
                                'log_weixin_content' => json_encode($json_weixin_content),
                                'log_weixin_status' => 1
                            ];
                            $log_weixin_db = new \Model\Log\Weixin();
                            $log_weixin_db->add($logweixincontent); //添加微信类容
                        }
                        if ($check_return['sms']){
                            // 发送短信 记录短信log
                            $passport_res_a = $passport_db->select()->from('passport')->where(['passport_id'=>$val['passport_id']])->query();
                            $passport_res = $passport_res_a[0];
                            //添加需求短信开关  2015/11/02 leiy
                            if ($passport_res['passport_msg_push_demand'] == 1){
                                $is_send = false;
                                $is_send = SendSMS($passport_res['passport_mobile'], 7, ['project'=>$mall_name], 1);
                                if (! $is_send) {
                                    $is_send = SendSMS($passport_res['passport_mobile'], 7, ['project'=>$mall_name], 2);
                                }
                                if ($is_send) {
                                    // 记录短信发送
                                    $smsArgs = array(
                                        'log_sms_ctime' => date('Y-m-d H:i:s'),
                                        'passport_id' => $val['passport_id'],
                                        'passport_id_sender' => '',
                                        'log_sms_to_mobile' => $passport_res['passport_mobile'],
                                        'log_sms_type' => 7,
                                        'log_sms_content' => \Frame\Util\UString::json(['mall_id'=>$mall_id])
                                    );
                                    $smsObj = new \Model\Log\Sms();
                                    $smsObj->add($smsArgs);
                                }
                            }
                        }
                    }
                }
            }

//             //计算匹配条数
//             if (!empty($category_ids)){
//             	$args['category_ids'] = $this->changeStrToArray($category_ids);
//             }
//             $args['area_id'] = $this->changeStrToArray($area_id);
//             $args['demand_type'] = (int) 1;
            $countMatch = \FC\Demand::searchDemandNum($result);
            return [
                'result' => 1,
                'resultMsg' => $result,
                'count' => $countMatch
            ];
        } else {
            return [
                'result' => 0,
                'resultMsg' => "需求添加失败"
            ];
        }
    }

    /**
     * 拓展需求详情页
     */
    public function executeShowbranddemand(Application $application, Request $request)
    {
        $demand_id = $request->get('demand_id', '');
        $result = $this->demandDb->select()
            ->from('demand')
            ->where("demand_id = ?", $demand_id)
            ->query();
        __dd($result);
    }
    /*
     * 转换成熟组的值都是int类型
    * @param $string String 字符串或者数组 只支持一维数组
    * @return $array array
    * */
    private function changeStrToArray($string,$double=0){
//         $multiply= ['group_41','group_40','group_42',];MULTIPLY_DOUBLE
        if (is_array($string)){
            foreach ($string as $key => $val){
                if ($double){
                    $val = sprintf("%.2f",$val);
                    $middle = $val*C('MULTIPLY_DOUBLE');
                    $return[$key] = (int)$middle;
                }else {
                    $return[$key] = (int)$val;
                }
            }
        }else {
            $StrArr = explode(',', $string);
            if (count($StrArr) >= 1){
                foreach ($StrArr as $key=>$val){
                    if ($double){
                        $val = sprintf("%.2f",$val);
                        $middle = $val*C('MULTIPLY_DOUBLE');
                        $return[] = (int) $middle;
                    }else {
                        $return[] = (int) $val;
                    }

                }
            }else {
                if ($double){
                    $string = sprintf("%.2f",$string);
                    $middle = $val*C('MULTIPLY_DOUBLE');
                    return (int) $middle;
                }else {
                    return (int) $string;
                }

            }
        }

        return $return;
    }

    public function executeGetuserstatus(Application $application,Request $request){
        FC\Session::initSession();
        $demand_id = $request->get('demand_id','');
        if(empty($demand_id)){
            return ['result'=>0,'msg'=>''];
        }
        $passport_id = $_SESSION['userinfo']['passport_id'];
        $cs = new \FC\Cs($demand_id);
        $demand_type = $cs->getLoginUserType($passport_id,$demand_id);
        if($demand_type == 4){
            $resutn = FC\Cs::addCspassport($request);
            if($resutn['result'] == 0){
                return $resutn;
            }
        }
        return ['result'=>1,'msg'=>$demand_type ];
    }

}