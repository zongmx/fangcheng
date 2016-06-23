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
     * 详情页--槽数据
     * @param Application $application
     * @param Request $request
     */
    public function executeSlot(Application $application, Request $request)
    {
//         $this->cachePage();
        $slotId = intval($request->get('id', 0));
        $slot = new \FC\Slot($slotId);
        $this->resultArray = $slot->getData($request->get());
        $this->setView('slot/slot_' . $slotId);
        $this->setLayout(null);
        $this->setViewBack('');
        
    }
    
    
    
}