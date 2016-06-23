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
     * 详情页--悬赏
     * @param Application $application
     * @param Request $request
     */
    public function executeCsinfo(Application $application, Request $request)
    {
        $csid = $request->get('csid');
        if (empty($csid)){
            $this->headerTo('/error/404');
        }    
        $this->forward('cs', 'csinfo');
    }
    
    

}