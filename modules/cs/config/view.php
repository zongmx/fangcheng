<?php
/*
 * viewSuccess: metas: title: 我是title description: 我是description keywords: 我是keywords language: 我是language stylesheets: [jobs.css, aa.css] javascripts: [resume.js] layout: layout
 */

/**
 * 返回全局的视图（CSS,JS等）配置
 */
return [
    'defaultSuccess' => [
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

    'applySuccess' => [
        'javascripts' =>[
            'vendors/jquery-1.9.1.min.js',
            'vendors/custom-scripting.js',
            'vendors/jquery.mobile-1.4.5.min.js',
            'vendors/laydate/laydate.js',
            'util/common.js',
            'util/constant.js',
            'widget/validate.form.js',
            'widget/MWidget.js',
            'widget/listPlug.js',
            'tmpl.js',
            'widget/cityPlug.js',
            'widget/categoryPlug.js',
            'widget/checkPlug.js',
            'com.js',
            'jquery.form.js',
            'widget/otherBrandPlug.js',
            'widget/customScrollPlug.js',
            'util/uploadImg.js',
            'need/sendNeed4Brand.js'
        ],
        'stylesheets' => [
            'vendors/jquery.mobile-1.4.5.min.css',
            'widget/validate.form.js',
            'common.css',
            'detail.css',
            'form.css'
        ]
    ],


    'csneedSuccess' => [
        'javascripts' =>[
            'vendors/jquery-1.9.1.min.js',
            'vendors/custom-scripting.js',
            'vendors/jquery.mobile-1.4.5.min.js',
            'vendors/laydate/laydate.js',
            'util/common.js',
            'util/constant.js',
            'widget/validate.form.js',
            'widget/MWidget.js',
            'widget/listPlug.js',
            'tmpl.js',
            'widget/cityPlug.js',
            'widget/categoryPlug.js',
            'widget/checkPlug.js',
            'com.js',
            'jquery.form.js',
            'widget/otherBrandPlug.js',
            'widget/customScrollPlug.js',
            'util/uploadImg.js',
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
            'vendors/laydate/laydate.js',
            'util/constant.js',
            'widget/validate.form.js',
            'widget/MWidget.js',
            'widget/listPlug.js',
            'tmpl.js',
            'widget/cityPlug.js',
            'widget/categoryPlug.js',
            'widget/checkPlug.js',
            'com.js',
    	    'jquery.form.js',
			'widget/otherMallPlug.js',
            'widget/customScrollPlug.js',
            'util/uploadImg.js',
    	    'need/sendNeed4Mall.js'
        ],
        'stylesheets' => [
            'vendors/jquery.mobile-1.4.5.min.css',
            'common.css',
            'detail.css',
            'form.css'
        ]
    ],

    'csinfoSuccess' =>[
        'javascripts' =>[
            'vendors/laydate/laydate.js',
            'util/common.js',
            'widget/listPlug.js',
            'widget/validate.form.js',
        ]
    ],

    'csinviteSuccess' => [
        'javascripts' =>[
            'vendors/jquery-1.9.1.min.js',
            'vendors/custom-scripting.js',
            'vendors/jquery.mobile-1.4.5.min.js',
            'vendors/laydate/laydate.js',
            'util/common.js',
            'util/constant.js',
            'widget/validate.form.js',
            'widget/MWidget.js',
            'widget/listPlug.js',
            'tmpl.js',
            'widget/cityPlug.js',
            'widget/categoryPlug.js',
            'widget/checkPlug.js',
            'com.js',
            'jquery.form.js',
            'widget/otherBrandPlug.js',
            'widget/customScrollPlug.js',
            'util/uploadImg.js',
            'need/sendNeed4Brand.js'
        ],
        'stylesheets' => [
            'vendors/jquery.mobile-1.4.5.min.css',
            'common.css',
            'detail.css',
            'form.css'
        ]
    ],

];