<?php

return [

    'menu' => [
        [
            'icon' => 'fa fa-th-large',
            'title' => 'ОКС',
//			'url' => '/acs',
            'url' => 'javascript:;',
            'caret' => true,
            'sub_menu' => [
                [
                    'url' => '/acs/list',
                    'title' => 'Таблица',
                ],
                [
                    'url' => '/acs/statistics',
                    'title' => 'Статистика',
                ],

            ]
        ],
        [
            'icon' => 'fa fa-th-large',
            'title' => 'Политравма',
            //			'url' => '/polytrauma',
            'url' => 'javascript:;',
            'caret' => true,
            'sub_menu' => [
                [
                    'url' => '/polytrauma/list',
                    'title' => 'Таблица',
                ],
                [
                    'url' => '/polytrauma/statistics',
                    'title' => 'Статистика',
                ],

            ]
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
