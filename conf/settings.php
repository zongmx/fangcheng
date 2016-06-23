<?php

/*
 * 这是Frame框架的一部分
 *  @author Jason <jasonfeng1@gmail.com>
*/

/**
 * 返回全局的配置信息
 */
return [
    // URL前缀 默认为空
	'URL_HEAD'         =>  '',             # 投产模式前缀   e.g.index.php
    'URL_HEAD_DEBUG'   =>  '/dev.php',             # 调试模式前缀 e.g. dev.php
    
    // 错误报告
	'ERROR_REPORTING'         =>  E_ALL,             # 投产模式 
    'ERROR_REPORTING_DEBUG'   =>  0,            # 调试模式
    
    // 默认地区
    'DEFAULT_TIMEZONE' =>  'Asia/Shanghai',
    
    // 默认语言
    'LANGUAGE'         =>  'cn',
    'CHARSET'          =>  'utf-8',
    
    // 代码版本号
    'VERSION'          =>  '0.0.16',        # 用于清除前端CSS,JS缓存
    
    // 是否进行CSRF检查
    'CSRF'             =>  false,
    
    // 最大内部跳转数
    'MAX_FORWARD'      =>  5,
    
    // 默认错误页面
    'ERROR_DEFAULT'    =>  ['error', 'default'],
    
    // 404页面
    'ERROR_404'        =>  ['error', '404'],
    
    // 日志设置
    'LOG_RECORD'       => true,                                 # 是否记录日志
    'LOG_MAXSIZE'      => 2097152,                              # 最大文件数
    'LOG_LEVER'        => ['EMERG', 'ALERT', 'CRIT', 'ERR'],    #记录的等级
    
    # 网站URL设置
    'WEB_URL'          => 'http://m.fangcheng.cn',                      # 网站访问路径
    
    # 上传设置
    'UPLOAD_URL'       => '/upload',              # 访问上传文件的url
    'UPLOAD_DIR'       => JF_DIR_UPLOAD,                        # 上传文件存储路径
    # 在线显示城市
    'CITY_ONLINE'      => ['86999030'=> '北京', '86999031'=> '上海', '86007050'=> '南京', '86016140'=> '广州', '86016125'=> '深圳' ],
    // trace 设置
    'TRACE_MAX_RECORD' => 100,                                  # 最大的trace数
    'SERVICE_IP' => 'http://service.fangcheng.cn',     #服务service地址
    'MULTIPLY_DOUBLE' => 100,     #对于添加到数据库的数据统一扩大的倍数
    'IMAGE_LOGO_URL' => '/upload',     #logo图片前缀 
    'IMAGE_USER_URL' => '/upload',     #用户头像前缀 
    // DB配置
    'DB'    =>  [
        // 默认数据库
//         'DEFAULT' => [
//             'r'    =>  [
//         	    'driver'   =>  'mysql',
//         	    'host'     =>  'fangcheng.mysql.rds.aliyuncs.com',
//         	    'port'     =>  '3306',
//         	    'user'     =>  'fangcheng_admin',
//         	    'pwd'      =>  'fc1234',
//         	    'dbname'   =>  'fangcheng',
//         	],
//         	'w'    =>  [
//         	    'driver'   =>  'mysql',
//         	    'host'     =>  'fangcheng.mysql.rds.aliyuncs.com',
//         	    'port'     =>  '3306',
//         	    'user'     =>  'fangcheng_admin',
//         	    'pwd'      =>  'fc1234',
//         	    'dbname'   =>  'fangcheng',
//         	],
//         ],
        // 读写不分离的数据库
        'DEFAULT' => [
    	    'driver'   =>  'mysql',
    	    'host'     =>  'mysql_01.fangcheng.host',
    	    'port'     =>  '3306',
    	    'user'     =>  'fangcheng_admin',
    	    'pwd'      =>  'fc1234',
    	    'dbname'   =>  'fangcheng_v2',
        ],
        'REPORT' => [
    		'driver'   =>  'mysql',
    		'host'     =>  'mysql_01.fangcheng.host',
    		'port'     =>  '3306',
    		'user'     =>  'fangcheng_admin',
    		'pwd'      =>  'fc1234',
    		'dbname'   =>  'fangcheng_global',
		],
    ],
	'MDB' => [ 
		// 读写不分离的数据库
		'DEFAULT' => [ 
				'driver' => 'mongodb',
				'host' => 'mongo_01.fangcheng.host',
				'port' => '27017',
				'user' => 'root',
				'pwd' => 'root',
				'dbname' => 'fangcheng_v2' 
		],
	],
    'REDIS' => [
    // 		'host' => 'mongo_01.fangcheng.host',
    		'host' => '127.0.0.1',
    		'port' => '6379',
		    'head'     =>  'JFrame',
	],
    
    // MEMCACHED配置
    'MEMCACHED'    =>  [
		'host'     =>  'memcache_01.fangcheng.host',
		'port'     =>  '11211',
		'head'     =>  'JFrame',
	],
    
    // 微信配置
    'WeiXin'    =>  [
		'appId'     =>  'wx8cf01ac21271fb1a',
		'appSecret' =>  '8971f90f0a5922e075d85434ec10f33d',
	],
    
    // 邮箱配置
/*     'MAIL'    =>  [
		'host'     =>  'smtp.qiye.163.com',
		'port'     =>  25,
		'encoding'     =>  'base64',
		'smtpauth'     =>  true,
		'username'     =>  'service@fangcheng.cn',
		'password'     =>  'fc123456',
		'from'     =>  'service@fangcheng.cn',
		'fromName'     =>  '方橙科技',
		'charSet'     =>  'utf-8',
		'smtpSecure'     =>  '', // ssl | tls | ''
		'wordWrap'     =>  50,
	], */
     'MAIL'    =>  [
		'DEFAULT' => [
		    'host'     =>  '123.56.113.168',
		    'port'     =>  25,
		    'encoding'     =>  'base64',
		    'smtpauth'     =>  true,
		    'username'     =>  'service@mail.fangcheng.cn',
		    'password'     =>  'tRti9p)3U',
		    'from'     =>  'service@mail.fangcheng.cn',
		    'fromName'     =>  '方橙科技',
		    'charSet'     =>  'utf-8',
		    'smtpSecure'     =>  '', // ssl | tls | ''
		    'wordWrap'     =>  50,
		],
		'SERVICE' => [
		    'host'     =>  'smtp.qiye.163.com',
		    'port'     =>  25,
		    'encoding'     =>  'base64',
		    'smtpauth'     =>  true,
		    'username'     =>  'service@fangcheng.cn',
		    'password'     =>  'fc123456',
		    'from'     =>  'service@fangcheng.cn',
		    'fromName'     =>  '方橙科技',
		    'charSet'     =>  'utf-8',
		    'smtpSecure'     =>  '', // ssl | tls | ''
		    'wordWrap'     =>  50,
		],
	],
    
    // 邮箱配置
    'SMS'    =>  [
        'Ihuyi' =>  [
        	'account'  =>  "cf_fchlw",
        	'password' =>  "123456",
        ],
        'YunPian' =>  [
        	'apikey'     =>  "6f4f78a7fccac46fbbc593499d032d48",
        ],
    ],
    'SMS_QUEUE' => ['Ihuyi', 'YunPian'],
    
    'MALLSHOP_IP' => 'http://192.168.1.64:9200',
	    //相似需求
    'LIKE_DEMAND' => 'http://192.168.1.11'
    
];