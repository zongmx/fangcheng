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
    		'title'         =>  '橙TV-方橙科技',
    		'description'   =>  '［橙ＴＶ］是方橙原创视频系列，以聚焦新锐品牌的产品和服务创新，发现未来消费趋势为节目初衷。［橙ＴＶ］将精选各行业优质新创品牌作为合作伙伴，并为其拍摄专属的品牌视频。',
    		'keywords'      =>  '橙TV,品牌视频,方橙,方橙科技',
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
                ],
        'has_layout' => true, // 是否使用layout文件
        'layout' => 'layout' // 指定layout文件
        ],
    'addSuccess' => [
        'http_metas' => [
            'content-type' => 'text/html'
        ],
        'stylesheets' => [
            'detail.css',
        	'form.css'
                ],
        'javascripts' => [
            'vendors/jquery.mobile.simpledialog.js',
            'vendors/jquery.ui.widget.js',
            'vendors/jquery.fileupload.js',
            'util/constant.js',
            'widget/MWidget.js',
            'widget/cityDisposablePlug.js',
            'widget/categoryDisposablePlug.js',
            'widget/listPlug.js',
    		'com.js',
                ],
        'has_layout' => true, // 是否使用layout文件
        'layout' => 'layout' // 指定layout文件
        ],
    'addrecommSuccess' => [
    		'http_metas' => [
    				'content-type' => 'text/html'
    				],
    		'stylesheets' => [
    				'detail.css',
    				'form.css'
    				],
    		'javascripts' => [
    				'vendors/jquery.mobile.simpledialog.js',
    				'vendors/jquery.ui.widget.js',
    				'vendors/jquery.fileupload.js',
    				'util/constant.js',
    				'widget/MWidget.js',
    				'widget/cityDisposablePlug.js',
    				'widget/categoryDisposablePlug.js',
    				'widget/listPlug.js',
    				'com.js',
    				],
    		'has_layout' => true, // 是否使用layout文件
    		'layout' => 'layout' // 指定layout文件
    		],
    'listSuccess' => [
    		'http_metas' => [
    				'content-type' => 'text/html'
    				],
    		'stylesheets' => [
    		        'vendors/jquery.mobile-1.4.5.min.css',
    				'common.css',
    				'detail.css',
    				'form.css',
    		         'vendors/scrollbar.css'
    				],
    		'javascripts' => [
    		        'vendors/jquery-1.9.1.min.js',
    		        'vendors/jquery.mobile-1.4.5.min.js',
    		        'util/common.js',
    		        'vendors/iscroll.js',
    		        'search-tv.js',
    		        'widget/customScrollPlug.js',
    		        'com.js'
    				],
    		'has_layout' => true, // 是否使用layout文件
//     		'layout' => 'layout' // 指定layout文件
    		],
    'viewSuccess' => [
    		'metas'       =>  [
    			'title'         =>  '橙TV详情-方橙科技',
    			'description'   =>  '［橙ＴＶ］是方橙原创视频系列，以聚焦新锐品牌的产品和服务创新，发现未来消费趋势为节目初衷。［橙ＴＶ］将精选各行业优质新创品牌作为合作伙伴，并为其拍摄专属的品牌视频。',
    			'keywords'      =>  '橙TV,品牌视频,方橙,方橙科技',
    			'language'      =>  'language',
    			'X-UA-Compatible'=>  'IE=edge',
    			'viewport'      =>  'width=device-width,height=device-height,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no',
    		],
    		'http_metas' => [
    				'content-type' => 'text/html'
    				],
    		'stylesheets' => [
    				'detail.css',
    				],
    		'javascripts' => [
    		        'vendors/jquery.validate.min.js',
    		        'detailsLogin.js',
    		        'com.js',
    		        'jquery.form.js',
    				],
    		'has_layout' => true, // 是否使用layout文件
    		'layout' => 'detailsbrandlayout' // 指定layout文件
    		],
    'infoSuccess' => [
    		'http_metas' => [
    				'content-type' => 'text/html'
    				],
    		'stylesheets' => [
    				'detail.css',
    				],
    		'javascripts' => [
    		        'com.js',
    				],
    		'has_layout' => true, // 是否使用layout文件
    		'layout' => 'layout' // 指定layout文件
    		],
    'errinfoSuccess' => [
            'metas'       =>  [
        		'title'   =>  '方橙-最专业的招商选址大数据平台',
        		],
    		'http_metas' => [
    				'content-type' => 'text/html'
    				],
    		'stylesheets' => [
    				'detail.css',
    				],
    		'javascripts' => [
    				'com.js',
    				],
    		'has_layout' => true, // 是否使用layout文件
    		'layout' => 'layout' // 指定layout文件
    		],
    'addbrandSuccess' => [
    		'http_metas' => [
    				'content-type' => 'text/html'
    				],
    		'stylesheets' => [
    				'detail.css',
    				],
    		'javascripts' => [
    				'com.js',
    				],
    		'has_layout' => true, // 是否使用layout文件
    		'layout' => 'layout' // 指定layout文件
    		],
];