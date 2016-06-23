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
    public function executeBrand(Application $application, Request $request)
    {
        $brand_id = $request->get('brand_id');
        if (empty($brand_id)){
            $this->headerTo("/");
        }
        $url = C('SERVICE_IP') . '/info/brand/id/' . $brand_id;
        $basicResult = file_get_contents($url);       
        $basicResult = json_decode($basicResult, true);
        
        $this->jumpurl = \Frame\Util\UString::base64_encode(urlFor('', $request->get()));
        
        
        // 记录log -- add by Jason
    	\FC\Dynamic\Dynamic::addLog(
    			2,
    			['brand_id'=> $brand_id]
    	);
        
        /*
         * */
        $urltag = C('SERVICE_IP') . '/info/brand/tag/id/' . $brand_id;
        $basicTag = file_get_contents($urltag); 
        $basicTag = json_decode($basicTag, true);
        foreach($basicTag['info'] as $k=>&$v)
        {

            if($k == 'group_14' || $k == 'group_41')
            {
                foreach($v as $key=>&$value)
                {
                	$value = trim($value, '￥');
                	$value = rtrim($value, '元');
                	$value = rtrim($value, '㎡');
                }
        	    $v = !empty(implode('', $basicTag['info'][$k])) ? implode('-', $v) : '';
        	   
            }elseif($k == 'group_91')
            {
                foreach($v as $key => &$value)
                {
                	$value = rtrim($value, '家');
                }
                $v = !empty(implode('', $basicTag['info'][$k])) ? implode(',', $v) : '';
            }elseif ($k == 'group_12'){
                $brandLevel = array_filter($v);
                foreach ($brandLevel as $keys => $vals){
                	if (gettype($vals) == "integer"){
                		$middleLevel = FC\GetValue::getInfoList('fangcheng_v2', 'tag', $vals, true);
                		if (empty($brandLevel_b)){
                			$brandLevel_b .= $middleLevel['resuleMsg'];
                		}else {
                			$brandLevel_b .= '、'.$middleLevel['resuleMsg'];
                		}
                	}else {
                		if (empty($brandLevel_b)){
                			$brandLevel_b .= $vals;
                		}else {
                			$brandLevel_b .= '、'.$vals;
                		}
                	}
                }
                $basicTag['info'][$k] = $brandLevel_b;
            }elseif ($k == 'group_34'){
                $cc = array_filter($v);
                foreach ($cc as $keyk => $valk){
                	if (gettype($valk) == "integer"){
                		$middcc = FC\GetValue::getInfoList('fangcheng_v2', 'tag', $valk, true);
                		if (empty($cc_b)){
                			$cc_b .= $middcc['resuleMsg'];
                		}else {
                			$cc_b .= '、'.$middcc['resuleMsg'];
                		}
                	}else {
                		if (empty($cc_b)){
                			$cc_b .= $valk;
                		}else {
                			$cc_b .= '、'.$valk;
                		}
                	}
                }
                $basicTag['info'][$k] = $cc_b;
            }else{
               $v = implode(',', $v);
            }
        }
        
        $this->infoTag = $basicTag['info'];
       /**需求广播条数*/
        $mdb = MDB();
        $count = $mdb->select("count(1)")
        ->from('demand')
        ->where([
        		'brand_id' => (int) $brand_id,
        		'demand_status' => ['!=',0],
        		'demand_type' => 1
        		])
        		->query();
        
        $this->resultArray = [];
        $this->resultArray['demand_count'] = $count;
        
        $category = FC\GetValue::getInfoList('fangcheng_v2', 'category', $basicResult['info']['category_id'], 1);
        $basicResult['info']['category'] = $category['result'] ? $category['resuleMsg'] : '';
        
        $this->resultArray['brandbasicinfo'] = $basicResult['info'];
        
        $this->resultArray['brand_id'] = $brand_id;
        $this->resultArray['action'] = $request->get('action');
        if ($this->isBrandEditor($brand_id)) {
        	$this->resultArray['isEditor'] = true;
        	$this->resultArray['isAttention'] = false;
        } elseif ($this->isBrandAttention($brand_id)) {
        	$this->resultArray['isEditor'] = false;
        	$this->resultArray['isAttention'] = true;
        } else {
        	$this->resultArray['isEditor'] = false;
        	$this->resultArray['isAttention'] = false;
        }
        
        /**图片处理*/
        //图片处理
        $imageurl = C('SERVICE_IP').'/info/brand/img/id/'.$brand_id;
        $imageresult = file_get_contents($imageurl);
        $imageresult = json_decode($imageresult,true);
        $this->resultArray['imageresult'] = $imageresult['info'];
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