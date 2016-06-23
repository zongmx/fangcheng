<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Model;
use FC;

/**
 * 微信
 *
 * @author yulei
 * @version 0.2.0
 */
class mallActions extends Frame\Foundation\Action
{

    public function preExecute(Application $application, Request $request)
    {}

    public function executeSearch(Application $application, Request $request)
    {
        
        // 区域信息
        $options = $request->get('options','');
        if (empty($options)){
            $this->setLayout('registerLayout');
            $area_ids = urldecode($request->get('area_ids'));
            $m_area_name = urldecode($request->get('m_area_name'));
            $m_dis_name = urldecode($request->get('m_dis_name'));
            $m_bc_name = urldecode($request->get('m_bc_name'));
            $m_area_name_id = $request->get('m_area_name_id');
            $m_dis_name_id = $request->get('m_dis_name_id');
            $m_bc_name_id = $request->get('m_bc_name_id');
            // 体量信息
    //         $shop_size_gte = $request->get('shop_size_gte', 0);
    //         $shop_size_lte = $request->get('shop_size_lte', 51);
    //         $shop_size_gte = $shop_size_gte * 10000;
    //         $shop_size_lte = $shop_size_lte * 10000;
            // 排序
            $sort = $request->get('sort','');
            // 页面
            $page = $request->get('page', 1);
            // 如果体量参与了搜索,只需求在综合排序的时候处理体量为0的情况
            $area_ids_arr = explode(',', $area_ids);
            // 组合查询的数组
            $search['area_id'] = $area_ids_arr[0];
            $search['district_id'] = $area_ids_arr[1];
            $search['business_circle_id'] = $area_ids_arr[2];
            // 组合体量数据
    //         if ($shop_size_gte == 0 && $shop_size_lte >= 500000) {
    //             // 默认有的体量都参与
    //         } elseif ($shop_size_gte > 0 && $shop_size_lte >= 500000) {
    //             // 下限到无穷大的搜索
    //             $search['mall_building_size']['min'] = $shop_size_gte;
    //         } elseif ($shop_size_gte == 0 && $shop_size_lte < 500000) {
    //             // 只管理上限
    //             $search['mall_building_size']['max'] = $shop_size_lte;
    //         } elseif ($shop_size_gte > 0 && $shop_size_lte < 500000) {
    //             // 区间搜索
    //             $search['mall_building_size']['min'] = $shop_size_gte;
    //             $search['mall_building_size']['max'] = $shop_size_lte;
    //         }
            // 拍序
            switch ($sort) {
                case '':
                    $search['sort'] = 'mall_score';
                    break;
                case 'm_size-desc':
                    $search['sort'] = 'mall_building_size';
                    break;
                case 'm_res_3-desc':
                    $search['sort'] = 'res_3';
                    break;
                case 'm_office_3-desc':
                    $search['sort'] = 'office_3';
                    break;
                case 'travel_3-desc':
                    $search['sort'] = 'travel_3';
                    break;
            }
            $search['page'] = $page;
            $queryString = json_encode($search);
            $queryString = \Frame\Util\UString::base64_encode($queryString);
//             下一页URL组合
            $nextSearch = $search;
            $nextSearch['page'] = $page+1;
            $nextQueryString = json_encode($nextSearch);
            $nexrQueryString = \Frame\Util\UString::base64_encode($nextQueryString);
            $nextUrl = '/mall/search/options/'.$nexrQueryString;
    }else{
//         $ajax_option = Frame\Util\UString::base64_decode($options);
//         $ajax_search_option = json_decode($ajax_option, true);
//         $ajax_search_option['page'] = $ajax_search_option['page'] + 1;
//         $queryString = json_encode($ajax_search_option);
//         $queryString = \Frame\Util\UString::base64_encode($queryString);
        $queryString = $options;
        $ajax_option = Frame\Util\UString::base64_decode($options);
        $ajax_search_option = json_decode($ajax_option, true);
        $ajax_search_option['page'] = $ajax_search_option['page'] + 1;
        $nextQueryString = json_encode($ajax_search_option);
        $nexrQueryString = \Frame\Util\UString::base64_encode($nextQueryString);
        $nextUrl = '/mall/search/options/'.$nexrQueryString;
        $this->setView('ajaxsearch');
        $this->setLayout('');
    }

        $url = C('SERVICE_IP') . '/search/business/options/' . $queryString;
        $queryResult = file_get_contents($url);
        $queryResult = json_decode($queryResult,true);
        if (($queryResult['currentPage'] >= $queryResult['totalPage']) || empty($queryResult['info'])){
            $nextUrl = '';
        }
        $assign = [];
        /**
         * 添加推广数据 ->start
         * */
        $r_option = Frame\Util\UString::base64_decode($queryString);
        $r_search_option = json_decode($r_option, true);
        if ($r_search_option['page'] == 1){
        	$resource = new \FC\Resoure();
        	$r_list = $resource->getResource(3);
        	if (!empty($queryResult['info'])){
                $queryResult['info'] = array_merge($r_list,$queryResult['info']);
        	}
        }
        /**
         * 添加推广数据 ->end
         * */
        
        foreach ($queryResult['info'] as $key => $val){
            $assign[$key]['mall_id'] = $val['mall_id'];
            $assign[$key]['extension'] = $val['extension'];
            $assign[$key]['mall_name'] = $val['mall_name'];
//             城市
            $city = '';
            $city = FC\GetValue::getInfoList('fangcheng_v2', 'area', $val['area_id'], true);
            if ($city['result'] == 1){
                $assign[$key]['area_name'] = $city['resuleMsg'];
            }
//             商圈
            $business = '';
            $business = FC\GetValue::getInfoList('fangcheng_v2', 'business_circle', $val['business_circle_id'], true);
            if ($business['result'] == 1){
                $assign[$key]['business_name'] = $business['resuleMsg'];
            }
//             体量
           $assign[$key]['mall_building_size'] = number_format($val['mall_building_size']/10000);
//            住宅人口
           $assign[$key]['res_3'] = number_format($val['res_3']/10000);
//            办公人口
           $assign[$key]['office_3'] = number_format($val['office_3']/10000);
//            差旅人口
           $assign[$key]['travel_3'] = number_format($val['travel_3']/10000);
//            铺位数量
           $assign[$key]['shop_count'] = $val['shop_count'];
//            logo
           $assign[$key]['mall_logo'] = getLogoimage(['mall_id'=>$val['mall_id']], '108x108');
        }
        // 显示层数据组合
        // 城市显示位置
        $view_arr['area_ids'] = $area_ids;
        $view_arr['m_area_name'] = $m_area_name;
        $view_arr['m_dis_name'] = $m_dis_name;
        $view_arr['m_bc_name'] = $m_bc_name;
//         $view_arr['shop_size_gte'] = $shop_size_gte / 10000;
//         $view_arr['shop_size_lte'] = $shop_size_lte / 10000;
        $view_arr['sort'] = $sort;
        if (! empty($m_bc_name)) {
            $showAreaName = $m_bc_name;
        } elseif (! empty($m_dis_name)) {
            $showAreaName = $m_dis_name;
        } elseif (! empty($m_area_name)) {
            $showAreaName = $m_area_name;
        } else {
            $showAreaName = '区域';
        }
        // 排序
        $sort_arr = [
            '' => '综合排序',
            'm_size-desc' => '体量最大',
            'm_res_3-desc' => '住宅人口最多',
            'm_office_3-desc' => '办公人口最多',
            'travel_3-desc' => '差旅人口最多'
        ];
        $view_arr['showAreaName'] = $showAreaName;
        $view_arr['sortName'] = $sort_arr[$sort];
        $view_arr['page'] = $search['page'];
        $view_arr['data_scroll_url'] = $nextUrl;
        $view_arr['assign'] = $assign;
        $this->resultArray = [];
        $this->resultArray = $view_arr;
//         $this->cachePage();
    }
}


















