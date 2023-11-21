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
                    'url' => '/branch',
                    'title' => 'Филиал'
                ], [
                    'url' => '/sub-branch',
                    'title' => 'Субфилиал'
                ],
                [
                    'url' => '/departments',
                    'title' => 'Отделения'
                ],
                [
                    'url' => '/region',
                    'title' => 'Область'
                ],
                [
                    'url' => '/district',
                    'title' => 'Район'
                ],
                [
                    'url' => '/substation',
                    'title' => 'Подстанция'
                ],
                [
                    'url' => '/brigade',
                    'title' => 'Бригада'
                ],
                [
                    'url' => '/hospital',
                    'title' => 'Больница'
                ],
                [
                    'url' => '/reference',
                    'title' => 'Справочник скорой помощи'
                ],
            ]
        ],
        [
            'icon' => 'fa fa-align-left',
            'title' => 'Еженедельные отчеты',
            'url' => 'javascript:;',
            'caret' => true,
            'sub_menu' => [
                [
                    'url' => '/data',
                    'title' => 'Отчеты'
                ]

            ]
        ],
        [
            'icon' => 'fa fa-align-left',
            'title' => 'Скорая помощь',
            'url' => 'javascript:;',
            'caret' => true,
            'sub_menu' => [
                [
                    'url' => '/indicator',
                    'title' => 'Отчеты'
                ]

            ]
        ],
        [
            'icon' => 'fa fa-cog',
            'title' => 'Настройки',
            'url' => 'javascript:;',
            'caret' => true,
            'sub_menu' => [
                [
                    'url' => '/users',
                    'title' => 'Пользователи',
                    'role' => 'admin'
                ],
                [
                    'url' => '/roles',
                    'title' => 'Роли'
                ],
                [
                    'url' => '/activities',
                    'title' => 'Активности'
                ],
            ]
        ]
    ]
];
