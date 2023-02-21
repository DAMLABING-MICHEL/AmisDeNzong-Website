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
    
    'Tags' => [
        'icon' => 'tags',
        'role'   => 'admin',
        'children' => [
            [
                'name'  => 'All tags',
                'role'  => 'admin',
                'route' => 'tags.index',
            ],
            [
                'name'  => 'add',
                'role'  => 'admin',
                'route' => 'tags.create',
            ],
        ]
    ],
    
    'Users' => [
        'icon' => 'user',
        'role'   => 'admin',
        'children' => [
            [
                'name'  => 'All users',
                'role'  => 'admin',
                'route' => 'users.index',
            ],
            [
                'name'  => 'New users',
                'role'  => 'admin',
                'route' => 'users.indexnew',
            ],
            [
                'name'  => 'fake',
                'role'  => 'admin',
                'route' => 'users.edit',
            ],
        ],
    ],
    
    'Comments' => [
        'icon' => 'comment',
        'role'   => 'redac',
        'children' => [
            [
                'name'  => 'All comments',
                'role'  => 'redac',
                'route' => 'comments.index',
            ],
            [
                'name'  => 'New comments',
                'role'  => 'redac',
                'route' => 'comments.indexnew',
            ],
        ],
    ],
    
    'Contacts' => [
        'icon' => 'envelope',
        'role'   => 'admin',
        'children' => [
            [
                'name'  => 'All contacts',
                'role'  => 'admin',
                'route' => 'contacts.index',
            ],
            [
                'name'  => 'New contacts',
                'role'  => 'admin',
                'route' => 'contacts.indexnew',
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
                'name'  => 'New staff',
                'role'  => 'admin',
                'route' => 'staff.indexnew',
            ],
            [
                'name'  => 'add',
                'role'  => 'admin',
                'route' => 'staff.create',
            ],
        ]
    ],
    
    'Social links' => [
        'icon' => 'link',
        'role'   => 'admin',
        'children' => [
            [
                'name'  => 'All social links',
                'role'  => 'admin',
                'route' => 'follows.index',
            ],
            [
                'name'  => 'add',
                'role'  => 'admin',
                'route' => 'follows.create',
            ],
        ]
    ],
    
    // 'Grades' => [
    //     'icon' => 'graduation-cap',
    //     'role'   => 'admin',
    //     'children' => [
    //         [
    //             'name'  => 'All grades',
    //             'role'  => 'admin',
    //             'route' => 'grades.index',
    //         ],
    //         [
    //             'name'  => 'add',
    //             'role'  => 'admin',
    //             'route' => 'grades.create',
    //         ],
    //     ]
    // ],
    
    'Occupations' => [
        'icon' => 'star',
        'role'   => 'admin',
        'children' => [
            [
                'name'  => 'All Occupations',
                'role'  => 'admin',
                'route' => 'features.index',
            ],
            [
                'name'  => 'add',
                'role'  => 'admin',
                'route' => 'features.create',
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
    
    'Rubrics' => [
        'icon' => 'envelope',
        'role'   => 'admin',
        'children' => [
            [
                'name'  => 'All Rubrics',
                'role'  => 'admin',
                'route' => 'rubrics.index',
            ],
            [
                'name'  => 'add',
                'role'  => 'admin',
                'route' => 'rubrics.create',
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
    ],


    'Testimonials' => [
        'icon' => 'quote-left',
        'role'   => 'admin',
        'children' => [
            [
                'name'  => 'All testimonials',
                'role'  => 'admin',
                'route' => 'testimonials.index',
            ],
        ]
    ],
    
    
    'Subscribers' => [
        'icon' => 'envelope-open-text',
        'role'   => 'admin',
        'children' => [
            [
                'name'  => 'Subscriber list',
                'role'  => 'admin',
                'route' => 'subscribers.index',
            ],
            [
                'name'  => 'New Subscribers',
                'role'  => 'admin',
                'route' => 'subscribers.indexnew',
            ],
        ]
    ],
];
