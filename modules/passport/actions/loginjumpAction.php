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
 	                'url'  =>  empty($this->jump) ? '/' : $this->jump,
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