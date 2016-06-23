<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Frame\Foundation\Action;


/**
 * 用户的所有动作行为
 *
 */
class PassportAction extends Action
{
	/**
	 * 我为商业地产招商注册
	 * @param Application $application
	 * @param Request $request
	 */
	public function executeBusinessreg(Application $application, Request $request){
		$this->passport_flag = $request->get('passport_flag',"0");
		$this->setView("businessReg");
	}
}