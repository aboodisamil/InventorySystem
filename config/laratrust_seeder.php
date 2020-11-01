<?php

return [
    'role_structure' => [
        'super_admin' => [
            'categories' => 'c,r,u,d',
            'users' => 'c,r,u,d',
            'roles' => 'c,r,u,d',
            'supplier'=>'c,r,u,d',
            'imports'=>'c,r,u,d',
            'orders'=>'c,r,u,d',
            'customers'=>'c,r,u,d',
        ],
        'admin'=>[
            'categories' => 'c,r,u,d',

        ]

    ],

    'permission_structure' => [],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete' ,
    ]
];
