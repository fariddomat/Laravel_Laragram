<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'super_admin' => [
            'settings' => 'c,r,u,d',
            'users' => 'c,r,u,d',
            'posts' => 'c,r,u,d',
            'profile' => 'r,u',
            'roles' => 'c,r,u,d',
        ],
        'admin' => [
            'settings' => 'c,r,u,d',
            'users' => 'c,r,u,d',
            'posts' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'teacher' => [
            'posts' => 'c,r,u,d',
            'profile' => 'r,u',
        ],
        'user' => [
            'posts' => 'c,r,u,d',
            'profile' => 'r,u',
        ], 
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
