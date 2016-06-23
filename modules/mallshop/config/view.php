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
    		'title'         =>  '方橙-最专业的招商选址大数据平台',
    		'description'   =>  '方橙科技是一个专业的商业地产大数据平台，专注于商业地产B2B服务。我们致力于通过大数据和互联网方式，使购物中心招商、品牌拓展更高效合理地达成交易匹配。',
    		'keywords'      =>  '商铺,找商铺,商业体商铺,方橙,方橙科技',
    		'language'      =>  'language',
    		'X-UA-Compatible'=>  'IE=edge',
    		'viewport'      =>  'width=device-width,height=device-height,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no',
    	],
        'http_metas' => [
            'content-type' => 'text/html'
        ],
        'stylesheets' => [
            #'main.css' // *ie.css这针对IE，‘/’开头取指定路径， 非'/'开头就去 /css/前缀
            'vendors/jquery.mobile-1.4.5.min.css',
            'common.css',
            'detail.css',
            
            'vendors/scrollbar.css',
            'vendors/ion.rangeSlider.css',
            'vendors/ion.rangeSlider.skinHTML5.css',
            
                ],
        'javascripts' => [
            'vendors/jquery-1.9.1.min.js',
            'vendors/jquery.mobile-1.4.5.min.js',
            'util/common.js',
            'vendors/iscroll.js',
            'vendors/ion.rangeSlider.min.js',
            'rangesSlider-shop.js',
            'scroller-shop.js',
            'data/shop_search.js',
        		'com.js',
                ],
        'has_layout' => true, // 是否使用layout文件
        'layout' => 'layout' // 指定layout文件
        ],
];