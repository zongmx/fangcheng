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
    public function executeMallbroadcast(Application $application, Request $request)
    {
        $this->setLayout();
        $mall_id = $request->get('mall_id');
        $page = empty($request->get('page_broad')) ? 1 : $request->get('page_broad');
        if (empty($mall_id)) {
            return false;
        }
        // 获得需求广播列表
        $mdb = MDB();
        $count = $mdb->select("count(1)")
            ->from('demand')
            ->where([
            'mall_id' => (int) $mall_id,
            'demand_status' => [
                '!=',
                0
            ],
            'demand_type' => 2
        ])
            ->query();
        $demandresult = $mdb->select()
            ->from('demand')
            ->where([
            'demand_status' => [
                '!=',
                0
            ],
            'mall_id' => (int) $mall_id,
            'demand_type' => 2
        ])
            ->orderBy('demand_ctime desc')
            ->limit(($page - 1) * 1, 1)
            ->query();
        if (empty($demandresult)){
            $isdemand = '';
        }else {
            $isdemand = 1;
        }
        $goprepage = 1;
        $goprenextpage = 1;
        if ($page == 1){
            $goprepage = 0;
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
        
        $demandresult = array_values($demandresult);
        /* 读取用户的最新信息 */
        $passportDb = new \Model\Passport();
        foreach($demandresult as $key=>&$value)
        {
            $passportinfo = $passportDb->select()
            ->where('passport_id=?', $value['passport_id'])
            ->query();
        	$value['demand_status'] = $passportinfo ? $passportinfo[0]['passport_status'] : $value['demand_status'];
        }
        $demand_ctime = explode(' ', $demandresult[0]['demand_ctime']);
        $demandresult[0]['demand_ctime'] = $demand_ctime[0];
        $demandresult[0]['demand_expiry_at'] = str_replace('/', '-', $demandresult[0]['demand_expiry_at']);
        $this->resultArray = [];
        $demand_shop_type_id = $demandresult[0]['demand_shop_type'];
        $demandArr = [1=>'主力店',2=>'次主力店',3=>'普通店铺'];
        $deman_shop_str = is_array($demand_shop_type_id) ? $demand_shop_type_id : explode(',', $demand_shop_type_id);
        $deman_shop_str_s = [];
        foreach ($deman_shop_str as $key=>$val){
            $deman_shop_str_s[] =  $demandArr[$val];
        }
        $demandresult[0]['demand_desc'] = FC\Comm::compressHtml($demandresult[0]['demand_desc']);
        $deman_shop_str_s = implode(',', $deman_shop_str_s);
        $this->resultArray['goprepage'] = $goprepage;
        $this->resultArray['goprenextpage'] = $goprenextpage;
        $this->resultArray['mall_id'] = $mall_id;
        $this->resultArray['page'] = $page;
        $this->resultArray['count'] = $count;
        $this->resultArray['isdemand'] = $isdemand;
        $this->resultArray['tag'] = $demandresult[0]['tag'];
        $this->resultArray['mall_demand']['result'] = $demandresult;
        $this->resultArray['demanduserinfo'] = $this->getdemanduserinfo($demandresult[0]['passport_id']);
        $this->resultArray['passport_in_blacklist'] = $this->resultArray['demanduserinfo']['passport_in_blacklist'];
        $cc = \FC\Comm::getCategoryDeepName($demandresult[0]['category_ids']);
        $cc .= $demandresult[0]['category_ids_other'];
        $this->resultArray['demand_category_str'] = $cc;// FC\GetValue::getInfoList('fangcheng_v2', 'category', $demandresult[0]['category_ids'], 1);
//         $this->resultArray['demand_category_str'] = FC\GetValue::getInfoList('fangcheng_v2', 'category', $demandresult[0]['category_ids'], 1);
        $shareinfo  = makeShareLink(['demandid'=> $demandresult[0]['_id']],['ucenter'=>'demandshow']);
        $this->resultArray['shareinfo'] = $shareinfo;
        $this->resultArray['deman_shop_str_s'] = $deman_shop_str_s;
        //检测备注能不能看
        $this->resultArray['remarks_right'] = FC\Comm::getRemarksRight();
 
        
   }
   
   public function getmallbroadcast($mall_id)
   {
   	if (empty($mall_id)) {
   		return false;
   	}
   	$mdb = MDB();
   	$count = $mdb->select("count(1)")
   	->from('demand')
   	->where([
   			'mall_id' => (int) $mall_id,
   			'demand_status' => ['!=',0],
   			'demand_type' => 2
   			])
   			->query();
   	$result = $mdb->select()
   	->from('demand')
   	->where([
   			'demand_status' => ['!=',0],
   			'mall_id' => (int) $mall_id,
   			'demand_type' => 2
   			])
   			->orderBy('demand_ctime desc')
   			->limit(1)
   			->query();
   	if (!empty($result)){
   		return [
   				'count' => $count,
   				'result' => $result
   				];
   	}else {
   		return false;
   	}
   }
   
   /**
    * 获得需求广播人的数据
    * */
   private  function getdemanduserinfo($passport_id){
   	if (empty($passport_id)){
   		return false;
   	}
//    	$info = FC\GetValue::getinfo('fangcheng_v2', 'passport', $passport_id);
   	$passport = new \Model\Passport($passport_id);
   	$info['resuleMsg'] = $passport->info();
   	if (empty($info['resuleMsg'])){
   		return false;
   	}
   	if ($info['resuleMsg']['passport_private_mode'] == 1){
   		if ($info['resuleMsg']['passport_sex'] == 1){
   			$return['demand_passport_name'] = $info['resuleMsg']['passport_first_name'].'先生';
   		}elseif ($info['resuleMsg']['passport_sex'] == 2) {
   			$return['demand_passport_name'] = $info['resuleMsg']['passport_first_name'].'女士';
   		}
   	}else {
   		$return['demand_passport_name']=$info['resuleMsg']['passport_name'];
   	}
//    	$return['demand_passport_name'] =  $info['resuleMsg']['passport_name'];
   	$return['demand_passport_job_title'] =  $info['resuleMsg']['passport_job_title'];
   	$return['demand_passport_status'] =  $info['resuleMsg']['passport_status'];
   	$return['demand_passport_picture'] =  empty($info['resuleMsg']['passport_picture']) ? '' : C('UPLOAD_URL') .  $info['resuleMsg']['passport_picture'];
   	$return['demand_passport_id'] =  $info['resuleMsg']['passport_id'];
   	$return['passport_in_blacklist'] =  $info['resuleMsg']['passport_in_blacklist'];
   	return $return;
   }
}



