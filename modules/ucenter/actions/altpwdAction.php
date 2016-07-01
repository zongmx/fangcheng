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
class UcenterAction extends Action
{
	/**
	 * 匹配需求
	 * 
	 * @param Application $application        	
	 */
	public function executeAltpwd(Application $application, Request $request) {
        FC\Session::initSession();
	}
}