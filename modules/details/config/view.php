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
            'form.css'
        ],
        'javascripts' => [
            'vendors/jquery-1.9.1.min.js',
            'vendors/custom-scripting.js',
            'vendors/jquery.mobile-1.4.5.min.js',
        	'util/common.js',
            'vendors/jquery.validate.min.js',
        	'com.js',
            'detailsLogin.js'
        ],
        'has_layout' => true, // 是否使用layout文件
        'layout' => 'detailslayout' // 指定layout文件
        ],
    
    'userlistSuccess'=>[
    	'metas'       =>  [
    		'title'         =>  '联系人列表-方橙科技',
    		'description'   =>  '方橙科技是一个专业的商业地产大数据平台，专注于商业地产B2B服务。我们致力于通过大数据和互联网方式，使购物中心招商、品牌拓展更高效合理地达成交易匹配。',
    		'keywords'      =>  '方橙,方橙科技',
    		'language'      =>  'language',
    		'X-UA-Compatible'=>  'IE=edge',
    		'viewport'      =>  'width=device-width,height=device-height,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no',
    	],
        'javascripts' => [
        	'jquery.form.js'
        ]
    ],
    'mallSuccess' => [
    	'metas'       =>  [
    		'title'         =>  '商业体详情-方橙科技',
    		'description'   =>  '方橙科技是一个专业的商业地产大数据平台，专注于商业地产B2B服务。我们致力于通过大数据和互联网方式，使购物中心招商、品牌拓展更高效合理地达成交易匹配。',
    		'keywords'      =>  '方橙,方橙科技',
    		'language'      =>  'language',
    		'X-UA-Compatible'=>  'IE=edge',
    		'viewport'      =>  'width=device-width,height=device-height,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no',
    	],
        'stylesheets' => [
            'vendors/swiper.min.css'
            ],
        'javascripts' => [
        	'vendors/swiper.min.js',
            'jquery.form.js',
        	'widget/validate.form.js'
            
        ]
    ],
    'mallaroundSuccess' => [
    	'metas'       =>  [
    		'title'         =>  '商业体详情-方橙科技',
    		'description'   =>  '方橙科技是一个专业的商业地产大数据平台，专注于商业地产B2B服务。我们致力于通过大数据和互联网方式，使购物中心招商、品牌拓展更高效合理地达成交易匹配。',
    		'keywords'      =>  '方橙,方橙科技',
    		'language'      =>  'language',
    		'X-UA-Compatible'=>  'IE=edge',
    		'viewport'      =>  'width=device-width,height=device-height,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no',
    	],
        'stylesheets' => [
        	'chart.css'
        ],
        'javascripts' => [
        	'jquery.form.js',
            'vendors/d3.min.js',
            'd3pie.js',
            'chartBaseOnD3.js',
        ]
    ],
    'mallbrandandcategorySuccess' => [
    	'metas'       =>  [
    		'title'         =>  '商业体详情-方橙科技',
    		'description'   =>  '方橙科技是一个专业的商业地产大数据平台，专注于商业地产B2B服务。我们致力于通过大数据和互联网方式，使购物中心招商、品牌拓展更高效合理地达成交易匹配。',
    		'keywords'      =>  '方橙,方橙科技',
    		'language'      =>  'language',
    		'X-UA-Compatible'=>  'IE=edge',
    		'viewport'      =>  'width=device-width,height=device-height,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no',
    	],
    	'stylesheets' => [
    		'chart.css'
    	],
        'javascripts' => [
            'jquery.form.js',
            'vendors/d3.min.js',
            'd3pie.js',
            'chartBaseOnD3.js'
        ]
    ],
    'brandSuccess' => [
    	'metas'       =>  [
    		'title'         =>  '品牌详情-方橙科技',
    		'description'   =>  '方橙科技是一个专业的商业地产大数据平台，专注于商业地产B2B服务。我们致力于通过大数据和互联网方式，使购物中心招商、品牌拓展更高效合理地达成交易匹配。',
    		'keywords'      =>  '方橙,方橙科技',
    		'language'      =>  'language',
    		'X-UA-Compatible'=>  'IE=edge',
    		'viewport'      =>  'width=device-width,height=device-height,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no',
    	],
        'stylesheets' => [
            'vendors/swiper.min.css'
            ],
        'javascripts' => [
        	'vendors/swiper.min.js',
            'jquery.form.js',
			'widget/validate.form.js'
        ],
        'layout' => 'detailsbrandlayout' // 指定layout文件
    ],
    'brandfbSuccess' => [
    	'metas'       =>  [
    		'title'         =>  '品牌详情-方橙科技',
    		'description'   =>  '方橙科技是一个专业的商业地产大数据平台，专注于商业地产B2B服务。我们致力于通过大数据和互联网方式，使购物中心招商、品牌拓展更高效合理地达成交易匹配。',
    		'keywords'      =>  '方橙,方橙科技',
    		'language'      =>  'language',
    		'X-UA-Compatible'=>  'IE=edge',
    		'viewport'      =>  'width=device-width,height=device-height,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no',
    	],
		'stylesheets' => [
				'vendors/swiper.min.css',
		        'vendors/scrollbar.css'
				],
		'javascripts' => [
				'vendors/swiper.min.js',
		        'dataUpdater.js',
		        'vendors/iscroll.js',
		        'need-list-brandfb.js',
		        'jquery.form.js'
				],
		'layout' => 'detailsbrandlayout' // 指定layout文件
		],
    'brandnetdataSuccess' => [
    	'metas'       =>  [
    		'title'         =>  '品牌详情-方橙科技',
    		'description'   =>  '方橙科技是一个专业的商业地产大数据平台，专注于商业地产B2B服务。我们致力于通过大数据和互联网方式，使购物中心招商、品牌拓展更高效合理地达成交易匹配。',
    		'keywords'      =>  '方橙,方橙科技',
    		'language'      =>  'language',
    		'X-UA-Compatible'=>  'IE=edge',
    		'viewport'      =>  'width=device-width,height=device-height,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no',
    	],
		'stylesheets' => [
				'chart.css'
				],
		'javascripts' => [
				'vendors/d3.min.js',
		        'd3pie.js',
		        'chartBaseOnD3.js',
		        'jquery.form.js'
				],
		'layout' => 'detailsbrandlayout' // 指定layout文件
		],
    'netdataSuccess' => [
    	'metas'       =>  [
    		'title'         =>  '商业体详情-方橙科技',
    		'description'   =>  '方橙科技是一个专业的商业地产大数据平台，专注于商业地产B2B服务。我们致力于通过大数据和互联网方式，使购物中心招商、品牌拓展更高效合理地达成交易匹配。',
    		'keywords'      =>  '方橙,方橙科技',
    		'language'      =>  'language',
    		'X-UA-Compatible'=>  'IE=edge',
    		'viewport'      =>  'width=device-width,height=device-height,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no',
    	],
		'stylesheets' => [
			'chart.css'
		],
		'javascripts' => [
			'vendors/d3.min.js',
	        'd3pie.js',
	        'chartBaseOnD3.js',
	        'dataUpdater.js',
	        'jquery.form.js'
		],
	],
    'rankinglistSuccess' => [
        'metas'       =>  [
            'title'         =>  '方橙-最专业的招商选址大数据平台',
            'description'   =>  '方橙科技是一个专业的商业地产大数据平台，专注于商业地产B2B服务。我们致力于通过大数据和互联网方式，使购物中心招商、品牌拓展更高效合理地达成交易匹配。',
            'keywords'      =>  '方橙,方橙科技',
            'language'      =>  'language',
            'X-UA-Compatible'=>  'IE=edge',
            'viewport'      =>  'width=device-width,height=device-height,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no',
        ],
        'stylesheets' => [
            'vendors/jquery.mobile-1.4.5.min.css',
            'common.css',
            'detail.css',
            'vendors/scrollbar.css'
        ],
        'javascripts' => [
            'vendors/iscroll.js', 
            'ucenter/topList.js',
        ],
    ],
];