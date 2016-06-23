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
    	'metas'       =>  [
    		'title'         =>  '商圈详情-方橙科技',
    		'description'   =>  '方橙科技是一个专业的商业地产大数据平台，专注于商业地产B2B服务。我们致力于通过大数据和互联网方式，使购物中心招商、品牌拓展更高效合理地达成交易匹配。',
    		'keywords'      =>  '方橙,方橙科技',
    		'language'      =>  'language',
    		'X-UA-Compatible'=>  'IE=edge',
    		'viewport'      =>  'width=device-width,height=device-height,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no',
    	],
        'http_metas' => [
            'content-type' => 'text/html'
        ],
        'stylesheets' => [
            #'main.css' // *ie.css这针对IE，‘/’开头取指定路径， 非'/'开头就去 /css/前缀
                ],
    		
        'javascripts' => [
            'com.js',
         ],
        'has_layout' => true, // 是否使用layout文件
        'layout' => 'layout' // 指定layout文件
        ],
    'dataSuccess' => [
        'http_metas' => [
            'content-type' => 'text/html'
        ],
        'stylesheets' => [
            'detail.css',
            'chart.css',
                ],
        'javascripts' => [
            'vendors/d3.min.js',
            'd3pie.js',
            'chartBaseOnD3.js',
                ],
        'has_layout' => true, // 是否使用layout文件
        'layout' => 'layout' // 指定layout文件
        ],
    'infoSuccess' => [
    		'http_metas' => [
    				'content-type' => 'text/html'
    				],
    		'stylesheets' => [
    				'detail.css',
    				],
    		'javascripts' => [
    				
    				],
    		'has_layout' => true, // 是否使用layout文件
    		'layout' => 'layout' // 指定layout文件
    		],
];