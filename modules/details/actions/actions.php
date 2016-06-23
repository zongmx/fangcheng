<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Model;
use FC;
use FC\Comm;


/**
 * 用户中心
 */
class detailsActions extends Frame\Foundation\Action
{

    public $db;

    public function preExecute(Application $application, Request $request)
    {
        $this->db = DB();
        $this->jumpurl = \Frame\Util\UString::base64_encode(urlFor('', $request->get()));
    }

    public function executeMall(Application $application, Request $request)
    {
        $mall_id = $request->get('mall_id', 0);
        if (empty($mall_id)) {
            $this->headerTo("/");
        }
        
        // 记录log -- add by Jason
    	\FC\Dynamic\Dynamic::addLog(
    			2,
    			['mall_id'=> $mall_id]
    	);
        
        $url = C('SERVICE_IP') . '/info/mall/id/' . $mall_id;
        $basicResult = file_get_contents($url);
        $basicResult = json_decode($basicResult, true);
        $userinfo = $this->getLoginUserInfo();
        $this->resultArray = [];
        if ($this->isMallEditor($mall_id)) {
            $this->resultArray['isEditor'] = true;
            $this->resultArray['isAttention'] = false;
        } elseif ($this->isMallAttention($mall_id)) {
            $this->resultArray['isEditor'] = false;
            $this->resultArray['isAttention'] = true;
        } else {
            $this->resultArray['isEditor'] = false;
            $this->resultArray['isAttention'] = false;
        }
        $this->resultArray['basicResult'] = $basicResult['info'];
        /*
         * */
        $urltag = C('SERVICE_IP') . '/info/mall/tag/id/' . $mall_id;
        $basicTag = file_get_contents($urltag);
        $basicTag = json_decode($basicTag, true);
        $this->infoTag=$basicTag['info'];
        // 所在城市
        ! empty($basicResult['info']['area_id']) && ($mall_area = FC\GetValue::getinfo("fangcheng_v2", 'area', $basicResult['info']['area_id']));
        ! empty($mall_area) && ($mall_area = $mall_area['resuleMsg']['area_name']);
        $this->resultArray['mall_area'] = $mall_area;
        $this->resultArray['area_id'] = $basicResult['info']['area_id'];
        // 所在商圈
        ! empty($basicResult['info']['business_circle_id']) && ($business_circle_name = FC\GetValue::getinfo("fangcheng_v2", 'business_circle', $basicResult['info']['business_circle_id']));
        ! empty($business_circle_name) && $business_circle_name = $business_circle_name['resuleMsg']['business_circle_name'];
        //图片处理
        $imageurl = C('SERVICE_IP').'/info/mall/img/id/'.$mall_id;
        $imageresult = file_get_contents($imageurl);
        $imageresult = json_decode($imageresult,true);
        /**需求广播的条数*/
        $mdb = MDB();
        $count = $mdb->select("count(1)")
        ->from('demand')
        ->where([
        		'mall_id' => (int) $mall_id,
        		'demand_status' => ['!=',0],
        		'demand_type' => 2
        		])
        		->query();
        $this->resultArray['demand_count'] = $count;
        $this->resultArray['imageresult'] = $imageresult['info'];
        $this->resultArray['business_circle_name'] = $business_circle_name;
        $this->resultArray['action'] = $request->get('action');
        $this->resultArray['mall_id'] = $request->get('mall_id');
        $this->resultArray['mall_name'] = $basicResult['info']['mall_name'];
        $this->resultArray['weixinzhuanfa'] = \FC\Comm::makeweixinconfig(['mall_id'=>$mall_id]);
    }

    /*
     * 商业体 - 周边分析 *
     */
    public function executeMallaround(Application $application, Request $request){
        $this->resultArray = [];
        $mall_id = $request->get('mall_id');
        $this->resultArray['action'] = $request->get('action');
        $this->resultArray['mall_id'] = $request->get('mall_id');
        //区位分析
        $url = C('SERVICE_IP') . '/info/mall/id/' . $mall_id;
        $basicResult = file_get_contents($url);
        $basicResult = json_decode($basicResult, true);
        $district_id = $basicResult['info']['district_id'];
        $district = new \Model\District();
        $this->resultArray['district_desc'] = $district->find($district_id,'',['district_desc']);
        $this->resultArray['mall_name'] = $basicResult['info']['mall_name'];
        $resulttotal = json_decode(getServiceSlot(['mall_id'=>$mall_id,'slot_id'=>2]),true);
        $resultShow = empty($resulttotal['info'][0]['data']['info']['population']) && empty($resulttotal['info'][0]['data']['info']['building'])?0:1;
        $this->resultArray['resultShow'] = $resultShow;
        $this->resultArray['isAttention'] = Comm::isAttention(['mall_id'=>$mall_id]);
        $this->resultArray['weixinzhuanfa'] = \FC\Comm::makeweixinconfig(['mall_id'=>$mall_id]);
    }
    /*
     * 商业体 - 品牌与业态 
     * 
     * **/
    public function executeMallbrandandcategory(Application $application, Request $request){
        $this->resultArray = [];
        $mall_id = $request->get('mall_id');
        $this->resultArray['mall_id'] = $mall_id;
        $db = new \Model\Passport\Mall();
        $mall_name = $db->find($request->get('mall_id'),false,['mall_name']);
        $url = C('SERVICE_IP') . '/info/mall/id/' . $mall_id;
        $basicResult = file_get_contents($url);
        $basicResult = json_decode($basicResult, true);
        $this->resultArray['mall_name'] = $basicResult['info']['mall_name'];
        $this->resultArray['action'] = $request->get('action');
        $resulttotal = json_decode(getServiceSlot(['mall_id'=>$mall_id,'slot_id'=>8]),true);
        $resultShow = empty($resulttotal['info'][0]['data'])?0:1;
        $this->resultArray['resultShow'] = $resultShow;
        $this->resultArray['isAttention'] = Comm::isAttention(['mall_id'=>$mall_id]);
        $this->resultArray['weixinzhuanfa'] = \FC\Comm::makeweixinconfig(['mall_id'=>$mall_id]);
    }
    /**
     * 品牌检测有没有店铺分布图
     * 
     * */
    public function executeCheckishasshopmap(Application $application, Request $request){
        $area_id = $request->get('area_id');
        $area_name = $request->get('area_name');
        $brand_id = $request->get('brand_id');
        $area_id = $request->get('area_id');
        $data = getServiceSlot([
        		'brand_id' => $brand_id,
        		'slot_id' => 1004,
        		'area_id' => $area_id
        		]);
        $data = json_decode($data,1);
        return $data['total'];
    }
    
    /**
     * 获得当前登陆用户的数据
     */
    private function getLoginUserInfo()
    {
        $return = [];
        $return = $_SESSION['userinfo'];
        return $return;
    }

    /**
     * 显示不显示编辑
     */
    private function isMallEditor($mall_id)
    {
        if (empty($mall_id)){
            return false;
        }
        // 如果当前用户没有登陆 或者当前登陆用户是负责品牌的 他就不用查询了,因为他不负责商业体
        if ($_SESSION['userinfo']['passport_type'] == "" || $_SESSION['userinfo']['passport_type'] == 1) {
            return false;
            exit();
        }
        $selectArr = [
            'mall_id'
        ];
        $whereArr = [
            'passport_mall_status' => 1,
            'mall_id' => $mall_id,
            'passport_id' => $_SESSION['userinfo']['passport_id'],
        ];
        $r = $this->db->select($selectArr)
            ->from('passport_mall')
            ->where($whereArr)
            ->query();
        return empty($r)?false:true;
    }

    /**
     * 关注的查询
     */
    private function isMallAttention($mall_id)
    {
        if (empty($mall_id)){
            return false;
        }
        if (empty($_SESSION['userinfo']['passport_id'])){
            return false;
            exit();
        }
        $selectArr = [
            'passport_follow_id'
        ];
        $whereArr = [
            'passport_id' => $_SESSION['userinfo']['passport_id'],
            'passport_follow_status' => 1,
            'mall_id' => $mall_id
        ];
        $whereArr = [
            'passprot_id' =>$_SESSION['userinfo']['passport_id'],
            'mall_id' => $mall_id,
            'passport_follow_status' =>1,
        ];
        $r = $this->db->select($selectArr)
            ->from('passport_follow')
            ->where($whereArr)
            ->query();
        return empty($r)?false:true;
    }
}


















