<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Frame\Foundation\Action;


/**
 * 用户的所有动作行为
 *
 */
class PassportAction extends Action
{
	/**
	 * 欢迎页面
	 * 
	 * @param Application $application        	
	 * @param Request $request        	
	 */
	public function executeDynamic(Application $application, Request $request) 
	{
	    $this->user = \FC\Session::initSession(true);
	    $passport = \FC\Passport::initWithSession();
	    $this->passport_id = $passport->info('passport_id');
	    
	    $beginId = $request->get('begin');
	    $pagesize = 20;
	    $this->head = $request->get('head', 1);
	    if($this->head) {
	       $this->setLayout('layout');
	    } else {
	        $this->setLayout(false);
	    }
	    $passportDynamic = \FC\Dynamic\Dynamic::initWithPassportId($this->passport_id);
	    	    
	    // 获取我负责的品牌|商业体的列表
	    $rs = $passport->getOwnMallList(2);
	    foreach ($rs as $v){
	        $mallList[$v['mall_id']] = $v['mall_name'];
	    }
	    $rs = $passport->getOwnBrandList(2);
	    foreach ($rs as $v){
	    	$brandList[$v['brand_id']] = $v['brand_name'];
	    }
	    // 读取第一页内容-前20条记录
	    $result = [];
	    $last = '';
	    $rs = $passportDynamic->getDynamicList($beginId, $pagesize);
	    foreach ($rs as $lineK =>$line){ // 循环 取数据
	        $last = $lineK;
	        if(isset($line['mall_id'])){
	            $line['name'] = $mallList[$line['mall_id']];
	        } else if(isset($line['brand_id'])){
	            $line['name'] = $brandList[$line['brand_id']];
	        }
	        // 获取具体操作信息
	        $do = $this->getDoInfo($line['passport_dynamic_type'], $line);
	        if(empty($do)){
	            continue;
	        }
	        // 获取用户信息
	        $passportDo = new \FC\Passport($line['passport_id_login']);
	           // 头像
	        $passportDoPicture = $passportDo->info('passport_picture');
	           // 人名
	        $passportName = $passportDo->info('passport_name');
	        
	        $passportDoPicture = empty($passportDoPicture)
	           ? '/img/detail/headdefault.png'
	           : C(IMAGE_USER_URL) . $passportDoPicture;
	           // 负责的商业体和品牌
	        $isV =  $passportDo->info('passport_status') == 2 ? 'icon_btn icon_v' : '';
	        $result[] = [
	            'passportDoId'        => $line['passport_id_login'],
	            'passportName'        => $passportName ,
	            'vip'        => $isV ,
	        	'passportOwnList'     => $passportDo->getOwnAll(1),
	            'passportDoPicture'   => $passportDoPicture,
	            'do'                  => $do,
	            'day'                 => date('Y-m-d', strtotime($line['passport_dynamic_ctime']))
	        ];
	        $passportDo = null;
	    }
	    $this->pageList = $result;
	    if(count($result) < $pagesize){
	        $this->nextUrl = '';
	    } else {
	        $this->nextUrl = "/passport/dynamic/begin/{$last}/?head=0";
	    }
	    if(empty($result) && $this->head>0){
	        $this->setView('dynamicEmpty');
	    }
	    
	    if($this->head && !$beginId){
	        // 清空所有的未已读
	        $passportDynamic->clearDynamicData();
	    }
	    
	    \FC\Comm::webCache(60);
	    
	}
	
	/**
	 * 获取操作信息
	 * @param int $type
	 * @param array $args
	 */
	private function getDoInfo($type, $args)
	{
	    $result = '';
	    switch ($type){
	    	case 1:   // 谁看了你的个人资料
	    	    $result = "查看了 您的个人资料";
	    	    break;
	    	case 2:   // 谁看了你负责的项目详情页
	    	    if(!empty($args['name'])){
	    	        $result = "查看了 {$args['name']}的详情页";
	    	    }
	    	    break;
	    	case 3:   // 谁看了你发布的需求详情页
	    	    if(!empty($args['name'])){
	    	    	$result = "查看了 {$args['name']}的需求";
	    	    }
	    	    break;
	    	case 4:   // 谁关注了你负责的项目
	    	    if(!empty($args['name'])){
	    	    	$result = "关注了 {$args['name']}";
	    	    }
	    	    break;
	    }
	    
	    return $result;
	}
	
	
}