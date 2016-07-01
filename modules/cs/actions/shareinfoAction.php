<?php

use Frame\Foundation\Application;
use Frame\Http\Request;
use Frame\Foundation\Action;


/**
 * 悬赏详情
 *
 */
class CsAction extends Action
{
    public function preExecute(Application $application, Request $request)
    {
    }
    
    /**
     * 详情页--悬赏
     * @param Application $application
     * @param Request $request
     */
    public function executeShareinfo(Application $application, Request $request)
    {
        $csid = $request->get('csid');
        if (empty($csid)){
            $this->headerTo('/error/404');
        }    
        $cs = new \FC\Cs($csid);
        $csInfo = $cs->getInfo(true);
        $passport_id = $cs->getPassportId();
        $loginstatus =  $cs->getLoginUserType($passport_id,$csid);
        $cyrs = \FC\Cs::getCountCsPassport($csid);
        $kcsq = \FC\Cs::getCountCsPassportApply($csid);
        $this->setLayout("registerLayout");
        $this->cyrs = $cyrs;
        $this->kcsq = $kcsq;
        $this->loginstatus = $loginstatus;
        $this->csinfo = $csInfo;
        $this->jumpurl = \Frame\Util\UString::base64_encode(urlFor('', $request->get()));
    }
    
    

}