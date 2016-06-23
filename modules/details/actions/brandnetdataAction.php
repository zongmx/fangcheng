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
     * 详情页--槽数据
     * @param Application $application
     * @param Request $request
     */
    public function executeBrandnetdata(Application $application, Request $request)
    {
        $brand_id = $request->get('brand_id');
        $brand_info  = getServiceSlot([
        		'brand_id' => $brand_id,
        		'slot_id' => 1003
        		]);
        $brand_info = json_decode($brand_info,true);
        $this->total= empty($brand_info['info'][0]['data'])?0:1;
        $this->action = $request->get('action');
        $this->resultArray = [];
        /*
         * */
        $url = C('SERVICE_IP') . '/info/brand/id/' . $brand_id;
        $basicResult = file_get_contents($url);
        $basicResult = json_decode($basicResult, true);
        $this->resultArray['brandbasicinfo'] = $basicResult['info'];
        /*
         *
        */
        $this->resultArray['isAttention'] = Comm::isAttention(['brand_id'=>$brand_id]);
        $this->brand_id = $brand_id;
        $this->jumpurl = \Frame\Util\UString::base64_encode(urlFor('', $request->get()));
        $this->resultArray['weixinzhuanfa'] = \FC\Comm::makeweixinconfig(['brand_id'=>$brand_id]);
        $this->price_city = $this->city_data($brand_id);
    }
    
    
    private function city_data($brand_id)
    {
    	$city = C('CITY_ONLINE');
    	foreach($city as $key=>$value)
    	{
    		$slotdata = getServiceSlot(['brand_id'=>$brand_id, 'slot_id'=> '1010', 'area_id'=>$key]);
    		$data[] = json_decode($slotdata, true);
    	}
    	foreach($data as $key=>$value)
    	{
    		if(empty($data[$key]['avg']))
    		{
    			unset($data[$key]);
    		}
    	}
    	foreach($data as $key=>$value)
    	{
    		$rs[] = ['area_id' => array_search($data[$key]['area_name'], $city), 'name'=>$data[$key]['area_name']];
    	}
    	return $rs;
    }
    
    
}