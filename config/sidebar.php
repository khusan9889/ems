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
                    'title' => 'Жадвал<br>Таблица',
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
            'url' => 'javascript:;',
            'caret' => true,
            'sub_menu' => [
                [
                    'url' => '/polytrauma/list',
                    'title' => 'Жадвал<br>Таблица',
                ],
                [
                    'url' => '/polytrauma/statistics',
                    'title' => 'Статистика',
                ],

            ]
        ],
        [
            'icon' => 'fa fa-align-left',
            'title' => 'Ҳафталик ҳисоботлар<br>Еженедельный отчет',
            'url' => 'javascript:;',
            'caret' => true,
            'sub_menu' => [
                [
                    'url' => '/data',
                    'title' => 'Ҳисоботлар<br>Отчеты'
                ]

            ]
        ],
        [
            'icon' => 'fa fa-align-left',
            'title' => 'Тез ёрдам<br>Скорая помощь',
            'url' => 'javascript:;',
            'caret' => true,
            'sub_menu' => [
                [
                    'url' => '/indicator',
                    'title' => 'Ҳисоботлар<br>Отчеты'
                ],
                [
                    'url' => '/indicator-file',
                    'title' => 'Юкланган файллар<br>Загруженные файлы'
                ]

            ]
        ],
        [
            'icon' => 'fa fa-align-left',
            'title' => 'Маълумотнома<br>Справочник',
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
                    'title' => 'Бўлимлар<br>Отделения'
                ],
                [
                    'url' => '/region',
                    'title' => 'Вилоят<br>Область'
                ],
                [
                    'url' => '/district',
                    'title' => 'Туман<br>Район'
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
                    'title' => 'Скорой помощи<br>Тез ёрдам'
                ],
            ]
        ],
        [
            'icon' => 'fa fa-cog',
            'title' => 'Созламалар<br>Настройки',
            'url' => 'javascript:;',
            'caret' => true,
            'sub_menu' => [
                [
                    'url' => '/users',
                    'title' => 'Фойдаланувчила<br>Пользователи',
                    'role' => 'admin'
                ],
                [
                    'url' => '/roles',
                    'title' => 'Ҳуқуқлар<br>Роли'
                ],
                [
                    'url' => '/activities',
                    'title' => 'Фаолиятлар<br>Активности'
                ],
            ]
        ]
    ]
];
