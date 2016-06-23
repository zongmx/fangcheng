<?php

/*
 * 这是Frame框架的一部分 @author Jason <jasonfeng1@gmail.com>
*/

/**
 * 返回全局的视图（CSS,JS等）配置
 */

return [
    'htmltemplateSuccess' => [
    	'javascripts' =>[
    	    'com.js'
    	],
        'stylesheets' => [
            'detail.css',
            'form.css'
        ]
    ],
    'businessneedSuccess' => [
    	'javascripts' =>[
    	    'jquery.form.js',
    	    'need/sendNeed4Mall.js'
    	],
        'stylesheets' => [
            'form.css'
        ]
    ],
    'templateoneSuccess' => [
    	'javascripts' =>[
    	    'vendors/cropper.js',
    	    'util/constant.js',
    	    'widget/validate.form.js',
    	    'tmpl.js',
    	    'widget/MWidget.js',
    	    'widget/cityPlug.js',
			'widget/listPlug.js',
			'widget/categoryPlug.js',
    	    'widget/checkPlug.js',
			'widget/otherBrandPlug.js',
			'widget/customScrollPlug.js',
    	    'com.js',
    	    'need/h5need_1.js',
    	    'cropPic.js',
    	    'http://res.wx.qq.com/open/js/jweixin-1.0.0.js'
    	],
        'stylesheets' => [
            'vendors/jquery.fileupload-ui.css',
            'detail.css',
            'vendors/cropper.css',
            'form.css'
        ]
    ],
    'templatetwoSuccess' => [
    	'javascripts' => [
    		'vendors/cropper.js',
    	    'util/constant.js',
    	    'widget/validate.form.js',
    	    'widget/MWidget.js',
    	    'tmpl.js',
			'widget/listPlug.js',
			'widget/categoryPlug.js',
    	    'widget/checkPlug.js',
    	    'widget/cityPlug.js',
    	    'com.js',
    	    'need/h5need_2.js',
    	    'cropPic.js',
			'widget/otherBrandPlug.js',
			'widget/customScrollPlug.js',
    	    'http://res.wx.qq.com/open/js/jweixin-1.0.0.js'
    	],
        'stylesheets' => [
        	'vendors/jquery.fileupload-ui.css',
            'detail.css',
            'form.css',
            'vendors/cropper.css'
        ]
    ]
];