<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Frame\Foundation\Action;
use Frame;
use FC;


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
	public function executeAddprogramone(Application $application, Request $request) {
	    FC\Session::initSession();
	    $this->setLayout('registerLayout');
	    $this->jump = Frame\Util\UString::base64_decode($request->get('url'));
		$status = FC\Passport::initWithSession();

		$this->loginStatus = $status;
	}
}