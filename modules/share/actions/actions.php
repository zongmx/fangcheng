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
			
			$share->add($data);
			//判断是否是分享悬赏,如果是的话,帮助分享者接包   add by ljh
			if ($urldata['action'] == 'csinfo' && !empty($urldata['csid'])){
			    //先判断是不是已经接受过这个悬赏,如果没有,则分享者自动接包悬赏
			    $cs= new \FC\Cs();
			    if (!($cs->isCSPassport($_SESSION['userinfo']['passport_id'], $urldata['csid']))){
			        $request->set('cs_passport_info', "");
			        $request->set('demand_id', $urldata['csid']);
			        $cs->addCspassport($request);
			    }
			    
			}
			
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
		$passportid = $request->get('passportid');
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
		$passport = new \FC\Passport($passportid);
		$passport = new \FC\Passport($passportid);
		foreach($passport as $key => $val){
			$result1[$key]['demand_id'] = $passport[$key]['demand_id'];
			$result1[$key]['item'] = $passport[$key]['item'];
			$result1[$key][''] = $passport[$key][''];
		}
//		$passportInfo = $passport->getInfo(true);
//		var_dump($passportInfo);
//		exit();
		$passportInfo = \FC\Cs::getPassportCSinfo($csid,$passport_id);
		//$contactInfo = \FC\Passport::isCompleteAccount($_SESSION['userinfo']['passport_id']);
		$contactList = \FC\Cs::getContact($csid);
		$this->setLayout("registerLayout");
		$this->cyrs = $cyrs;
		$this->kcsq = $kcsq;
		$this->loginstatus = $loginstatus;
		$this->csinfo = $csInfo;
		$this->kc = $kc;
		$this->csid = $csid;
		$this->contactInfo = $passportInfo[0];
		$this->jumpurl = \Frame\Util\UString::base64_encode(urlFor('', $request->get()));
		return $this->_viewBack;
	}
}