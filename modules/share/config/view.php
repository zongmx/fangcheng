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
			'vendors/jquery.mobile-1.4.5.min.css',
			'common.css',
			'detail.css',
			'form.css',
			'vendors/swiper.min.css'
		],
		'javascripts' => [
			'vendors/jquery-1.9.1.min.js',
			'vendors/custom-scripting.js',
			'vendors/jquery.mobile-1.4.5.min.js',
			'util/common.js',
			'vendors/jquery.validate.min.js',
			'com.js',
			'vendors/swiper.min.js'
		],
		'has_layout' => true, // 是否使用layout文件
		'layout' => 'detailslayout' // 指定layout文件
	],
    'searchSuccess' => [
    	'stylesheets' => [
    	    'vendors/jquery.mobile-1.4.5.min.css',
    	    'common.css',
    	    'detail.css',
    	    'form.css',
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
            'rangesSlider-mall.js',
            'scroller-shop.js',
            'data/shop_search.js',
            'widget/customScrollPlug.js'
        ]
    ],

	'shareindexSuccess' =>[
		'javascripts' =>[
			'vendors/laydate/laydate.js',
			'vendors/jquery.ui.widget.js',
			'util/constant.js',
			'widget/MWidget.js',
			'widget/listPlug.js',
            'widget/categoryPlug.js',
            'widget/customScrollPlug.js',
            'widget/otherBrandPlug.js',
            'widget/cityPlug.js',
            'widget/validate.form.js',
            'ucenter/brandEdit.js',
            'signup/fastsign.js',

             'tmpl.js'
		]

	],
];