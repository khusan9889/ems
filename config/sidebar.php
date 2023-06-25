<?php

return [

	'menu' => [
		[
			'icon' => 'fa fa-th-large',
			'title' => 'ОКС',
			'url' => '/acs',

		],
		[
			'icon' => 'fa fa-th-large',
			'title' => 'Политравма',
			'url' => '/polytrauma',
		],
		[
			'icon' => 'fa fa-align-left',
			'title' => 'Справочник',
			'url' => 'javascript:;',
			'caret' => true,
			'sub_menu' => [
				[
					'url' => 'users',
					'title' => 'Пользователи',
				],
				[
					'url' => '/branch',
					'title' => 'Субъекты'
				],
                [
                    'url' => '/departments',
                    'title' => 'Отделения'
                ],
			]
		]
	]
];
