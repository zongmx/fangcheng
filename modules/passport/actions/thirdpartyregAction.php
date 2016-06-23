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
	 * 第三方招商注册
	 * @param Application $application
	 * @param Request $request
	 */
	public function executeThirdpartyreg(Application $application, Request $request){
		//businessTypeSelect 设置商业和品牌的单选框是不是加载
		$this->businessTypeSelect = 1;
		$this->setView('thirdpartyReg');
	}
}