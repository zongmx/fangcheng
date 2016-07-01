<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Frame\Foundation\Action;
use \FC\Comm;
use \FC\LoginIn;


/**
 * 用户的所有动作行为
 *
 */
class PassportAction extends Action
{
	/**
	 * 登录跳转页面
	 * 
	 * @param Application $application        	
	 * @param Request $request        	
	 */
	public function executeFastloginjump(Application $application, Request $request)
	{
	    $this->jump = $request->get('jump', '');
	    $user = FC\LoginIn::isLogin();
	    if (!empty($user['passport_id'])){
	        $this->headerTo('/');
	    }
		$mobile = $request->get('passport_mobile');
		$code = $request->get("mobileCode");
		$isCheck = $request->get('isCheck')? true: false;
		$res = Comm::checkSMS($mobile,$code);
//		var_dump($res);
//		exit();
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
					'result' => 1,
					'resultMsg' => '验证成功'
				];
			}else{
				return [
					'result' => 0,
					'resultMsg' => '验证失败'
				];
			}
		}else{
			return $res;
		}
	}
}