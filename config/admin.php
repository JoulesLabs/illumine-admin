<?php

return [
    'app_name' => env('ADMIN_APP_NAME', 'FundedNext Admin'),
    'sso_enabled' => env('ADMIN_SSO_ENABLED', false),
    "toaster_alert" => [
        'key' => "fundednext_admin_alert",
        'levels' => [
            'success',
            'error',
            'info',
            'warning',
        ]
    ],
    'version' => env('ADMIN_VERSION', '0.0.1'),
];
