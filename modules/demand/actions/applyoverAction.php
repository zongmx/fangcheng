<?php

use Frame\Foundation\Application;
use Frame\Http\Request;
use Frame\Foundation\Action;


/**
 * 悬赏详情
 *
 */
class demandAction extends Action
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
    public function executeApplyover(Application $application, Request $request)
    {
        $this->setLayout();
        $this->setView();
        FC\Session::initSession();
        $resutn = FC\Cs::applyOver($request);
        return $resutn;
    }
    
    

}