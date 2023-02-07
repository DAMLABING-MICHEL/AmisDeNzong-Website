<?php

return [

    'Dashboard' => [
        'role'   => 'redac',
        'route'  => 'admin',
        'icon'   => 'tachometer-alt',
    ],
    'Posts' => [
        'icon' => 'file-alt',
        'role'   => 'redac',
        'children' => [
            [
                'name'  => 'All posts',
                'role'  => 'redac',
                'route' => 'posts.index',
            ],
            [
                'name'  => 'New posts',
                'role'  => 'admin',
                'route' => 'posts.indexnew',
            ],
            [
                'name'  => 'Add',
                'role'  => 'redac',
                'route' => 'posts.create',
            ],
            [
                'name'  => 'fake',
                'role'  => 'redac',
                'route' => 'posts.edit',
            ],
        ],
    ],
    
    'Categories' => [
        'icon' => 'list',
        'role'   => 'admin',
        'children' => [
            [
                'name'  => 'All categories',
                'role'  => 'admin',
                'route' => 'categories.index',
            ],
            [
                'name'  => 'Add',
                'role'  => 'admin',
                'route' => 'categories.create',
            ],
            [
                'name'  => 'fake',
                'role'  => 'admin',
                'route' => 'categories.edit',
            ],
        ],
    ],
    
    'Staff' => [
        'icon' => 'users',
        'role'   => 'admin',
        'children' => [
            [
                'name'  => 'Staff list',
                'role'  => 'admin',
                'route' => 'staff.index',
            ],
            [
                'name'  => 'add',
                'role'  => 'admin',
                'route' => 'staff.create',
            ],
        ]
        ],
    
    'Gallery' => [
        'icon' => 'images',
        'role'   => 'admin',
        'children' => [
            [
                'name'  => 'All Images',
                'role'  => 'admin',
                'route' => 'images.index',
            ],
            [
                'name'  => 'add',
                'role'  => 'admin',
                'route' => 'images.create',
            ],
        ]
        ],
    
    'News' => [
        'icon' => 'newspaper',
        'role'   => 'admin',
        'children' => [
            [
                'name'  => 'All News',
                'role'  => 'admin',
                'route' => 'news.index',
            ],
            [
                'name'  => 'add',
                'role'  => 'admin',
                'route' => 'news.create',
            ],
        ]
        ],
        
        'Events' => [
            'icon' => 'calendar',
            'role'   => 'admin',
            'children' => [
                [
                    'name'  => 'All Events',
                    'role'  => 'admin',
                    'route' => 'events.index',
                ],
                [
                    'name'  => 'add',
                    'role'  => 'admin',
                    'route' => 'events.create',
                ],
            ]
        ]
];