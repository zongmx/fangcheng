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
    public function executeMallinfores(Application $application, Request $request)
    {  
        $mall_id = $request->get('mall_id');
        $url = C('SERVICE_IP') . '/info/mall/id/' . $mall_id;
        $basicResult = file_get_contents($url);
        $basicResult = json_decode($basicResult, true);
        $this->basicResult=$basicResult;
        $this->info=$basicResult['info'];
        $urltag = C('SERVICE_IP') . '/info/mall/tag/id/' . $mall_id;
        $basicTag = file_get_contents($urltag);
        $basicTag = json_decode($basicTag, true);
        $this->basicTag=$basicTag;
        $this->infoTag=$basicTag['info'];
        $this->mall_id=$mall_id;
        $this->setLayout('mallinforeslayout');
    }
       
}