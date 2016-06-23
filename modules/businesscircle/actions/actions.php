<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Frame\Foundation\Action;
use FC;
use Model\District;

class BusinesscircleActions extends Action
{
    public $data = '';
	public function preExecute(Application $application, Request $request)
	{
	    /*$this->user = \FC\Session::initSession(true); //测试阶段先关闭
	    $this->passport_info = \FC\Session::getUserSession();*/
	    $this->serviceurl = C('SERVICE_IP');
	    $this->business_circle_id = $request->get('business_circle_id');
	    $info = $this->get_info();
	    $this->main_mall_id = $info['mall_id'];
	    if(empty($this->business_circle_id) || empty($this->main_mall_id))
	    {
	        $this->headerTo('/error/404');
	    }
	    
	    $this->dataurl = "/businesscircle/index/business_circle_id/{$this->business_circle_id}";
	    $this->infourl = "/businesscircle/info/business_circle_id/{$this->business_circle_id}";
	    $this->pageSize = 5 ;
	}
    
	public function executeIndex(Application $application, Request $request)
	{
	    $this->setLayout('layout');
	    $this->setView('data');
	    $this->category_array = $this->category_array();
	   
	    $category_ids = $this->category_array();
		$query = urlFor('rest', $request->get());

		//商圈信息
		$info = $this->get_info();
		$this->business_circle_name = $info['business_circle_name'];
		
		
		//商业体流行指数
		$categorys = $this->data_info(1, ['slot_id'=>18, 'business_circle_id'=>$this->business_circle_id],  $query, 'dp_index');
		foreach($categorys['info'] as $key=>&$value)
		{
		    $value['opening_date'] = (strtotime($value['opening_date']) > 0) ? date('Y', strtotime($value['opening_date'])) : '-';
		}
		$this->categorys = $categorys['info'];
		$this->c_page = $this->page_info('categorys','c_prev_page', 'c_next_page', 1, $categorys['page_info']);
		
		//品牌流行指数数
		$this->cate_Url = "/businesscircle/brands/business_circle_id/{$this->business_circle_id}";
		$this->cate_method = 'POST';
		$brands = $this->data_info(1, ['slot_id'=>19, 'category_id'=>10000, 'business_circle_id'=>$this->business_circle_id], $query, 'hit');
		$this->brands = $brands['info'];
		$this->b_page = $this->page_info('brands', 'b_prev_page', 'b_next_page', 1, $brands['page_info'], 10000);
		
		//店铺业态占比
		$color = [10000=>'#4BA2DE', 20000=>'#BFD6F3', 30000=>'#B8EAAE', 40000=>'#55C755', 50000=>'#F8A459', 60000=>'#CDCE38', 70000=>'#FFD49D', 80000=>'#68E3FA', 90000=>'#F3F3B7', 100000=>'#C6F7FF'];
		$mall = $this->slot_data(['slot_id' => 6, 'business_circle_id' => $this->business_circle_id]);
		$mall_sum = array_sum($mall);
		$result = [];
		foreach($mall as $k=>$v)
		{
		    $percent[$k] = round(($v/$mall_sum)*100).'%';
		    $mall_data[] = [
		    	'label'  =>  $percent[$k].$category_ids[$k],
		    	'value'  =>  $v,
		    ];
		    $colors[] = "'$color[$k]'"; 
		}
		
		$this->category_color = urlencode(implode(', ', $colors));
		$this->mall_data = urlencode(\Frame\Util\UString::json($mall_data)); 
		//微信数据处理
		$this->weixinzhuanfa = $this->makeweixingcinfig();
	}
	
	/**
	 * 品牌流行指数翻页 
	 * @param Application $application
	 * @param Request $request
	 */
	
	public function executeBrands(Application $application, Request $request)
    {
        $category_id = $request->get('category_id', 101);
        $pageNow = $request->get('p', 1);
        if($pageNow<7){   
            $this->setLayout();
            $this->setView('brands');
            $query = urlFor('rest', $request->get());
            $this->category_array = $this->category_array();
            $brands = $this->data_info($pageNow, ['slot_id'=>19, 'category_id'=>$category_id, 'business_circle_id'=>$this->business_circle_id], $query, 'hit');
            $this->brands = $brands['info'];
		    $this->b_page = $this->page_info('brands', 'b_prev_page', 'b_next_page', $pageNow, $brands['page_info'], $category_id);
        }
	}
	
	/**
	 * 
	 * 商业体流行指数翻页
	 * @param Application $application
	 * @param Request $request
	 */
	public function executeCategorys(Application $application, Request $request)
	{
    
	    $pageNow = $request->get('p', 1);
	    if($pageNow < 7)
	    {
	        $this->setLayout();
	        $this->setView('categorys');
	        $query = urlFor('rest', $request->get(), $query);
	    	$categorys = $this->data_info($pageNow, ['slot_id'=>18, 'business_circle_id'=>$this->business_circle_id], $query, 'dp_index');
	    	foreach($categorys['info'] as $key=>&$value)
	    	{
	    		$value['opening_date'] = strtotime($value['opening_date']) ? date('Y', strtotime($value['opening_date'])) : '';
	    	}
	    	$this->categorys = $categorys['info'];
		    $this->c_page = $this->page_info('categorys', 'c_prev_page', 'c_next_page', $pageNow, $categorys['page_info']);
	    }
	}
	
	/**
	 * 商圈概况页数据
	 * 
	 * @param Application $application
	 * @param Request $request
	 */
	public function executeInfo(Application $application, Request $request)
	{
		
		$population_type = $this->population_type();
		
		//商圈信息
		$info = $this->get_info();
		$this->business_circle_name = $info['business_circle_name'];
		$this->main_mall_id = $info['mall_id'];
		$this->main_mall_name = $info['mall_name'];
		$mall_id = $info['mall_id'];
		
		//人口概况
		$population = $this->slot_data(['slot_id'=>23, 'mall_id'=>$mall_id]);
		$population = $population['population'];
		$population_key = ['1'=>'住宅人口', '3'=>'办公人口', '4'=>'差旅人口'];
		unset($population[5]);
		foreach($population as $key=>$value)
		{
		    ksort($value);
		    $pop_key = $population_key[$key];
		    $data[$pop_key] = $value;
		    
		    $data[$pop_key]['3km']['num'] = number_format($value['3km']['num']);
		    $data[$pop_key]['1km']['num'] = number_format($value['1km']['num']);
		    $data[$pop_key]['3km']['percent'] = $value['3km']['percent'] . '%';
		    $data[$pop_key]['1km']['percent'] = $value['1km']['percent'] . '%';
		}
	    
		$this->population = $data;
		$this->data = $data;
		//经济概况
		$economic = $this->slot_data(['slot_id'=>24, 'mall_id'=>$mall_id]);
		$economic_type = $this->economic_type();
		foreach($economic as $key=>$value)
		{   
		    $eco_key = $economic_type[$key];
			$edata[$eco_key]['1km'] = number_format($value['1km']/100, 2);
			$edata[$eco_key]['3km'] = number_format($value['3km']/100, 2);
		}
		$this->economic = $edata;
		
		//设施统计
		$fdata = $this->facility_data();
		$this->facility = $fdata;
		
		//交通概况
		$traffic = $this->slot_data(['slot_id'=>4, 'mall_id'=>$mall_id]);
		$traffic['subway'] = $this->data_array($traffic['subway']);
		$traffic['bus'] = $this->data_array($traffic['bus']);
		$this->traffic = $traffic;
		$this->weixinzhuanfa = $this->makeweixingcinfig();
	}  
	
    /**
     * 获取交通设施数据
     * 
     * @param unknown $pageNow
     * @param unknown $query
     * @return multitype:string
     */
	private function facility_data($pageNow, $query)
	{
	    $population_type = $this->population_type();
	    $info = $this->get_info();
		$mall_id = $info['mall_id'];
	    
	    $facility = $this->slot_data(['slot_id'=>5, 'mall_id'=>$mall_id]);
	    foreach ($facility as $key=>$value)
	    {
	    	$fac_key = $population_type[$key];
	    	$fdata[$fac_key] = $value;
	    	$fdata[$fac_key]['list'] = $value['list'][0].'、'.$value['list'][1];
	    }
	    return $fdata;
	}
	
	/**
	 * 处理获取的槽数据
	 * 
	 * @param unknown $p
	 * @param unknown $where
	 * @param unknown $query
	 * @param unknown $nopage
	 * @return multitype:
	 */
	private function data_info($p, $where, $query, $key)
    {
        $data = $this->slot_data($where);
        $data = $this->percent($data, $key);
        $total_data = count($data);
        $page_info = Frame\Http\Pager::setPager($total_data, $this->pageSize, $p, $query);
        $start = ($p - 1) * $this->pageSize;
        $return['info'] = array_slice($data, $start, $this->pageSize, TRUE);
        $return['page_info'] = $page_info;
        return $return;
    }
	
	/**
	 * 槽数据获取
	 * @param unknown $where
	 * @return unknown
	 */ 
	private function slot_data($where)
    {
        
        $return = json_decode(getServiceSlot($where), true);
        if($return['result'] == true)
        {
        	$data = $return['info'][0]['data'];
        }
        return $data;
        
    }
	
	
	/**
	 * 分页处理
	 * @param unknown $url
	 * @param unknown $pageNow
	 * @param unknown $resultArray
	 * @return string
	 */
	
    private function page_info($url, $prev_id, $next_id, $pageNow ,$resultArray, $category_id)
	{
        
	    $where = !empty($category_id) ? "category_id/{$category_id}/" : '';
	    /* 分页  */
	    $prev_page = $pageNow-1 ;
	    $next_page = $pageNow+1 ;
	    $page['prev_page_url'] = ($pageNow <= 1) ? '' : "href=/businesscircle/{$url}/{$where}p/{$prev_page}/business_circle_id/{$this->business_circle_id}";
	    $page['next_page_url'] = ($pageNow >= 1 && $pageNow < $resultArray['total']) ? "href=/businesscircle/{$url}/{$where}p/{$next_page}/business_circle_id/{$this->business_circle_id}" : "";
	    $page['prev_class'] = ($pageNow <= 1) ? 'page_btn page_gray' : 'page_btn btn_able';
	    $page['next_class'] = ($pageNow >= 1 && $pageNow < $resultArray['total']) ? 'page_btn btn_able' : 'page_btn page_gray';
	    $page['prev_id'] = (empty($page['prev_page_url'])) ? '' : $prev_id;
	    $page['next_id'] = (empty($page['next_page_url'])) ? '' : $next_id;
	    return $page;
	    
	}
	
	/**
	 * 计算处理数据百分比
	 * 
	 * @param unknown $array
	 * @param unknown $k
	 * @return string
	 */
	private function percent($array, $k)
	{
	    foreach($array as $key=>$value)
		{
			$percent_sum[$key] = $array[$key][$k];
		}
		sort($percent_sum);
		$array_max = array_pop($percent_sum);
		foreach ($array as $key=>$value)
		{
			$array[$key]['percent'] = round(($array[$key][$k]/$array_max)*100).'%';
		}
	    return $array;
	}
	
	/**
	 * 获取商圈名称及主要的商业体信息
	 * 
	 * @return unknown
	 */
	private function get_info()
	{
	    $business_circle = new \Model\Business\Circle();
	    $data = $business_circle->find($this->business_circle_id);
	    $mall_info = json_decode(file_get_contents("{$this->serviceurl}/info/mall/id/{$data['mall_id']}"),true);
	    $data['mall_id'] = $data['mall_id'];
	    $data['mall_name'] = $mall_info['info']['mall_name'];
	    return $data;
	    
	}
	
	/**
	 * 业态ID
	 * 
	 * @return multitype:string
	 */
	private function category_array()
	{
		$data = array(
			'10000' => '餐饮',
		    '20000' => '购物',
		    '30000' => '亲子儿童',
		    '40000' => '教育培训',
		    '50000' => '休闲娱乐',
		    '60000' => '生活服务',
		    '70000' => '美妆丽人',
		    '80000' => '酒店公寓',
		    '90000' => '百货超市',
		    '100000' => '其它'
		);
		return $data;
	}
	
	/**
	 *  人口概况类型
	 */
	private function population_type()
	{
		$data = array('', '小区', '公司', '写字楼', '酒店', '学校', '银行网点', '医院', '公园', '景区',
		    '地铁站', '公交站', '停车场', '政府部门', 'KTV',
		);
	    return $data;
	}
	
	/**
	 * 经济概况
	 * @return multitype:string
	 */
	private function economic_type()
	{
		$data = array(
			'1' => '<div class="nowrap">住房房价</div><div class="nowrap">(￥/m²)</div>',
		    '3' => '<div class="nowrap">写字楼租金</div><div class="nowrap">(￥/m²*天)</div>',
		    '4' => '<div class="nowrap">酒店标间价</div><div class="nowrap">(￥)</div>',
		);
		return $data; 
	}

	/**
	 * 把交通方式提出
	 * @param unknown $array
	 * @return unknown
	 */
	private function data_array($data)
	{
	    
	    foreach($data as $key=>$value)
	    {
	    	$array[]= explode(';', $value['address']);
	    }
	    
	    foreach ($array as $key=>$value)
	    {
	    	if(is_array($value))
	    	{
	    		foreach ($value as $k=>$v)
	    		{
	    			$a_data[] = $v;
	    		}
	    	}else{
	    		$a_data[] = $value;
	    	}
	    }
	    $a = array_unique($a_data);
	    foreach ($a as $key=>$value)
	    {
	    	$address .= $value.'、';
	    }
	    $address = rtrim($address, '、');
        return $address;
    }

    /**
     * 微信分享
     */
    public function makeweixingcinfig()
    {
        $db = DB();
        $res = $db->select()
            ->from('business_circle')
            ->where('business_circle_id = ?' ,$this->business_circle_id)
            ->query();
        //(城市)
        if (!empty($res[0]['area_id'])){
            $cityname = FC\GetValue::getInfoList('fangcheng_v2', 'area', $res[0]['area_id'], 1);
            if ($cityname['result'] == 1){
                $cityname = $cityname['resuleMsg'];
            }
        }
        //(行政区)
        if (!empty($res[0]['district_id'])){
           $db = new District();
           $district = $db->find($res[0]['district_id']);
           if (!empty($district['district_name'])){
               $district_name = '-'.$district['district_name'];
           }
        }
        //(商圈名称)
        if (!empty($res[0]['business_circle_name'])){
            $business_circle_name = '-'.$res[0]['business_circle_name'];
        }
        $title = '【商圈名片】'.$cityname.$district_name.$business_circle_name;
        $imgLink = C('WEB_URL').'/img/apple-touch-icon-144-precomposed.png';
        $link = C('WEB_URL').'/businesscircle/index/business_circle_id/'.$this->business_circle_id;
        //描述 
        $info = $this->get_info();
        $this->business_circle_name = $info['business_circle_name'];
        $this->main_mall_id = $info['mall_id'];
        $this->main_mall_name = $info['mall_name'];
        $mall_id = $info['mall_id'];
        
        //人口概况

            $population_type = $this->population_type();
            $population = $this->slot_data(['slot_id'=>23, 'mall_id'=>$mall_id]);
            $population = $population['population'];
            unset($population[5]);
            foreach($population as $key=>$value)
            {
            	ksort($value);
            	$pop_key = $population_type[$key];
            	$data[$pop_key] = $value;
            
            	$data[$pop_key]['3km']['num'] = $value['3km']['num'];
            	$data[$pop_key]['1km']['num'] = $value['1km']['num'];
            	$data[$pop_key]['3km']['percent'] = $value['3km']['percent'] . '%';
            	$data[$pop_key]['1km']['percent'] = $value['1km']['percent'] . '%';
            }

        
        //商业体个数
        $mallNumUrl = C('SERVICE_IP').'/info/getcirclemallnum/business_circle_id/'.$this->business_circle_id;
        $mallNumRes = file_get_contents($mallNumUrl);
        $mallNumRes = json_decode($mallNumRes,true);
        $mallNum = $mallNumRes['info'];
        $desc = '';
        if ($mallNum > 0){
            $desc .=  $mallNum.'个商业体,';
        }
        if (number_format($data['小区']['3km']['num']/10000) > 0.0){
            $desc .= '住宅人口'.number_format($data['小区']['3km']['num']/10000).'万,';
        }
        if (number_format($data['写字楼']['3km']['num']/10000) > 0.0){
            $desc .= '办公人口'.number_format($data['写字楼']['3km']['num']/10000).'万,';
        }
        
        $economic = $this->slot_data(['slot_id'=>24, 'mall_id'=>$mall_id]);
        if (number_format($economic['1']['3km']/100/10000,1)>0.0){
            $desc .= "平均房价".number_format($economic['1']['3km']/100/10000,1)."万";
        }
        return  [
            	'title' => $title,
                'logo'  => $imgLink,
                'link'  => $link,
                'desc'  => $desc 
        ];
	}
	
}


?>