<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Frame\Foundation\Action;
use Frame;
use FC;

/**
 * 用户的所有动作行为
 */
class PassportAction extends Action
{

    /**
     * 欢迎页面
     *
     * @param Application $application            
     * @param Request $request            
     */
    public function executeDoaddprogram(Application $application, Request $request)
    {
        FC\Session::initSession();
        $args = $request->get();
        $passport_id = $_SESSION['userinfo']['passport_id'];
        $passport_type = $_SESSION['userinfo']['passport_type'];
        if ($passport_type == 1){
            $return = $this->addBrand($args, $passport_id, $passport_type);
        }elseif ($passport_type == 2 || $passport_type == 3){
            $return = $this->addMall($args, $passport_id, $passport_type);
        }elseif ($passport_type == 4){
            $returnBrand = $this->addBrand($args, $passport_id, $passport_type);
            $returnMall = $this->addMall($args, $passport_id, $passport_type);
            if ($returnBrand || $returnMall){
                $return = true;
            }
        }
        if ($return) {
            $passportInfo = new \Model\Passport($_SESSION['userinfo']['passport_id']);
            $userTask = FC\LoginIn::checkUserTask($passportInfo);
            if ($userTask){
            	setcookie('newUserCookie', $userTask, null, '/');
            	 FC\LoginIn::setWeixinOpenIdCookie($_SESSION['userinfo']['passport_id']);
            }
            return [
                'result' => 1,
                'resultMsg' => '项目添加成功'
            ];
        } else {
            return [
                'result'=> 0,
                'resultMsg' => '项目添加失败'
            ];
        }
    }
    
    /*
     * 添加品牌 @param $args 接收的参数 @param $passport_id @param $passport_type
     */
    private function addBrand($args, $passport_id, $passport_type)
    {
        $brandArr = [];
        if (! empty($args['brand_name'])) {
            foreach ($args['brand_name'] as $key => $val) {
                $brandArr[$key]['passport_brand_ctime'] = date('Y-m-d H:i:s', time());
                $brandArr[$key]['passport_brand_utime'] = date('Y-m-d H:i:s', time());
                $brandArr[$key]['passport_id'] = $passport_id;
                $brandArr[$key]['brand_name'] = $args['brand_name'][$key];
                $brandArr[$key]['brand_id'] = $args['brand_id'][$key];
                $brandArr[$key]['category_ids'] = $args['brand_category_ids'][$key];
                $brandArr[$key]['category_ids_other'] = $args['brand_category_ids_other'][$key];
                $brandArr[$key]['area_ids'] = $args['area_ids'][$key];
                if ($passport_type == 1) {
                    $brandArr[$key]['passport_brand_style'] = $args['passport_brand_style'][$key];
                }
            }
        }
        $db = DB();
        if (empty($brandArr)) {
            return false;
        }
        $res = $db->insert($brandArr)
            ->into('passport_brand')
            ->query();
        if ($res) {
            return true;
        } else {
            return false;
        }
    }
    
    /*
     * 添加商业体 @param $args 接收的参数 @param $passport_id @param $passport_type
     */
    private function addMall($args, $passport_id, $passport_type)
    {
        $mallArr = [];
        if (! empty($args['mall_name'])) {
            foreach ($args['mall_name'] as $key => $val) {
                $mallArr[$key]['passport_mall_ctime'] = date('Y-m-d H:i:s', time());
                $mallArr[$key]['passport_mall_utime'] = date('Y-m-d H:i:s', time());
                $mallArr[$key]['passport_id'] = $passport_id;
                $mallArr[$key]['mall_id'] = $args['mall_id'][$key];
                $mallArr[$key]['mall_name'] = $args['mall_name'][$key];
                $mallArr[$key]['area_id'] = $args['bussiness_area_id'][$key];
            }
        }
        if (empty($mallArr)) {
            return false;
        }
        $db = DB();
        $res = $db->insert($mallArr)
            ->into('passport_mall')
            ->query();
        if ($res) {
            return true;
        } else {
            return false;
        }
    }
}