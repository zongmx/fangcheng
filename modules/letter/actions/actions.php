<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Frame\Foundation\Action;
use FC\Comm;
use FC\Session;

/**
 * 
 * 站内信功能
 *
 * @author min
 *        
 */
class LetterActions extends Action
{

    public $letter;
    public $user;
    public $passport_info;
    
    /**
     * 
     * 预处理
     * 
     * (non-PHPdoc)
     * @see \Frame\Foundation\Action::preExecute()
     */
    
    public function preExecute(Application $application, Request $request)
    {
        
        $this->user = \FC\Session::initSession(true);
        $this->passport_info = \FC\Session::getUserSession();
        $this->passport_id = $this->passport_info['resultMsg']['passport_id'];
        $passport = new \FC\Passport();
        $this->passport_info['resultMsg'] = $passport->find($this->passport_id);
        $this->passportAuthentication = $this->passport_info['resultMsg']['passport_status'] == 2;
        $wx_passport_id = $request->get('passport_id', 0);
        if($wx_passport_id && $wx_passport_id<>$this->passport_id)
        {
        	$this->headerTo('/passport/loginout');
        }
        
        $this->letter = new \Model\Msg\Sender();
        $this->letter_content = new \Model\Msg\Content();
        $this->listurl = '/letter/';
        $this->pagesize = $request->get('pagesize', 5);

    }

    /**
     * 
     * 用户会话列表页
     *
     * @param Application $application            
     * @param Request $request            
     */
    
    public function executeIndex(Application $application, Request $request)
    {
            //先判断是不是有未读消息
            $this->countnoread = $this->getNoReadMess(1);
            $this->setLayout('indexLayout');
            $this->setView('list');
            $pageNow = $request->get('p', 1);
            $query = urlFor('rest', $request->get());
            $request->set('p', '<--PAGENO-->');
            
            $data = $this->index_data($pageNow, $query);
            $this->list = $data['list'];
            $this->official = $data['official'];
            $this->data_scroll_url =  $data['data_scroll_url'];
            
            // 获取动态数量
            $passportDynamic = \FC\Dynamic\Dynamic::initWithPassportId($this->passport_id);
            $this->dynamicNum = $passportDynamic->getDynamicNum();
            $this->dynamicClass = $this->dynamicNum > 0 ?'dongNum' : '';
            if($this->dynamicNum> 99) {
                $this->dynamicNum = '99+';
            } else if($this->dynamicNum == 0) {
                $this->dynamicNum = '';
            }
    }

    public function executeIndexpage(Application $application, Request $request)
    {
        $this->setLayout('');
        $this->setView('info');
        $pageNow = $request->get('p', 1);
        $query = urlFor('rest', $request->get());
        $request->set('p', '<--PAGENO-->');
        
        $data = $this->index_data($pageNow, $query);
        $this->list = $data['list'];
        
        $this->data_scroll_url =  $data['data_scroll_url'];
    }
    
    private function index_data($pageNow, $query)
    {
        $this->pagesize = 20;
        $passport_id = $this->passport_id;
        $db = DB();
        // 是否有与方小橙的会话，如果是方小橙用户，查询所有和自己相关的会话，如果不是，查询接收者为方小橙与自己的会话
        if($passport_id == 1)
        {
        	$where = $db->buildWhereSql("passport_id_lower=1");
        	$official['list'] = $this->letter->select('*')->where($where)->orderBy('msg_sender_utime desc')->query();
        }else{
        	$where = $db->buildWhereSql("passport_id_lower=1 and passport_id_upper=?", $passport_id);
        	$official['list'] = $this->letter->select('*')->where($where)->orderBy('msg_sender_utime desc')->query();
        }
        
        $data['official'] = $official ? $this->f_data($official)['list'] : '';
        
        
        /* 如果没有对话ID，就查出方小橙信息 */
        if(empty($data['official']))
        {
            $official = $this->passportinfo(1);
        	$data['official'][] = [
        	                       'recevier_id' => 1,
        	                       'picture' => getPassportimage($official['passport_picture'], '50x50'),
        	                       'name' => $official['passport_name'],
        	                       'project' => $official['project'],
        	                       'project_count' => $official['project_count'],
        	                       'job' => $official['passport_job_title'],
        	                       'msg_sender_utime' => '置顶',
        	                       'status' => $official['passport_status'],
        	];
        }
        
        
        $this->pagesize = $official ? $this->pagesize-1 : $this->pagesize;
        
        $where = $db->buildWhereSql("(passport_id_lower=? or passport_id_upper=?) and passport_id_lower <> 1 and msg_sender_status=1", $passport_id, $passport_id);
        $resultArray = $this->letter->pageList($this->pagesize, $pageNow, $query, 'msg_sender_utime desc', $where);
        $resutllist = $this->f_data($resultArray);
        $data['list'] = $resutllist['list'];
        
        /* 是否有下一页  */
        $next_page = $pageNow+1;
        $data['data_scroll_url'] = ($pageNow >= 1 && $pageNow < $resultArray['page']['total']) ? "/letter/Indexpage/p/$next_page" : '';
        return $data;
    }
    
    /**
     * 处理数据
     * @param unknown $data
     * @return unknown
     */
    private function f_data($data)
    {
        foreach($data['list'] as $key =>&$value) {
        	$msgcontentinfo = $this->letter_content->select('msg_content_id, msg_content_body, msg_content_status, passport_id')
        	->where('msg_sender_id=? and msg_content_status!=0', $value['msg_sender_id'])
        	->limit(1)
        	->orderBy('msg_content_id desc')
        	->desc('查询%s', 'msg_content')
        	->query();
        	$receiver_id = ($this->passport_id == $value['passport_id_lower']) ? $value['passport_id_upper'] : $value['passport_id_lower'];
        	
        	$receiver_info = $this->passportinfo($receiver_id);
        	$value['picture'] = getPassportimage($receiver_info['passport_picture'], '50x50');
        	$value['name'] = $receiver_info['passport_name'];
        	$value['status'] = $receiver_info['passport_status'];
        	$value['project'] = $receiver_info['project'];
        	$value['project_count'] = $receiver_info['project_count'];
        	$value['job'] = $receiver_info['passport_job_title'];
        	$value['msg_content_id'] = $msgcontentinfo[0]['msg_content_id'];
        	$value['msg_content_body'] = ($msgcontentinfo[0]['passport_id'] < 30) ? strip_tags($msgcontentinfo[0]['msg_content_body']) : $msgcontentinfo[0]['msg_content_body'];
        	$value['is_status'] = $msgcontentinfo[0]['passport_id'] == $this->passport_id ? -1 : $msgcontentinfo[0]['msg_content_status'];
        	$value['msg_sender_utime'] = ($receiver_id == 1) ? '置顶' : date('Y-m-d', strtotime($value['msg_sender_utime']));
        	$value['recevier_id'] = $receiver_id;
        	if($value['is_status'] == 1 && !$this->passportAuthentication){
        	    $rs = $this->letter_content->select('count(1) as tol')
        	                               ->where('msg_sender_id=? and msg_content_status=1 and passport_id_receiver=?', 
        	                                   $value['msg_sender_id'], $this->passport_id)
        	                               ->desc('查询一共几条未读私信')
        	                               ->query();
        	    $value['new_msg_count'] = $rs[0]['tol'];
        	    $value['msg_content_body'] = $rs[0]['tol'] . '条新消息';
        	}
        }
       return $data;
    }
    
    
    /**
     *
     * 对话详情页
     *
     * @param unknown $passport_id            
     * @return Ambigous <\Frame\Dao\Model, boolean, multitype:>
     */
    
    public function executeView(Application $application, Request $request)
    {
            $this->setLayout('msgLayout');
            $this->setView('view');
            $data = $request->get('data', 0);
            $this->msg_sender_id = intval($request->get('msg_sender_id', 0));
            $msg_content_id = $request->get('msg_content_id', 0);
            if ($this->msg_sender_id == false) {
            	$this->headerTo('/error/404');
            }
            $passport_id = $this->passport_id;
            $is_passport = $this->letter->select()->where('msg_sender_id=? and (passport_id_lower=? or passport_id_upper=?)', $this->msg_sender_id, $passport_id, $passport_id)->query();
            if ($is_passport == false) {
            	$this->headerTo('/error/404');
            }
            if($is_passport[0]['passport_id_lower'] == 1){
                // 如果是和方小橙的对话就不处理
            } else if(!$this->passportAuthentication) {
                // 如果是未认证用户
                $jsStatus = 0;
                if(empty($this->passport_info['resultMsg']['passport_business_card'])){
                    // 没有名片
                    $jsStatus = 1;
                } else if($this->passport_info['resultMsg']['passport_status'] == -1){
                    // 有名片， 认证不通过
                    $jsStatus = 3;
                } else {
                    // 有名片， 未认证或者待认证
                    $jsStatus = 2;
                }
                $this->jsStatus = $jsStatus;
                return;
            }
                        
            if($data === 'html'){
                $this->setLayout();
                $this->setView('letter');
                $this->pagesize = 10;
            }
            $this->returnUrl =  \Frame\Util\UString::base64_encode(urlFor('', $request->get()));;
            $this->resultArray = $this->bodyDate($this->msg_sender_id, $msg_content_id, $this->pagesize);
                        
    } 
    
    /**
     * 
     * 对话详情页 json
     * 
     * @param unknown $msg_sender_id
     * @param unknown $msg_content_id
     * @return multitype:boolean string Ambigous <Ambigous, number, \Frame\Dao\Model, boolean, multitype:, multitype:unknown number Ambigous <string, multitype:string number int unknown , multitype:string unknown NULL > Ambigous <multitype:, \Frame\Db\mixed, boolean> , \Frame\Db\mixed, multitype:mixed >
     */
    private function bodyDate($msg_sender_id, $msg_content_id, $pagesize)
    {
        $where = "msg_sender_id = $msg_sender_id";
        $where.= ($msg_content_id <= 1) ? '' : " and msg_content_id < $msg_content_id";
        $this->info = $this->letter_content->select()->where($where)->limit($pagesize+1)->orderBy('msg_content_id desc')->query();//多取一条记录做时间对比 
        
        /* 对方是否读取最新一条的信息  */
        $content_status['status'] = $this->info[0]['msg_content_status'];
        $content_status['content_id'] = $this->info[0]['msg_content_id'];
        sort($this->info);

        /* 获取两人的头像  */
        $msg_sender = $this->letter->find($msg_sender_id);
        $lower = $this->passportinfo($msg_sender['passport_id_lower']);
        $upper = $this->passportinfo($msg_sender['passport_id_upper']);
        $lower_picture = $lower['passport_picture'];
        $upper_picture = $upper['passport_picture'];
        $log_time = '';
        $prev_time = date('Y-m-d',strtotime($this->info[0]['msg_content_ctime']));
        $next_time = $this->info[1] ? date('Y-m-d',strtotime($this->info[1]['msg_content_ctime'])) : '';
        foreach ($this->info as $key => &$value)
        {
            /* $value['msg_content_body'] = $value['passport_id'] == 1 ? preg_replace_callback('/(http[s]?:\/\/[\\S]+)/i', function($m){ return <<<HTML
<a href="{$m[1]}">$m[1]</a>
HTML;
}, $value['msg_content_body'])
         :  $value['msg_content_body']; */
        	$value['picture'] = ($value['passport_id'] == $msg_sender['passport_id_lower']) ? $lower_picture : $upper_picture; //用户头像
        	
        	$msg_content_ctime=date('Y-m-d',strtotime($value['msg_content_ctime']));//只做天的对比
        	if($log_time<>$msg_content_ctime)//如果上一条时间记录不同于这条时间记录，做一个时间
        	{
        		$value['log_time'] = $msg_content_ctime;
        	}
        	$log_time = $msg_content_ctime;
        }
        if($this->info[$pagesize])
        { 
            unset($this->info[0]); //把用于做时间对比的记录去掉
        }
        
        $this->passport_id = $this->passport_id;
        $this->recevier_id = ($this->passport_id == $msg_sender['passport_id_lower']) ? $msg_sender['passport_id_upper'] : $msg_sender['passport_id_lower'];
        
        $recevier_info = $this->passportinfo($this->recevier_id);
        
                
        //把以前的记录全记录为已读
        $where = array(
        	'msg_sender_id' => $msg_sender_id,
            'passport_id' => $this->recevier_id,
        );
        $data = array(
        	'msg_content_status' =>2,
        );
        $this->letter_content->update()->set($data)->where($where)->query();
        return [
        		'result'=> true,
        		'info'  => $this->info,
                'passport_id' => $this->passport_id,
                'recevier_id' => $this->recevier_id,
                'recevier_is_blacklist' => $recevier_info['passport_in_blacklist'],
                'recevier_name' => $recevier_info['passport_name'],
                'content_status' => $content_status,
        		'detail'=> ''
        		];
        
    }
    
    /**
     * 
     * 会话发送及回复
     * 
     * @param Application $application
     * @param Request $request
     */
    
    public function executeSend(Application $application, Request $request)
    {
        if (REQUEST_METHOD == 'GET') {
            $this->setLayout('msgLayout');
            $this->setView('send');
            $this->method = 'POST';
            $this->submitType = 'SUBMIT';
            $this->actionUrl = '/letter/send/';
            $this->receiver_id = $request->get('receiver_id', 0);
            
            if ($this->receiver_id == 0) {
                $this->headerTo('/error/404');
            }
            if ($this->receiver_id == $_SESSION['userinfo']['passport_id']) {
                echo "<script>history.back(-1)</script>";
                exit();
            }

            $this->resultArray = $this->passportinfo($this->receiver_id);
            //判断发送站内信来源
            //联系人列表页
            $letterurl = $request->get('letterurl', '');
            //详情页
            $brand = $request->get('brand', 0);
            $mall = $request->get('mall', 0);
            //需求详情页
            $demandid = $request->get('demandid', 0);
            
            
            /* 如果是申请橙TV的，就默认对话内容  */
            $from = $request->get('from', 0);
            if(!empty($from))
            {
            	$this->content = $from==1 ? "方小橙，我想加入橙TV的拍摄，快快联系我吧。" : '方小橙，我想申请品牌推荐，快快联系我吧。';
            }
            
            // 转换成URL
            if(!empty($demandid)){
                $this->location = "/ucenter/demandshow/demandid/{$demandid}";
            }elseif(!empty($brand)){
            	$this->location = "/details/brand/brand_id/{$brand}";
            }elseif(!empty($mall)){
                $this->location = "/details/mall/mall_id/{$mall}";
            }elseif(!empty($letterurl))
            {
            	$this->location = \Frame\Util\UString::base64_decode($letterurl);
            	$url = $request->get('url', '') ? $request->get('url', '') : $letterurl;
            }
            
            $return_url = \Frame\Util\UString::base64_decode($url); 
            $this->return_url = !empty($return_url) ? "javascript:window.location.href='{$return_url}'" : "history.go(-1)" ;
            
        }else{
            $passport_id = $this->passport_id;
            $receiver_id = $request->get('receiver_id', 0);
            
            /* $passport_id = $request->get('receiver_id', 0);
            $receiver_id = $this->passport_id; */
            
            // 向谁发送传
            if ($receiver_id == 0) {
                return [
                    'result' => 0,
                    'resultMsg' => "参数错误"
                ];
            }
            
            // 检测发送内容是否为空
            if(trim($request->get('msg_content_body')) == '')
            {
                return [
                		'result' => 0,
                		'resultMsg' => "请您输入私信内容。"
                		];
            }
            
            if ($receiver_id == $passport_id) {
                return [
                    'result' => 0,
                    'resultMsg' => "由于系统原因，您的操作未成功"
                ];
            }
           
            if($passport_id >= 30){  // 方小橙用户发站内信无限制，不是方小橙用户全部做限制
                // 当天发送条数
                $now = date('Y-m-d');
                $data = $this->letter_content->total("passport_id = {$passport_id} and msg_content_ctime > '{$now}'");
                if ($data > 99) {
                    return [
                        'result' => 0,
                        'resultMsg' => "本日您发送的私信已达100条上限，请明日再发。"
                    ];
                }
            }
            // 数据整理
            $arg = $request->get();
            $id_info = array(
                $passport_id,
                $receiver_id
            );
            sort($id_info);
            $arg['passport_id_lower'] = $id_info[0];
            $arg['passport_id_upper'] = $id_info[1];
            $arg['passport_id'] = $passport_id;
            $arg['passport_id_receiver'] = $receiver_id;
            $arg['MsgContent'] = array(
                [
                    'passport_id' => $passport_id,
                    'passport_id_receiver' => $receiver_id,
                    'msg_content_is_sender' => '1',
                    'msg_content_body' => $request->get('msg_content_body')
                ]
            );
            
            // 是否存在会话ID是
            $where = array(
                'passport_id_lower' => $id_info[0],
                'passport_id_upper' => $id_info[1]
            );
            $is_sender_id = $this->letter->select('msg_sender_id')
                ->where($where)
                ->query();
            
            // 如果存在会话ID，只存会话内容即可
            if ($is_sender_id[0]['msg_sender_id']) {
                $msg_sender_id = $is_sender_id[0]['msg_sender_id'];
                $arg['msg_sender_id'] = $msg_sender_id;
                $this->resultArray = $this->letter_content->add($arg);
            } else {
                
                // 如果会话ID不存在，则创建会话ID并存储内容
                $this->resultArray = $this->letter->relation('MsgContent')->add($arg);
                $msg_sender_id = $this->resultArray;
            }
            
            if ($this->resultArray > 0) {
                
                /* 发送成功微信提醒  */
                $receiver_info = $this->passportinfo($receiver_id);
                $passport_weixin_open_id = $receiver_info['passport_weixin_open_id'];
                /**2015-12-08 &&0 去掉微信的实时通知  */
                if ($passport_weixin_open_id  && 0) { //微信提醒       
                    $weiChat = \FC\WeiXin::instance();
                    $log_weixin_status = $weiChat->checkIsSendLetterMsg($receiver_id, $passport_id);
                    if ($log_weixin_status)
                    {
                        
                        $json_weixin_content = [
                            'first' => [
                                'value' => '您有新的私信'
                            ],
                            'keyword1' => [
                                'value' => $this->passport_info['resultMsg']['passport_name'],
                            ],
                            'keyword2' => [
                                'value' => date('Y-m-d H:i:s')
                            ],
                            'keyword3' => [
                                'value' => '点击查看私信对话',
                            ],
                            'remark' => [
                                'value' => ''
                            ]
                        ];
                        
                        $weixin_content = array(
                            'log_weixin_ctime' => date('Y-m-d H:i:s'),
                            'passport_id' => $receiver_id,
                            'passport_id_sender' => $passport_id,
                            'passport_weixin_open_id' => $passport_weixin_open_id,
                            'log_weixin_type' => 1,
                            'log_weixin_url' => C('WEB_URL').'/letter/view/msg_sender_id/'.$msg_sender_id.'/passport_id/'.$receiver_id,
                            'log_weixin_content' => json_encode($json_weixin_content),
                        );
                        
                        $weixin = new \Model\Log\Weixin();
                    	$weixin->add($weixin_content);
                    }
                }
                //添加私信短信开关  2015/11/02 leiy
                
                if ($receiver_info['passport_msg_push_private'] == 1){
                    $checkisMsg = $this->isMsg($receiver_id, $passport_id);
                }else {
                    $checkisMsg = false;
                }
                /* 发送成功短信提醒 */
                /**2015-12-08 && 0 去掉实时短信通知*/
                if($receiver_info['passport_mobile'] && $checkisMsg && 0)
                {
                    $passport_info = $this->passportinfo($passport_id);
                    //品牌用户读取品牌项目，品牌与商业体都存在时默认商业体项目
                    if($passport_info['PassportBrand'] && $passport_info['PassportMall'])
                    {
                        $project_name = '第三方';
                    }elseif($passport_info['PassportBrand']){
                        $project = array_pop($passport_info['PassportBrand']);
                        $project_name = $project['brand_name'];
                    }elseif($passport_info['PassportMall'])
                    {
                        $project = array_pop($passport_info['PassportMall']);
                        $project_name = $project['mall_name'];
                    }
                    
                    $m_date = [
	                   'project' => $project_name,
                       'name' => $passport_info['passport_name']
                        ];
                    
                    $result = SendSMS($receiver_info['passport_mobile'], 4, $m_date, 1);
                    if($result == false)
                    {
                        SendSMS($receiver_info['passport_mobile'], 4, $m_date, 2);
                    }
                    // 记录短信发送
                    $smsArgs = array(
                    		'log_sms_ctime' => date('Y-m-d H:i:s'),
                    		'passport_id' => $receiver_id,
                    		'passport_id_sender' => $passport_id,
                    		'log_sms_to_mobile' => $receiver_info['passport_mobile'],
                    		'log_sms_type' => 1,
                    		'log_sms_content' => \Frame\Util\UString::json($m_date),
                    );
                    
                    $smsObj = new \Model\Log\Sms();
                    $smsObj->add($smsArgs);
                }
                
                // 方小橙用户发站内信无限制
                if($passport_id < 30)                 
                {
                    return [
                        'result' => 1,
                        'resultMsg' => "私信发送成功",
                        'msg_sender_id' => $msg_sender_id
                    ];
                }else{
                    // 今天还可以发多少条
                    $surplus_number = 99 - $data;
                    if($data < 99){
                        return [
                            'result' => 1,
                            'resultMsg' => "私信发送成功",
                            'msg_sender_id' => $msg_sender_id
                        ];
                    }elseif($data == 99){
                        return [
                            'result' => 0,
                            'resultMsg' => "发送成功，本日您已发送私信100条。",
                            'msg_sender_id' => $msg_sender_id,
                            'msg_sender_result' => 1
                        ];
                    }
                }
            } else {
                return [
                    'result' => 0,
                    'resultMsg' => "发送失败"
                ];
            }
        }
    }
    
    /**
     * 
     * 查询用户信息
     *
     * @param unknown $passport_id            
     * @return Ambigous <\Frame\Dao\Model, boolean, multitype:>
     */
    
    private function passportinfo($passport_id)
    {
        $passport = new \Model\Passport();
        $rs = $passport->find($passport_id);
        $passport_type = $rs['passport_type'];
        
        $mbrand = new \Model\Passport\Brand();
        $mmall = new \Model\Passport\Mall();
        //$rs = $passport->relation('PassportBrand,PassportMall')->find($passport_id);
        
        //根据用户当前身份判断来读取哪个表
        $rs['PassportBrand'] = [];
        $rs['PassportMall'] = [];
        
        
        if($passport_type == 1){
            $rs['PassportBrand'] = $mbrand->select()->where("passport_id = {$passport_id} and passport_brand_status = 1")->query();
        }elseif($passport_type ==2 || $passport_type ==3){
            $rs['PassportMall'] = $mmall->select()->where("passport_id = {$passport_id} and passport_mall_status = 1")->query();
        }elseif($passport_type == 4){
            $rs['PassportBrand'] = $mbrand->select()->where("passport_id = {$passport_id} and passport_brand_status = 1")->query();
            $rs['PassportMall'] = $mmall->select()->where("passport_id = {$passport_id} and passport_mall_status = 1")->query();
        }
        
        
        if($rs['passport_private_mode'] == 1)
        {
        	$sex = ($rs['passport_sex']==1) ? '先生' : '女士'; 
        	$rs['passport_name'] = $rs['passport_first_name'].$sex;
        }
        $rs['passport_picture'] = empty($rs['passport_picture']) ? '/img/detail/headdefault.png' : C('UPLOAD_URL').$rs['passport_picture'];
        $count = 0;
        foreach ($rs['PassportBrand'] as $key => $value)
        {
        	$rs['project'] .= $rs['PassportBrand'][$key]['brand_name'].'、';
        	$count = $count+1;
        }
        
        foreach($rs['PassportMall'] as $key => $value)
        {
            $rs['project'] .= $rs['PassportMall'][$key]['mall_name'].'、';
            $count = $count+1;
                    }
                    
        $rs['project'] = rtrim($rs['project'], '、');
        $rs['project_count'] = ($count <= 1) ? '' : $count;
        return $rs;
    }

    /**
     * 未读消息条数
     * 
     * @param Application $application
     * @param Request $request
     * @return multitype:number Ambigous <number, unknown>
     */
    public function executeUnread(Application $application, Request $request)
    {
        
        $passport_id = $this->passport_id;
        $data = $this->letter->select()->where('passport_id_lower=? or passport_id_upper=?', $passport_id, $passport_id)->query();
        foreach($data as $key=>$value)
        {
            
            $reciver_id = ($data[$key]['passport_id_lower'] == $passport_id) ? $data[$key]['passport_id_lower'] : $data[$key]['passport_id_upper'];
            $where = array(
            	'passport_id' => $passport_id,
                'msg_sender_id' => $data[$key]['msg_sender_id'],
                'msg_content_status' => 1,
            );
        	$count[] = $this->letter_content->total($where);
        }
        
        $result = !empty($count) ? 1 : 0;
        $count = array_sum($count);
        $count = !empty($count) ? $count : 0 ;
        return [
        	'result' => $result ,
            'resultMsg' => $count, 
        ];
        
    }
    
    private function isMsg($receiver_id, $passport_id)
    {
        $db = DB();
        $currentTime = date("H:i:s",time());
        if ($currentTime < "09:00:00"){
        	$timeStart = date("Y-m-d", strtotime("-1 day"));
        	$timeStart .= " 09:00:00";
        }else {
        	$timeStart = date("Y-m-d");
        	$timeStart .= " 09:00:00";
        }
        
        $resultcount = $db->select('count(1) as count')
        ->from('log_sms')
        ->where(['log_sms_ctime' => ['>=',$timeStart], 'passport_id'=> $receiver_id, 'passport_id_sender' => $passport_id])
        ->query(); //今天此人是否和我发送过消息
        if($resultcount['0']['count'] > 0)
        {
        	return false;
        }else {
        	$resultMsgContent = $db->select('count(1) as count')->from('log_sms')->where(['log_sms_ctime' => ['>=',$timeStart], 'passport_id' => $receiver_id])->query();//我目前接收到的提醒条数
        	if($resultMsgContent['0']['count'] >= 3)
        	{
        		return false;
        	}else{
        		return true;
        	}
        }
    }
    
    /**
     * 有新消息时微信、短信提醒
     * @param Application $application
     * @param Request $request
     */
    private function noteice_letter($reciver_id, $content)
    {
    	
        
    }
    
}

?>