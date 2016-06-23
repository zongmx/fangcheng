<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Frame\Foundation\Action;
use FC\Comm;
use FC\Session;

/**
 * 
 * 网站活动功能
 *
 * @author min
 *        
 */
class ActionActions extends Action
{
	public function preExecute(Application $application, Request $request)
	{
		$this->act = new \Model\Act();
		$this->act_passport = new \Model\Act\Passport();
		$this->act_id = $request->get('act_id', 0);
	}
	public function executeIndex(Application $application, Request $request)
	{
		$day = date('Y-m-d');
		$end_day = date('Y-m-d', strtotime('+1 day'));
		$this->share_id = $request->get('share_id', 0);
		$this->jumpurl = \Frame\Util\UString::base64_encode(urlFor('default', $request->get()));
		$actdata = $this->act->select()->where('act_id = ? and act_status=1', $this->act_id)->query();
		if($actdata[0]['act_id']){
			$this->isact = ($actdata[0]['act_begin_at'] <= $day && $actdata[0]['act_end_at'] > $end_day) ? 1 : 0;
			$this->method = 'POST';
			$this->submitType = $this->isact ? 'SUBMIT' : 'BUTTON';
			$this->acitonUrl = '/action/save';
			
			$weixin = \FC\WeiXin::instance();
			$shareinfo = $_SESSION['userinfo']['passport_id'] ? '/share_id/'.$_SESSION['userinfo']['passport_id'] : '';
			$this->weixinzhuanfa = [
					'title' => $actdata[0]['act_name'],
					'logo' => C('WEB_URL').'/img/act_1_logo.jpg',
					'link' => C('WEB_URL').'/action/index/act_id/'.$this->act_id.$shareinfo,
					'desc' => '邀请好友注册方橙账号并发送需求，即可获得50元话费！多次参加，话费无封顶！',
					];
		}else{
		    $this->headerTo('/error/404');
		}
	}
	
	
	public function executeSave(Application $appliaction, Request $request)
	{
        if($_SESSION['userinfo']['passport_id']){
    	    $data = [
    				'passport_id' => $_SESSION['userinfo']['passport_id'],
    				'passport_id_share' => $request->get('share_id', 0),
    				'act_id' => $this->act_id,
    		];
    		$result = $this->act_passport->add($data);
    		if($result)
    		{
    		    $this->headerTo('/news/broadcast');
    		}
        }
	}
	
}