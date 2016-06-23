<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Model;
use FC;
use Frame\Util\HTTP;



/**
 * 微信
 *
 * @author yulei
 * @version 0.2.0
 */
class mallshopActions extends Frame\Foundation\Action
{

    public function preExecute(Application $application, Request $request)
    {
    }
    
    public function executeSearch(Application $application, Request $request)
    {
        //FC\Session::initSession();
        //先判断是不是有未读消息
        if (!empty($_SESSION['userinfo']['passport_id'])){
            $this->countnoread = $this->getNoReadMess(1);
        }
        $this->setLayout('indexLayout');
        $area_ids = $request->get('area_ids');
        $m_area_name = urldecode($request->get('m_area_name'));
        $m_dis_name = urldecode($request->get('m_dis_name'));
        $m_bc_name = urldecode($request->get('m_bc_name'));
        $m_area_name_id = $request->get('m_area_name_id');
        $m_dis_name_id = $request->get('m_dis_name_id');
        $m_bc_name_id = $request->get('m_bc_name_id');
        $s_cat1_id = $request->get('s_cat1_id');
        $s_cat1_name = urldecode($request->get('s_cat1_name'));
        $shop_size_gte = $request->get('shop_size_gte');
        $shop_size_lte = $request->get('shop_size_lte');
        $sort = $request->get('sort');
        $page = $request->get('page',1);
        /**周边商业体Link组合*/
        $aroundLink = '/mall/search/area_ids/'.urlencode($area_ids).'/m_area_name/'.urlencode($m_area_name).'/m_dis_name/'.urlencode($m_dis_name).'/m_bc_name/'.urlencode($m_bc_name).'/';
        //数据数组
        $cityList = [
        	'86999030',
            '86999031',
            '86016140',
            '86016125',
            '86007050'
        ];
        // 组合查询数据
        $searchData = [];
        if (! empty($m_area_name_id)) {
            $searchData['m_area_name_id'] = $m_area_name_id;
        }else if (!empty($_SESSION['userinfo']['area_id'])){
            if (in_array($_SESSION['userinfo']['area_id'], $cityList)){
                $searchData['m_area_name_id'] = $_SESSION['userinfo']['area_id'];
            }else {
                $searchData['m_area_name_id'] = 86999030;
            }
        }else {
            $searchData['m_area_name_id'] = 86999030; //默认为北京 
        }
        if (! empty($m_dis_name_id)) {
            $searchData['m_dis_name_id'] = $m_dis_name_id;
        }
        if (isset($m_bc_name_id)) {
            $searchData['m_bc_name_id'] = $m_bc_name_id;
        }
        if (isset($shop_size_gte)) {
            $s_size['shop_size_gte'] = $shop_size_gte;
        }
        if (! empty($shop_size_lte)) {
            $s_size['shop_size_lte'] = $shop_size_lte;
        }
        $searchData['s_size'] = $s_size;
        //一级业态
        if (!empty($s_cat1_id)){
            $searchData['s_cat1_id'] = $s_cat1_id;
        }
        //排序
        if (!empty($sort)){
            $searchData['sort'] = $sort;
        }
        //分页
        if (!empty($page)){
            $searchData['page'] = empty($page)?1:$page;
        }
        //每页的条数
        $searchData['size'] = 5;
        $resultJson = $this->getMallShop($searchData);
        $resultArray = json_decode($resultJson,true);
        $showArray = [];
        /**
         * 添加推广数据 ;
         * */
        $resource = new \FC\Resoure();
        $r_extension = $resource->getResource(4);
        if (!empty($r_extension)){
        	foreach ($r_extension as $key=>$val){
        		array_unshift($resultArray['hits']['hits'],$val);
        	}
        }
        if ($resultArray['hits']['total'] > 0 && !empty($resultArray['hits']['hits'])){
            foreach ($resultArray['hits']['hits'] as $key => $val){
                $showArray[$key]['extension'] = number_format($val['_source']['extension']);
                $showArray[$key]['s_size'] = number_format($val['_source']['s_size']);
                $showArray[$key]['s_floor'] = $this->floorFormat($val['_source']['s_floor']);
                $showArray[$key]['s_floor_bank'] = $val['_source']['s_floor'];
                $showArray[$key]['s_cat1_name'] = $val['_source']['s_cat1_name'];
                $showArray[$key]['m_name'] = $val['_source']['m_name'];
                $showArray[$key]['m_id'] = $val['_source']['m_id'];
                $showArray[$key]['m_area_name'] = $val['_source']['m_area_name'];
                $showArray[$key]['m_bc_name'] = $val['_source']['m_bc_name'];
                $showArray[$key]['m_size'] = number_format($val['_source']['m_size']/10000,1);
                $showArray[$key]['m_res_3'] = number_format($val['_source']['m_res_3']/10000);
                $showArray[$key]['m_office_3'] = number_format($val['_source']['m_office_3']/10000);
                $showArray[$key]['_id'] = $val['_id'];
                $showArray[$key]['hasContact'] = $this->hasMallUserList($val['_source']['m_id'])?1:0;
                $showArray[$key]['logo'] = C('UPLOAD_URL')."/brandshop/".$val['_source']['m_id']."/".$val['_source']['s_floor']."/".$val['_id'].".png";
            }
        }
        
            // 一级业态
        $categoryOne = [
            10000 => '餐饮',
            20000 => '购物',
            30000 => '亲子儿童',
            40000 => '教育培训',
            50000 => '休闲娱乐',
            60000 => '生活服务',
            70000 => '美妆丽人',
            80000 => '酒店公寓',
            90000 => '百货超市',
            100000 => '其他'
        ];
        
        /**获得展示的地址*/ 
        if (!empty($m_bc_name)){
            $showAreaName = $m_bc_name;
        }elseif (!empty($m_dis_name)){
            $showAreaName = $m_dis_name;
        }elseif (!empty($m_area_name)){
            $showAreaName = $m_area_name;
        }else {
            $showAreaName = '区域';
        }
        /**排序**/
        $sortArr = [
        	''=>'综合排序',
            's_size-desc'=>'店铺面积最大',
            's_size-asc' => '店铺面积最小',
            'm_size-desc' => '商业体体量最大',
            'm_res_3-desc' => '住宅人口最多',
            'm_office_3-desc' => '办公人口最多'
        ];
        $sortArrName = $sortArr[$sort];
        //变量分配
        $this->resultArray = [];
        $this->resultArray['showArray'] = $showArray;
        $this->resultArray['categoryOne'] = $categoryOne;
        $this->resultArray['showAreaName'] = $showAreaName;
        //url decode 处理;
        foreach ($request->get() as $key=>$val){
            $reqs[$key] = urldecode($val);
        }
        //分页处理
        $total = $resultArray['hits']['total'];
        $next = true;
        $pre = true;
        $totalPage = ceil($total/$searchData['size']);
        if ($page >= $totalPage){
            $page = $totalPage;
            $reqs['page'] = $page;
            $next = false;
        }
        if ($page <= 1){
            $page = 1;
            $reqs['page'] = $page;
            $pre = false;
        }
        $this->resultArray['req'] = $reqs;
        $this->resultArray['sortArrName'] = $sortArrName;
        $this->resultArray['page'] = [
        	'pre' => $pre,
            'next' => $next
        ];
        
        //微信分享
        if($showAreaName && $showAreaName!='区域')
        {
        	$title .= $showAreaName;
        }
        if($s_cat1_name)
        {
        	$title .= $title ? '-'.$s_cat1_name : $s_cat1_name;
        }
        $shop_size_gte = number_format($s_size['shop_size_gte']);
        $shop_size_lte = number_format($s_size['shop_size_lte']);
        
        if($shop_size_gte!=0 && $shop_size_lte!=3010)
        {
            if($shop_size_gte)
            {
            	$title .= $title ? '-'.$shop_size_gte.'㎡' : $shop_size_gte.'㎡';
            }
            if($shop_size_lte && $shop_size_lte != $shop_size_gte)
            {
            	$title .= $title ? '-'.$shop_size_lte.'㎡' : $shop_size_lte.'㎡';
            }
        }
        
        $title = $title ? '好铺搜索-'.$title : '商铺-方橙科技';
        $this->resultArray['query'] = urlFor('default', $request->get());
        $this->resultArray['aroundLink'] = $aroundLink;
        $imgLink = C('WEB_URL').'/img/apple-touch-icon-144-precomposed.png';
        $this->resultArray['weixinzhuanfa'] = ['title'=>$title, 'logo'=>$imgLink, 'link'=>C('WEB_URL').$this->resultArray['query'], 'desc'=>'招商选址用方橙'];
    }
        /*
     * 商铺数据生成
     */
    public function getMallShop($searchData)
    {
        $checkData = [
            'm_area_name_id', // 城市
            'm_dis_name_id', // 区域
            'm_bc_name_id', // 商圈
            's_size', // 面积
            's_cat1_id', // 一级业态
            'sort' // 排序
                ];
        $shopUrl = C('MALLSHOP_IP').'/search_shop/shops/_search/';
        // 组合查询
        $queryData = [];
        // 查询条件
        $queryData['query']['bool']['must'] = [];
        // 筛选字段
        $queryData['_source'] = [
            'include' => []
        ];
        // 城市筛选条件
        if (! empty($searchData['m_area_name_id'])) {
            $queryData['query']['bool']['must'][] = [
                'term' => [
                    'm_area_id' => [
                        'value' => $searchData['m_area_name_id']
                    ]
                ]
            ];
        }
        // 区域筛选条件
        if (! empty($searchData['m_dis_name_id'])) {
            $queryData['query']['bool']['must'][] = [
                'term' => [
                    'm_dis_id' => [
                        'value' => $searchData['m_dis_name_id']
                    ]
                ]
            ];
        }
        // 商圈筛选
        if (! empty($searchData['m_bc_name_id'])) {
            $queryData['query']['bool']['must'][] = [
                'term' => [
                    'm_bc_id' => [
                        'value' => $searchData['m_bc_name_id']
                    ]
                ]
            ];
        }
        // 面积range筛选
        if (! empty($searchData['s_size'])) {
            if ($searchData['s_size']['shop_size_gte'] < 0) {
                $searchData['s_size']['shop_size_gte'] = 0;
            }
            if ($searchData['s_size']['shop_size_gte'] >= 3000 && $searchData['s_size']['shop_size_lte'] >= 3000) {
                $queryData['query']['bool']['must'][] = [
                    'range' => [
                        's_size' => [
                            'gte' => 3000
                        ]
                    ]
                ];
            }elseif ($searchData['s_size']['shop_size_lte'] >= 3000){
                $queryData['query']['bool']['must'][] = [
                		'range' => [
                				's_size' => [
                						'gte' => floor($searchData['s_size']['shop_size_gte'])==0?1:floor($searchData['s_size']['shop_size_gte'])
                						]
                				]
                		];
            }else {
            
                $queryData['query']['bool']['must'][] = [
                    'range' => [
                        's_size' => [
                            'gte' => floor($searchData['s_size']['shop_size_gte'])==0?1:floor($searchData['s_size']['shop_size_gte']),
                            'lte' => floor($searchData['s_size']['shop_size_lte'])
                        ]
                    ]
                ];
            }
        }
        // 一级业态修改
        if (! empty($searchData['s_cat1_id'])) {
            $queryData['query']['bool']['must'][] = [
                'term' => [
                    's_cat1_id' => [
                        'value' => $searchData['s_cat1_id']
                    ]
                ]
            ];
        }
        // 排序
        if (! empty($searchData['sort'])) {
            $sortInfo = explode('-', $searchData['sort']);
            $sortName = $sortInfo[0];
            $sortType = $sortInfo[1];
            $queryData['sort'] = [
                $sortName => [
                    'order' => $sortType
                ]
            ];
        }
        
        //分页
        $queryData['from'] = ($searchData['page'] - 1)*$searchData['size'];
        $queryData['size'] = $searchData['size'];
        $qstring = json_encode($queryData);
        $return = HTTP::post($shopUrl, $qstring);
        return $return;
    }
        
        // 楼层格式化
    public function floorFormat($floor)
    {
        $return = '';
        if ($floor < 0) {
            $return = mb_substr($floor, 1);
            $return = 'B' . $return;
        } else {
            $return = $floor."F";
        }
        return $return;
    }
    
    // 通过mall_id 获得商业体是不是有联系人
    public function hasMallUserList($mall_id)
    {
        if (! empty($mall_id)) {
            $db = DB();
            $where = [
                'mall_id' => $mall_id,
                'passport_mall_status' => 1
            ];
            $result = $db->select("count(1) as count")
                ->from('passport_mall')
                ->where($where)
                ->query();
            if ($result[0]['count'] <=0){
                return false;
            }else {
                return true;
            }
        }else {
            return false;
        }
    }

}


















