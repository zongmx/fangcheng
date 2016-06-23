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
	'ERROR_REPORTING'         =>  '0',             # 投产模式 
    'ERROR_REPORTING_DEBUG'   =>  '-1',            # 调试模式
    
    // 默认地区
    'DEFAULT_TIMEZONE' =>  'Asia/Shanghai',
    
    // 默认语言
    'LANGUAGE'         =>  'cn',
    'CHARSET'          =>  'utf-8',
    
    // 代码版本号
    'VERSION'          =>  '0.0.1',        # 用于清除前端CSS,JS缓存
    
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
    'WEB_URL'          => 'http://center',                      # 网站访问路径
    
    # 上传设置
    'UPLOAD_URL'       => 'http:///center/upload',              # 访问上传文件的url
    'UPLOAD_DIR'       => JF_DIR_UPLOAD,                        # 上传文件存储路径
    
    // trace 设置
    'TRACE_MAX_RECORD' => 100,                                  # 最大的trace数
    
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
    	    'host'     =>  'fangcheng.mysql.rds.aliyuncs.com',
    	    'port'     =>  '3306',
    	    'user'     =>  'fangcheng_admin',
    	    'pwd'      =>  'fc1234',
    	    'dbname'   =>  'fangcheng_v2',
        ],
    ],
    
    // MEMCACHED配置
    'MEMCACHED'    =>  [
		'host'     =>  '127.0.0.1',
		'port'     =>  '11211',
		'head'     =>  'JFrame',
	],
    
    
    
];