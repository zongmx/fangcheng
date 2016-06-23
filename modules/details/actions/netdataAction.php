<?php

use Frame\Foundation\Application;
use Frame\Http\Request;
use Frame\Foundation\Action;
use FC\Comm;


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
     * 详情页--网上数据
     * @param Application $application
     * @param Request $request
     */
    public function executeNetdata(Application $application, Request $request)
    {
        $mall_id = $request->get('mall_id');
        $this->action = $request->get('action');
        $this->mall_id = $mall_id;
        $url = C('SERVICE_IP') . '/info/mall/id/' . $mall_id;
        $basicResult = file_get_contents($url);
        $basicResult = json_decode($basicResult, true);
        $this->mall_name = $basicResult['info']['mall_name'];
        $resulttotal20 = json_decode(getServiceSlot(['mall_id'=>$mall_id,'slot_id'=>20]),true);
        $resulttotal20 = empty($resulttotal20['info'][0]['data'])? 0 : 1;
        
        $this->resultArray = [];
        $this->resultArray['resultShow'] = $resulttotal20;
        $this->resultArray['isAttention'] = Comm::isAttention(['mall_id'=>$mall_id]);
        $this->resultArray['weixinzhuanfa'] = \FC\Comm::makeweixinconfig(['mall_id'=>$mall_id]);
        $this->jumpurl = \Frame\Util\UString::base64_encode(urlFor('', $request->get()));
    }
    
    
    
}