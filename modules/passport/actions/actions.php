<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Frame\Foundation\Action;
use FC\Comm;
use FC\LoginIn;
use FC;
use Frame;
/**
 * 用户的所有动作行为
 */
class PassportActions extends Action
{

    public $passport;

    protected $passportDB;

    public function preExecute(Application $application, Request $request)
    {
        $this->passport = new \Model\Passport();
        $this->listUrl = '/passport/';
        $this->passportDB = DB();
    }

    /**
     * 官网展示登陆页面
     */
    public function executeIndex(Application $application, Request $request)
    {
        $this->setLayout();
        $this->setView('index');
        //如果当用户直接登录进来的时候 $jump 为空 ,并且session不为空的时候  直接跳转到首页
        $jump = $request->get('jump','');
        if (!empty($jump)){
            $jump = \Frame\Util\UString::base64_decode($jump);
            !empty($_SESSION['userinfo']) && $this->headerTo($jump);
             empty($_SESSION['userinfo']) && $_SESSION['weixin']['headto'] = $jump;
        }
        if (!empty($_SESSION['userinfo']) && empty($jump)){
             $this->headerTo('/');
        }
        if (empty($jump)){
            $jump = '/';
        }
        $this->jump = $request->get('jump','');
    }

    /**
     * 官网首页界面
     *
     */
    public function executeIndex1(Application $application,Request $request){
        $this->setLayout();
        $this->jump = $request->get('jump','');
    }

    /**
     * 添加新的用户 第一步快速添加
     *
     * @param Application $application            
     * @param Request $request
     *            *
     */
  /*  public function executeAddstepOne(Application $application, Request $request)
    {
        $passport_flag = $request->get("passport_flag", 0);
        $passport_email = $request->get("passport_email", "");
        $passport_mobile = $request->get("passport_mobile", 0);
        $mobileCheckCode = $request->get("mobileCheckCode", 0);
        $imgCheckcode = $request->get("imgCheckcode", 0);
        $passport_password = $request->get("passport_password", 000000);
        $passport_channel_channel = $request->get("passport_channel_channel", "");
        // 截取字符串
        if ($passport_email == "") {
            return [
                'result' => 0,
                'resultMsg' => "邮箱不能为空"
            ];
        } else {
//             $reg = '/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i';
//             if (! preg_match($reg, $passport_email)) {
//                 return [
//                     'result' => '0',
//                     'resultMsg' => '请填写正确的邮s箱'
//                 ];
//             }
        }
        if ($passport_mobile == "") {
            return [
                'result' => 0,
                'resultMsg' => "手机不能为空"
            ];
        } else {
            $reg = '/1[\d]{10}/';
            if (! preg_match($reg, $passport_mobile)) {
                return [
                    'result' => '0',
                    'resultMsg' => '请填写正确的手机号码'
                ];
            }
        }
        if ($passport_password == "") {
            return [
                'result' => '0',
                'resultMsg' => '密码不能为空'
            ];
        }
        $passport_channel_channel_length = mb_strlen($passport_channel_channel, 'utf-8');
        $passport_channel_channel = mb_substr($passport_channel_channel, 0, $passport_channel_channel_length - 1, "utf-8");
        // 检测手机号码
        // 检测图形验证码
        $CheckRes = Comm::checkCode($imgCheckcode);
        if ($CheckRes == false) {
            return [
                'result' => 0,
                'resultMsg' => "验证码错误"
            ];
        }
        // 查询是不是重复的手机和邮件
        $CheckmobileRes = LoginIn::isTheOne($this->passportDB, "passport_mobile", $passport_mobile);
        if ($CheckmobileRes['result'] == 1) {
            return [
                'result' => 0,
                'resultMsg' => "您的手机已经被注册过"
            ];
        }
        $CheckEmailRes = LoginIn::isTheOne($this->passportDB, "passport_email", $passport_email);
        if ($CheckEmailRes['result'] == 1) {
            return [
                'result' => 0,
                'resultMsg' => "您的邮件已经被注册过"
            ];
        }
        // 组合要存入 passport 的数据
        $passportArr = [
            'passport_email' => $passport_email,
            'passport_mobile' => $passport_mobile,
            'passport_password' => LoginIn::md5Pwd($passport_password),
            'passport_type' => $passport_flag,
            'passport_ctime' => date("Y-m-d H:i:s", time()),
            'passport_utime' => date("Y-m-d H:i:s", time()),
            'passport_ip' => IP(),
            'passport_status' => '1' // 默认未认证
                ];
        
        $passport_id = $this->passportDB->insert($passportArr)
            ->into("passport")
            ->query();
        // 如果passport添加成功 继续添加passport_channel 标签
        if ($passport_id > 0) {
            $_SESSION['passport_id'] = $passport_id;
            $passport_channel_Arr = [
                "passport_channel_channel" => $passport_channel_channel,
                "passport_id" => $passport_id
            ];
            $this->passportDB->insert($passport_channel_Arr)
                ->into("passport_channel")
                ->query();
            // 只要passport添加成功,就算注册成功
            return [
                'result' => 1,
                'resultMsg' => "恭喜成功加入方橙"
            ];
        } else {
            return [
                'result' => 0,
                'resultMsg' => "网络故障,请稍后再试,如有问题请与管理员联系"
            ];
        }
    }*/


    /**
     * 处理商业项目注册
     */
    /*
    public function executeCheckBusinessBasic(Application $application, Request $request)
    {
        $passport_action = $request->get('Doaction', '');
        $first_name = $request->get('first_name', "");
        $second_name = $request->get('second_name', "");
        $area_id = $request->get('area_id', "");
        $passport_company = $request->get("passport_company", "");
        $passport_job_title = $request->get("passport_job_title", "");
        $passport_id = $_SESSION['passport_id'];
        $category_ids = $request->get("category_ids", '');
        $mall_id = $request->get('mall_id', 0);
        $mall_name = $request->get('mall_name', "");
        $bussiness_area_id = $request->get('bussiness_area_id', '');
        $passport_area_area_id = $request->get('passport_area_area_id');
        $passport_job_area = $request->get('passport_area_area_id_other');
        $brand_name = $request->get('brand_name', '');
        $brand_id = $request->get('brand_id', 0);
        $brand_category_ids = $request->get('brand_category_ids', '');
        $passport_business_card = $request->get('passport_business_card', "");

        // 负责业态的处理
//         if ($passport_action != "thirdpartyReg") { // 如果是第三方 就没有 业态的处理;
//             $passportCategoryArr['category_ids'] = $category_ids;
//             $passportCategoryArr['passport_id'] = $passport_id;
//         }
        
        // passport_mall 添加数据组合
        if ($passport_action != "businessBrand") {
            $passportMallArr = [];
            foreach ($mall_name as $key => $val) {
                $passportMallArr[$key]['mall_name'] = $val;
                $passportMallArr[$key]['area_id'] = $bussiness_area_id[$key];
                $passportMallArr[$key]['mall_id'] = $mall_id[$key];
                $passportMallArr[$key]['passport_id'] = $passport_id;
            }
        }
        // passport 添加数据组合
        $passportArr = [
            'passport_first_name' => $first_name,
            'passport_last_name' => $second_name,
            'passport_name' => $first_name.$second_name,
            'area_id' => $area_id,
            'passport_company' => $passport_company,
            'passport_job_title' => $passport_job_title,
            'passport_business_card' => $passport_business_card,
        ];
        if ($passport_action != "thirdpartyReg") {
            $passportArr['category_ids'] = $category_ids;
        }
        // 如过action等于businessBuild 说明是为总部招商 区别就是添加了负责的区域
        if ($passport_action == 'businessBuild' || $passport_action == 'businessBrand') {
            // 组合数据添加至passport_area表
            $passportAreaArr = [];
            foreach ($passport_area_area_id as $key => $val) {
                $passportAreaArr[$key]['area_id'] = $val;
                $passportAreaArr[$key]['passport_id'] = $passport_id;
            }
            $passportArr['passport_job_area'] = $passport_job_area;
        }
        
        // 如果是品牌添加 组合passport_brand 数据库
        if ($passport_action == "businessBrand" || $passport_action == "thirdpartyReg") {
            $passportBrandArr = [];
            foreach ($brand_name as $key => $val) {
                $passportBrandArr[$key]['brand_name'] = $val;
                $passportBrandArr[$key]['brand_id'] = $brand_id[$key];
                $passportBrandArr[$key]['category_ids'] = $brand_category_ids[$key];
                $passportBrandArr[$key]['passport_id'] = $passport_id;
            }
            
            if ($brand_name != "" && $brand_name != array()) {
                $passportBrand = new \Model\Passport\Brand();
                $passportBrandRes = $passportBrand->add($passportBrandArr);
            }
        }
        
//         $passportRes = $this->passportDB->update('passport')
//             ->set($passportArr)
//             ->where('passport_id = ?', $passport_id)
//             ->query();
        $passportRes = $this->passport->setId($passport_id)->edit($passportArr);
        if ($passportRes) {
//             if ($passport_action != "thirdpartyReg") {
//                 $passportCategoryRes = $this->passportDB->insert($passportCategoryArr)
//                     ->into('passport_category')
//                     ->query();
//             }
            if ($passport_action != "businessBrand") {
                $passportMallRes = $this->passportDB->insert($passportMallArr)
                    ->into('passport_mall')
                    ->query();
            }
            // 如过action等于businessBuild 说明是为总部招商 添加地区表
            if ($passport_action == 'businessBuild' || $passport_action == 'businessBrand') {
                $passportAreaRes = $this->passportDB->insert($passportAreaArr)
                    ->into('passport_area')
                    ->query();
            }
            return [
                'result' => 1,
                "resultMsg" => "详细信息添加成功"
            ];
            unset($_SESSION['passport_id']);
        } else {
            return [
                'result' => 0,
                "resultMsg" => "详细信息添加失败"
            ];
        }
    }*/

    /**
     * businessBuild
     * 总部招商注册
     */
    /*
    public function executeBusinessbuild(Application $application, Request $request)
    {
        $this->setView('businessBuild');
    }*/

    /**
     * 登陆
     */
    public function executeLogin(Application $application, Request $request)
    {
        $username = $request->get('username', '');
        $password = $request->get('password', '');
        $checkme = $request->get('checkme', 0);
        $jump = $request->get('jump',''); //看看需不需要跳转
        if (empty($username) || empty($password)) {
            return [
                'result' => '0',
                'resultMsg' => "信息填写不完整"
            ];
        }
        $loginType = strpos($username, '@');
        if ($loginType === false) {
            $passportArr = $this->passportDB->select([
                'passport_password',
                'passport_id',
                'passport_first_name',
                'passport_last_name',
                'passport_name',
                'passport_job_title',
                'passport_type',
                'passport_company',
                'passport_status',
                'passport_flag',
                'passport_picture',
                'area_id',
                'passport_weixin_open_id'
            ])
                ->from('passport')
                ->where("passport_mobile = ?", trim($username))
                ->query();
        } else {
            $passportArr = $this->passportDB->select([
                'passport_password',
                'passport_id',
                'passport_first_name',
                'passport_last_name',
                'passport_name',
                'passport_job_title',
                'passport_type',
                'passport_company',
                'passport_status',
                'passport_flag',
                'passport_picture',
                'area_id',
                'passport_weixin_open_id'
            ])
                ->from('passport')
                ->where("passport_email = ?", trim($username))
                ->query();
        }
        if ($passportArr != []) {
            $formatPwd = LoginIn::md5Pwd($password);
            if ($formatPwd == $passportArr[0]['passport_password']) {
                // 记录cookie（）
                if ($checkme == 1) {
                    $cookieHandler = cookie();
                    $cookieHandler->set("loginInfo", [
                        'passport_id' => $passportArr[0]['passport_id'],
                        'passport_password' => $passportArr[0]['passport_password']],
                        time()+365*24*3600);
                }else {
                    $cookieHandler = cookie();
                    $cookieHandler->set('loginInfo', [
                        'passport_id' => $passportArr[0]['passport_id'],
                        'passport_password' => $passportArr[0]['passport_password']],
                        time()-3600*24*360
                    );
                }
//                 $cookieHandler = cookie();
//                 $cookieHandler->set("loginInfo", [
//                     'passport_id' => $passportArr[0]['passport_id'],
//                     'passport_name' => $passportArr[0]['passport_name'],
//                     'isRemeberPwd' => $checkme == 1 ? 1 : 0
//                 ]);
                // 记录SESSION
                $sessionArr['passport_id'] = $passportArr[0]['passport_id'];
                $sessionArr['passport_first_name'] = $passportArr[0]['passport_first_name'];
                $sessionArr['passport_last_name'] = $passportArr[0]['passport_last_name'];
                $sessionArr['passport_name'] = $passportArr[0]['passport_name'];
                $sessionArr['passport_job_title'] = $passportArr[0]['passport_job_title'];
                $sessionArr['passport_type'] = $passportArr[0]['passport_type'];
                $sessionArr['passport_company'] = $passportArr[0]['passport_company'];
                $sessionArr['passport_status'] = $passportArr[0]['passport_status'];
                $sessionArr['passport_status'] = $passportArr[0]['passport_status'];
                $sessionArr['passport_flag'] = $passportArr[0]['passport_flag'];
                $sessionArr['passport_picture'] = $passportArr[0]['passport_picture'];
                $sessionArr['area_id'] = $passportArr[0]['area_id'];
                $sessionArr['passport_weixin_open_id'] = $passportArr[0]['passport_weixin_open_id'];
                \FC\Session::setUserSession($sessionArr);
                // 记录登陆记录
                $logLoginArr = [
                    'log_login_ctime' => date("Y-m-d H:i:s", time()),
                    'passport_id' => $passportArr[0]['passport_id'],
                    'log_login_ip' => IP()
                ];
                
                /**添加微信的操作
                 * 
                 * */

                if (empty($passportArr[0]['passport_weixin_open_id'])){
                        $this->setopenidintable($passportArr[0]['passport_id']);
                }
                $this->passportDB->insert($logLoginArr)
                    ->into('log_login')
                    ->query();
//                 unset($_SESSION['weixin']['headto']);
                    return [
                    		'result' => '1',
                    		'resultMsg' => "登录成功"
                    		];
            } else {
                return [
                    'result' => '0',
                    'resultMsg' => "您输入的账号或者密码错误"
                ];
            }
        } else {
            return [
                'result' => '0',
                'resultMsg' => "您输入的账号或者密码错误"
            ];
        }
    }

    /**
     * 忘记密码
     */
    public function executeForget(Application $application, Request $request)
    {
        $this->setLayout('passwdlayout');
        $this->setView('forget');
        $this->jump = $request->get('jump');
    }

    /**
     * 根据手机号码验证发送短信验证码
     *
     * @param
     *            int mobile 手机号码
     * @param
     *            int img_code 手机验证码
     */
    public function executeMobilegetpasswd(Application $application, Request $request)
    {
        $this->setLayout('passwdlayout');
        $this->setView('mobilegetpasswd');
        $mobile = $request->get('mobile', '');
        $img_code = $request->get('img_code', '');
        $jump = $request->get('jump');
        if (empty($mobile) || empty($img_code)) {
            return [
                'result' => '0',
                'resultMsg' => '数据不完整'
            ];
        }
        $reg = '/1[\d]{10}/';
        if (! preg_match($reg, $mobile)) {
            return [
                'result' => '0',
                'resultMsg' => '请填写正确的手机号码'
            ];
        }
        $CheckRes = Comm::checkCode($img_code);
        if ($CheckRes == false) {
            return [
                'result' => 0,
                'resultMsg' => "验证码错误"
            ];
        }
        $psres = $this->passportDB->select('count(1) as count')
            ->from("passport")
            ->where('passport_mobile = ?', $mobile)
            ->query();
        // 发送短信验证码
        if ($psres[0]['count'] == 0) {
            return [
                'result' => 0,
                'resultMsg' => "您的手机没有注册"
            ];
        }
//         sendNumSMS($mobile, 10);
        $_SESSION['check']['mobile'] = $mobile;
        $this->mobile = $mobile;
        $this->jump = $jump;
    }

    /**
     * 验证短信验证码,更新数据库
     */
    public function executeSetnewpwd(Application $application, Request $request)
    {
        $code = $request->get('code', '');
        $password = $request->get('password', '');
        $mobile = $request->get('mobile');
        $jump = $request->get('jump');
        if (empty($code) || empty($password || empty($mobile))) {
            return [
                'result' => '0',
                'resultMsg' => '数据不完整'
            ];
        }
        $passwordLength = mb_strlen($password, 'utf-8');
        if ($passwordLength < 6 || $passwordLength > 16) {
            return [
                'result' => 0,
                'resultMsg' => '密码必须在6-16位之间'
            ];
        }
        /**检测短信验证码**/
        $mobilecheck = Comm::checkSMS($mobile, $code,1);
        if ($mobilecheck['result'] == 0 ){
        	return $mobilecheck;
        }
        $passport_password = LoginIn::md5Pwd($password);
        $date = [
            'passport_password' => $passport_password
        ];
        $userPwd = $this->passportDB->select('passport_password')
            ->from('passport')
            ->where('passport_mobile = ?', $mobile)
            ->query();
        $res = $this->passportDB->update('passport')
            ->set($date)
            ->where('passport_mobile = ?', $mobile)
            ->query();
        
        if ($res || ($userPwd[0]['passport_password'] == $passport_password)) {
            session_destroy();
            $this->setLayout('passwdlayout');
            $this->setView('endpasswd');
            $jump = empty($jump)?'/passport/loginjump/':'/passport/loginjump/jump/'.$jump;
            $this->jump = $jump;
        } else {
            return [
                'result' => 0,
                'resultMsg' => '密码修改失败'
            ];
        }
    }
    /**三期重构以后写的  20150507***/
    /**
     * 商业体项目招商注册  passport_type = 2;
     * 
     * */
    public function executeBusinessregitem(Application $application, Request $request){
        $this->setLayout('registerLayout');
        $this->setView('businessregbrand');
        if (!empty($_SESSION['userinfo']['passport_id'])){
            $this->headerTo('/');
        }
    }

    /**
     */
    public function executeDobusinessregitem(Application $application, Request $request)
    {
        $this->setLayout();
        $passport_email = $request->get('passport_email');
        $passport_password = $request->get('passport_password');
        $passport_mobile = $request->get('passport_mobile');
        $imageCode = $request->get('imageCode');
        $mobileCode = $request->get('mobileCode');
        $passport_channel_channel = $request->get('passport_channel_channel');
        $passport_first_name = $request->get('passport_first_name');
        $passport_last_name = $request->get('passport_last_name');
        $passport_sex = $request->get('passport_sex');
        $area_id = $request->get('area_id');
        $passport_company = $request->get('passport_company');
        $passport_job_title = $request->get('passport_job_title');
        $category_ids = $request->get('category_ids');
        $passport_business_card = $request->get('passport_business_card');
        $mall_name = $request->get('mall_name');
        $mall_id = $request->get('mall_id');
        $bussiness_area_id = $request->get('bussiness_area_id');
        $passport_job_area = $request->get('passport_area_area_id_other');
        $passport_type = $request->get('passport_type');
        $passport_area_area_id = $request->get('passport_area_area_id');
        $category_ids_other = $request->get('category_ids_other');
        $status = $request->get('status');
        $passport_area_area_id = explode(',', $passport_area_area_id);
         empty($passport_email) &&  exit(json_encode( ['result' => 0,'resultMsg' => "邮箱不能为空"]));
         empty($passport_password) &&  exit(json_encode( ['result' => 0,'resultMsg' => "密码不能为空"]));
         empty($passport_mobile) &&  exit(json_encode( ['result' => 0,'resultMsg' => "手机不能为空"]));
         empty($imageCode) &&  exit(json_encode( ['result' => 0,'resultMsg' => "图形验证码不能为空"]));
         empty($passport_first_name) &&  exit(json_encode( ['result' => 0,'resultMsg' => "姓名信息不完整"]));
         empty($passport_last_name) &&  exit(json_encode( ['result' => 0,'resultMsg' => "姓名信息不完整"]));
         empty($passport_sex) &&  exit(json_encode( ['result' => 0,'resultMsg' => "性别不能为空"]));
         empty($area_id) &&  exit(json_encode( ['result' => 0,'resultMsg' => "城市为空"]));
         empty($passport_company) &&  exit(json_encode( ['result' => 0,'resultMsg' => "公司名称不能为空"]));
         empty($passport_job_title) &&  exit(json_encode( ['result' => 0,'resultMsg' => "职位不能为空"]));
         empty($category_ids) && empty($category_ids_other) && exit(json_encode( ['result' => 0,'resultMsg' => "负责的业态不能为空"]));
         if ($_SESSION['userinfo']['passport_type'] == 3){ //商业体总部招商 
             empty($bussiness_area_id) && empty($passport_job_area) && exit(json_encode( ['result' => 0,'resultMsg' => "负责的区域不能为空"]));
         }
        
        /**
         * channel数组
         */
        foreach ($passport_channel_channel as $key => $val) {
            if ($val == '0') {
                unset($passport_channel_channel[$key]);
            }
        }
        $channelStr = implode($passport_channel_channel, ',');
        /**
         * 验证
         */
        if ($passport_email == "") {
            return [
                'result' => 0,
                'resultMsg' => "邮箱不能为空"
            ];
        } else {
//             $reg = '/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i';
//             if (! preg_match($reg, $passport_email)) {
//                 return [
//                     'result' => '0',
//                     'resultMsg' => '请填写正确的邮箱'
//                 ];
//             }
        }
        if ($passport_mobile == "") {
            return [
                'result' => 0,
                'resultMsg' => "手机不能为空"
            ];
        } else {
            $reg = '/1[\d]{10}/';
            if (! preg_match($reg, $passport_mobile)) {
                return [
                    'result' => '0',
                    'resultMsg' => '请填写正确的手机号码'
                ];
            }
        }
        if ($passport_password == "") {
            return [
                'result' => '0',
                'resultMsg' => '密码不能为空'
            ];
        }
        // 检测手机号码
        // 检测图形验证码
        $CheckRes = Comm::checkCode($imageCode);
        if ($CheckRes == false) {
            return [
                'result' => 0,
                'resultMsg' => "验证码错误"
            ];
        }

        // 查询是不是重复的手机和邮件
        $CheckmobileRes = LoginIn::isTheOne($this->passportDB, "passport_mobile", $passport_mobile);
        if ($CheckmobileRes['result'] == 1) {
            return [
                'result' => 0,
                'resultMsg' => "您的手机已经被注册过"
            ];
        }
        $CheckEmailRes = LoginIn::isTheOne($this->passportDB, "passport_email", $passport_email);
        if ($CheckEmailRes['result'] == 1) {
            return [
                'result' => 0,
                'resultMsg' => "您的邮件已经被注册过"
            ];
        }
        /**手机验证*/
        if ($status != -2){
            $mobilecheck = Comm::checkSMS($passport_mobile, $mobileCode,1);
            if ($mobilecheck['result'] == 0 ){
            	return $mobilecheck;
            }
        }
        /**
         */
        $passportArr = [
            'passport_first_name' => $passport_first_name,
            'passport_last_name' => $passport_last_name,
            'passport_name' => $passport_first_name . $passport_last_name,
            'passport_sex' => $passport_sex,
            'passport_ctime' => date("Y-m-d H:i:s", time()),
            'passport_utime' => date("Y-m-d H:i:s", time()),
            'passport_email' => $passport_email,
            'passport_mobile' => $passport_mobile,
            'passport_password' => LoginIn::md5Pwd($passport_password),
            'passport_business_card' => $passport_business_card,
            'passport_job_title' => $passport_job_title,
            'passport_ip' => IP(),
            'passport_company' => $passport_company,
            'category_ids' => $category_ids,
            'passport_status' => $status,
            'area_id' => $area_id,
            'passport_job_area'=>$passport_job_area,
            'passport_type' =>$passport_type,
            'category_ids_other' => $category_ids_other
        ];
        $channelArr = [
            'passport_channel_channel' => $channelStr
        ];
        foreach ($mall_name as $key => $val) {
            $mallArr[$key] = [
                'mall_id' => $mall_id[$key],
                'mall_name' => $mall_name[$key],
                'area_id' => $bussiness_area_id[$key],
                'passport_mall_ctime' => date('Y-m-d H:i:s',time())
            ];
        }
        $this->passportDB->beginTransaction();
        $passport_id = $this->passportDB->insert($passportArr)
            ->into('passport')
            ->query();
        if ($passport_type == 3) {
            $passportAreaArr = [];
            foreach ($passport_area_area_id as $key => $val) {
                if (!empty($val)){
                $passportAreaArr[$key]['area_id'] = $val;
                $passportAreaArr[$key]['passport_id'] = $passport_id;
                }
            }
            if (!empty($passportAreaArr)){
                $areares = $this->passportDB->insert($passportAreaArr)
                    ->into('passport_area')
                    ->query();
            }else {
                $areares = 1;
            }
        }
        $channelArr['passport_id'] = $passport_id;
        foreach ($mallArr as $key => $val) {
            $mallArr[$key]['passport_id'] = $passport_id;
        }
        $resChannel = $this->passportDB->insert($channelArr)
            ->into('passport_channel')
            ->query();
        $resMall = $this->passportDB->insert($mallArr)
            ->into('passport_mall')
            ->query();
        if ($passport_id  && $resMall) {
            if ($passport_type == 3){
                if ($areares){
                    
                }else {
                    $this->passportDB->rollback();
                    return [
                    		'result' => 0,
                    		'resultMsg' => "注册失败"
                    		];
                }
            }
            $this->passportDB->commit();
            $sessionArr['passport_id'] = $passport_id;
            $sessionArr['passport_first_name'] = $passport_first_name;
            $sessionArr['passport_last_name'] = $passport_last_name;
            $sessionArr['passport_name'] = $passport_first_name.$passport_last_name;
            $sessionArr['passport_job_title'] = $passport_job_title;
            $sessionArr['passport_type'] = $passport_type;
            $sessionArr['passport_company'] = $passport_company;
            $sessionArr['passport_status'] = 1;
            \FC\Session::setUserSession($sessionArr);    
            //添加微信
            $this->setopenidintable($passport_id);
//             unset($_SESSION['weixin']['headto']);
            return [
                'result' => 1,
                'resultMsg' => "注册成功"
            ];
        } else {
            $this->passportDB->rollback();
            return [
                'result' => 0,
                'resultMsg' => "注册失败"
            ];
        }
    }
    
    /**
     * 商业体总部招商 passport_type = 3
     * */
    public function executeBusinessregzb(Application $application, Request $request){
        $this->setLayout('registerlayout');
        $this->setView('businessregzb');
        if (!empty($_SESSION['userinfo']['passport_id'])){
        	$this->headerTo('/');
        }
    }
    /**
     * 品牌注册
     * **/
    public function executeBrandreg(Application $application, Request $request){
        $this->setLayout('registerLayout');
        $this->setView('brandReg');
        if (!empty($_SESSION['userinfo']['passport_id'])){
        	$this->headerTo('/');
        }
    }

    public function executeDobrandreg(Application $application, Request $request)
    {
        $passport_email = $request->get('passport_email');
        $passport_password = $request->get('passport_password');
        $passport_mobile = $request->get('passport_mobile');
        $imageCode = $request->get('imageCode');
        $passport_channel_channel = $request->get('passport_channel_channel');
        $passport_first_name = $request->get('passport_first_name');
        $passport_last_name = $request->get('passport_last_name');
        $passport_sex = $request->get('passport_sex');
        $area_id = $request->get('area_id');
        $passport_company = $request->get('passport_company');
        $passport_job_title = $request->get('passport_job_title');
        $passport_area_area_id = $request->get('passport_area_area_id');
        $passport_job_area = $request->get('passport_area_area_id_other');
        $passport_business_card = $request->get('passport_business_card');
        $brand_id = $request->get('brand_id');
        $brand_name = $request->get('brand_name');
        $brand_category_ids = $request->get('brand_category_ids');
        $brand_category_ids_other = $request->get('brand_category_ids_other');
        $passport_type = $request->get('passport_type');
        $mobileCode  = $request->get('mobileCode');
        $status = $request->get('status');
        /**判断数据是不是完整*/         
        empty($passport_email) &&  exit(json_encode( ['result' => 0,'resultMsg' => "邮箱不能为空"]));
        empty($passport_password) &&  exit(json_encode( ['result' => 0,'resultMsg' => "密码不能为空"]));
        empty($passport_mobile) &&  exit(json_encode( ['result' => 0,'resultMsg' => "手机号码不能为空"]));
        empty($imageCode) &&  exit(json_encode( ['result' => 0,'resultMsg' => "图形验证码不能为空"]));
        empty($passport_first_name) &&  exit(json_encode( ['result' => 0,'resultMsg' => "名字信息不完整"]));
        empty($passport_last_name) &&  exit(json_encode( ['result' => 0,'resultMsg' => "名字信息不完整"]));
        empty($area_id) &&  exit(json_encode( ['result' => 0,'resultMsg' => "地区不能为空"]));
        empty($passport_company) &&  exit(json_encode( ['result' => 0,'resultMsg' => "公司不能为空"]));
        empty($passport_job_title) &&  exit(json_encode( ['result' => 0,'resultMsg' => "职位不能为空"]));
        empty($passport_area_area_id) && empty($passport_job_area) &&  exit(json_encode( ['result' => 0,'resultMsg' => "负责地区不能为空"]));
        $passport_area_area_id = explode(',', $passport_area_area_id);
        foreach ($brand_name as $key => $val){
            empty($val) && exit(json_encode( ['result' => 0,'resultMsg' => "品牌名称不能为空"]));
            empty($brand_category_ids[$key]) && empty($brand_category_ids_other) && exit(json_encode( ['result' => 0,'resultMsg' => "业态必填"]));
        }
        
        /**
         * channel数组
         */
        foreach ($passport_channel_channel as $key => $val) {
            if ($val == '0') {
                unset($passport_channel_channel[$key]);
            }
        }
        $channelStr = implode($passport_channel_channel, ',');
        /**
         * 验证
         */
        if ($passport_email == "") {
            return [
                'result' => 0,
                'resultMsg' => "邮箱不能为空"
            ];
        } else {
//             $reg = '/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i';
//             if (! preg_match($reg, $passport_email)) {
//                 return [
//                     'result' => '0',
//                     'resultMsg' => '请填写正确的邮箱'
//                 ];
//             }
        }
        if ($passport_mobile == "") {
            return [
                'result' => 0,
                'resultMsg' => "手机不能为空"
            ];
        } else {
            $reg = '/1[\d]{10}/';
            if (! preg_match($reg, $passport_mobile)) {
                return [
                    'result' => '0',
                    'resultMsg' => '请填写正确的手机号码'
                ];
            }
        }
        if ($passport_password == "") {
            return [
                'result' => '0',
                'resultMsg' => '密码不能为空'
            ];
        }
        // 检测手机号码
        // 检测图形验证码
        $CheckRes = Comm::checkCode($imageCode);
        if ($CheckRes == false) {
            return [
                'result' => 0,
                'resultMsg' => "验证码错误"
            ];
        }
        // 查询是不是重复的手机和邮件
        $CheckmobileRes = LoginIn::isTheOne($this->passportDB, "passport_mobile", $passport_mobile);
        if ($CheckmobileRes['result'] == 1) {
            return [
                'result' => 0,
                'resultMsg' => "您的手机已经被注册过"
            ];
        }
        $CheckEmailRes = LoginIn::isTheOne($this->passportDB, "passport_email", $passport_email);
        if ($CheckEmailRes['result'] == 1) {
            return [
                'result' => 0,
                'resultMsg' => "您的邮件已经被注册过"
            ];
        }
        /**手机验证*/
        if ($status != -2){
            $mobilecheck = Comm::checkSMS($passport_mobile, $mobileCode,1);
            if ($mobilecheck['result'] == 0 ){
            	return $mobilecheck;
            }
        }
        $passportArr = [
            'passport_first_name' => $passport_first_name,
            'passport_last_name' => $passport_last_name,
            'passport_name' => $passport_first_name . $passport_last_name,
            'passport_sex' => $passport_sex,
            'passport_ctime' => date("Y-m-d H:i:s", time()),
            'passport_utime' => date("Y-m-d H:i:s", time()),
            'passport_email' => $passport_email,
            'passport_mobile' => $passport_mobile,
            'passport_password' => LoginIn::md5Pwd($passport_password),
            'passport_business_card' => $passport_business_card,
            'passport_job_title' => $passport_job_title,
            'passport_ip' => IP(),
            'passport_company' => $passport_company,
            'passport_status' => $status,
            'area_id' => $area_id,
            'passport_job_area' => $passport_job_area,
            'passport_type' => $passport_type
        ];
        $channelArr = [
            'passport_channel_channel' => $channelStr
        ];

        $this->passportDB->beginTransaction();
        $passportRes = $this->passportDB->insert($passportArr)
            ->into('passport')
            ->query();
        $channelArr['passport_id'] = $passportRes;
        $channelres = $this->passportDB->insert($channelArr)
            ->into('passport_channel')
            ->query();
        foreach ($brand_name as $key => $val) {
            $brandArr[$key]['brand_name'] = $val;
            $brandArr[$key]['brand_id'] = $brand_id[$key];
            $brandArr[$key]['category_ids'] = $brand_category_ids[$key];
            $brandArr[$key]['category_ids_other'] = $brand_category_ids_other[$key];
            $brandArr[$key]['passport_id'] = $passportRes;
            $brandArr[$key]['passport_brand_ctime'] = date('Y-m-d H:i:s',time());
        }
        
        $brandRes = $this->passportDB->insert($brandArr)
            ->into('passport_brand')
            ->query();
        foreach ($passport_area_area_id as $key => $val) {
            if ($val != ''){
                $areaArr[$key]['area_id'] = $val;
                $areaArr[$key]['passport_id'] = $passportRes;
            }
        }
        if (!empty($areaArr)){
            $areaRes = $this->passportDB->insert($areaArr)
                ->into('passport_area')
                ->query();
        }else {
            $areaRes = 1;
        }
        if ($passportRes  && $brandRes && $areaRes) {
           $this->passportDB->commit();         
           $sessionArr['passport_id'] = $passportRes;
           $sessionArr['passport_first_name'] = $passport_first_name;
           $sessionArr['passport_last_name'] = $passport_last_name;
           $sessionArr['passport_name'] = $passport_first_name.$passport_last_name;
           $sessionArr['passport_job_title'] = $passport_job_title;
           $sessionArr['passport_type'] = $passport_type;
           $sessionArr['passport_company'] = $passport_company;
           $sessionArr['passport_status'] = 1;
           \FC\Session::setUserSession($sessionArr);
           //添加微信
           $this->setopenidintable($passportRes);
//            unset($_SESSION['weixin']['headto']);
            return [
                'result' => 1,
                'resultMsg' => "注册成功"
            ];

        } else {
            $this->passportDB->rollback();
            return [
                'result' => 0,
                'resultMsg' => "注册失败"
            ];
        }
    }
    
    /**
     * 第三方
     * */
    public function executeOtherreg(Application $application, Request $request){
        $this->setLayout('registerLayout');
        if (!empty($_SESSION['userinfo']['passport_id'])){
        	$this->headerTo('/');
        }
    }

    public function executeDootherreg(Application $application, Request $request)
    {
        $passport_email = $request->get('passport_email');
        $passport_password = $request->get('passport_password');
        $passport_mobile = $request->get('passport_mobile');
        $imageCode = $request->get('imageCode');
        $mobileCode = $request->get('mobileCode');
//         $imageCode = $request->get('imageCode');
        $passport_channel_channel = $request->get('passport_channel_channel');
        $passport_first_name = $request->get('passport_first_name');
        $passport_last_name = $request->get('passport_last_name');
        $passport_sex = $request->get('passport_sex');
        $area_id = $request->get('area_id');
        $passport_company = $request->get('passport_company');
        $passport_job_title = $request->get('passport_job_title');
        $passport_business_card = $request->get('passport_business_card');
        $passport_type = $request->get('passport_type');
        $mall_name = $request->get('mall_name');
        $mall_id = $request->get('mall_id');
        $bussiness_area_id = $request->get('bussiness_area_id');
        $brand_id = $request->get('brand_id');
        $brand_name = $request->get('brand_name');
        $brand_category_ids = $request->get('brand_category_ids');
        $brand_category_ids_other = $request->get('brand_category_ids_other');
        $status = $request->get('status');
        empty($passport_email) &&  exit(json_encode( ['result' => 0,'resultMsg' => "邮箱不能为空"]));
        empty($passport_password) &&  exit(json_encode( ['result' => 0,'resultMsg' => "密码不能为空"]));
        empty($passport_mobile) &&  exit(json_encode( ['result' => 0,'resultMsg' => "手机不能为空"]));
        empty($imageCode) &&  exit(json_encode( ['result' => 0,'resultMsg' => "图形验证码不能为空"]));
        empty($passport_first_name) &&  exit(json_encode( ['result' => 0,'resultMsg' => "姓名信息不完整"]));
        empty($passport_last_name) &&  exit(json_encode( ['result' => 0,'resultMsg' => "姓名信息不完整"]));
        empty($passport_sex) &&  exit(json_encode( ['result' => 0,'resultMsg' => "性别不能为空"]));
        empty($area_id) &&  exit(json_encode( ['result' => 0,'resultMsg' => "所在城市不能为空"]));
        empty($passport_company) &&  exit(json_encode( ['result' => 0,'resultMsg' => "公司不能为空"]));
        empty($passport_job_title) &&  exit(json_encode( ['result' => 0,'resultMsg' => "职位不能为空"]));
        empty($passport_type) &&  exit(json_encode( ['result' => 0,'resultMsg' => "角色不能为空"]));
        empty($mall_name) && empty($brand_name) &&  exit(json_encode( ['result' => 0,'resultMsg' => "请填写你负责的项目"]));
        if (!empty($mall_name)){
            foreach ($mall_name as $key=>$val){
                empty($val) && exit(json_encode( ['result' => 0,'resultMsg' => "您负责的商业体信息不完整"]));
                empty($bussiness_area_id[$key]) && exit(json_encode( ['result' => 0,'resultMsg' => "您负责的商业体信息不完整"]));
            }
        }
        if (!empty($brand_name)){
            foreach ($brand_name as $key=>$val){
                empty($val) && exit(json_encode( ['result' => 0,'resultMsg' => "您负责的品牌信息不完整1"]));
                empty($brand_category_ids[$key]) && empty($brand_category_ids_other[$key]) && exit(json_encode( ['result' => 0,'resultMsg' => "您负责的品牌信息不完整2"]));
            }
        }
        /**
         * channel数组
         */
        foreach ($passport_channel_channel as $key => $val) {
            if ($val == '0') {
                unset($passport_channel_channel[$key]);
            }
        }
        $channelStr = implode($passport_channel_channel, ',');
        /**
         * 验证
         */
        if ($passport_email == "") {
        	return [
        			'result' => 0,
        			'resultMsg' => "邮箱不能为空"
        			];
        } else {
//         	$reg = '/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i';
//         	if (! preg_match($reg, $passport_email)) {
//         		return [
//         				'result' => '0',
//         				'resultMsg' => '请填写正确的邮s箱'
//         				];
//         	}
        }
        if ($passport_mobile == "") {
        	return [
        			'result' => 0,
        			'resultMsg' => "手机不能为空"
        			];
        } else {
        	$reg = '/1[\d]{10}/';
        	if (! preg_match($reg, $passport_mobile)) {
        		return [
        				'result' => '0',
        				'resultMsg' => '请填写正确的手机号码'
        				];
        	}
        }
        if ($passport_password == "") {
        	return [
        			'result' => '0',
        			'resultMsg' => '密码不能为空'
        			];
        }
        // 检测手机号码
        // 检测图形验证码
        $CheckRes = Comm::checkCode($imageCode);
        if ($CheckRes == false) {
        	return [
        			'result' => 0,
        			'resultMsg' => "验证码错误"
        			];
        }
        // 查询是不是重复的手机和邮件
        $CheckmobileRes = LoginIn::isTheOne($this->passportDB, "passport_mobile", $passport_mobile);
        if ($CheckmobileRes['result'] == 1) {
        	return [
        			'result' => 0,
        			'resultMsg' => "您的手机已经被注册过"
        			];
        }
        $CheckEmailRes = LoginIn::isTheOne($this->passportDB, "passport_email", $passport_email);
        if ($CheckEmailRes['result'] == 1) {
        	return [
        			'result' => 0,
        			'resultMsg' => "您的邮件已经被注册过"
        			];
        }
        /*手机验证码**/
        if ($status != -2 ){
            $mobilecheck = Comm::checkSMS($passport_mobile, $mobileCode,1);
            if ($mobilecheck['result'] == 0 ){
            	return $mobilecheck;
            }
        }
        $passportArr = [
            'passport_first_name' => $passport_first_name,
            'passport_last_name' => $passport_last_name,
            'passport_name' => $passport_first_name . $passport_last_name,
            'passport_sex' => $passport_sex,
            'passport_ctime' => date("Y-m-d H:i:s", time()),
            'passport_utime' => date("Y-m-d H:i:s", time()),
            'passport_email' => $passport_email,
            'passport_mobile' => $passport_mobile,
            'passport_password' => LoginIn::md5Pwd($passport_password),
            'passport_business_card' => $passport_business_card,
            'passport_job_title' => $passport_job_title,
            'passport_ip' => IP(),
            'passport_company' => $passport_company,
            'passport_status' => $status,
            'area_id' => $area_id,
            'passport_type' => $passport_type
        ];
        $this->passportDB->beginTransaction();
        $passport_id = $this->passportDB->insert($passportArr)
            ->into('passport')
            ->query();
        if ($passport_id) {
            if (! empty($mall_name)) {
                foreach ($mall_name as $key => $val) {
                    $mallArr[$key] = [
                        'mall_id' => $mall_id[$key],
                        'mall_name' => $mall_name[$key],
                        'area_id' => $bussiness_area_id[$key],
                        'passport_id' => $passport_id,
                        'passport_mall_ctime' => date("Y-m-d H:i:s",time())
                    ];
                }
                $mall_res = $this->passportDB->insert($mallArr)
                    ->into('passport_mall')
                    ->query();
                if ($mall_res) {} else {
                    $this->passportDB->rollback();
                    return [
                        'result' => 0,
                        'resultMsg' => "注册失败1"
                    ];
                }
            }
            
            if (! empty($brand_name)) {
                foreach ($brand_name as $key => $val) {
                    $brandArr[$key]['brand_name'] = $val;
                    $brandArr[$key]['brand_id'] = $brand_id[$key];
                    $brandArr[$key]['category_ids'] = $brand_category_ids[$key];
                    $brandArr[$key]['category_ids_other'] = $brand_category_ids_other[$key];
                    $brandArr[$key]['passport_id'] = $passport_id;
                    $brandArr[$key]['passport_brand_ctime'] = date("Y-m-d H:i:s",time());
                }
                $Brand_res = $this->passportDB->insert($brandArr)
                    ->into('passport_brand')
                    ->query();
                if ($Brand_res) {} else {
                    $this->passportDB->rollback();
                    return [
                        'result' => 0,
                        'resultMsg' => "注册失败2"
                    ];
                }
            }
            
            $channelArr = [
                'passport_channel_channel' => $channelStr,
                'passport_id' => $passport_id
            ];
            $channel_res = $this->passportDB->insert($channelArr)
                ->into('passport_channel')
                ->query();
            $this->passportDB->commit();
            $sessionArr['passport_id'] = $passport_id;
            $sessionArr['passport_first_name'] = $passport_first_name;
            $sessionArr['passport_last_name'] = $passport_last_name;
            $sessionArr['passport_name'] = $passport_first_name.$passport_last_name;
            $sessionArr['passport_job_title'] = $passport_job_title;
            $sessionArr['passport_type'] = $passport_type;
            $sessionArr['passport_company'] = $passport_company;
            $sessionArr['passport_status'] = 1;
            \FC\Session::setUserSession($sessionArr);
            //添加微信
            $this->setopenidintable($passport_id);
//             unset($_SESSION['weixin']['headto']);
            return [
                'result' => 1,
                'resultMsg' => "注册成功4"
            ];
        } else {
            $this->passportDB->rollback();
            return [
                'result' => 0,
                'resultMsg' => "注册失败5"
            ];
        }
    }
    /**三期重构以后写的  20150507***/

    
    /**
     * 退出登录
     * */
    public function executeLoginout(Application $application, Request $request){
        $result = session_destroy();
        unset($_SESSION['userinfo']);
        $c= cookie();
        $c->set('loginInfo', [],time()-10000);
        if ($result) {
        	$this->headerTo('/');
        } else {
            return [
                'result' => 0,
                'resultMsg' => '退出失败'
            ];
        }
    }
    /**
     * 加入我们
     * */
    public function executeJoinus(Application $application, Request $request){
        $this->setLayout();
        $this->jump = Frame\Util\UString::base64_encode('/passport/joinus');
    }
    
    /**
     * 认证不通过页面
     * @param Application $application
     * @param Request $request
     */
    public function executeNopass(Application $application, Request $request)
    {
        $this->setView('Nopass');
    	$this->setLayout();
    }
    
    
    private function returnjsstr($str){
        $str = <<<ABC
<script type="text/javascript">
  commonUtilInstance.dosubmit($str)
</script>   
ABC;
    return $str;
    }
    
    private function setopenidintable($passport_id){
        $cookieHandler = cookie();
        $weixinopenid  = $cookieHandler->get('weixinopenid');
        if (!empty($weixinopenid['openid'])){
        	$this->passportDB->update('passport')
        	->set(['passport_weixin_open_id'=>$weixinopenid['openid']])
        	->where(['passport_id'=>$passport_id])
        	->query();
        	$_SESSION['userinfo']['passport_weixin_open_id'] = $weixinopenid['openid'];
        }
    }
}