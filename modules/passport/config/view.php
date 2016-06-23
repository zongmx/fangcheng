<?php
/*
 * viewSuccess: metas: title: 我是title description: 我是description keywords: 我是keywords language: 我是language stylesheets: [jobs.css, aa.css] javascripts: [resume.js] layout: layout
 */

/**
 * 返回全局的视图（CSS,JS等）配置
 */
return [
    'defaultSuccess' => [
        'stylesheets' => [
            'vendors/jquery.mobile-1.4.5.min.css',
            'common.css',
            'detail.css',
            'form.css'
        ],
        'javascripts' => [
            'vendors/jquery-1.9.1.min.js',
            'vendors/custom-scripting.js',
            'jquery.form.js'
        ],
        'has_layout' => true, // 是否使用layout文件
        'layout' => 'layout' // 指定layout文件
        ],
    'indexSuccess' => [
        'stylesheets' => [
        
        		],
		'javascripts'=> [
				 
				]
    ],
    'joinusSuccess' => [
        'stylesheets' => [
        
        		],
		'javascripts'=> [
				 
				]
    ],
    'viewSuccess' => [
        'stylesheets' => [
            'aa.css',
            'bb.css'
        ],
        'javascripts' => [
            'test.js'
        ],
        'has_layout' => true, // 是否使用layout文件
        'layout' => 'layout' // 指定layout文件
        ],
    'otherregSuccess' => [
            'stylesheets' => [
            	'vendors/jquery.mobile.simpledialog.css',
                'vendors/jquery.fileupload-ui.css'
            ],
    		'javascripts' => [
    			'vendors/jquery.mobile.simpledialog.js',
    		    'vendors/jquery.ui.widget.js',
    		    'vendors/jquery.fileupload.js',
    		    'util/common.js',
    		    'util/constant.js',
    		    'widget/cityDisposablePlug.js',
    		    'widget/categoryDisposablePlug.js',
    		    'widget/MWidget.js',
                'widget/listDisposablePlug.js',
    		    'widget/listPlug.js',
    		    'signup/fastsign.js',
    		    'signup/otherbasic.js',
    		    'signup/othermange.js',
    		    'com.js',
    		    'util/uploadImg.js'
    				],
    		],
    'brandRegSuccess' => [
            'stylesheets' => [
            	'vendors/jquery.mobile.simpledialog.css',
                'vendors/jquery.fileupload-ui.css',
            ],
    		'javascripts' => [
				'vendors/jquery.mobile.simpledialog.js',
    		    'vendors/jquery.ui.widget.js',
    		    'vendors/jquery.fileupload.js',
    		    'util/constant.js',
    		    'widget/cityDisposablePlug.js',
    		    'widget/categoryDisposablePlug.js',
    		    'widget/MWidget.js',
    		    'widget/listDisposablePlug.js',
    		    'widget/listPlug.js',
    		    'signup/fastsign.js',
    		    'signup/brandbasic.js',
    		    'signup/brandmange.js',
    		    'util/common.js',
    		    'com.js',
    		    'util/uploadImg.js'
    				],
    		],
    'businessregzbSuccess' => [
    		'stylesheets' => [
                'vendors/jquery.mobile.simpledialog.css',
    		    'vendors/jquery.fileupload-ui.css'
    				],
    		'javascripts' => [
    			'vendors/jquery.mobile.simpledialog.js',
    		    'vendors/jquery.ui.widget.js',
    		    'vendors/jquery.fileupload.js',
    		    'util/constant.js',
    		    'widget/cityDisposablePlug.js',
    		    'widget/categoryDisposablePlug.js',
    		    'widget/MWidget.js',
    		    'widget/listDisposablePlug.js',
    		    'widget/listPlug.js',
    		    'util/common.js',
    		    'signup/fastsign.js',
    		    'signup/mallbasic.js',
    		    'signup/mallmange.js',
    		    'com.js',
    		    'util/uploadImg.js'
    				],
    		],
    
    'businessregbrandSuccess' =>[
    	'stylesheets' => [
    		'vendors/jquery.mobile.simpledialog.css',
    	    'vendors/jquery.fileupload-ui.css'
    	],
        'javascripts' => [
    	    'vendors/jquery.mobile.simpledialog.js',
            'vendors/jquery.ui.widget.js',
            'vendors/jquery.fileupload.js',
            'util/common.js',
            'util/constant.js',
            'widget/cityDisposablePlug.js',
            'widget/categoryDisposablePlug.js',
            'widget/MWidget.js',
            'widget/listDisposablePlug.js',
            'widget/listPlug.js',
            'signup/fastsign.js',
            'signup/projectbaisc.js',
            'signup/projectmange.js',
            'com.js',
            'util/uploadImg.js'
    	],
    ],
    'loginjumpSuccess' =>[
    	'stylesheets' => [
    		'detail.css',
    	    'form.css'
    	],
        'javascripts' => [
            'widget/validate.form.js',
            'com.js',
            'signupv3/login.js',
            
    	],
    ],
    'dynamicSuccess' =>[
    	'stylesheets' => [
    	],
        'javascripts' => [
            'widget/customScrollPlug.js'
            
    	],
    ],
    'checkloginSuccess' =>[
    		'stylesheets' => [
    				'detail.css',
    				'form.css'
    	       ],
			'javascripts' => [
    				'util/constant.js',
    				'widget/MWidget.js',
    				'widget/validate.form.js',
					'tmpl.js',
    				'widget/cityPlug.js',
    				'com.js',
                    'signupv3/signup.js'
				],
		],
    'addcartSuccess' =>[
    	'stylesheets' => [
    	    'vendors/jquery.fileupload-ui.css',
    		'detail.css',
    	    'form.css'
    	],
        'javascripts' => [
            'vendors/jquery.ui.widget.js',
            'vendors/jquery.fileupload.js',
            'util/uploadImg.js',
            'com.js',
            'signupv3/upload.js'
    	],
    ],
    'addprogramoneSuccess' =>[
    	'stylesheets' => [
            'detail.css',
    	    'form.css'
    	],
        'javascripts' => [
            'util/constant.js',
			'widget/validate.form.js',
            'widget/categoryPlug.js',
			'widget/cityPlug.js',
            'widget/listPlug.js',
            'com.js',
			'widget/otherBrandPlug.js',
			'widget/customScrollPlug.js',
            'signupv3/brandmange.js',
			'tmpl.js',
    	],
    ],
    'addprogramtwoSuccess' =>[
    	'stylesheets' => [
            'detail.css',
    	    'form.css'
    	],
        'javascripts' => [
            'util/constant.js',
            'widget/MWidget.js',
			'widget/validate.form.js',
            'widget/cityPlug.js',
            'widget/listPlug.js',
            'com.js',
			'widget/otherMallPlug.js',
			'widget/customScrollPlug.js',
            'signupv3/projectmange.js',
			'tmpl.js'
    	],
    ],
    'addprogramthreeSuccess' =>[
    	'stylesheets' => [
            'detail.css',
    	    'form.css'
    	],
        'javascripts' => [
            'util/constant.js',
            'widget/MWidget.js',
			'widget/validate.form.js',  
            'widget/cityPlug.js',
            'widget/listPlug.js',
            'com.js',
			'widget/otherMallPlug.js',
			'widget/customScrollPlug.js',
            'signupv3/mallmange.js',
			'tmpl.js'
    	],
    ],
    'addprogramfourSuccess' =>[
    	'stylesheets' => [
            'detail.css',
    	    'form.css'
    	],
        'javascripts' => [
            'util/constant.js',
            'widget/MWidget.js',
			'widget/validate.form.js',                                                
            'widget/cityPlug.js',
            'widget/categoryPlug.js',
            'widget/listPlug.js',
            'com.js',
			'widget/otherBrandPlug.js',
			'widget/otherMallPlug.js',
			'widget/customScrollPlug.js',
			'signupv3/othermange.js',
			'tmpl.js'
    	],
    ],
]
;