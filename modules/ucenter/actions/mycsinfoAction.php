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
    public function executeMycsinfo(Application $application, Request $request)
    {
        FC\Session::initSession();
        //$this->setLayout('detailslayout');
        $csid = $request->get('csid');
        $search = $request->get('search',1);
        $req = $request->get('req',1);
        if (empty($csid)){
            $this->headerTo('/error/404');
        }
        $cs = new \FC\Cs($csid);
        $csInfo = $cs->getInfo();
        if ($csInfo[0]['passport_id'] != $_SESSION['userinfo']['passport_id']){
            $this->headerTo('/error/404');
        }
        $passportApply = FC\Cs::getPassportApplyList($csid,$req);
        $passportApplyCount = FC\Cs::getPassportApplyCount($csid);
        // 获取停止或完成 时 获取中标人的信息
        if($csInfo[0]['cs']['status'] == 1  && (($csInfo[0]['cs']['result'] == 2)||($csInfo[0]['cs']['result'] == 3) ) ){
            $passportWinApply = FC\Cs::getPassportApplyList($csid,4);
            foreach($passportWinApply as $k => $v){
                if($passportWinApply[$k]['winnershow'] == 1){
                    $v['area_name'] = $this->get_city($v);
                    $this->passportWinApply = $v;
                }
            }
        }
        /*$passportLog = FC\Cs::getMyApplyCs($passportApply["cs_passprot_demand_id"]);
        if($passportLog){
            $passportApply["apply_time"] = $passportLog["log_log_ctime"];
        }else{
            $passportApply["apply_time"] = "";
        }*/
//        var_dump($passportApply);
//        substr();
//        exit();
        $allCsPassport = $cs->getAllCsPassport();
        foreach ($allCsPassport as $key => $val){
            $name = GetValue::getinfo('fangcheng_v2', 'passport', $val['passport_id']);
            $allCsPassport[$key]['passport_name'] = $name['resuleMsg']['passport_name'];
        }
        //跳转链接
        if (!empty($csInfo[0]['brand_id'])){
            $link = '/details/brand/brand_id/'.$csInfo[0]['brand_id'];
        }elseif (!empty($csInfo[0]['mall_id'])){
            $link = '/details/mall/mall_id/'.$csInfo[0]['mall_id'];
        }
        $link2 = '/demand/csinfo/csid/'.(string)$csInfo[0]['_id'];
        $this->csinfo = $csInfo;
        foreach($passportApply as $k => $val){
            $passportApply[$k]['area_name'] = $this->get_city($val);
        }
        $this->passportApply = $passportApply;
//        var_dump($passportApply);
//        exit();
        $this->passportApplyCount = $passportApplyCount; 
        $this->search = $search;
//       var_dump($csInfo);echo "《hr》";
//        exit();
        $this->req = $req;
        $this->allCsPassport = $allCsPassport;
        $this->link = $link;
        $this->link2 = $link2;
        $this->jumpurl =urlFor('', $request->get());
        /*var_dump($allCsPassport);
        exit();*/
	}

    /**
     * @param $args
     * @return string
     */
    public function get_city($args)
    {
        // 所在城市
        if (!empty($args['mall_id'])){
            $url = C('SERVICE_IP').'/info/mall/id/' . $args['mall_id'];
            $basicTag = file_get_contents($url);
            $basicTag = json_decode($basicTag, true);
            if($basicTag['result'] == true){
                ! empty($basicTag['info']['area_id']) && ($mall_area = FC\GetValue::getinfo("fangcheng_v2", 'area', $basicTag['info']['area_id']));
                ! empty($mall_area) && ($city = $mall_area['resuleMsg']['area_name']);
            }else{
                $city = '';
            }
        }elseif( !empty($args['brand_id'])){
            $url = C("SERVICE_IP").'/info/brand/tag/id/'.$args['brand_id'];
            $basicTag = file_get_contents($url);
            $basicResult = json_decode($basicTag,true);
            if($basicResult['result'] == true){
                $city = $basicResult['info']['group_33'][0];
            }else{
                $city = '';
            }
        }
        return $city;
    }
}