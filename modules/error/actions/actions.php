<?php
/*
 * 这个文件是JFrame的一部分
 */

use Frame\Foundation\Application;
use Frame\Http\Request;
use Model;

/**
 * 用户的所有动作
 *
 * @version 0.2.0
 */
class errorActions extends Frame\Foundation\Action
{
    public function preExecute(Application $application, Request $request)
    {
        
    }
    
    public function executeDefault(Application $application, Request $request)
    {
    	echo __("这是默认错误页面")."<br />\n";
    	__d("错误记录：", trace());
    	__d("用户请求信息：", $request->get());
    	__d("系统配置信息：", $this->_application->get());    # 得到所有的配置参数
    	$this->setView(null);
    }
    
    public function execute404(Application $application, Request $request)
    { // 测试完毕
//         __d($request->get());
        // 不要加载视图模块
//         $this->setView();
    }
    
    public function executeNopower(Application $application, Request $request)
    {
    	echo __('<h1>如果你看见这个页面，那是因为你【没有权限】</h1>');
    	__d("错误记录：", trace());
    	__d("用户请求信息：", $request->get());
    	__d("系统配置信息：", $this->_application->get());    # 得到所有的配置参数
    	$this->setView(null);
    }
    
    public function executeSucced(Application $application, Request $request)
    {
    	$this->msg = $request->get('msg','');
    	$this->setLayout();
    	$this->setView('succed');
    }

    public function postExecute(Application $application, Request $request)
    { // 测试完毕
          // throw new Exception('程序成功运行结束，输出信息');
    }
}