<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Frame\Foundation\Action;
use Frame;


/**
 * 用户的所有动作行为
 *
 */
class PassportAction extends Action
{
	/**
	 * 欢迎页面
	 * 
	 * @param Application $application        	
	 * @param Request $request        	
	 */
	public function executeChecklogin(Application $application, Request $request) {
		$this->setLayout ('registerLayout');
		if (!empty($_SESSION['userinfo']['passport_id'])){
		    $this->headerTo('/');
		}
		$jump = $request->get('jump');
		if (!empty($jump)){
		    $jump = Frame\Util\UString::base64_decode($jump);
		}else {
		    $jump = '/';
		}
		$this->jump = $jump;
	}
}