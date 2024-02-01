<?php

return [
    'permissions' => [
        'administer-user' => [
            'user-view',
            'user-update',
            'user-create',
            'user-delete',
        ],

        'view-admin-dashboard' => [
            'user-view',
        ],
    ],

    'roles' => [

        'admin' => [
            'all' => [
                'administer-user.user-view',
                'administer-user.user-update',
                'administer-user.user-create',
                'administer-user.user-delete',
                'view-admin-dashboard.user-view'

            ]
        ],

        'content manager' => [
            'only' => [
                'view-admin-dashboard.user-view'
            ]
        ],
    ]
];
