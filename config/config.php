<?php

return [
    'route_prefix' => 'admin',
    'route_middleware' => 'web',
    'route_as' => 'admin::',
    'app_name' => env('ADMIN_APP_NAME', 'IllumineAdmin'),
    'app_short_name' => 'IA',
    // 'sso_enabled' => env('ADMIN_SSO_ENABLED', false),
    "toaster_alert" => [
        'key' => "illumine_admin_alert",
        'levels' => [
            'success',
            'error',
            'info',
            'warning',
        ]
    ],
    'version' => env('ADMIN_VERSION', '0.0.1'),
    

    'users' => [
        'table' => 'illumine_admin_users',
        'model' => \JoulesLabs\IllumineAdmin\Models\IllumineAdmin::class,
    ],

    'auth' => [
        'guard' => 'web',
        'provider' => 'users'
    ],

    // Add  'copyright_text' if the purpose is not fully served by 'app_name',
    // 'copyright_text' => 'IllumineAdmin',
    'brand_image' => 'jouleslabs-logo1.png',
];
