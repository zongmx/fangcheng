<?php
/* viewSuccess:
metas:
title:        我是title
description:  我是description
keywords:     我是keywords
language:     我是language
stylesheets: [jobs.css, aa.css]
javascripts: [resume.js]
layout:      layout */

/**
 * 返回全局的视图（CSS,JS等）配置
 */
return [
    'defaultSuccess' => [
        'http_metas' => [
            'content-type' => 'text/html'
        ],
        'stylesheets' => [
            #'main.css' // *ie.css这针对IE，‘/’开头取指定路径， 非'/'开头就去 /css/前缀
                ],
    		
        'javascripts' => [
            'vendors/custom-scripting.js',
        	'util/common.js',
        	'com.js'
                ],
        'has_layout' => true, // 是否使用layout文件
        'layout' => 'layout' // 指定layout文件
        ],
    'indexSuccess' => [
        'http_metas' => [
            'content-type' => 'text/html'
        ],
        'stylesheets' => [
            '/css/vendors/jquery.mobile-1.4.5.min.css',
        	'/css/common.css',
        	'/css/detail.css'	
                ],
        'javascripts' => [
            '/js/vendors/jquery-1.9.1.min.js',
        	'/js/vendors/jquery.mobile-1.4.5.min.js',
                ],
        'has_layout' => true, // 是否使用layout文件
        'layout' => 'layout' // 指定layout文件
        ],
    
];