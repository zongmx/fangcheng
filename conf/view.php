<?php

/*
 * 这是Frame框架的一部分 @author Jason <jasonfeng1@gmail.com>
*/

/**
 * 返回全局的视图（CSS,JS等）配置
 */
return [
	'default'  => [
		'http_metas'  =>  [
			'content-type'   =>  'text/html',
		],
	    'metas'       =>  [
	    	'title'         =>  '方橙-最专业的招商选址大数据平台',
	    	'description'   =>  'description',
	    	'keywords'      =>  'keywords',
	    	'language'      =>  'language',
	    	'X-UA-Compatible'=>  'IE=edge',
	    	'viewport'      =>  'width=device-width,height=device-height,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no',     
	    ],
	    'stylesheets'  =>  [
	        'vendors/jquery.mobile-1.4.5.min.css',
	        'common.css',
// 	    	'bootstrap.min.css',       # *ie.css这针对IE，‘/’开头取指定路径， 非'/'开头就去 /css/前缀
// 	    	'common.css',
// 	    	'register.css',
// 	    	'registerMedia.css'
	    ],
	    'javascripts'  =>  [
	        'vendors/jquery-1.9.1.min.js',
	        'vendors/custom-scripting.js',
	        'vendors/jquery.mobile-1.4.5.min.js',
	        'util/common.js',
	        'util/apiUtils.js'
// 	    	'jquery-1.9.1.min.js',  # ‘/’开头取指定路径， 非'/'开头就去 /css/前缀
// 	    	'global.js',
//     		'bootstrap.min.js',
//     		'register.js'
	    ],
	    'has_layout'   =>  true,           # 是否使用layout文件
	    'layout'       =>  'layout',       # 指定layout文件
	],
];