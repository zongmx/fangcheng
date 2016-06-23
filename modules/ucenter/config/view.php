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
        ],
        'javascripts' => [
            'vendors/jquery-1.9.1.min.js',
            'vendors/custom-scripting.js',
            'vendors/jquery.mobile-1.4.5.min.js',
        	'util/common.js',
        	'com.js'
        ],
        'has_layout' => true, // 是否使用layout文件
        'layout' => 'ucenterlayout' // 指定layout文件
    ],

    'indexbrandSuccess' => [
        'javascripts' => [
            'util/constant.js',
            'widget/MWidget.js',
            'ucenter/basicUserInfo.js',
        ],
    ],
    'businessbrandSuccess' => [
        'javascripts' => [
            'util/constant.js',
            'widget/MWidget.js',
            'ucenter/basicUserInfo.js',
        ],
    ],
    'editbasicinfoSuccess' => [
        'stylesheets' => [
        		'vendors/jquery.fileupload-ui.css',
        		'form.css',
        		],
            'javascripts' => [
                'vendors/jquery.ui.widget.js',
                'vendors/jquery.fileupload.js',
                'util/constant.js',
                'widget/MWidget.js',
                'widget/categoryPlug.js',
                'widget/cityPlug.js',
                'signup/fastsign.js',
                'signup/projectmange.js',
                'jquery.form.js',
                'widget/validate.form.js',
                'ucenter/basicUserInfo.js',
                'util/uploadImg.js',
				'tmpl.js' ,
            ]
    ],
    'editjobandcompanySuccess' => [
        'stylesheets' => [
            'vendors/jquery.fileupload-ui.css',
            'form.css',
        ],
        'javascripts' => [
            'vendors/jquery.ui.widget.js',
            'util/uploadImg.js',
            'util/constant.js',
            'vendors/jquery.validate.min.js',
            'ucenter/basicInfo.js',
        ]
    ],
    'informationofmineSuccess' => [
        'stylesheets' => [
            'form.css',
        ],
        'javascripts' => [
            'ucenter/ucenter.js',
            'vendors/jquery.validate.min.js',
            'jquery.form.js',
            'widget/MWidget.js',
            'widget/otherBrandPlug.js',
            'widget/categoryPlug.js',
            'widget/cityPlug.js',
            'widget/customScrollPlug.js',
            'widget/listDisposablePlug.js',
            'widget/listPlug.js',

        ]
    ],
    'accountmineSuccess' => [
        'stylesheets' => [
            'form.css',
        ],
        'javascripts' => [
            'ucenter/ucenter.js',
            'vendors/jquery.validate.min.js',
        ]
    ],
    'demandshowSuccess' => [
        'javascripts' => [
            'tmpl.js'
        ],
    	'metas'       =>  [
    		'title'         =>  '需求详情-方橙科技',
    		'description'   =>  '方橙科技是一个专业的商业地产大数据平台，专注于商业地产B2B服务。我们致力于通过大数据和互联网方式，使购物中心招商、品牌拓展更高效合理地达成交易匹配。',
    		'keywords'      =>  '招商需求,拓展需求,方橙,方橙科技',
    		
    	],
    ],
    'myattentionSuccess' => [
    	
    	'javascripts' => [
    		'widget/customScrollPlug.js',
    		]
    	],
    'demandlistofmineSuccess' => [
    	'stylesheets' => [
    			'form.css',
    			],
    	'javascripts' => [
    		'widget/customScrollPlug.js',
    		]
    	],
    'thirdSuccess' => [
        'javascripts' => [
            'ucenter/basicUserInfo.js',
        ],
    ],    
    'similarSuccess' => [
    	'javascripts' => [
    		'widget/customScrollPlug.js',
    		]
    	],
    'thirdSuccess' => [
        'javascripts' => [
            'ucenter/basicUserInfo.js',
        ],
    ],    
    'thridjobSuccess' => [
        'stylesheets' => [
        	'vendors/jquery.mobile.simpledialog.css',
            'vendors/jquery.fileupload-ui.css',
            'form.css',
            
        ],
        'javascripts' => [
            'ucenter/basicUserInfo.js',
            'vendors/jquery.mobile.simpledialog.js',
            'vendors/jquery.ui.widget.js',
            'vendors/jquery.fileupload.js',
            'widget/listPlug.js',
            'util/constant.js',
            'widget/MWidget.js',
            'widget/cityPlug.js',
            'widget/categoryPlug.js',
            'widget/listDisposablePlug.js',
            'signup/brandbasic.js',
            'signup/fastsign.js',
			'widget/customScrollPlug.js',
			'widget/otherMallPlug.js',
			'widget/otherBrandPlug.js',
            'widget/validate.form.js',
			'tmpl.js'
        ],
    ],
    'businessjobSuccess' => [
    	'stylesheets' => [
    	    'form.css'
    	],
        'javascripts' => [
            'widget/listPlug.js',
            'util/constant.js',
            'widget/MWidget.js',
            'widget/cityPlug.js',
            'widget/categoryPlug.js',
			'widget/customScrollPlug.js',
			'widget/otherMallPlug.js',
            'widget/validate.form.js',
			'tmpl.js'
        ]
    ],
    'myAddEditMallSuccess' => [
    	'stylesheets' => [
    	    'form.css'
    	],
        'javascripts' => [
            'widget/listPlug.js',
            'util/constant.js',
            'widget/MWidget.js',
            'widget/cityPlug.js',
            'widget/categoryPlug.js',
			'widget/customScrollPlug.js',
			'widget/otherMallPlug.js',
            'widget/validate.form.js',
			'tmpl.js'
        ]
    ],
    'brandjobSuccess' => [
    	'stylesheets' => [
    		'vendors/jquery.fileupload-ui.css',
    	    'form.css'
    	],
        'javascripts' => [
        	'vendors/jquery.ui.widget.js',
            'vendors/jquery.fileupload.js',
            'widget/listPlug.js',
            'util/constant.js',
            'widget/MWidget.js',
            'widget/cityPlug.js',
            'widget/categoryPlug.js',
            'widget/listDisposablePlug.js',
            'signup/brandbasic.js',
            'signup/fastsign.js',
            'widget/validate.form.js',
			'widget/customScrollPlug.js',
			'widget/otherBrandPlug.js',
			'tmpl.js'
        ]
    ],
    'myAddEditBrandSuccess' => [
    	'stylesheets' => [
    		'vendors/jquery.fileupload-ui.css',
    	    'form.css'
    	],
        'javascripts' => [
        	'vendors/jquery.ui.widget.js',
            'vendors/jquery.fileupload.js',
            'widget/listPlug.js',
            'util/constant.js',
            'widget/MWidget.js',
            'widget/cityPlug.js',
            'widget/categoryPlug.js',
            'widget/listDisposablePlug.js',
            'signup/brandbasic.js',
            'signup/fastsign.js',
            'widget/validate.form.js',
			'widget/customScrollPlug.js',
			'widget/otherBrandPlug.js',
			'tmpl.js'
        ]
    ]
];