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
    public function executeMakepopulationmap(Application $application, Request $request)
    {
        $this->setLayout();
        $mall_id = $request->get('mall_id');
        $slotResult = getServiceSlot([
            'slot_id' => 2,
            'mall_id' => $mall_id
        ]);
        $slotResult = json_decode($slotResult, true);
        $slotResult = array_values($slotResult);
        $slotResult = $slotResult[2][0]['data']['info'];
        $return = [];
        $points_double = 1000000;
        foreach ($slotResult['building'] as $key => $val) {
            if ($key == 1) {
                foreach ($val as $k => $v) {
                    $res = []; // 人口数据
                    $res['poi_type'] = $v['poi_type_id'];
                    $res['latitude'] = ($v['latitude'] / $points_double);
                    $res['longitude'] = ($v['longitude'] / $points_double);
                    $res['mall_id'] = $v['mall_id'];
                    $res['distance'] = $v['distance'];
                    $res['poi_name'] = $v['poi_name'];
                    $res['population'] = $v['population'];
                    $hot = []; // 热度数据
                    $hot['lat'] = ($v['latitude'] / $points_double);
                    $hot['lng'] = ($v['longitude'] / $points_double);
                    $hot['count'] = ($v['population']/8000)*100;
                    if ($v['distance'] <= 1000) {
                        $return['poi_type_kilometre'][$key]['1km'][] = $res;
                        $return['poi_type_kilometre_heat'][$key]['1km'][] = $hot;
                        $return['poi_type_kilometre_heat'][$key]['3km'][] = $hot;
                        $return['poi_type_kilometre_heat'][$key]['5km'][] = $hot;
                    } elseif ($v['distance'] > 1000 && $v['distance'] <= 3000) {
                        $return['poi_type_kilometre'][$key]['3km'][] = $res;
                        $return['poi_type_kilometre_heat'][$key]['3km'][] = $hot;
                        $return['poi_type_kilometre_heat'][$key]['5km'][] = $hot;
                    } elseif ($v['distance'] > 3000 && $v['distance'] <= 5000) {
                        $return['poi_type_kilometre'][$key]['5km'][] = $res;
                        $return['poi_type_kilometre_heat'][$key]['5km'][] = $hot;
                    }
                }
            } elseif ($key == 3) {
                foreach ($val as $k => $v) {
                	$res = []; // 人口数据
                	$res['poi_type'] = $v['poi_type_id'];
                	$res['latitude'] = ($v['latitude'] / $points_double);
                	$res['longitude'] = ($v['longitude'] / $points_double);
                	$res['mall_id'] = $v['mall_id'];
                	$res['distance'] = $v['distance'];
                	$res['poi_name'] = $v['poi_name'];
                	$res['population'] = $v['population'];
                	$hot = []; // 热度数据
                	$hot['lat'] = ($v['latitude'] / $points_double);
                	$hot['lng'] = ($v['longitude'] / $points_double);
                	$hot['count'] = ($v['population']/18000)*100;
                	if ($v['distance'] <= 1000) {
                		$return['poi_type_kilometre'][$key]['1km'][] = $res;
                		$return['poi_type_kilometre_heat'][$key]['1km'][] = $hot;
                		$return['poi_type_kilometre_heat'][$key]['3km'][] = $hot;
                		$return['poi_type_kilometre_heat'][$key]['5km'][] = $hot;
                	} elseif ($v['distance'] > 1000 && $v['distance'] <= 3000) {
                		$return['poi_type_kilometre'][$key]['3km'][] = $res;
                		$return['poi_type_kilometre_heat'][$key]['3km'][] = $hot;
                		$return['poi_type_kilometre_heat'][$key]['5km'][] = $hot;
                	} elseif ($v['distance'] > 3000 && $v['distance'] <= 5000) {
                		$return['poi_type_kilometre'][$key]['5km'][] = $res;
                		$return['poi_type_kilometre_heat'][$key]['5km'][] = $hot;
                	}
                }
            } elseif ($key == 4) {
                foreach ($val as $k => $v) {
                	$res = []; // 人口数据
                	$res['poi_type'] = $v['poi_type_id'];
                	$res['latitude'] = ($v['latitude'] / $points_double);
                	$res['longitude'] = ($v['longitude'] / $points_double);
                	$res['mall_id'] = $v['mall_id'];
                	$res['distance'] = $v['distance'];
                	$res['poi_name'] = $v['poi_name'];
                	$res['population'] = $v['population'];
                	$res['room_total'] = $v['room_total'];
                	$res['rank'] = $v['rank'];
                	$hot = []; // 热度数据
                	$hot['lat'] = ($v['latitude'] / $points_double);
                	$hot['lng'] = ($v['longitude'] / $points_double);
                	$hot['count'] = ($v['population']/300)*100;
                	if ($v['distance'] <= 1000) {
                		$return['poi_type_kilometre'][$key]['1km'][] = $res;
                		$return['poi_type_kilometre_heat'][$key]['1km'][] = $hot;
                		$return['poi_type_kilometre_heat'][$key]['3km'][] = $hot;
                		$return['poi_type_kilometre_heat'][$key]['5km'][] = $hot;
                	} elseif ($v['distance'] > 1000 && $v['distance'] <= 3000) {
                		$return['poi_type_kilometre'][$key]['3km'][] = $res;
                		$return['poi_type_kilometre_heat'][$key]['3km'][] = $hot;
                		$return['poi_type_kilometre_heat'][$key]['5km'][] = $hot;
                	} elseif ($v['distance'] > 3000 && $v['distance'] <= 5000) {
                		$return['poi_type_kilometre'][$key]['5km'][] = $res;
                		$return['poi_type_kilometre_heat'][$key]['5km'][] = $hot;
                	}
                }
            } elseif ($key == 5) {
                foreach ($val as $k => $v) {
                	$res = []; // 人口数据
                	$res['poi_type'] = $v['poi_type_id'];
                	$res['latitude'] = ($v['latitude'] / $points_double);
                	$res['longitude'] = ($v['longitude'] / $points_double);
                	$res['mall_id'] = $v['mall_id'];
                	$res['distance'] = $v['distance'];
                	$res['poi_name'] = $v['poi_name'];
                	$res['poi_level'] = $v['poi_level'];
                	if ($v['distance'] <= 1000) {
                		$return['poi_type_kilometre'][$key]['1km'][] = $res;
                	} elseif ($v['distance'] > 1000 && $v['distance'] <= 3000) {
                		$return['poi_type_kilometre'][$key]['3km'][] = $res;
                	} elseif ($v['distance'] > 3000 && $v['distance'] <= 5000) {
                		$return['poi_type_kilometre'][$key]['5km'][] = $res;
                	}
                }
            } elseif ($key == 10) {
                foreach ($val as $k => $v) {
                	$res = []; // 人口数据
                	$res['poi_type'] = $v['poi_type_id'];
                	$res['latitude'] = ($v['latitude'] / $points_double);
                	$res['longitude'] = ($v['longitude'] / $points_double);
                	$res['mall_id'] = $v['mall_id'];
                	$res['distance'] = $v['distance'];
                	$res['poi_name'] = $v['poi_name'];
                	if ($v['distance'] <= 1000) {
                		$return['poi_type_kilometre'][$key]['1km'][] = $res;
                	} elseif ($v['distance'] > 1000 && $v['distance'] <= 3000) {
                		$return['poi_type_kilometre'][$key]['3km'][] = $res;
                	} elseif ($v['distance'] > 3000 && $v['distance'] <= 5000) {
                		$return['poi_type_kilometre'][$key]['5km'][] = $res;
                	}
                }
            } elseif ($key == 11) {
                foreach ($val as $k => $v) {
                	$res = []; // 人口数据
                	$res['poi_type'] = $v['poi_type_id'];
                	$res['latitude'] = ($v['latitude'] / $points_double);
                	$res['longitude'] = ($v['longitude'] / $points_double);
                	$res['mall_id'] = $v['mall_id'];
                	$res['distance'] = $v['distance'];
                	$res['poi_name'] = $v['poi_name'];
                	if ($v['distance'] <= 1000) {
                		$return['poi_type_kilometre'][$key]['1km'][] = $res;
                	} elseif ($v['distance'] > 1000 && $v['distance'] <= 3000) {
                		$return['poi_type_kilometre'][$key]['3km'][] = $res;
                	} elseif ($v['distance'] > 3000 && $v['distance'] <= 5000) {
                		$return['poi_type_kilometre'][$key]['5km'][] = $res;
                	}
                }
            } elseif ($key == 12) {
                foreach ($val as $k => $v) {
                	$res = []; // 人口数据
                	$res['poi_type'] = $v['poi_type_id'];
                	$res['latitude'] = ($v['latitude'] / $points_double);
                	$res['longitude'] = ($v['longitude'] / $points_double);
                	$res['mall_id'] = $v['mall_id'];
                	$res['distance'] = $v['distance'];
                	$res['poi_name'] = $v['poi_name'];
                	if ($v['distance'] <= 1000) {
                		$return['poi_type_kilometre'][$key]['1km'][] = $res;
                	} elseif ($v['distance'] > 1000 && $v['distance'] <= 3000) {
                		$return['poi_type_kilometre'][$key]['3km'][] = $res;
                	} elseif ($v['distance'] > 3000 && $v['distance'] <= 5000) {
                		$return['poi_type_kilometre'][$key]['5km'][] = $res;
                	}
                }
            } elseif ($key == 40) {
                foreach ($val as $k => $v) {
                	$res = []; // 人口数据
                	$res['poi_type'] = $v['poi_type_id'];
                	$res['latitude'] = ($v['latitude'] / $points_double);
                	$res['longitude'] = ($v['longitude'] / $points_double);
                	$res['mall_id'] = $v['mall_id'];
                	$res['distance'] = $v['distance'];
                	$res['poi_name'] = $v['poi_name'];
                	if ($v['distance'] <= 1000) {
                		$return['poi_type_kilometre'][$key]['1km'][] = $res;
                	} elseif ($v['distance'] > 1000 && $v['distance'] <= 3000) {
                		$return['poi_type_kilometre'][$key]['3km'][] = $res;
                	} elseif ($v['distance'] > 3000 && $v['distance'] <= 5000) {
                		$return['poi_type_kilometre'][$key]['5km'][] = $res;
                	}
                }
            }
        }
//         __dd($return);
        foreach ($return as &$line){
            foreach ($line as &$sub){
                isset($sub['1km']) || $sub['1km'] = [];
                isset($sub['3km']) || $sub['3km'] = [];
                isset($sub['5km']) || $sub['5km'] = [];
            }
        }
        //获得mall的信息 
        $url = C('SERVICE_IP') . '/info/mall/id/' . $mall_id;
        $basicResult = file_get_contents($url);
        $basicResult = json_decode($basicResult, true);

        $mallinfo = [];
        $mallinfo['poi_type'] = 0;
        $mallinfo['name'] = $basicResult['info']['mall_name'];
        $mallinfo['latitude'] = ($basicResult['info']['mall_latitude']/$points_double);
        $mallinfo['longitude'] = ($basicResult['info']['mall_longitude']/$points_double);
        $return['mall'] = $mallinfo;
//         file_put_contents('111.txt', \Frame\Util\UString::json($return));
//         echo \Frame\Util\UString::json($return);
        echo \Frame\Util\UString::json($return);
    }
}