<?php

return [

	/*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */

	'menu' => [
		[
			'icon' => 'fa fa-th-large',
			'title' => 'ОКС',
			'url' => '/',

		],
		[
			'icon' => 'fa fa-th-large',
			'title' => 'Политравма',
			'url' => '/polytrauma',
		],
        // [
        //     'icon' => 'fa fa-th-large',
        //     'title' => 'Справочник',
        //     'url' => '/reference',
        // ],
		[
			'icon' => 'fa fa-align-left',
			'title' => 'Справочник',
			'url' => 'javascript:;',
			'caret' => true,
			'sub_menu' => [[
				'url' => 'users',
				'title' => 'Пользователи',
				// 'sub_menu' => [[
				// 	'url' => 'javascript:;',
				// 	'title' => 'Список пользователей',
				// 	'sub_menu' => [[
				// 		'url' => 'javascript:;',
				// 		'title' => 'Пользователи',
				// 	], [
				// 		'url' => 'javascript:;',
				// 		'title' => 'Menu 3.2'
				// 	]]
				// ], [
				// 	'url' => 'javascript:;',
				// 	'title' => 'Добавить'
				// ], [
				// 	'url' => 'javascript:;',
				// 	'title' => 'Изменить'
				// ]]
			], [
				'url' => '/branch',
				'title' => 'Отделение'
			],]
		]
	]
];
