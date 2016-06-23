<?php

/*
 * 这是Frame框架的一部分 @author Jason <jasonfeng1@gmail.com>
*/

/**
 * 返回全局的视图（CSS,JS等）配置
 */

return [
	'defaultSuccess'  => [
	    'stylesheets'  =>  [
            'vendors/jquery.mobile-1.4.5.min.css',
	        'common.css',
	        'detail.css'
	    ],
	    'javascripts'  =>  [
            'vendors/jquery-1.9.1.min.js',
	        'vendors/custom-scripting.js',
	        'vendors/jquery.mobile-1.4.5.min.js',
			'util/common.js',
            'util/constant.js',
	        'jquery.form.js',
	        'widget/validate.form.js',
	        'widget/MWidget.js',
	        'widget/listPlug.js',
	        'widget/cityPlug.js',
			'tmpl.js',
	        'widget/categoryPlug.js',
	        'widget/listDisposablePlug.js',
	        'widget/checkPlug.js', 
	        'com.js'
	    ],
	    'has_layout'   =>  true,           # 是否使用layout文件
	    'layout'       =>  'demandlayout',       # 指定layout文件
	],
    'brandneedSuccess' => [
    	'javascripts' =>[
    	    'jquery.form.js',
			'widget/otherBrandPlug.js',
			'widget/customScrollPlug.js',
    	    'need/sendNeed4Brand.js'
    	],
        'stylesheets' => [
        	'vendors/jquery.mobile-1.4.5.min.css',
            'common.css',
            'detail.css',
            'form.css'
        ]
    ],
    'businessneedSuccess' => [
    	'javascripts' =>[
    	    'jquery.form.js',
			'widget/otherMallPlug.js',
			'widget/customScrollPlug.js',
    	    'need/sendNeed4Mall.js'
    	],
        'stylesheets' => [
            'form.css'
        ]
    ]
];