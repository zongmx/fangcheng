<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Frame\Foundation\Action;
use Frame;
use FC;


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
    public function executeMycs(Application $application, Request $request)
    {
        FC\Session::initSession();
        //$this->setLayout('detailslayout');
        $requesttype = $request->get('type',1);
        $where = [
        	1 => ['cs.status' => ['EXISTS',true],'passport_id'=> (int)$_SESSION['userinfo']['passport_id']], //全部
            2 => ['cs.status' => 1,'cs.result' => 1,'passport_id'=> (int)$_SESSION['userinfo']['passport_id']], //悬赏中  
            3 => ['cs.status' => 0,'passport_id'=> (int)$_SESSION['userinfo']['passport_id']],  //审核中
            4 => ['cs.status' => 1,'cs.result' => 3,'passport_id'=> (int)$_SESSION['userinfo']['passport_id']],  //已完成
            5 => ['cs.status' => 1,'cs.result' => 2,'passport_id'=> (int)$_SESSION['userinfo']['passport_id']],  //已停止
        ];

        $csCount = array();
        foreach($where as $key => $val){
            $csCount[$key] = FC\Cs::getDemandlistCount($val);
        }
        $query = '/ucenter/mycs/page/<--PAGENO-->';
        $page = $request->get('page', 1);
        $pageInfo = \Frame\Http\Pager::setPager($csCount[$requesttype], 20, $page, $query,'',2);
        $csInfo = FC\Cs::getList($where[$requesttype], $pageInfo["now"], $pageInfo["pageSize"]);
        $this->__page_code = $pageInfo["code"];
        $this->cscount = $csCount;
        foreach($csInfo as $k => $val){
            if ($val['demand_type'] == 1){
                $id_arr['brand_id'] = $val['brand_id'];
            }elseif ($val['demand_type'] == 2){
                $id_arr['mall_id'] = $val['mall_id'];
            }
            $logo = getLogoimage($id_arr);
            $areaInfo = FC\GetValue::getInfoList('fangcheng_v2', 'area', $val['area_id'][0], 1);
            if ($areaInfo['result'] == 1){
                $csInfo[$k]['area_name'] = $areaInfo['resuleMsg'];
            }else {
                $csInfo[$k]['area_name'] = '';
            }
            $csInfo[$k]['logo'] = $logo;
        }
        $this->stype = $requesttype;
        $this->csinfo = $csInfo;
	}
}