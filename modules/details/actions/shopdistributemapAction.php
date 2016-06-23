<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Frame\Foundation\Action;

/**
 * 用户认证
 */
class DetailsAction extends Action
{

    public function preExecute(Application $application, Request $request)
    {}

    /**
     * 详情页--槽数据
     * 
     * @param Application $application            
     * @param Request $request            
     */
    public function executeShopdistributemap(Application $application, Request $request)
    {
        $this->setLayout();
        $area_id = $request->get('area_id');
        $area_name = $request->get('area_name');
        $brand_id = $request->get('brand_id');
        $this->resultArray = [];
        $this->resultArray['area_id'] = $area_id;
        $this->resultArray['brand_id'] = $brand_id;
        $this->resultArray['area_name'] = $area_name;
        
        $city = C('CITY_ONLINE');
        $shop_city = [];
        $shop_city = $this->data_get($brand_id);
        foreach($shop_city as $key=>&$value)
        {
        	$this->resultArray['shop_city'][$value] = $city[$value];
        }
    }
    
    private function data_get($brand_id)
    {
    	$service = C('SERVICE_IP');
    	$data = json_decode(file_get_contents("{$service}/info/brand/shop_area/id/{$brand_id}"),true);
    	$data = $data['result'] ? $data['info'] : '';
    	return  $data;
    }
    
}