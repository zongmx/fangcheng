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
    public function executeDoaddcart(Application $application, Request $request)
    {
        FC\Session::initSession();
        ($passport_business_card = $request->get('passport_business_card')) || exit(json_encode([
            'result' => 0,
            'resultMsg' => '数据缺失'
        ]));
        $db = new \Model\Passport($_SESSION['userinfo']['passport_id']);
        $data = [
            'passport_business_card' => $passport_business_card
        ];
        $res = $db->edit($data);
        if ($res){
            return [
            	'result' => 1,
                'resultMsg' => '上传成功'
            ];
        }else {
            return [
            		'result' => 0,
            		'resultMsg' => '上传失败'
    		];
        }
    }
}