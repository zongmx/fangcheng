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
    public function executeMakebrandpopulationmap(Application $application, Request $request)
    {
        $this->setLayout();
        $area_id = $request->get('area_id');
        $brand_id = $request->get('brand_id');
        $data = getServiceSlot([
            'brand_id' => $brand_id,
            'slot_id' => 1004,
            'area_id' => $area_id
        ]);
        $points_double = 1000000;
        $datereturn['center']['longitude'] = 116.415998;
        $datereturn['center']['latitude'] = 39.918499;
        $data = json_decode($data,true);
        if (!empty($data['info'])){
            foreach ($data['info'] as $key => $val){
                $middledta = [];
                $middledta['full_name'] = '';
                $middledta['latitude'] = ($val['brand_shop_latitude']/$points_double);
                $middledta['name'] = '';
                $middledta['id'] = $val['brand_shop_id'];
                $middledta['longitude'] =  ($val['brand_shop_longitude']/$points_double);
                $datereturn['points'][] = $middledta;
            }
        }else {
            $datereturn['points'] = array();
        }
        
        echo  json_encode($datereturn);
    }
}