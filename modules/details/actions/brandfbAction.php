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
     * @param Application $application
     * @param Request $request
     */
    public function executeBrandfb(Application $application, Request $request)
    {
        $brand_id = $request->get('brand_id');
        
        $this->resultArray = [];
        
       /*
        * */
        $url = C('SERVICE_IP') . '/info/brand/id/' . $brand_id;
        $basicResult = file_get_contents($url);
        $basicResult = json_decode($basicResult, true);
        $this->resultArray['brandbasicinfo'] = $basicResult['info'];
        
        
        
        //筛选有数据的城市 
        
        $city = C('CITY_ONLINE');
        foreach($city as $key=>$value)
        {
        	$citylist[$key] = $this->Checkishasshopmap($key, $brand_id) ? $value : '';
        	if(empty($citylist[$key]))
        	{
        		unset($citylist[$key]);
        	}
        }
        
        
        $firstcity['name'] = reset($citylist);
        $firstcity['area_id'] = array_search($firstcity['name'], $citylist);
        $this->resultArray['firstcity'] = $firstcity;
        $this->resultArray['citylist'] = $citylist;
        /*
         * 
         */       
        $this->action = $request->get('action');
        $this->resultArray['brand_id'] = $brand_id;
        if ($this->isBrandAttention($brand_id)) {        	
        	$this->resultArray['isAttention'] = true;
        } else {
        	$this->resultArray['isAttention'] = false;
        }
        $this->jumpurl = \Frame\Util\UString::base64_encode(urlFor('', $request->get()));
        $this->resultArray['weixinzhuanfa'] = \FC\Comm::makeweixinconfig(['brand_id'=>$brand_id]);
    }
    /**
     * 显示不显示编辑
     */
    private function isBrandEditor($brand_id)
    {
    	if (empty($brand_id)){
    		return false;
    	}
    	// 如果当前用户没有登陆 或者当前登陆用户是负责品牌的 他就不用查询了,因为他不负责商业体
    	if ($_SESSION['userinfo']['passport_type'] == "" || $_SESSION['userinfo']['passport_type'] == 2 || $_SESSION['userinfo']['passport_type'] == 3) {
    		return false;
    		exit();
    	}
    	$selectArr = [
    			'brand_id'
    			];
    	$whereArr = [
    			'passport_brand_status' => 1,
    			'brand_id' => $brand_id,
    			'passport_id' => $_SESSION['userinfo']['passport_id'],
    			];
    	$db = DB();
    	$r = $db->select($selectArr)
    	->from('passport_brand')
    	->where($whereArr)
    	->query();
    	return empty($r)?false:true;
    }
    

    /**
     * 品牌检测有没有店铺分布图
     *
     * */
    private  function Checkishasshopmap($area_id, $brand_id){
    	$data = getServiceSlot([
    			'brand_id' => $brand_id,
    			'slot_id' => 1004,
    			'area_id' => $area_id
    			]);
    	$data = json_decode($data,1);
    	return $data['total'];
    }
    
    /**
     * 关注的查询
     */
    private function isBrandAttention($brand_id)
    {
    	if (empty($brand_id)){
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
    			'brand_id' => $brand_id
    			];
    	$db = DB();
    	$r = $db->select($selectArr)
    	->from('passport_follow')
    	->where($whereArr)
    	->query();
    	return empty($r)?false:true;
    }
    
    
}