<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Model;
use FC;

/**
 * 详情页完善项目信息
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
    public function executeUpdateproject(Application $application, Request $request)
    {
        $email = $request->get('email');
        $type_info = $request->get('type');
        $type_arr = [
            1 => 'mall',
            2 => 'brand'
        ];
        if (empty($email) || empty($type_info)) {
            return [
                'result' => 0,
                'resultMsg' => '数据不完整'
            ];
        }
        $email_reg = '/^([a-zA-Z0-9_\-\.\+]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/';
        $passport_email_res = preg_match($email_reg, $email);
        if (! $passport_email_res) {
            return [
                'result' => 0,
                'resultMsg' => '邮箱格式不正确'
            ];
        }
        $type = $type_arr[$type_info];
        $db = DB();
        $log_mail_subject_arr = [
            'brand' => '方橙平台品牌资料完善信息',
            'mall' => '方橙平台商业体资料完善信息'
        ];
        $log_mail_body_arr = [
            'brand' => "<p>尊敬的方橙用户：</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您好。</p>
<p>首先，感谢您一直以来对方橙平台的支持。为了完善数据内容，更好的为客户提供服务，我们邀请您填写一份调查表格（请查看本邮件附件），并发回至此邮箱地址。我们会有专门的工作人员为您完善品牌的信息资料。
再一次忠诚的感谢您。</p>
<p align='right'>方橙团队</p>
<p align='right'>" . date('Y年m月d日', time()) . "</p>",
            'mall' => "<p>尊敬的方橙用户：</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您好。</p>
<p>首先，感谢您一直以来对方橙平台的支持。为了完善数据内容，更好的为客户提供服务，我们邀请您填写一份调查表格（请查看本邮件附件），并发回至此邮箱地址。我们会有专门的工作人员为您完善商业体的信息资料。再一次忠诚的感谢您。</p>
<p align='right'>方橙团队</p>
<p align='right'>" . date('Y年m月d日', time()) . "</p>"
        ];
        $log_mail_attach_arr = [
            'brand' => [
                [
                    'path' => '/email_attach_source/brand.xls',
                    'name' => '品牌完善信息.xls'
                ]
            ],
            'mall' => [
                [
                    'path' => '/email_attach_source/mall.xls',
                    'name' => '商业体完善信息.xls'
                ]
            ]
        ];
        $update_global_arr = [
            'log_mail_ctime' => date('Y-m-d H:i:s', time()),
            'log_mail_to' => $email,
            'log_mail_name' => '完善项目信息',
            'log_mail_subject' => $log_mail_subject_arr[$type],
            'log_mail_body' => $log_mail_body_arr[$type],
            'log_mail_attach' => serialize($log_mail_attach_arr[$type]),
            'log_mail_source' => 'SERVICE'  //SERVICE
        ];
        $r = $db->insert($update_global_arr)
            ->into('log_mail')
            ->query();
        if ($r > 0) {
            return [
                'result' => 1,
                'resultMsg' => '提交成功'
            ];
        } else {
            return [
                'result' => 0,
                'resultMsg' => '提交失败'
    		];
        }
    }
}