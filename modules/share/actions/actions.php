<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Frame\Foundation\Action;
use FC\Comm;
use FC\Session;

/**
 * 
 * 微信分享入库功能
 *
 * @author min
 *        
 */
class ShareActions extends Action
{
	public function preExecute(Application $application, Request $request)
	{
		
	}
	public function executeIndex(Application $application, Request $request)
	{
		$this->user = \FC\Session::initSession(true);
		$share = new \Model\Log\Share();
		$url = $request->get('shareUrl', 0);
		//$url = 'http://fangcheng/details/brand/brand_id/37571';
		if($url)
		{
			$urldata = Frame\Foundation\Context::instance()->routing()->forUrl($url);
			$data = [
					'log_share_url' => $url,
					'log_share_url_module' => $urldata['module'],
					'log_share_url_action' => $urldata['action'],
					'log_share_url_q' => $urldata['q'],
					'log_share_ip' => $_SERVER["REMOTE_ADDR"],
					'passport_id' => $_SESSION['userinfo']['passport_id'],
			];
			//__dd($data);
			$share->add($data);
		}
		
	}
}