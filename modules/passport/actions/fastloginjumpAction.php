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
		$mall_id = $request->get('isCheck');
		$brand_id = $request->get('brand_id');
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
				// 验证登录
				$passport = \FC\LoginIn::login($mobile, $check[0]['passport_password'],$isCheck);
				$passport_mobile = \FC\LoginIn::isLogin();
				if($passport_mobile == 1){
					$this->headerTo('/');
				}

				$where = [
					'deamnd_id' =>  $request->get('demand_id',1)
				];
				$mgb = \FC\Dynamic\Distribution1::$mdb;
				$result = $mgb->select()
					->where($where)
					->from('cs_passport')
					->query();
				if(empty($passport->id)){
					// 验证失败
					$url = Comm::makeJumpUrl($this->jump, '/passport/loginjump');
					$url = Comm::checkSMS($this->jump, '/passport/loginjump');
					$application = Comm::checkCode($request->get('code',1));
					$request = Comm::checkSMS($request->get('mobile',''));
					$url = C("SERVICE_IP").'/brand/'.$brand_id;
					$result = file_get_contents($url);
					$result = json_decode($result);

					$result1['mall_name'] = $result['info']['mall_name'];
					$passport_id = $_SESSION['userinfo']['passport_id'];
					$result = $db->select('')
								->where([
									'passport_id' => $passport_id
								])
								->from('')
								->query();
					foreach($result  as $key=> $val){
						$result1[$key]['passport_id'] = $val['passport_id'];
						$url = C("SERVICE_IP").'/mall/'.$mall_id;
						$result1[$key]['brand_name'] = $val['brand_name'];
					}
					return [
						'result'  =>  0,
						//'resultMsg' =>
						'resultMsg'  =>  '用户快捷登录验证失败',
						'url' => $url,
						'data' => $result
					];
				} else {
					return [
						'result' => 1,
						'resultMsg' => '验证成功'
					];
				}
			}else{
				return [
					'result' => 0,
					'resultMsg' => '验证失败'
				];
			}
		}else{
			return $res;
		}
		echo 111111;
		exit();
//		var_dump($user);;exit();
	    if (REQUEST_METHOD == 'GET') {
	        // 展现页
	        $a
	        
	    } else {
	        $args = $request->get();
	        $account = $args['passport_mobile'];
	        $code = $args['code'];
//	        $checkme = $args['checkme']?true:false;
//			$checkme = $argc['checkme']?true:false;
			$passport_mobile = $args['passport_mobile'];
//			$password = $args['passport'];

	        // 验证登录
	        $passport = \FC\LoginIn::login($account, $password,$checkme);

	        if(empty($passport->id)){
	            // 验证失败
	            $url = Comm::makeJumpUrl($this->jump, '/passport/loginjump');
	            return [
	            	'result'  =>  0,
	                'resultMsg'  =>  '用户名密码验证失败'
	            ];
	        } else {
	            // 验证成功
	            //$jump = Comm::getJumpUrl($args);
 	            return [
             		'result'  =>  1,
             		'resultMsg'  => '',
 	                'url'  =>  empty($jump) ? '/' : $jump,
         		];

	            /* if(empty($jump)){
	                headerto('/');
	            } else {
	                headerto($jump);
	                
	            } */
	        }
	    }
	}
}