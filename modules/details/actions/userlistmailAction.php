<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Frame\Foundation\Action;
use FC;
use Model\Category;

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
    public function executeUserlistmail(Application $application, Request $request)
    {
        $this->setLayout('');
        if (empty($_SESSION['userinfo']['passport_id'])) {
            return [
                'result' => 0,
                'resultMsg' => '非法的请求'
            ];
        }
        $type = $request->get('type');
        $id = $request->get('id');
        $name = $request->get('name');
        if ($type == 'mall') {
//             $db = new \Model\Passport\Mall();
//             $result = $db->find($id);
            $objectName = $name; // 对象名称
            $objectType = '商业体'; // 对象名称
            $objectId = $id;
        } elseif ($type == 'brand') {
//             $db = new \Model\Passport\Brand();
//             $result = $db->find($id);
            $objectName = $name;
            $objectType = '品牌';
            $objectId = $id;
        }
        $usertypearr = [
            1 => '品牌拓展',
            2 => '商业体项目招商',
            3 => '商业体总部招商',
            4 => '第三方'
        ];
        $udb = new \Model\Passport();
        $userinfo = $udb->find($_SESSION['userinfo']['passport_id']);
//         $userinfo = FC\GetValue::getinfo('fangcheng_v2', 'passport', $_SESSION['userinfo']['passport_id']);
        if (!empty($userinfo)) {
            $username = $userinfo['passport_name'];
            $useremail = $userinfo['passport_email'];
            $useremobile = $userinfo['passport_mobile'];
            $usereType = $usertypearr[$userinfo['passport_type']];
            $usereCompany = $userinfo['passport_company'];
        }
        if ($_SESSION['userinfo']['passport_type'] == 1) {
            $objectList = $this->getbrandbyid();
        } elseif ($_SESSION['userinfo']['passport_type'] == 2 || $_SESSION['userinfo']['passport_type'] == 3) {
            $objectList = $this->getmallbyid();
        } elseif ($_SESSION['userinfo']['passport_type'] == 4) {
            $objectListBrand = $this->getbrandbyid();
            $objectListMall = $this->getmallbyid();
            $objectList = array_merge($objectListBrand, $objectListMall);
        }
        $objectList = implode(',', $objectList);
        $emailbody = sprintf('日期：%s <br />
         对象名称：%s <br />
         对象类型：%s <br />
         对象id：%d <br />
         用户：%s <br />
         用户邮箱：%s <br />
         用户手机：%s <br />
         用户类型：%s <br />
         所属公司：%s <br />
         负责项目：%s <br />', date('Y-m-d H:i:s', time()), $objectName, $objectType, $id, $username, $useremail, $useremobile, $usereType, $usereCompany, $objectList);
        $log = [
            'log_mail_ctime' => date('Y-m-d H:i:s', time()),
            'log_mail_to' => 'service@fangcheng.cn',
            'log_mail_name' => '运营中心',
            'log_mail_subject' => '方橙帮您联系',
            'log_mail_body' => $emailbody
        ];
        $logdb = DB();
        $logid = $logdb->insert($log)
            ->into('log_mail')
            ->query();
        if ($logid > 0) {
            return [
                'result' => 1,
                'rsultMsg' => '成功'
            ];
        } else {
            return [
                'result' => 0,
                'rsultMsg' => '失败'
            ];
        }
    }

    private function getbrandbyid()
    {
        $db = DB();
        $where = [
            'passport_id' => $_SESSION['userinfo']['passport_id'],
            'passport_brand_status' => 1
        ];
        $result = $db->select()
            ->from('passport_brand')
            ->where($where)
            ->query();
        $return = [];
        if (! empty($result)) {
            foreach ($result as $key => $val) {
                $return[] = $val['brand_name'];
            }
        }
        return $return;
    }

    private function getmallbyid()
    {
        $db = DB();
        $where = [
            'passport_id' => $_SESSION['userinfo']['passport_id'],
            'passport_mall_status' => 1
        ];
        $result = $db->select()
            ->from('passport_mall')
            ->where($where)
            ->query();
        $return = [];
        if (! empty($result)) {
            foreach ($result as $key => $val) {
                $return[] = $val['mall_name'];
            } 
        }
        return $return;
    }
    
    
}