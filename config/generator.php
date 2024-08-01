<?php

return [
    /**
     * If any input file(image) as default will used options below.
     */
    'image' => [
        /**
         * Path for store the image.
         *
         * avaiable options:
         * 1. public
         * 2. storage
         */
        'path' => 'storage',

        /**
         * Will used if image is nullable and default value is null.
         */
        'default' => 'https://via.placeholder.com/350?text=No+Image+Avaiable',

        /**
         * Crop the uploaded image using intervention image.
         */
        'crop' => true,

        /**
         * When set to true the uploaded image aspect ratio will still original.
         */
        'aspect_ratio' => true,

        /**
         * Crop image size.
         */
        'width' => 500,
        'height' => 500,
    ],

    'format' => [
        /**
         * Will used to first year on select, if any column type year.
         */
        'first_year' => 1900,

        /**
         * If any date column type will cast and display used this format, but for input date still will used Y-m-d format.
         *
         * another most common format:
         * - M d Y
         * - d F Y
         * - Y m d
         */
        'date' => 'd/m/Y',

        /**
         * If any input type month will cast and display used this format.
         */
        'month' => 'm/Y',

        /**
         * If any input type time will cast and display used this format.
         */
        'time' => 'H:i',

        /**
         * If any datetime column type or datetime-local on input, will cast and display used this format.
         */
        'datetime' => 'd/m/Y H:i',

        /**
         * Limit string on index view for any column type text or longtext.
         */
        'limit_text' => 100,
    ],

    /**
     * It will used for generator to manage and showing menus on sidebar views.
     *
     * Example:
     * [
     *   'header' => 'Main',
     *
     *   // All permissions in menus[] and submenus[]
     *   'permissions' => ['test view'],
     *
     *   menus' => [
     *       [
     *          'title' => 'Main Data',
     *          'icon' => '<i class="bi bi-collection-fill"></i>',
     *          'route' => null,
     *
     *          // permission always null when isset submenus
     *          'permission' => null,
     *
     *          // All permissions on submenus[] and will empty[] when submenus equals to []
     *          'permissions' => ['test view'],
     *
     *          'submenus' => [
     *                 [
     *                     'title' => 'Tests',
     *                     'route' => '/tests',
     *                     'permission' => 'test view'
     *                  ]
     *               ],
     *           ],
     *       ],
     *  ],
     *
     * This code below always changes when you use a generator and maybe you must lint or format the code.
     */
    'sidebars' => [
    [
        'header' => 'Main',
        'permissions' => [
            'test view',
            'category view',
            'period view',
            'program type view',
            'program view',
            'coupon view',
            'student view'
        ],
        'menus' => [
            [
                'title' => 'Main Data',
                'icon' => '<i class="bi bi-collection-fill"></i>',
                'route' => null,
                'permission' => null,
                'permissions' => [
                    'test view',
                    'category view',
                    'period view',
                    'program type view',
                    'program view',
                    'coupon view',
                    'student view'
                ],
                'submenus' => [
                    [
                        'title' => 'Tests',
                        'route' => '/tests',
                        'permission' => 'test view'
                    ],
                    [
                        'title' => 'Categories',
                        'route' => '/categories',
                        'permission' => 'category view'
                    ],
                    [
                        'title' => 'Periods',
                        'route' => '/periods',
                        'permission' => 'period view'
                    ],
                    [
                        'title' => 'Program Types',
                        'route' => '/program-types',
                        'permission' => 'program type view'
                    ],
                    [
                        'title' => 'Programs',
                        'route' => '/programs',
                        'permission' => 'program view'
                    ],
                    [
                        'title' => 'Coupons',
                        'route' => '/coupons',
                        'permission' => 'coupon view'
                    ],
                    [
                        'title' => 'Students',
                        'route' => '/students',
                        'permission' => 'student view'
                    ]
                ]
            ]
        ]
    ],
    [
        'header' => 'Users',
        'permissions' => [
            'user view',
            'role & permission view'
        ],
        'menus' => [
            [
                'title' => 'Users',
                'icon' => '<i class="bi bi-people-fill"></i>',
                'route' => '/users',
                'permission' => 'user view',
                'permissions' => [],
                'submenus' => []
            ],
            [
                'title' => 'Roles & permissions',
                'icon' => '<i class="bi bi-person-check-fill"></i>',
                'route' => '/roles',
                'permission' => 'role & permission view',
                'permissions' => [],
                'submenus' => []
            ]
        ]
    ],
    [
        'header' => 'Announcements',
        'permissions' => [
            'announcement view',
            'bank view',
            'value category view',
            'detail value category view',
            'faq view',
            'grade view'
        ],
        'menus' => [
            [
                'title' => 'Announcements',
                'icon' => '<i class="bi bi-people"></i>',
                'route' => '/announcements',
                'permission' => 'announcement view',
                'permissions' => [],
                'submenus' => []
            ],
            [
                'title' => 'Banks',
                'icon' => '<i class="bi bi-people"></i>',
                'route' => '/banks',
                'permission' => 'bank view',
                'permissions' => [],
                'submenus' => []
            ],
            [
                'title' => 'Value Categories',
                'icon' => '<i class="bi bi-people"></i>',
                'route' => '/value-categories',
                'permission' => 'value category view',
                'permissions' => [],
                'submenus' => []
            ],
            [
                'title' => 'Detail Value Categories',
                'icon' => '<i class="bi bi-people"></i>',
                'route' => '/detail-value-categories',
                'permission' => 'detail value category view',
                'permissions' => [],
                'submenus' => []
            ],
            [
                'title' => 'Faqs',
                'icon' => '<i class="bi bi-people"></i>',
                'route' => '/faqs',
                'permission' => 'faq view',
                'permissions' => [],
                'submenus' => []
            ],
            [
                'title' => 'Grades',
                'icon' => '<i class="bi bi-people"></i>',
                'route' => '/grades',
                'permission' => 'grade view',
                'permissions' => [],
                'submenus' => []
            ]
        ]
    ],
    [
        'header' => 'Question Titles',
        'permissions' => [
            'question title view',
            'exam view'
        ],
        'menus' => [
            [
                'title' => 'Question Titles',
                'icon' => '<i class="bi bi-people"></i>',
                'route' => '/question-titles',
                'permission' => 'question title view',
                'permissions' => [],
                'submenus' => []
            ],
            [
                'title' => 'Exams',
                'icon' => '<i class="bi bi-people"></i>',
                'route' => '/exams',
                'permission' => 'exam view',
                'permissions' => [],
                'submenus' => []
            ]
        ]
    ],
    [
        'header' => 'Transaction Details',
        'permissions' => [
            'transaction detail view',
            'transaction view'
        ],
        'menus' => [
            [
                'title' => 'Transaction Details',
                'icon' => '<i class="bi bi-people"></i>',
                'route' => '/transaction-details',
                'permission' => 'transaction detail view',
                'permissions' => [],
                'submenus' => []
            ],
            [
                'title' => 'Transactions',
                'icon' => '<i class="bi bi-people"></i>',
                'route' => '/transactions',
                'permission' => 'transaction view',
                'permissions' => [],
                'submenus' => []
            ]
        ]
    ]
]
];