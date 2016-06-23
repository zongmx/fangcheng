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
	 * 商业体基础信息注册(我为总部招商/我为项目招商)
	 * */
	public function executeBusinessproject(Application $application, Request $request){
		//购物中心招商  
		$this->setView('businessProject');
	}
}