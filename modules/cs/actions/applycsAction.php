<?php

use Frame\Foundation\Application;
use Frame\Http\Request;
use Frame\Foundation\Action;


/**
 * 悬赏详情
 *
 */
class csAction extends Action
{
    public function preExecute(Application $application, Request $request)
    {
    }

    /**
     * 悬赏 --申请参加悬赏
     * 
     * @param Application $application            
     * @param Request $request            
     */
    public function executeApplycs(Application $application, Request $request)
    {
        $this->setLayout();
        $this->setView();
        FC\Session::initSession();
        $resutn = FC\Cs::addCspassport($request);
        return $resutn;
    }
    
    

}