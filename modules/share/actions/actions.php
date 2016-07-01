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

	public function executeShareover(Application $application, Request $request){

		$this->setView('');
	}

	public function executeShareindex(Application $application,Request $request)
	{
		$mask = $request->get('mask');
		FC\Session::initSession();
		$csid = $request->get('csid');
//		if($mask != md5()){
//			echo '该分享链接不存在';
//			exit();
//		}
		if (empty($csid)){
			$this->headerTo('/error/404');
		}


		$cs = new \FC\Cs($csid);
		$csInfo = $cs->getInfo(true);
		$passport_id = $cs->getPassportId();
		$loginstatus =  $cs->getLoginUserType($passport_id,$csid);
		$cyrs = \FC\Cs::getCountCsPassport($csid);
		$kcsq = \FC\Cs::getCountCsPassportApply($csid);
		$kc = \FC\Cs::getMyApplyCs($csid);
		//$contactInfo = \FC\Passport::isCompleteAccount($_SESSION['userinfo']['passport_id']);
//		var_dump($contactInfo);
//		exit();
		$contactList = \FC\Cs::getContact($csid);
		$this->setLayout("registerLayout");
		$this->cyrs = $cyrs;
		$this->kcsq = $kcsq;
		$this->loginstatus = $loginstatus;
		$this->csinfo = $csInfo;
		$this->kc = $kc;
		$this->csid = $csid;
		$this->contactInfo = $contactInfo;
		$this->contactList = $contactList;
		$this->jumpurl = \Frame\Util\UString::base64_encode(urlFor('', $request->get()));
		return $this->_viewBack;
	}
}