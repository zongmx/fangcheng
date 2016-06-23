<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use \FC\Comm;
use FC;
use Frame\Db\Driver\Mongo;

/**
 * 活动显示页
 *
 * @author yulei
 * @version 0.2.0
 */
class activityAction extends Frame\Foundation\Action
{

    /**
     * H5页面入口
     *
     * @param Application $application            
     * @param Request $request            
     */
    public function executeH5(Application $application, Request $request)
    {
        
        switch ($q = $request->get('q', 'show')) {
            case 'view': // 预览
                $this->view($application, $request);
                break;
            case 'show': // 中间处理数据，添加数据，数据操作
                 $this->show($application, $request);
                break;
            case 'showh5': //展示
                $this->showh5($application, $request);
                break;
        }
    }

    /**
     * 预览
     *
     * @param Application $application            
     * @param Request $request            
     */
    protected function view(Application $application, Request $request)
    {
		FC\Session::initSession();
        $template_id = $request->get('template_id', 0);
        if ($template_id == 1 || $template_id == 2){
            $data = $request->get();
            $info = $this->makeShowData($data,$template_id);
            $this->resultArray = [];
            if ($template_id == 1 || $template_id == 2){
            	$this->resultArray['info'] = $info;
            	$this->resultArray['h5Ctime'] = date('Y-m-d');
            	$persioninfo = FC\GetValue::getInfoList('fangcheng_v2', 'passport', $_SESSION['userinfo']['passport_id']);
            	$this->resultArray['persioninfo'] = $persioninfo['resuleMsg']['0'];
            	$this->resultArray['shareInfo']['logo'] =$logo = C('UPLOAD_URL').$data['brand_logo'];
            }
            $this->setLayout();
            $this->resultArray['type'] = 'view'; //如果type等于view 就是预览模式
                if ($template_id == 2){
                	$this->resultArray['logo'] = [
                			'brand_logo' => C('UPLOAD_URL').$data['brand_logo'],
                			'brand_xc_logo' => C('UPLOAD_URL').$data['brand_xc_logo'],
                			'brand_shop_logo' => C('UPLOAD_URL').$data['brand_shop_logo'],
                			'brand_product_logo' => C('UPLOAD_URL').$data['brand_product_logo']
                			];
                }
        }
        $this->setView('/h5/template_'.$template_id);
    }

    /**
     * 确认发布
     *
     * @param Application $application            
     * @param Request $request            
     */
    protected function show(Application $application, Request $request)
    {
		FC\Session::initSession();
        $this->setView();
        $template_id = $request->get('template_id', 0);
        if (empty($template_id)) {
            echo json_encode([
                'result' => 0,
                'resultMsg' => '发布失败'
            ]) ;exit();
        }
        $functionname = 'addh5_' . $template_id;
        $act_id = $this->$functionname($request);
        if ($act_id > 0) {
            echo json_encode([
                'result' => 1,
                'resultMsg' => $act_id
            ]);exit();

        } else {
            echo json_encode([
                'result' => 0,
                'resultMsg' => '发布失败'
            ]);exit();
        }
    }
    
    /**
     * 页面展示页
     * */
    protected function showh5(Application $application, Request $request)
    {
        $db = DB();
        $id = $request->get('id',0);
        $show = $request->get('show');
        if (empty($id)){
            headerto('/error/404');
        }
        $result = $db->select()
                    ->from('act_passport')
                    ->where('act_passport_id = ?',$id)
                    ->query();
        if (empty($result)){
            headerto('/error/404');
        }
//         $template_id = $result[0]['act_id'];
//         if (empty($template_id)){
//             headerto('/error/404');
//         }
        $data = unserialize($result[0]['act_passport_options']);
        $template_id = $data['template_id'];
        $info = $this->makeShowData($data,$template_id);
        $this->resultArray = [];
        if ($template_id == 1 || $template_id == 2){
            $this->resultArray['info'] = $info;
            $h5Ctime = explode(' ', $result[0]['act_passport_ctime']);
            $this->resultArray['h5Ctime'] = $h5Ctime[0];
            $persioninfo = FC\GetValue::getInfoList('fangcheng_v2', 'passport', $result[0]['passport_id']);
             $this->resultArray['persioninfo'] = $persioninfo['resuleMsg']['0'];
             //微信分享
             $options_arr = unserialize($result[0]['act_passport_options']);
             $id = new MongoId($options_arr['demand_id']);
             $db = MDB();
             $res = $db->select()
             ->from('demand')
             ->where([
             		'_id' => $id
             		])
             		->query();
             $res = array_values($res);
             $demand_res = $res;
             
             $carr = [];
             if (!empty($res[0]['category_ids'])){
             	foreach ($res[0]['category_ids'] as $key => $val){
             		$a = Comm::getCategoryName($val);
             		array_push($carr, $a);
             	}
             }
             $carr = array_unique($carr);
             if (!empty($carr)){
             	$titleCategory = FC\GetValue::getInfoList('fangcheng_v2', 'category', $carr, 1);
             	if ($titleCategory['result'] == 1){
             		$titleCategory = $titleCategory['resuleMsg'];
             	}else {
             		$titleCategory = '';
             	}
             }else {
             	$titleCategory = "";
             }
             $titleCategory =  empty($titleCategory)?"业态不限":$titleCategory;
             if ($res[0]['demand_type'] == 1){
             	$title = '【好牌拓店】'.$res[0]['area_name'].'-'.$res[0]['brand_name'].'-'.$titleCategory;
             	if (!empty($res['0']['tag']['group_41']['lower']) &&  !empty($res['0']['tag']['group_41']['upper'])){
             		$titlemiddle = '-'.($res['0']['tag']['group_41']['lower']/C('MULTIPLY_DOUBLE')).'-'.($res['0']['tag']['group_41']['upper']/C('MULTIPLY_DOUBLE')).'㎡';
             		$title .= $titlemiddle;
             	}
             	$logo = C('UPLOAD_URL').$options_arr['brand_logo'];
             	$share = new FC\WeiXin\share();
             	$desc = $share->makeDemandDesc(['type' =>'brand','info'=>$demand_res]);
             	$request->delete('show');
             	$link = C('WEB_URL').urlFor($request->get('jf_app_route'),$request->get());
             }elseif ($res[0]['demand_type'] == 2){
             	//         	$title = '【好Mall招商】'.$res[0]['area_name'].'-'. $res[0]['mall_name'].'-'.$titleCategory;
             	//         	$title .= empty($res['0']['tag']['group_126'][0])?'':'-'.($res['0']['tag']['group_126'][0]/C('MULTIPLY_DOUBLE')).'㎡';
             	//         	$logo = getLogoimage(['mall_id' =>$res[0]['mall_id']]);
             	//         	$share = new FC\WeiXin\share();
             	//         	$desc = $share->makeDemandDesc(['mall_id' =>$res[0]['mall_id']]);
             }
             $this->resultArray['shareInfo'] = [
             		'title' => $title,
             		'logo' => $logo,
             		'desc' => $desc,
             		'link' => $link
             		];
             $this->resultArray['show'] = $show;
             // 如果$template_id 为二的时候需要整理图片路径
             if ($template_id == 2){
                 $this->resultArray['logo'] = [
                 	  'brand_logo' => C('UPLOAD_URL').$options_arr['brand_logo'],
                 	  'brand_xc_logo' => C('UPLOAD_URL').$options_arr['brand_xc_logo'],
                 	  'brand_shop_logo' => C('UPLOAD_URL').$options_arr['brand_shop_logo'],
                 	  'brand_product_logo' => C('UPLOAD_URL').$options_arr['brand_product_logo']
                 ];
             }
        }

        $this->setLayout();
        $this->setView('/h5/template_'.$template_id);
    }
    
    /**
     * 整理数据
     *
     * @param array $args            
     * @param int $actPassportId            
     */
    protected function makeArgs($request)
    {
        $return = [];
        $template_id = $request->get('template_id', 0);
        if ($template_id == 1) {
            $return['act_id'] = 1;
            $return['passport_id'] = $_SESSION['userinfo']['passport_id'];
            $return['brand_id'] = $request->get('brand_id');
            $return['brand_name'] = $request->get('brand_name');
            $return['act_passport_options'] = serialize($request->get());
            return $return;
        }elseif ($template_id == 2){
            $return['act_id'] = 1;
            $return['passport_id'] = $_SESSION['userinfo']['passport_id'];
            $return['brand_id'] = $request->get('brand_id');
            $return['brand_name'] = $request->get('brand_name');
            $return['act_passport_options'] = serialize($request->get());
            return $return;
        }
    }

    /**
     * 添加h5 模板一
     */
    protected function addh5_1($request)
    {
        /**
         * 添加需求
         */
        $demand_id = $this->addBranddemand($request);
        /**
         * 添加到
         */
        $data = $this->makeArgs($request);
        $data['act_passport_options'] = unserialize($data['act_passport_options']);
        $data['act_passport_options']['demand_id'] =  $demand_id;
        $data['act_passport_options'] = serialize($data['act_passport_options']);
        $act_id = $this->addActPassport($data);
        /*
         * 2015/11/02 添加需求需要显示h5标示 所以需要把h5的act_passport_id添加demand表
         */
        $mdb = MDB();
        $mid = new MongoId($demand_id);
        $mdb->update('demand')
            ->set([
            'act_passport_id' => (int) $act_id])
            ->where(['_id'=>$mid])
            ->query();
        return $act_id;
    }
    
    /**
     * 添加h5 模板二
     * */
    protected function addh5_2($request)
    {
//         发布需求
        $demand_id = $this->addBranddemand($request);
//         添加到act_passport
        $data = $this->makeArgs($request);
        $data['act_passport_options'] = unserialize($data['act_passport_options']);
        $data['act_passport_options']['demand_id'] =  $demand_id;
        $data['act_passport_options'] = serialize($data['act_passport_options']);
        $act_id = $this->addActPassport($data);
        /*
         * 2015/11/02 添加需求需要显示h5标示 所以需要把h5的act_passport_id添加demand表
        */
        $mdb = MDB();
        $mid = new MongoId($demand_id);
        $mdb->update('demand')
        ->set([
        		'act_passport_id' => (int) $act_id])
        		->where(['_id'=>$mid])
        		->query();
        return $act_id;
    }
    /*
     * 发布拓展需求 *
     */
    protected function addBranddemand($request)
    {
        if ($_SESSION['userinfo']['passport_status'] == 2) {
            $demand_status_var = 2;
        } else {
            $demand_status_var = 1;
        }
        $demandArr = [
            'demand_ctime' => date("Y-m-d H:i:s", time()),
            'demand_utime' => date("Y-m-d H:i:s", time()),
            // 'demand_expiry_at' => str_replace('/', '-', $demand_expiry_at),
            'passport_id' => (int) $_SESSION['userinfo']['passport_id'],
            'brand_id' => (int) $request->get('brand_id'),
            'brand_name' => $request->get('brand_name'),
            'category_ids' => $this->changeStrToArray($request->get('category_ids')),
            'category_ids_other' => $request->get('category_ids_other'),
//             'area_id' => (int) $request->get('area_id'),
            'area_id' => \FC\Comm::toInt($request->get('area_id', 0), true),
            'demand_desc' => $request->get('demand_desc'),
            'demand_show_mobile' => 1, // 在不在需求中间显示手机号码
            'demand_level' => 1,
            'demand_status' => (int) $demand_status_var, // 状态：2已认证|1未认证|0删除
            'demand_type' => (int) 1,
            'passport_type' => (int) $_SESSION['userinfo']['passport_type'],
            'passport_company' => $_SESSION['userinfo']['passport_company'],
            'allow_moible' => (int) 0,
            'weixin_push'=> (int) 1
        ];
        $demand_tag_arr = [
            'group_36',
            'group_40',
            'group_41',
            'group_46'
        ];
        $multiply = [
            'group_41',
            'group_40'
        ]; // 需要加倍的ID
        $requestinfo = $request->get();
        foreach ($requestinfo as $key => $val) {
            if (! in_array($key, $demand_tag_arr)) {
                continue;
            }
            if (strpos($key, 'group') === 0) {
                if (in_array($key, $multiply)) {
                    $demandArr['tag'][$key] = $this->changeStrToArray($val, 1);
                } else {
                    $demandArr['tag'][$key] = $this->changeStrToArray($val);
                }
            }
        }
        $db = MDB();
        $result = $db->insert($demandArr)
            ->into('demand')
            ->query();
        if($result){
            //添加新需求队列--给数据团队
            \FC\Demand::addQueue($demandArr, $result, $demandArr['passport_id']);
        }
        
        //             发送短信与微信
        //1 获得关注本品牌的人
        $brand_id = $request->get('brand_id');
        $brand_name = $request->get('brand_name');
        $demand_desc = $request->get('demand_desc');
        $demandUser = new FC\Demand();
        $returnPidArr = $demandUser->getAttentionUserList(['brand_id'=>$brand_id]);
        if (!empty($returnPidArr)){
        	$passport_db = new \Model\Passport();
        	foreach ($returnPidArr as $key => $val){
        		if ($val['passport_id'] != $_SESSION['userinfo']['passport_id']){
        			$CheckRes_wei_sms = new  FC\WeiXin();
        			$check_return = $CheckRes_wei_sms->checkIsSendAttentionMsg($val['passport_id'],['brand_id'=>$brand_id]);
        			if ($check_return['weixin']) {
        				// 发送微信
        				$json_weixin_content = [
        						'first' => [
        								'value' => '您关注的项目发布了新的需求'
        								],
        						'keyword1' => [
        								'value' => $brand_name
        								],
        						'keyword2' => [
        								'value' => '品牌'
        								],
        						'keyword3' => [
        								'value' => $_SESSION['userinfo']['passport_name']
        								],
        						'keyword4' => [
        								'value' => date("Y年m月d日 H:i", time())
        								],
        						'keyword5' => [
        								'value' => $demand_desc
        								],
        						'remark' => [
        								'value' => '为了防止骚扰，每天最多向您推送3条新需求通知。'
        								]
        						];
        				//查询openId
        				$logweixincontent = [
        						'log_weixin_ctime' => date("Y-m-d H:i:s",time()),
        						'passport_id' => $val['passport_id'],
        						'passport_weixin_open_id' => $demandUser->getOpenId($val['passport_id']),
        						'log_weixin_type' => 5,
        						'log_weixin_url' => C('WEB_URL').'/ucenter/demandshow/demandid/'.$result,
        						'log_weixin_content' => json_encode($json_weixin_content),
        						'log_weixin_status' => 1
        						];
        				$log_weixin_db = new \Model\Log\Weixin();
        				$log_weixin_db->add($logweixincontent); //添加微信类容
        			}
        			if ($check_return['sms']){
        				// 发送短信 记录短信log
        				$passport_res_a = $passport_db->select()->from('passport')->where(['passport_id'=>$val['passport_id']])->query();
        				$passport_res = $passport_res_a[0];
        				//添加需求短信开关  2015/11/02 leiy
        				if ($passport_res['passport_msg_push_demand'] == 1){
        					$is_send = false;
        					$is_send = SendSMS($passport_res['passport_mobile'], 7, ['project'=>$brand_name], 1);
        					if (! $is_send) {
        						$is_send = SendSMS($passport_res['passport_mobile'], 7, ['project'=>$brand_name], 2);
        					}
        					if ($is_send) {
        						// 记录短信发送
        						$smsArgs = array(
        								'log_sms_ctime' => date('Y-m-d H:i:s'),
        								'passport_id' => $val['passport_id'],
        								'passport_id_sender' => '',
        								'log_sms_to_mobile' => $passport_res['passport_mobile'],
        								'log_sms_type' => 7,
        								'log_sms_content' => \Frame\Util\UString::json(['brand_id'=>$brand_id])
        						);
        						$smsObj = new \Model\Log\Sms();
        						$smsObj->add($smsArgs);
        					}
        				}
        			}
        		}
        	}
        }
        return $result;
    }

    /**
     * 添加数据
     */
    public function addActPassport($data)
    {
        $db = DB();
        $act_passport_arr = [
            'act_passport_ctime' => date('Y-m-d H:i:s', time()),
            'passport_id' => $data['passport_id'],
            'act_id' => $data['act_id'],
            'mall_id' => $data['mall_id'],
            'mall_name' => $data['mall_name'],
            'brand_id' => $data['brand_id'],
            'brand_name' => $data['brand_name'],
            'act_passport_options' => $data['act_passport_options'],
            'act_passport_return_options' => $data['act_passport_return_options']
        ];
        $result = $db->insert($act_passport_arr)
            ->into('act_passport')
            ->query();
        if ($result > 0) {
            return $result;
        } else {
            return -1;
        }
    }
    
    /**
     * 通过request 数据 生成我们需要展示的数据
     * */
    protected function makeShowData($requestData,$template_id){
        if ($template_id == 1 || $template_id == 2){
            //业态处理
            $cate_arr = explode(',', $requestData['category_ids']);
            foreach ($cate_arr as $key => $val)
            {
                $cate_arr_deep[] = $this->getCategoryName($val);
            }
            $cate_arr_deep = array_unique($cate_arr_deep);
            $category_str = Comm::getCategoryDeepName($cate_arr_deep);
            $category_str = str_replace('<p>', '', $category_str);
            $category_str = str_replace('</p>', '', $category_str);
            if (!empty($requestData['category_ids_other'])){
                $category_str .= $requestData['category_ids_other'];
            }
            $category_str = $category_str.'业态';
            $requestData['category_str'] = $category_str;
            // 拓展城市
            $bdCity = FC\GetValue::getInfoList('fangcheng_v2', 'area', $requestData['area_id'], true);
            $bdCity = $bdCity['resuleMsg'];
            $requestData['bdCity'] = $bdCity;
            //首选物业
            $group_36_str = FC\GetValue::getInfoList('fangcheng_v2', 'tag', $requestData['group_36'], true);
            $group_36_str = $group_36_str['resuleMsg'];
            $requestData['group_36_str'] = $group_36_str;
            //面积需求
            $group_41_str = $requestData['group_41']['lower'].'-'.$requestData['group_41']['upper'].'㎡';
            $requestData['group_41_str'] = $group_41_str;
            //工程条件
            $group_46_str = FC\GetValue::getInfoList('fangcheng_v2', 'tag', $requestData['group_46'], true);
            $group_46_str = $group_46_str['resuleMsg'];
            $requestData['group_46_str'] = $group_46_str;
            $group_17_str = $requestData['group_17'];
            $group_17_str = explode(',', $group_17_str);
            $group_17_str = $group_17_str[0];
            $requestData['group_17'] = $group_17_str;
        }
        return $requestData;
    }
    /*
     * 转换成熟组的值都是int类型 @param $string String 字符串或者数组 只支持一维数组 @return $array array
     */
    private function changeStrToArray($string, $double = 0)
    {
        // $multiply= ['group_41','group_40','group_42',];MULTIPLY_DOUBLE
        if (is_array($string)) {
            foreach ($string as $key => $val) {
                if ($double) {
                    $val = sprintf("%.2f", $val);
                    $middle = $val * C('MULTIPLY_DOUBLE');
                    $return[$key] = (int) $middle;
                } else {
                    $return[$key] = (int) $val;
                }
            }
        } else {
            $StrArr = explode(',', $string);
            if (count($StrArr) >= 1) {
                foreach ($StrArr as $key => $val) {
                    if ($double) {
                        $val = sprintf("%.2f", $val);
                        $middle = $val * C('MULTIPLY_DOUBLE');
                        $return[] = (int) $middle;
                    } else {
                        $return[] = (int) $val;
                    }
                }
            } else {
                if ($double) {
                    $string = sprintf("%.2f", $string);
                    $middle = $val * C('MULTIPLY_DOUBLE');
                    return (int) $middle;
                } else {
                    return (int) $string;
                }
            }
        }
        return $return;
    }
    
    
    public  function getCategoryName($categroyId, $deep=1)
    {
    	$categoryList = json_decode($categoryList, true);
    	switch ($deep) {
    		case 1:
    			$categroyId = $categroyId - ($categroyId%10000);
    			break;
    		case 2:
    			if($categroyId%10000 == 0){
    				return '';
    			}
    			$categroyId = $categroyId - ($categroyId%100);
    			break;
    		case 3:
    			if($categroyId%100 == 0){
    				return '';
    			}
    			break;
    	}
    	return $categroyId;
    	//     	$rs = \FC\GetValue::getinfo('fangcheng_v2', 'category', $categroyId);
    	//     	return $rs['resuleMsg'][category_name];
    }
}