<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Frame\Foundation\Action;
use FC;
use Model\Category;
use FC\Comm;

/**
 * 用户认证
 */
class DetailsAction extends Action
{

    public function preExecute(Application $application, Request $request)
    {}

    /**
     * 详情页--联系人列表
     * 
     * @param Application $application            
     * @param Request $request            
     */
    public function executeUserlist(Application $application, Request $request)
    {
        $this->setLayout('ucenterlayout');
        $mall_id = (int)$request->get('mall_id');
        $brand_id = (int)$request->get('brand_id');
        $myownpassport_id=$_SESSION['userinfo']['passport_id'];
        $mypassport_type=$_SESSION['userinfo']['passport_type'];
        $returnurl = $request->get('url','');
        if (empty($mall_id) && empty($brand_id)) {
            $this->headerTo('/');
        }
        if (!empty($mall_id) && !empty($brand_id)) {
           $this->headerTo('/');
        }
        $db = DB();
        if (!empty($mall_id)) {
            $mall_type = [2,3,4];
            $where = [
                'mall_id' => $mall_id,
                'passport_mall_status' => 1,
            ];
            $search = [
                'passport_id',
                'category_ids'
            ];
            $date = $db->select($search)
                ->from('passport_mall')
                ->where($where)
                ->query();
            $list = [];
            if (!empty($date)) {
                $passportdb = new \Model\Passport();
                foreach ($date as $key => $val) {
                    $uinfo = [];
                    /* $uinfo['uinfo'] = $passportdb->find($val['passport_id'], '', [
                        'passport_id',
                        'passport_name',
                        'passport_picture',
                        'passport_type',
                        'passport_status',
                        'passport_job_title',
                        'passport_private_mode',
                        'passport_first_name',
                        'passport_sex'
                    ]); */
                    $uwhere = ['passport_id'=> $val['passport_id'], 'passport_type'=>['in', $mall_type]];
                    $uinfo['uinfo'] = $passportdb->select()->where($uwhere)->query();
                    if(count($uinfo['uinfo']) > 0)
                    {
                        $uinfo['uinfo'] = $uinfo['uinfo'][0];
                        $udb = new \Model\Passport();
                        $uresult = $udb->find($val['passport_id']);
                        if($uresult['passport_in_blacklist'] == 1){ // 黑名单不显示
                            continue;
                        }
                        $category_ids = $uresult['category_ids'];
                        if (!empty($category_ids)){
                        	$middlechange = FC\Comm::getCategoryDeepName($category_ids);
                        	$middlechange = str_replace('<p>', '', $middlechange);
                        	$middlechange = str_replace('</p>', '&nbsp;', $middlechange);
                        	$uinfo['uinfo']['categorystr'] = $middlechange;
                        }
                    }else{
                    	unset($uinfo);
                    }
                    $list[] = $uinfo;
                }
            }
            $list = array_filter($list);
            $listtype = 'mall';
            $id = $mall_id;
            $url = C('SERVICE_IP') . '/info/mall/id/' . $mall_id;
            $basicResult = file_get_contents($url);
            $basicResult = json_decode($basicResult, true);
            $name = $basicResult['info']['mall_name'];
        } elseif (! empty($brand_id)) {
            $listtype = 'brand';
            $id = $brand_id;
            $where = [
                'brand_id' => $brand_id,
                'passport_brand_status' => 1,
            ];
            $search = [
                'passport_id',
                'passport_brand_style',
                'area_ids'
            ];
            $date = $db->select($search)
                ->from('passport_brand')
                ->where($where)
                ->query();
            if (! empty($date)) {
                $passportdb = new \Model\Passport();
                foreach ($date as $key => $val) {
                    $uinfo = [];
                    
                    /* $uinfo['uinfo'] = $passportdb->find($val['passport_id'], '', [
                        'passport_id',
                        'passport_name',
                        'passport_first_name',
                        'passport_picture',
                        'passport_type',
                        'passport_status',
                        'passport_job_title',
                        'passport_job_area',
                        'passport_flag',
                        'passport_private_mode',
                        'passport_sex'
                    ]); */
                    
                    //获取的联系人列表里不允许包含变换身份前的项目
                    $uinfo['uinfo']=$passportdb->select()->where('passport_id=? and passport_type in(?)', $val['passport_id'], [1,4])->query();
                    if(count($uinfo['uinfo']) > 0)
                    {
                        $uinfo['uinfo']=$uinfo['uinfo'][0];
                        $uinfo['uinfo']['passport_flag']=$val['passport_brand_style'];
                        if($uinfo['uinfo']['passport_in_blacklist'] == 1){ // 黑名单不显示
                        	continue;
                        }
                        $uinfo['areaidsstr'] = FC\GetValue::getInfoList('fangcheng_v2', 'area', $val['area_ids'], 'area_name');
                        /* $area = $db->select()
                        ->from('passport_area')
                        ->where('passport_id = ?', $val['passport_id'])
                        ->query();
                        $areaids = [];
                        if (! empty($area)) {
                        	foreach ($area as $key => $val) {
                        		array_push($areaids, $val['area_id']);
                        	}
                        	$areaidsstr = FC\GetValue::getInfoList('fangcheng_v2', 'area', $areaids, 1);
                        	$uinfo['areaidsstr'] = $areaidsstr;
                        } */
                    }else{
                        unset($uinfo);
                    }
                    
                    $list[] = $uinfo;
                }
            }
            $list = array_filter($list);
            
            $url = C('SERVICE_IP') . '/info/brand/id/' . $brand_id;
            $basicResult = file_get_contents($url);
            $basicResult = json_decode($basicResult, true);
            $name = $basicResult['info']['brand_name'];
        }
        
        if (!empty($list)){
            foreach ($list as $key => $val){
                
                if ($val['uinfo']['passport_private_mode'] == 1){
                    $list[$key]['uinfo']['passport_name'] = makeName($val['uinfo']['passport_sex'],$val['uinfo']['passport_first_name']);
                }
            }
        }
        
        $url = $returnurl ? "url/{$returnurl}" : '';
        
        if(!empty($mall_id))
        {
        	$this->param = \Frame\Util\UString::base64_encode("/details/userlist/mall_id/{$mall_id}/{$url}");
        }elseif(!empty($brand_id)){
        	$this->param = \Frame\Util\UString::base64_encode("/details/userlist/brand_id/{$brand_id}/{$url}");
        }
        
        $this->myownpassport_id=$myownpassport_id;
        $this->list = $list;
        $this->listtype = $listtype;
        $this->type = [
            1 => '品牌拓展',
            2 => '项目招商',
            3 => '总部招商',
            4 => '第三方'
        ];
        $this->id = $id;
        $this->name = $name;
        $this->flag = [1=>'直营',2=>'加盟',3=>'代理' ];
        $this->url = $returnurl;
        $this->jumpurl = \Frame\Util\UString::base64_encode(urlFor('', $request->get()));
    }
    
    
    
}