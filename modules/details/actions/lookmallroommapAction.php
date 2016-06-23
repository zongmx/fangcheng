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
     * 
     * @param Application $application            
     * @param Request $request            
     */
    public function executeLookmallroommap(Application $application, Request $request)
    {
        $this->setLayout();
        $mall_id = $request->get('mall_id');
        $fromsearch = $request->get('fromsearch');
        $selectedShopId = $request->get('selectedShopId');
        $mall_name = $request->get('mall_name'); 
        $hasContact = $request->get('hasContact');
        $floor = $request->get('floor');
        $data = getServiceSlot(['slot_id' => 7,'mall_id'=>$mall_id]);
        $data = json_decode($data,true);
        $data = array_values($data);
        $data = $data[2][0]['data'];
        $flloorArr = [];
        foreach ($data['data']['Floors'] as $key => $val){
            $a = $val['_id'];
            $flloorArr[$a] = $val['Name'];
        }
        $datajson = \Frame\Util\UString::json($data);
        $this->resultArray = [];
        $this->resultArray['__datajson'] = $datajson;
        $this->resultArray['floor'] = $floor;
        $this->resultArray['mall_id'] = $mall_id;
        $this->resultArray['flloorArr'] = $flloorArr;
        $this->resultArray['fromsearch'] = $fromsearch;
        $this->resultArray['selectedShopId'] = $selectedShopId;
        $this->resultArray['mall_name'] = $mall_name;
        $this->resultArray['hasContact'] = $hasContact;
    }
    
    
    
}