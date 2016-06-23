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
    'listSuccess' => [
        'http_metas' => [
            'content-type' => 'text/html'
        ],
        'stylesheets' => [
            'detail.css',
            'form.css',
            'vendors/scrollbar.css"'
                ],
        'javascripts' => [
            'util/constant.js',
            'widget/MWidget.js',
            'widget/cityDisposablePlug.js',
            'widget/listPlug.js',
            'search.js',
            'vendors/iscroll.js',
            'categoryRelation.js',
            'ucenter/category4search.js',
            'widget/customScrollPlug.js'
                ],
        'has_layout' => true, // 是否使用layout文件
        'layout' => 'layout' // 指定layout文件
        ],
];