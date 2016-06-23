<?php

use Frame\Foundation\Application;
use Frame\Http\Request;
use Frame\Foundation\Action;


/**
 * 用户认证
 *
 */
class DetailsAction extends Action
{
    public function preExecute(Application $application, Request $request)
    {
    }
    
    
    /**
     * 区位分析
     * @param Application $application
     * @param Request $request
     */
    
    public function executeZone(Application $application, Request $request)
    {
    	$this->setLayout();
    	$this->setView('zone');
    	$id = $request->get('id', 0);
    	$district = new \Model\district(); 	
        $district_info = $district->find($id);
        $this->info = $district_info['district_desc'];
    }
    
    
    
    
}