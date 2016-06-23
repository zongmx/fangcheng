<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Model;
use FC;

/**
 * 悬赏列表
 *
 * @author yulei
 * @version 0.2.0
 */
class csAction extends Frame\Foundation\Action
{

    public function preExecute(Application $application, Request $request)
    {}

    /**
     *悬赏列表
     */
    public function executeList(Application $application, Request $request)
    {
        //$demand_type = $request->get('demand_type',1);
        $this->setLayout("indexLayout");
        $where['demand_type'] = array(array('=', 1), array('=', 2), 'or');
       $where['cs.status'] = 1;
       $csInfo = FC\Cs::getList($where);
        /*$pageNow = time();
        $query = $demand_type->where;
        $search["where"] = strlen("go from str ");
        $this->resultArray = $this->comment->pageList(10, $pageNow, $query, 0, $search['where']);
        var_dump($csInfo);
        exit();*/
       foreach ($csInfo as $key => $val){
           if(($val["cs"]["status"] == 1) && $val['cs']['result'] == 1 && $val['cs']['expire_at'] >= date('Y-m-d')){
               $csInfo1[$key] = $csInfo[$key];
               
               $area = FC\GetValue::getInfo('fangcheng_v2', 'area', $val['area_id'], 'area_name');
               $csInfo1[$key]['area_str'] = $area;
               $passport = FC\GetValue::getInfo('fangcheng_v2', 'passport', $val['passport_id']);
               $passport = $passport['resuleMsg'];
               $csInfo1[$key]['passportinfo'] = $passport;
               //首选物业
               if (!empty($val['tag']['group_36'])){
                   $group_36_info = FC\GetValue::getInfoList('fangcheng_v2', 'tag', $val['tag']['group_36'], true);
                   if ($group_36_info['result'] == 1){
                       $group_36_info = $group_36_info['resuleMsg'];
                   }
                   $csInfo1[$key]['group_36_info'] = $group_36_info;
               }
               if ($val['demand_type'] == 1){
                   $id_arr['brand_id'] = $val['brand_id'];
               }elseif ($val['demand_type'] == 2){
                   $id_arr['mall_id'] = $val['mall_id'];
               }
               $logo = getLogoimage($id_arr);
               $csInfo1[$key]['logo'] = $logo;
           }
       }
       $this->csInfo = $csInfo1;
//        var_dump($csInfo1);exit();
       $this->showModel = 'cs';
       $this->type = $demand_type;
    }
}