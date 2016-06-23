<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Frame\Foundation\Action;
use Frame;
use FC;
use FC\GetValue;


/**
 * 用户的所有动作行为
 *
 */
class UcenterAction extends Action
{

    /**
     * 我的账户
     *
     * @param Application $application
     */
    public function executeMyapplycsinfo(Application $application, Request $request)
    {
        FC\Session::initSession();
//        $this->setLayout('detailslayout');
        $demand_type = $request->get('demand_type',1);
        $csid = $request->get('csid','');
        if(empty($csid)){
            $this->headerTo('404');
        }
        $demand_type = 1;
        /*$result = \FC\Cs::getMyApplyCs($demand_type);
        $demand_type = 2;
        $result1 = \FC\Cs::getMyApplyCs($demand_type);*/
        $result = \FC\Cs::getAllApplyCs();
        $cs = new FC\Cs($csid);
        $result = $cs->getInfo(true);
//        var_dump($result);
//        exit();
       // var_dump($result);
        \FC\Session::initSession();
//        $result = array_merge($result1,$result);
        foreach ($result as $key => $val){
//            var_dump($val);
//            exit();
            $cs = new \FC\Cs($csid);
            $demandInfo = $cs->getInfo();
            $passportInfo = GetValue::getinfo('fangcheng_v2', 'passport', $demandInfo[0]['passport_id']);
            $passportInfo['resuleMsg']['passport_picture'] = C('UPLOAD_URL').$passportInfo['resuleMsg']['passport_picture'];
            $passportInfo['resuleMsg']['passport_picture'] = C('WEB_URL').$passportInfo['resuleMsg']['passport_id'];
            if($passportInfo['passport_type'] == 1){
                $passportStatus = '已登录';
            }elseif($passportInfo['passport_type'] == 2){
                $passportStatus = '未登录';
            }
            $passportInfo['passport_picture'];
            $result[$key]['demandInfo'] = $demandInfo['return'];
            $result[$key]['csInfo'] = $demandInfo[0];
            if (!empty($demandInfo[0]['brand_id'])){
                $link = '/details/brand/brand_id/'.$demandInfo[0]['brand_id'];
            }elseif (!empty($demandInfo[0]['mall_id'])){
                $link = '/details/mall/mall_id/'.$demandInfo[0]['mall_id'];
            }
            $result[$key]['link'] = $link;
            $result[$key]['passportInfo'] = $passportInfo['resuleMsg'];
            $result[$key]['cs_passportInfo'] = FC\Cs::getPassportCSinfo($csid,$_SESSION['userinfo']['passport_id'])[0];
            $result[$key]['cs_passport_id'] = $passportInfo['passport_id'];
            # 个人信息
            $result[$key]['cs_passport_type'] = $passportInfo['passport_picture'];

            $applyinfo = $cs->getPassportList();
            if (!empty($applyinfo)){
            foreach ($applyinfo as $h => $i){
                $cont = \FC\Cs::getContact($i['cs_passport_apply_id']);
                //联系人
                foreach ($cont as $k => $v){
                    $applyinfo[$h]['u_name'][] = $v['cs_passport_apply_contact_name'];
                }
                //申请状态
                if ($i['cs_passport_apply_status'] == 0){
                    $zhuangtai = '待处理';
                } elseif ($i['cs_passport_apply_status'] == 1 && $i['cs_passport_pay_status'] == 1){
                    $zhuangtai = '已确认';
                } elseif ($i['cs_passport_apply_status'] == 1){
                    $zhuangtai = '已同意';
                } elseif ($i['cs_passport_apply_status'] == -1){
                    $zhuangtai = '已拒绝';
                }
                if (!empty($i['mall_id'])){

                    $url = C('SERVICE_IP').'/info/mall/id/' . $i['mall_id'];
                    $basicTag = file_get_contents($url);
                    $basicTag = json_decode($basicTag, true);
                    if($basicTag['result'] == true){
                        ! empty($basicTag['info']['area_id']) && ($mall_area = FC\GetValue::getinfo("fangcheng_v2", 'area', $basicTag['info']['area_id']));
                        ! empty($basicTag['info']['area_id']) && ($mall_area = FC\GetValue::getinfo('fangcheng_v2', 'area', $basicTag['info']['area_id']));
                        ! empty($basicTag['info']['area_id']) && ($mall_area = FC\GetValue::getinfo('fangcheng_v2','brand',$basicTag['info']['area_id']));
                        ! empty($mall_area) && ($area_name = $mall_area['resuleMsg']['area_name']);
                    }else{
                        $area_name = '';
                    }
                }elseif( !empty($i['brand_id'])){
                    $url = C("SERVICE_IP").'/info/brand/tag/id/'.$i['brand_id'];
                    $basicTag = file_get_contents($url);
                    $basicResult = json_decode($basicTag,true);
                    if($basicResult['result'] == true){
                        $area_name = $basicResult['info']['group_33'][0];
                    }else{
                        $area_name = '';
                    }
                }
//                var_dump($area_name);echo "<hr>";
                $applyinfo[$h]['zhuangtai'] = $zhuangtai;
                $applyinfo[$h]['area_name'] = $area_name;
                $applyinfo[$h]['cs_passport_apply_agree_at'] = str_replace("00:00:00",'',$applyinfo[$h]['cs_passport_apply_agree_at']);
                $applyinfo[$h]['cs_passport_brand_name'] = $basicTag['result']['brand_name'];
                $applyinfo[$h]['cs_passport_brand_id'] = $basicTag['result']['brand_id'];
                $url = C("SERVICE_IP").'/info/brand/tag/id/'.$i['brand_id'];
                $basicTag = file_get_contents($url);
                $basicResult = json_decode($basicTag,true);
                if($basicResult['result'] == true){
                    $area_name = $basicResult['info']['group_33'][0];
                }else{
                    $area_name = '';
                }
                $applyinfo[$h]['area_name'] = $basicResult['info']['tag'];
                $url = C("SERVICE_IP").'info/mall/id' .$i['mall_id'];
                unset($zhuangtai);
            }
            //$result[$key]["cs_passport_apply_agree_at"] = str_replace("00:00:00","",$result[$key]["cs_passport_apply_agree_at"]);
            $result[$key]['apply'] = $applyinfo;
            }
            unset($cs);
            unset($demandInfo);
            unset($passportInfo);
            unset($applyinfo);
        }
//        var_dump($result);
//        exit();
//        exit();
        $this->result = $result;
        $this->demand_type = $demand_type;
	}
}