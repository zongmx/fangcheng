<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Model;
use FC;



/**
 * 日志记录JS
 *
 * @author yulei
 * @version 0.2.0
 */
class apiAction extends Frame\Foundation\Action
{

    public function preExecute(Application $application, Request $request)
    {}

    /**
     * 查询品牌搜索
     *
     * @param string brand 根据品牌名称 [brand和mall 两个参数数二选一 必填项]
     * @param string mall 更具商业体名称
     * @return Json
     */
    public function executeLog(Application $application, Request $request)
    {
        $this->setLayout();
        switch($request->get('q', 'view')){
        	case view: // 查看记录
        	    return $this->view($application, $request);
        	    break;
        }
    }
    
    /**
     * 记录浏览记录
     * @param Application $application
     * @param Request $request
     */
    private function view(Application $application, Request $request)
    {
        $passport = \FC\Passport::initWithSession();
        if(empty($passport) || empty($passport->id)){
            return false;
        }
        
        $args = [
        	'passport_id'      =>  $passport->id,
            'log_view_ctime'   =>  date('Y-m-d H:i:s'),  
        ];
        if($request->has('brand_id')){
            $args['brand_id']   = $request->get('brand_id');
        } elseif($request->has('mall_id')){
            $args['mall_id']   = $request->get('mall_id');
        } elseif($request->has('demand_id')){
            $args['demand_id']   = $request->get('demand_id');
        } else {
            return false;
        }
        
        // 入库
        $mdb = MDB();
        $mdb->insert($args)->into('log_view')->query();
        return true;
    }
    
    
}