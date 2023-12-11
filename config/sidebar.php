<?php

return [

    'menu' => [
        [
            'icon' => 'fa fa-th-large',
            'title' => 'ОКС/<br>OKS',
//			'url' => '/acs',
            'url' => 'javascript:;',
            'caret' => true,
            'sub_menu' => [
                [
                    'url' => '/acs/list',
                    'title' => 'Таблица/Jadval',
                ],
                [
                    'url' => '/acs/statistics',
                    'title' => 'Статистика/Statistika',
                ],

            ]
        ],
        [
            'icon' => 'fa fa-th-large',
            'title' => 'Политравма/<br>Politravma',
            //			'url' => '/polytrauma',
            'url' => 'javascript:;',
            'caret' => true,
            'sub_menu' => [
                [
                    'url' => '/polytrauma/list',
                    'title' => 'Таблица/Jadval',
                ],
                [
                    'url' => '/polytrauma/statistics',
                    'title' => 'Статистика/Statistika',
                ],

            ]
        ],
        [
            'icon' => 'fa fa-align-left',
            'title' => 'Еженедельный отчет/<br>Haftalik hisobotlar',
            'url' => 'javascript:;',
            'caret' => true,
            'sub_menu' => [
                [
                    'url' => '/data',
                    'title' => 'Отчеты/Hisobotlar'
                ]

            ]
        ],
        [
            'icon' => 'fa fa-align-left',
            'title' => 'Скорая помощь/<br>Tez yordam',
            'url' => 'javascript:;',
            'caret' => true,
            'sub_menu' => [
                [
                    'url' => '/indicator',
                    'title' => 'Отчеты/Hisobotlar'
                ]

            ]
        ],
        [
            'icon' => 'fa fa-align-left',
            'title' => 'Справочник/<br>Ma\'lumotnoma',
            'url' => 'javascript:;',
            'caret' => true,
            'sub_menu' => [
                [
                    'url' => '/branch',
                    'title' => 'Филиал/Filial'
                ], [
                    'url' => '/sub-branch',
                    'title' => 'Субфилиал/Subfilial'
                ],
                [
                    'url' => '/departments',
                    'title' => 'Отделения/Bo\'limlar'
                ],
                [
                    'url' => '/region',
                    'title' => 'Область/Viloyat'
                ],
                [
                    'url' => '/district',
                    'title' => 'Район/Tuman'
                ],
                [
                    'url' => '/substation',
                    'title' => 'Подстанция/Podstansiya'
                ],
                [
                    'url' => '/brigade',
                    'title' => 'Бригада/Brigada'
                ],
                [
                    'url' => '/hospital',
                    'title' => 'Больница/Shifoxona'
                ],
                [
                    'url' => '/reference',
                    'title' => 'Скорой помощи/<br>Tez yordam'
                ],
            ]
        ],
        [
            'icon' => 'fa fa-cog',
            'title' => 'Настройки/<br>Sozlamalar',
            'url' => 'javascript:;',
            'caret' => true,
            'sub_menu' => [
                [
                    'url' => '/users',
                    'title' => 'Пользователи/<br>Foydalanuvchilar',
                    'role' => 'admin'
                ],
                [
                    'url' => '/roles',
                    'title' => 'Роли/<br>Rollar'
                ],
                [
                    'url' => '/activities',
                    'title' => 'Активности/<br>Faoliyatlar'
                ],
            ]
        ]
    ]
];
