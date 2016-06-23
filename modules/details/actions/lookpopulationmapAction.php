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
    public function executeLookpopulationmap(Application $application, Request $request)
    {
        $this->setLayout();
        $mall_id = $request->get('mall_id');
        $population = $request->get('population');
        $distance = $request->get('distance');
        $source = $request->get('source');
        $from = $request->get('from');
        $distanceArr = [
        	1=>'1km',
        	3=>'3km',
        	5=>'5km',
        ];
        //获得mall的信息 
        $points_double = 1000000;
        $url = C('SERVICE_IP') . '/info/mall/id/' . $mall_id;
        $basicResult = file_get_contents($url);
        $basicResult = json_decode($basicResult, true);
        $this->resultArray = [];
        $this->resultArray['mall_id'] = $mall_id;
        $this->resultArray['source'] = $source;
        $this->resultArray['population'] = $population;
        $this->resultArray['distance'] = $distance;
        $this->resultArray['distanceArr'] = $distanceArr;
        $this->resultArray['mall_longitude'] = ($basicResult['info']['mall_longitude']/$points_double);
        $this->resultArray['mall_latitude'] = ($basicResult['info']['mall_latitude']/$points_double);
        $this->resultArray['from'] = $from;
    }
    
    
    
}