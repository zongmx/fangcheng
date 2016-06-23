<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Model;
use FC\LoginIn;
use FC\Comm;
use FC;



/**
 * 厘米
 *
 * @author yulei
 * @version v1.5
 */
class activityActions extends Frame\Foundation\Action
{

    public function preExecute(Application $application, Request $request)
    {}
    /**
     * 选择模板
     * */
    public function executeHtmltemplate(Application $application, Request $request)
    {        
        FC\Session::initSession();
        $passport_type =  $_SESSION['userinfo']['passport_type'];
        //如果是商业体身份 ，暂时还没有这份功能提示页面
        if ($passport_type == 2 || $passport_type == 3){
            $this->setView('businesstemplate');
        }
        $this->setLayout('registerLayout');
    }
    /**
     * 模板一
     * */
    public function executeTemplateone(Application $application, Request $request)
    {
    	$this->setLayout('registerLayout');
    }
    /**
     * 模板二
     * */
    public function executeTemplatetwo(Application $application, Request $request)
    {
    	$this->setLayout('registerLayout');
    }

    
   
   
   
   
   /**
         * 
         *      /*   $postdata = [];
        $postdata['slide'] = 'Hu5Y7mCxY9GgzgwPtRbK47';
        $postdata['text'][] = [
        	'name'=>'name',
            'text'=>'text'
        ];
        $postdata['image'][] = [
            'name' => 'imagename',
            'src' => 'http://m.fangcheng.cn/upload/file/2015-08-27/src/df36f222186a92255c.jpg',
            'size'=>[
            	'width'=>100,
                'height' =>200
            ]
        ];
        $postdata = json_encode($postdata);
//         __dd($postdata);
        $link = 'http://slide.limijiaoyin.com/api/template/generation';
        $ch = curl_init();
        $timeout = 5; // set to zero for no timeout
        curl_setopt ($ch, CURLOPT_URL, $link);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.131 Safari/537.36');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $result = curl_exec($ch);
        var_dump($result);
        exit();*/

}


















