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
	public function executeAddcart(Application $application, Request $request) {
	    FC\Session::initSession();
		$this->setLayout ('registerLayout');
		$this->jump = $request->get('url','/');
	}
}