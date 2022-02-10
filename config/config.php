<?php

return [
    'route_prefix' => 'admin',
    'route_middleware' => 'web',
    'route_as' => 'admin::',
    // other options...

    'users' => [
        'table' => 'illumine_admin_users',
    ],

    'auth' => [
        'guard' => 'web',
        'provider' => 'users'
    ],
];
