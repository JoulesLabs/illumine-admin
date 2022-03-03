<?php
declare(strict_types=1);

use App\Utilities\ToasterAlert;


if (!function_exists('auth_admin')) {
    function auth_admin(?string $guard = null): mixed
    {
        if (is_null($guard)) {
            $guard =  config('illumineadmin.auth.guard');
        }
        
        if (!auth($guard)->check()) {
            return optional();
        }

        return auth($guard)->user();
    }
}

if (!function_exists('toaster')) {
    /**
     * @return ToasterAlert
     */
    function toaster(): ToasterAlert
    {
        if (is_null(ToasterAlert::$instance)) {
            ToasterAlert::$instance = new ToasterAlert();
        }

        //dd(\App\Utilities\ToasterAlert::$instance);

        return ToasterAlert::$instance;
    }
}

if (!function_exists('item_sl')) {
    function item_sl(int $index, int $page = 1, int $perPage = 20): int
    {
        $page -= 1;
        return ($page * $perPage) + $index + 1;
    }
}



if (!function_exists('auth_user')) {
    function auth_user(): mixed
    {
        if (!auth()->check()) {
            return optional();
        }

        return auth()->user();
    }
}




