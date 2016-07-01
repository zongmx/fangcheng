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
	 * 我的账户
	 * 
	 * @param Application $application        	
	 */
	public function executeMyaccount(Application $application, Request $request) {
	    
	    return $this->{'myaccount'.$request->get('q','info')}($application, $request);
	    /* switch ($request->get('q','info')){ 
	        case 'log':  //账户日志
	            return $this->myaccountlog($application, $request);
	            break;
	        case 'info': //我的账户默认页面
	            return $this->myaccountlist($application, $request);
	            break;
	    } */
        
	}
	public function myaccountinfo(Application $application, Request $request){
	   
	    //$this->setLayout('ucenterlayout');
	    FC\Session::initSession();
	    $getAccountInfo = \FC\Cs::getAccountInfo();
	    $asign = [];
	    $asign['passport_money']['passport_money_total'] = ceil($getAccountInfo[0]['passport_money_total']/100);
	    $asign['passport_money']['passport_money_withdraw'] = ceil($getAccountInfo[0]['passport_money_withdraw']/100);
	    //        $getRecordInfo = \FC\Cs::getPassportMoneyLog();
	    $maxOutMonryMonth = \FC\Cs::getMaxOutMonryMonth();
	    $asign["passport_money"]["passport_money_flag"] = true;
	    if ($maxOutMonryMonth >= date('Y-m')) {
	        $asign["passport_money"]["passport_money_flag"] = false;
	    }
	    $passportMoneyLog = \FC\Cs::getPassportMoneyLog();
	    $moneyMaxMonth = \FC\Cs::getMaxOutMonryMonth();
	    $hasPassportBank = \FC\Cs::hasPassportBank();
	    $this->passportMoneyLog = $passportMoneyLog;
	    $this->asign = $asign;
	    $this->hasPassportBank = $hasPassportBank;
	    
	}
	public function myaccountlog(Application $application, Request $request){
	    FC\Session::initSession();
	    $this->setView('myaccountlog');
	    $passportMoneyLog = \FC\Cs::getPassportMoneyLog();
	    $this->passportMoneyLog = $passportMoneyLog;
	}
}