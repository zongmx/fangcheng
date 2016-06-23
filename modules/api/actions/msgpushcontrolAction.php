<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Model;
use FC;

/**
 * 短信推送开关
 *
 * @author yulei
 * @version 0.2.0
 */
class apiAction extends Frame\Foundation\Action
{

    public function preExecute(Application $application, Request $request)
    {}

    /**
     * 短信推送开关
     *
     * @param
     *            int control [1=> 私信,2=>动态,3=>需求];
     * @return Json
     */
    public function executeMsgpushcontrol(Application $application, Request $request)
    {
        FC\Session::initSession();
        $db = new \Model\Passport($_SESSION['userinfo']['passport_id']);
        $controlArr = [
            1 => 'passport_msg_push_private',
            2 => 'passport_msg_push_dynamic',
            3 => 'passport_msg_push_demand'
        ];
        $control = $request->get('control', 0);
        if (! in_array($control, [
            1,
            2,
            3
        ])) {
            return [
                'result' => 0,
                'resultMsg' => ''
            ];
        }
        $column = $controlArr[$control];
        $passportInfo = $db->find();
        // 如果是开启转换为关闭,如果是关闭转换为开启
        $setVal = $passportInfo[$column] ? 0 : 1;
        $data= [
            $column => (int) $setVal
        ];
        $return = $db->edit($data,false);
        if ($return) {
            return [
                'result' => 1,
                'resultMsg' => $setVal
            ];
        } else {
            return [
                'result' => 0,
                'resultMsg' => ''
            ];
        }
    }
}