<?php

/*
 * 这是Frame框架的一部分 @author Jason <jasonfeng1@gmail.com>
*/

/**
 * 返回路由的配置信息
 */
return [
	'homepage'     =>  [
		'url'     =>  '/',
	    'param'   =>  [
	    	'module'  =>  'recommend',
	    	'action'  =>  'index',
	    ] 
// 	    	    'param'   =>  [
// 	    	'module'  =>  'passport',
// 	    	'action'  =>  'checklogin',
// 	    ] 
	],

//////////////////////////////////////////////////////
//
//  REST 路由配置
//
/////////////////////////////////////////////////////
    'rest_id'       =>  [
		'url'     =>  '/:module/:id',
		'param'   =>  [
			'action'  =>  'get',
		],
        'object'  =>  '\Frame\Routing\Rest',
        'requirements'  =>  [
        	'id'   =>  '\\d+'
        ],
	],
    
    'rest'          =>  [
		'url'     =>  '/:module',
		'param'   =>  [
			'action'  =>  'pageList',
		],
        'object'  =>  '\Frame\Routing\Rest',
        'requirements'  =>  [],
	],
    
    'rest_id_action'  =>  [
		'url'     =>  '/:module/:id/:action',
		'param'   =>  [
			'action'  =>  'edit',
		],
        'requirements'  =>  [
        	'id'       =>  '\\d+',
            'action'   =>  ['edit', 'add', 'delete', 'get'], 
        ],
	],
    
//////////////////////////////////////////////////////
//
//  默认 路由配置
//
/////////////////////////////////////////////////////
    'default_module'  =>  [
		'url'     =>  '/!:action/*',
		'param'   =>  [
			'module'  =>  'demo',
		],
		'requirements'  =>  [],
	],
    
    'default_q'  =>  [
		'url'     =>  '/:module/:action/:q/*',
		'param'   =>  [
			'action'  =>  'index',
		],
		'requirements'  =>  [],
	],
    
    'default'  =>  [
		'url'     =>  '/:module/:action/*',
		'param'   =>  [
			'action'  =>  'index',
		],
	],
    'default_index'  =>  [
		'url'     =>  '/:module/*',
		'param'   =>  [
			'action'  =>  'index',
		],
	],
    
];