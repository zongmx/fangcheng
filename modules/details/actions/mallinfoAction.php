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
     * 商圈信息
     * @param Application $application
     * @param Request $request
     */
    
    public function executeMallinfo(Application $application, Request $request)
    {
    	$this->setLayout();
    	$this->setView('mallinfo');
    	$mall_id = $request->get('id', 0);
    	$where = ['slot_id'=>26, 'mall_id'=>$mall_id];
    	$info = json_decode(getServiceSlot($where), true);
    	if (empty($info['info'])){
    	    exit();
    	}
    	$this->mall_info = $info['info'];
    }
    
    
    
    
}