<?php

use Frame\Foundation\Application;
use Frame\Http\Request;
use Frame\Foundation\Action;

/**
 * 用户的所有动作行为
 *
 */
class AdsActions extends Action
{
    public $ads;
    
    public function preExecute(Application $application, Request $request)
    {
        $this->ads = new \Model\Ads();
    }

    /**
     * 获取广告
     * @param Application $application
     * @param Request $request
     */
    public function executeGet(Application $application, Request $request)
    {   
        $ads_type= new \Model\Ads\Type();
        $request->set('ads_type_status',1);
        $search = $ads_type->search($request->get());
        $ads_type_info=$ads_type->select('*')->where($search['where'])->query();
        $ads= $this->ads->select('*')
                    ->where([
                        'ads_type_id'=>$ads_type_info[0]['ads_type_id'],
                        'ads_status'=>1
                    ])->orderBy('ads_order asc ,ads_ctime desc')->limit(10)->query();
        //添加3个广告位置
        $resource = new \FC\Resoure();
        $banner = $resource->getResource(1);
        foreach ($banner as $key => $val) {
        	array_unshift($ads,$val);
        }
        foreach ($ads as $k=>&$v){
            $v['ads_options']= unserialize($v['ads_options']);
            $v['ads_picture']=C('UPLOAD_URL').$v['ads_options']['ads_picture'];
        }
        return $ads;
    }

}