<?php

use Frame\Foundation\Application;
use Frame\Http\Request;
use Frame\Foundation\Action;


/**
 * 悬赏详情
 *
 */
class shareAction extends Action
{
    public function preExecute(Application $application, Request $request)
    {
    }

    /**
     * 悬赏 --申请参加悬赏
     * 
     * @param Application $application            
     * @param Request $request            
     */
    public function executeApplykc(Application $application, Request $request)
    {
        $this->setLayout();
        $trim_email = $request->get('passport_email');
        $request->set('passport_email', trim($trim_email));
        $register_type = $request->get("register_type");
        if($register_type == 1){
            ($passport_mobile = $request->get('passport_mobile')) || exit(json_encode([
                'result' => 0,
                'resultMsg' => '数据不完整'
            ]));
            ($passport_type = $request->get('passport_type')) || exit(json_encode([
                'result' => 0,
                'resultMsg' => '数据不完整'
            ]));
            ($imgcode = $request->get('mobileCode')) || exit(json_encode([
                'result' => 0,
                'resultMsg' => '请输入手机验证码'
            ]));
        }else{
            ($passport_mobile = $request->get('passport_mobile')) || exit(json_encode([
                'result' => 0,
                'resultMsg' => '数据不完整'
            ]));
            ($passport_password = $request->get('passport_password')) || exit(json_encode([
                'result' => 0,
                'resultMsg' => '数据不完整'
            ]));
            ($passport_type = $request->get('passport_type')) || exit(json_encode([
                'result' => 0,
                'resultMsg' => '数据不完整'
            ]));
            ($passport_first_name = $request->get('passport_first_name')) || exit(json_encode([
                'result' => 0,
                'resultMsg' => '数据不完整'
            ]));
            ($passport_last_name = $request->get('passport_last_name')) || exit(json_encode([
                'result' => 0,
                'resultMsg' => '数据不完整'
            ]));
            ($area_id = $request->get('area_id')) || exit(json_encode([
                'result' => 0,
                'resultMsg' => '数据不完整'
            ]));
            ($passport_company = $request->get('passport_company')) || exit(json_encode([
                'result' => 0,
                'resultMsg' => '数据不完整'
            ]));
            ($passport_job_title = $request->get('passport_job_title')) || exit(json_encode([
                'result' => 0,
                'resultMsg' => '数据不完整'
            ]));
            ($passport_email = $request->get('passport_email')) || exit(json_encode([
                'result' => 0,
                'resultMsg' => '数据不完整'
            ]));
            ($imgcode = $request->get('mobileCode')) || exit(json_encode([
                'result' => 0,
                'resultMsg' => '请输入手机验证码'
            ]));
        }
        $jumpUrl = $request->get('jumpUrl');
        // 校验图形验证码
        $imgcoderes = Comm::checkSMS($passport_mobile, $imgcode,true);
        if ($imgcoderes['result'] == 0) {
            return [
                'result' => 0,
                'resultMsg' => '手机验证码无效或已过期'
            ];
        }
        // 校验手机个邮箱的格式
        $email_reg = '/^([a-zA-Z0-9_\-\.\+]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/';
        $mobile_reg = '/^0{0,1}1[3|4|5|6|7|8|9][0-9]{9}$/';
        $passport_email_res = preg_match($email_reg, $passport_email);
        $passport_mobile_res = preg_match($mobile_reg, $passport_mobile);
        $passport_email_res || exit(json_encode([
            'result' => 0,
            'resultMsg' => '邮箱格式不正确1'
        ]));
        $passport_mobile_res || exit(json_encode([
            'result' => 0,
            'resultMsg' => '手机格式不正确2'
        ]));
        // 组合数据
        $passport_add_arr = [
            'passport_mobile' => $passport_mobile,
            'passport_password' => LoginIn::md5Pwd($passport_password),
            'passport_type' => $passport_type,
            'passport_first_name' => $passport_first_name,
            'passport_last_name' => $passport_last_name,
            'passport_name' => $passport_first_name . $passport_last_name,
            'area_id' => $area_id,
            'passport_company' => $passport_company,
            'passport_job_title' => $passport_job_title,
            'passport_email' => $passport_email,
            'passport_ctime' => date("Y-m-d H:i:s", time()),
            'passport_utime' => date("Y-m-d H:i:s", time()),
            'passport_ip' => IP(),
        ];
        $passport_db = new \Model\Passport();
        $passport_res = $passport_db->insert($passport_add_arr)
            ->into('passport')
            ->query();
        if ($passport_res > 0) {
            $passport = FC\LoginIn::login($passport_mobile, $passport_password);
            $this->setLayout();
            $this->setView();
            FC\Session::initSession();
            $resutn = FC\Cs::addCsPassportApply($request);
			$resitn = FC\Cs::addCsPassportApply($request);
			$resutn = FC\Cs::addCsPassportApply($request);
			$passport = FC\Cs::initSession();
			foreach($passport as $key =>$val){
				$resutn1 = $val['brand_name'];
				$resutn1 = $val['brand_id'];
				$resutn1 = $va['passport_id'];
				$resutn1 = $val['start_time];
				$resunt1 = $val[''];
			}
            return $resutn;
            return [
                'result' => 1,
                'resultMsg' => '注册成功',
                'data' => json_encode(
                    ['passport_id' => $passport[0]['passsport_id']]
                )
            ];
        }else {
            return [
                'result' => 0,
                'resultMsg' => '注册失败'
            ];
        }
    }
    

}