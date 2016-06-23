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
	 * 匹配需求
	 * 
	 * @param Application $application        	
	 */
	public function executeSimilar(Application $application, Request $request) {
        FC\Session::initSession();
        $condition = $request->get('condition');
        $returnurl = $request->get('returnurl');
//         $conditionPage = $request->get('condition');
        $linkarr = $request->get();
        unset($linkarr['page']);
        $link = urlFor($linkarr);
        $link = Frame\Util\UString::base64_encode($link);
        
//         if (empty($condition)){
//             $this->headerTo('/error/404');
//         }
//         $page = $request->get('page',1);
//         if ($page<1){
//         	$page = 1;
//         }
//         $pageSize = 5;
//         $condition = unserialize(Frame\Util\UString::base64_decode($condition));
//         $limit = ($page-1)*5 . ',' . $page*5;
        $page = $request->get('page',1);
        $list = \FC\Demand::searchDemandListApi($condition,$page);
        $res = $list['list'];
        $total_page = $list['totalPage'];
        $passportDb = new \Model\Passport();
        $mall_tag = new FC\Demand();
        foreach ($res as $key => $val) {
            if (!isset($demand_type)){
                $demand_type = $val['demand_type'];
            }
        	foreach ($val['_id'] as $j=>$k){
        		array_push($resids, $k);
        	}
            
        	/* 发布需求者的名字、加V改为读取对应用户的最新资料，而非缓存*/
        	try {
        	    $passportinfo = $passportDb->select()
        	    ->where('passport_id=?', $val['passport_id'])
        	    ->query();
        	}catch (Exception $e){
        	    
        	}
        	$res[$key]['userinfo'] = $passportinfo[0];
        	if ($res[$key]['userinfo']['passport_private_mode'] == 1 && (!empty($res[$key]['userinfo']['passport_name']))){
        		if ($res[$key]['userinfo']['passport_sex'] == 1){
        			$res[$key]['userinfo']['passport_name'] = $res[$key]['userinfo']['passport_first_name'].'先生';
        		}elseif ($res[$key]['userinfo']['passport_sex'] == 2) {
        			$res[$key]['userinfo']['passport_name'] = $res[$key]['userinfo']['passport_first_name'].'女士';
        		}
        	}
        	
        	$res[$key]["demand_desc"] = FC\Comm::compressHtml($val['demand_desc']);
        	//         	v1.4更改 ->商业体
        	if ($val['demand_type'] == 2) {
        		$mall_building_size_info = $mall_tag->getMallInfo($val['mall_id']);
        		$tag_new_info = $mall_tag->foramtTagInfo($mall_building_size_info);
        		$res[$key]["tag_build_size"] = $tag_new_info['size'];
        		$res[$key]["tag_build_city"] = $tag_new_info['city'];
        		$res[$key]["tag_build_address"] = $tag_new_info['address'];
        		$id_arr = [
        				'mall_id' => $res[$key]["mall_id"]
        				];
        		$res[$key]["tag_build_logo"] = getLogoimage($id_arr,'48x48');
        	}
        	//             v1.4更改->品牌
        	if ($val['demand_type'] == 1) {
        		$id_arr = [
        				'brand_id' => $res[$key]["brand_id"]
        				];
        		//                 品牌logo
        		$res[$key]["tag_brand_logo"] = getLogoimage($id_arr,'48x48');
        		$tag_brand_area_name = FC\GetValue::getInfoList('fangcheng_v2', 'area', $val['area_id'], true);
        		//                 拓展城市
        		if ($tag_brand_area_name['result'] == 1){
        			$res[$key]["tag_brand_area_name"] = $tag_brand_area_name['resuleMsg'];
        		}
        		//                 首选物业
        		$group_36_info = FC\GetValue::getInfoList('fangcheng_v2', 'tag', $res[$key]['tag']['group_36'], true);
        		if ($group_36_info['result'] == 1){
        			$res[$key]["tag_brand_group_36"] = $group_36_info['resuleMsg'];
        		}
        
        	}
        }
        $this->resultArray = [];
        $this->resultArray['projectInfo'] = $res;
        if($page > 1)
        {
        	$this->setLayout("");
        	($demand_type == 1 ) ? $this->setView('demandlistbrand') : $this->setView('demandlistmall');
        }
        $next_page = $page+1;
        if ($page < $total_page){
            $data_scroll_url = '/ucenter/similar/condition/'.$condition.'/returnurl/'.$returnurl.'/page/'.$next_page.'/';
        }else {
            $data_scroll_url = '';
        }
        $this->resultArray['data_scroll_url'] = $data_scroll_url;
        $this->resultArray['userinfo'] = $_SESSION['userinfo'];
        $this->resultArray['returnurl'] = Frame\Util\UString::base64_decode($returnurl);
        $this->resultArray['link'] = $link;
	}
}