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
//        $demand_type = 1;
//        $result = \FC\Cs::getMyApplyCs($demand_type);
//        $demand_type = 2;
//        $result1 = \FC\Cs::getMyApplyCs($demand_type);
//        $result = \FC\Cs::getAllApplyCs();
        $cs = new FC\Cs($csid);
        $result = $cs->getInfo(true);
//        var_dump($result[0]);
//        exit();
       // var_dump($result);
        \FC\Session::initSession();
//        $result = array_merge($result1,$result);
        //foreach ($result[0] as $key => $val){
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
            $result[0]['demandInfo'] = $demandInfo['return'];
            $result[0]['csInfo'] = $demandInfo[0];
            if (!empty($demandInfo[0]['brand_id'])){
                $link = '/details/brand/brand_id/'.$demandInfo[0]['brand_id'];
            }elseif (!empty($demandInfo[0]['mall_id'])){
                $link = '/details/mall/mall_id/'.$demandInfo[0]['mall_id'];
            }
            $result[0]['link'] = $link;
            $result[0]['passportInfo'] = $passportInfo['resuleMsg'];
            $result[0]['cs_passportInfo'] = FC\Cs::getPassportCSinfo($csid,$_SESSION['userinfo']['passport_id'])[0];
            $result[0]['cs_passport_id'] = $passportInfo['passport_id'];
            # 个人信息
            $result[0]['cs_passport_type'] = $passportInfo['passport_picture'];

        if (!empty($demandInfo[0]['mall_id'])){

            $url = C('SERVICE_IP').'/info/mall/id/' . $demandInfo[0]['mall_id'];
            $basicTag = file_get_contents($url);
            $basicTag = json_decode($basicTag, true);
            if($basicTag['result'] == true){
                ! empty($mall_area) && ($area_name = $mall_area['resuleMsg']['area_name']);
            }else{
                $area_name = '';
            }
        }elseif( !empty($demandInfo[0]['brand_id'])){
            $url = C("SERVICE_IP").'/info/brand/tag/id/'.$demandInfo[0]['brand_id'];
            $basicTag = file_get_contents($url);
            $basicResult = json_decode($basicTag,true);
            if($basicResult['result'] == true){
                $area_name = $basicResult['info']['group_33'][0];
            }else{
                $area_name = '';
            }
        }
            $result[0]['cs_passport_city'] = $area_name;
            $applyinfo = $cs->getPassportList();
        if (!empty($applyinfo)){
            foreach ($applyinfo as $h => $i){
                $cont = \FC\Cs::getContact($i['cs_passport_apply_id']);
               // var_dump($cont);exit();
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
                        ! empty($mall_area) && ($area_name = $mall_area['resuleMsg']['area_name']);
                    }else{
                        $area_name = '';
                    }
                    $id_arr['mall_id'] = $i['mall_id'];
                }elseif( !empty($i['brand_id'])){
                    $url = C("SERVICE_IP").'/info/brand/tag/id/'.$i['brand_id'];
                    $basicTag = file_get_contents($url);
                    $basicResult = json_decode($basicTag,true);
                    if($basicResult['result'] == true){
                        $area_name = $basicResult['info']['group_33'][0];
                    }else{
                        $area_name = '';
                    }
                    $id_arr['brand_id'] = $i['brand_id'];
                }
                $applyinfo[$h]['logo'] = getLogoimage($id_arr,'48x48');
                $applyinfo[$h]['zhuangtai'] = $zhuangtai;
                $applyinfo[$h]['area_name'] = $area_name;
                $applyinfo[$h]['contacts'] = $cont;
                $applyinfo[$h]['cs_passport_apply_agree_at'] = str_replace("00:00:00",'',$applyinfo[$h]['cs_passport_apply_agree_at']);
                $applyinfo[$h]['cs_passport_brand_name'] = $basicTag['result']['brand_name'];
                $applyinfo[$h]['cs_passport_brand_id'] = $basicTag['result']['brand_id'];
                //$applyinfo[$h]['cs_passport_apply_ctime'] = $basicTag['result']['passport_apply_time'];
                unset($zhuangtai);
            }
            //$result[$key]["cs_passport_apply_agree_at"] = str_replace("00:00:00","",$result[$key]["cs_passport_apply_agree_at"]);
            $result[0]['apply'] = $applyinfo;
            }
            unset($cs);
            unset($demandInfo);
            unset($passportInfo);
            unset($applyinfo);
        //}

//        exit();
        $this->result = $result;
        $this->demand_type = $demand_type;
	}
}