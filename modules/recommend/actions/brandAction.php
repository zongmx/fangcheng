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
class RecommendAction extends Action{
    public function executeBrand(Application $application, Request $request) {
        $category_id = $request->get('category_id', 0);
        $page = $request->get('page', 1);
        if ($page > 1){
        	$this->setLayout();
        	\FC\Comm::webCache(900);
        }else {
        	$this->setLayout('registerLayout');
        }
        $pageSize = 10;
        $db = DB();
        $category_Arr = [
        		'0' => '全部业态',
        		'10000' => '餐饮',
        		'20000' => '购物',
        		'30000' => '亲子儿童',
        		'40000' => '教育培训',
        		'50000' => '休闲娱乐',
        		'60000' => '生活服务',
        		'70000' => '美妆丽人',
        		'80000' => '酒店公寓',
        		'90000' => '百货超市',
        		'100000' => '其他'
        ];
        // 获得最新的版本号码
        $date = date('Y-m-d', strtotime("1day"));
        $recommend_info = $db->select('MAX(recommend_id) as recommend_id_max')
            ->from('recommend')
            ->where('recommend_publish_at < ? AND recommend_module_status = ?',$date,1)
            ->query();
        $recommend_id_max = $recommend_info[0]['recommend_id_max'];
        if (empty($category_id)) {
        	$list = $db->select()
        	->from('recommend_module_args')
        	->where('recommend_id <= ?', $recommend_id_max)
        	->orderBy('recommend_module_args_ctime DESC')
        	->limit(($page - 1) * $pageSize, $pageSize)
        	->query();
        	$count = $db->select('count(1) as count')
        	->from('recommend_module_args')
        	->where('recommend_id <= ?', $recommend_id_max)
        	->orderBy('recommend_module_args_ctime DESC')
        	->query();
        } else {
        	$list = $db->select('DISTINCT(b.`brand_id`) , r.* ')
        	->from('recommend_module_args as r , brand_category AS b')
//         	->leftJoin('brand_category as b', '')
        	->where(" r.recommend_id <= ? AND r.recommend_option_id = b.brand_id AND b.category_id >= ? AND b.category_id < ?", $recommend_id_max,(int) $category_id, $category_id + 10000)
        	->orderBy('r.recommend_module_args_ctime DESC')
        	->limit(($page - 1) * $pageSize, $pageSize)
        	->query();
//         	__dd($db->lastSql());
        	$count = $db->select('DISTINCT(b.`brand_id`),count(1) as count')
        	->from('recommend_module_args as r , brand_category AS b')
//         	->leftJoin('brand_category as b', 'r.recommend_option_id = b.brand_id')
        	->where(" r.recommend_id <= ? AND  r.recommend_option_id = b.brand_id AND b.category_id >= ? AND b.category_id < ?",$recommend_id_max, (int) $category_id, $category_id + 10000)
//         	->orderBy('chengtv_order asc')
        	->query();
        }
        $currentCount = $page * $pageSize;
        if ($currentCount >= $count[0]['count']){
        	$ajax_url = '';
        }else {
        	$nextPage = $page+1;
        	$ajax_url = "/recommend/brand/category_id/$category_id/page/$nextPage";
        }
        //         $this->list = $this->chengtv->select()->orderBy('chengtv_order asc, chengtv_id desc')->where('chengtv_status = 1')->query();
//         foreach($list as $k=>$value)
//         {
//         	$list[$k]['chengtv_img_small'] = getLogoimage(['brand_id'=>$value['brand_id']],'src');
//         }

        foreach ($list as $k => $v)
        {
        	$options = unserialize($v['recommend_module_args_options']);
        	$options['img'] = getLogoimage(['brand_id'=>$options['brand_id']],'src');
        	$list[$k]['img'] = $options['img'];
        	$list[$k]['tag'] = $options['tag'];
        	$list[$k]['mall'] = $options['mall'];
        	$list[$k]['brand_name'] = $options['brand_name'];
        	$list[$k]['brand_id'] = $options['brand_id'];
        	$list[$k]['title'] = $options['title'];
        }
        
        
        $userinfo = FC\Session::getUserSession();
        //判断是否可以申请橙TV
//         __dd($list);
        $this->list = $list;
        $this->cateName = $category_Arr[$category_id];
        $this->category_id = $category_id;
        $this->ajax_url = $ajax_url;
        $this->page = $page;
        $this->brand_pass = ($userinfo['resultMsg']['passport_type'] == 1) ? "href=/chengtv/info/from/index data-ajax=false" : "href=/chengtv/info";
        $this->jumpurl = \Frame\Util\UString::base64_encode(urlFor('', $request->get()));

    }
}