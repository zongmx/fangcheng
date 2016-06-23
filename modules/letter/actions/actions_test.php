<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Frame\Foundation\Action;
use FC\Comm;
use FC\Session;

class LetterActions extends Action
{

    public $letter;

    protected $letterDB;

    private $userinfo;

    public function preExecute(Application $application, Request $request)
    {
        $this->letter = new \Model\Msg\Content();
        $this->letter_sender = new \Model\Msg\Sender();
        $this->listurl = '/letter/';
        $this->userinfo = FC\Session::getUserSession();
    }

    /**
     * 会话列表页
     */
    public function executeIndex(Application $application, Request $request)
    {
        if ($this->userinfo) {
            //$this->passport_id = $this->userinfo['passport_id'];
            $request->set('passport_id','50');
            $this->passport_id = '50';
            $this->setView('list');
            $pageNow = $request->get('p', 1);
            $request->set('p', '<--PAGENO-->');
            $query = urlFor('rest', $request->get());
            $data = array(array('<', 100), array('>', 10), 'or');
            $search = $this->letter_sender->search($request->get());
            $this->resultArray = $this->letter->pageList(20, $pageNow, $query, 1, $search['where']);
            __dd($this->resultArray);
            }
    }

    /**
     * 发送会话
     */
    public function executeSend(Application $application, Request $request)
    {
        if ($this->userinfo) {
            if (REQUEST_METHOD == 'GET') { // 显示查看页
                $this->setView('getAddEdit');
                $this->readonly = '';
                $this->method = 'POST';
                $this->submitType = 'SUBMIT';
                $this->actionUrl = $this->listUrl;
                // $this->receiver_id = $request->get('receiver_id');
                $this->receiver_id = '41';
                $this->resultArray = $this->Userinfo($this->receiver_id);
            } else {
                $request->set('sender_id', 50);
                $sender_id = $request->get('sender_id');
                $receiver_id = $request->get('receiver_id');
                $msg_content_is_sender = $this->letter_sender->total("sender_id=$sender_id and receiver_id=$receiver_id") ? 0 : 1 ;
                $arg = $request->get();
                $arg['MsgContent'] = array(
                	    ['passport_id'  => $sender_id,
                        'msg_content_is_sender' => $msg_content_is_sender,
                        'msg_content_body'  => $request->get('msg_content_body')],
                );
                // 添加数据
                $this->resultArray = $this->letter_sender->relation('MsgContent')->add($arg);
                if ($this->resultArray > 0) {
                    $this->headerTo($this->listUrl);
                } else {
                    __d(trace());
                    Comm::msg($request->getRequestUri(), '添加数据失败');
                }
            }
        }
    }
    
    /**
     * 查看对话
     * @param Application $application
     * @param Request $request
     */
    
    public function executeView(Application $application, Request $request)
    {
    	if($this->userinfo){
    		$this->setView('view');
            $pageNow = $request->get('p', 1);
            $request->set('p', '<--PAGENO-->');
            $query = urlFor('rest', $request->get());
            $sender_id = $request->set('sender_id','50');
            $receiver_id = $request->set('receiver_id','41');
            $this->senderinfo = $this->Userinfo($sender_id);
            $this->receiverinfo = $this->Userinfo($receiver_id);
            
            $search = $this->letter_sender->relation('MsgContent')->search($request->get());
            $this->resultArray = $this->letter_sender->pageList(20, $pageNow, $query, 0, $search['where']);
            
            $arg=array(
            	array('msg_content_status' => '2'),
            );
            
            if ($this->resultArray > 0) {
            	$this->letter_sender->relation('MsgContent')->update()->set($arg)->where("receiver_id=$receiver_id");
            }
            
    	    
    	    $log_time='';
            foreach($this->resultArray['list'] as $key => $value){
                $msg_sender_ctime = date('Y-m-d',strtotime($value['msg_sender_ctime']));
                if($log_time<>$msg_sender_ctime){
                    $this->resultArray['list'][$key]['log_time'] = $msg_sender_ctime;
                }
            	$log_time = $this->resultArray['list'][$key]['log_time'];
            }
            
            __dd($this->resultArray);
    	}
    }
    
    /**
     * 查看用户信息户
     *
     * @param unknown $passport_id
     * @return Ambigous <\Frame\Dao\Model, boolean, multitype:>
     */
    
    private function Userinfo($passport_id)
    {
        $passport = new \Model\Passport();
        $rs = $passport->relation('PassportBrand,PassportMall')->find($passport_id);
        return $rs;
    }
}

?>