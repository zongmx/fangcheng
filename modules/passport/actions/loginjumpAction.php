<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Frame\Foundation\Action;
use \FC\Comm;


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
	public function executeLoginjump(Application $application, Request $request) 
	{
	    $this->jump = $request->get('jump', '');
	    $user = FC\LoginIn::isLogin();
	    if (!empty($user['passport_id'])){
	        $this->headerTo('/');
	    }

//		var_dump($user);;exit();
	    if (REQUEST_METHOD == 'GET') {
	        // 展现页
	        
	        
	    } else {
	        $args = $request->get();
	        $account = $args['username'];
	        $password = $args['password'];
	        $checkme = $args['checkme']?true:false;
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
 	                //'url'  =>  empty($jump) ? '/' : $jump,
         		];

	            /* if(empty($jump)){
	                headerto('/');
	            } else {
	                headerto($jump);
	                
	            } */
	        }
	    }
	}

	public function executeLoginjumptest(Application $application,Request $request)
	{
//		echo 11111;
//		exit();
		return $this->_viewBack;

	}

	public function executeIndex3(){

	}

	public function executeLoginjump1(){
		return 1;
	}

	public function executeIndex2(Application $application,Request $request)
	{
		var_dump($request);
			;
		exit();

	}

	public function executeIndex4(){
		echo 111;
		exit();

	}

	public function executeIndex5(){
		echo 1111;
		exit();
	}
	/*
	 *
	 *
	 */

	public function executeFastloginjump(Application $application, Request $request){
		echo '<hr>';
		var_dump($request);
		FC\Session::initSession();
		$userInfo = FC\LoginIn::isLogin();
		var_dump($userInfo);
		echo "<br>";
		var_dump($request);
		var_dump($request);
		exit();

		$this->jump = $request->get('jump',1);
		$userInfo = FC\LoginIn::isLogin();
		exit();
		if(!empty($userInfo)){
			$this->headerTo('/');
		}
		if(REUQUST_METHOD == 'get'){
			// 信息展示页
		}else{
			$argc = $request;
			$passport_mobile = $argc['passport_mobile'];
			$passport = $argc['passport'];
			$checkMe = $argc['checkMe']? 1:0;
			$res = FC\LoginIn::isLogin($argc['passport_mobile'],$passport,$checkMe);
			if(!empty($res['passport_id'])){
				return [
					'result' => 0,
					'resultMsg' => '该账号已经存在，请使用其他账号登录'
				];
			}else{
				return [
					'result' => 1,
					'resultMsg' => ''
				];
			}
		}
	}
	
}