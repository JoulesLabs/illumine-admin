<?php

return [
    'route_prefix' => 'admin',
    'route_middleware' => 'web',
    'route_as' => 'admin::',
    // other options...


    'auth' => [
        'guard' => 'web',
        'provider' => 'users'
    ],
];
