<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Frame\Foundation\Action;
use FC;

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
    public function executeBrandbroadcast(Application $application, Request $request)
    {
        $this->setLayout();
        $brand_id = $request->get('brand_id');
        $page = empty($request->get('page_broad')) ? 1 : $request->get('page_broad');
        if (empty($brand_id)) {
            return false;
        }
        // 获得需求广播列表
        $mdb = MDB();
        $count = $mdb->select("count(1)")
            ->from('demand')
            ->where([
            'brand_id' => (int) $brand_id,
            'demand_status' => [
                '!=',
                0
            ],
            'demand_type' => 1
        ])
            ->query();
        $demandresult = $mdb->select()
            ->from('demand')
            ->where([
            'demand_status' => [
                '!=',
                0
            ],
            'brand_id' => (int) $brand_id,
            'demand_type' => 1
        ])
            ->orderBy('demand_ctime desc')
            ->limit(($page - 1) * 1, $page)
            ->query();
        if (empty($demandresult)){
            $isdemand = '';
        }else {
            $isdemand = 1;
        }
        $demandresult = array_values($demandresult);
        $demandresult = $demandresult[0];
        
        //城市
//         $areainfo = FC\GetValue::getinfo('fangcheng_v2', 'area', $demandresult['area_id'],['area_name']);
//         $demandresult['area_name'] = $areainfo['area_name'];
        $demandresult['area_name'] = FC\GetValue::getinfo('fangcheng_v2','area', $demandresult['area_id'], '', 1);;
        //首选物业 group_36
        $group_36_str = FC\GetValue::getInfoList('fangcheng_v2', 'tag', $demandresult['tag']['group_36'], 1);
        if ($group_36_str['result'] == 1 ){
            $group_36_str = $group_36_str['resuleMsg'];
        }else {
            $group_36_str = '';
        }
        $demandresult['group_36_str'] = $group_36_str;
        //店铺类型 group_116
        $group_116_str = FC\GetValue::getInfoList('fangcheng_v2', 'tag', $demandresult['tag']['group_116'],1);
        if ($group_116_str['result'] == 1 ){
        	$group_116_str = $group_116_str['resuleMsg'];
        }else {
        	$group_116_str = '';
        }
        $demandresult['group_116_str'] = $group_116_str;
        //店铺规格 group_46
        $group_46_str = FC\GetValue::getInfoList('fangcheng_v2', 'tag', $demandresult['tag']['group_46'],1);
        if ($group_46_str['result'] == 1 ){
        	$group_46_str = $group_46_str['resuleMsg'];
        }else {
        	$group_46_str = '';
        }
        $demandresult['group_46_str'] = $group_46_str;
        // 获得需求广播人的信息
//         $passportresult = FC\GetValue::getinfo('fangcheng_v2', "passport", $demandresult['passport_id'],['passport_name','passport_status','passport_job_title','passport_id']);
        $passportObj = new \Model\Passport($demandresult['passport_id']);
        $passportresult = $passportObj->find();
        
        $this->resultArray = [];
        $demand_ctime = explode(' ', $demandresult['demand_ctime']);
        $demandresult['demand_ctime'] = $demand_ctime[0];
        $demandresult['demand_expiry_at'] = str_replace('/', '-', $demandresult['demand_expiry_at']);
        $demandresult['demand_desc'] = FC\Comm::compressHtml($demandresult['demand_desc']);
        
        /* 读取用户的最新信息 */
        $passportDb = new \Model\Passport();
            $passportinfo = $passportDb->select()
            ->where('passport_id=?', $demandresult['passport_id'])
            ->query();
        	$demandresult['demand_status'] = $passportinfo ? $passportinfo[0]['passport_status'] : $demandresult['demand_status'];
        
        $this->resultArray['demandresult'] = $demandresult;
        $this->resultArray['passportresult'] = $passportresult;
        $this->resultArray['passport_in_blacklist'] = $passportresult['passport_in_blacklist'];
        $this->resultArray['passportresult']['passport_picture'] = empty($passportresult['passport_picture']) ? '/img/detail/headdefault.png' : C('UPLOAD_URL') .  $passportresult['passport_picture'];
        if ($page == 1){
            $goprepage = 0;
            $goprenextpage = 1;
        }
        if ($page >1 && $page < $count){
        	$goprepage = 1;
        	$goprenextpage = 1;
        }
        if ($page == $count){
            $goprepage = 1;
            $goprenextpage = 0;
        }
        if ($count == 1){
            $goprepage = 0;
            $goprenextpage = 0;
        }
        $this->resultArray['goprepage'] = $goprepage;
        $this->resultArray['goprenextpage'] = $goprenextpage;
        $this->resultArray['brand_id'] = $brand_id;
        $this->resultArray['page'] = $page;
        $this->resultArray['count'] = $count;
        $this->resultArray['isdemand'] = $isdemand;
        $shareinfo  = makeShareLink(['demandid'=> $demandresult['_id']],['ucenter'=>'demandshow']);
        $this->resultArray['shareinfo'] = $shareinfo;
        //检测备注能不能看
        $this->resultArray['remarks_right'] = FC\Comm::getRemarksRight();
   }
}