<?php
declare(strict_types=1);

use App\Utilities\ToasterAlert;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\Optional;
use Illuminate\Support\Str;

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

if (!function_exists('api')) {
    /**
     * @param array|string|null $data
     * @return \App\Utilities\ApiJsonResponse
     */
    function api($data = []): \App\Utilities\ApiJsonResponse
    {
        return new \App\Utilities\ApiJsonResponse($data);
    }
}

if (!function_exists('get_media_prefix_directory_name')) {
    function get_media_prefix_directory_name(): string
    {
        return Carbon::today()->format('m_Y') . '_media';
    }
}

if (!function_exists('carbon')) {
    function carbon(?string $date): Carbon
    {
        if (!$date) {
            return Carbon::now(config('app.timezone', 'UTC'));
        }

        return (new Carbon($date, config('app.timezone', 'UTC')));
    }
}

if (!function_exists('remove_empty_fields')) {
    function remove_empty_fields(array $fields): array
    {
        return array_filter($fields, function ($val) {
            return $val != null;
        });
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

if (!function_exists('currency_usd_to_cent')) {
    function currency_usd_to_cent(int|float $amountInUsd): int
    {
        return (int)($amountInUsd * 100);
    }
}

if (!function_exists('currency_cent_to_usd')) {
    function currency_cent_to_usd(int $amountInCent): int|float
    {
        return $amountInCent / 100;
    }
}

// e.g. ALLCAPS to "Allcaps"
// if (!function_exists('all_caps_to_ucfirst')) {
//     function all_caps_to_ucfirst($sentence)
//     {
//         return Str::ucfirst(Str::lower($sentence));
//     }
// }

// e.g. UPPER_CASE_SNAKE_CASE to "Upper case snake case"
if (!function_exists('upper_case_snake_case_to_sentence')) {
    function upper_case_snake_case_to_sentence(mixed $sentence): string
    {
        return Str::ucfirst(Str::lower(Str::replace('_', ' ', $sentence)));
    }
}

if (!function_exists('request_get_msg_type')) {
    function request_get_msg_type(): ?int
    {
        if (!request()->hasHeader(\App\Enums\WebhookHeader::X_MESSAGE_TYPE())) return null;

        return (int) request()->header(\App\Enums\WebhookHeader::X_MESSAGE_TYPE());
    }
}

if (!function_exists('request_get_txn_number')) {
    function request_get_txn_number(): ?int
    {
        if (!request()->hasHeader(\App\Enums\WebhookHeader::X_TRANSACTION_NUMBER())) return null;

        return (int) request()->header(\App\Enums\WebhookHeader::X_TRANSACTION_NUMBER());
    }
}

if (!function_exists('make_txn_no')) {
    function make_txn_no(?int $id): string
    {
        $idLen = 0;
        $salt = '';
        if ($id) {
            $id = (string) $id;
            $idLen = strlen($id) + 1;
            $salt = $id . ':';
        }


        $randStr = Str::random(13);
        return $salt . substr($randStr, $idLen);
    }
}

if (!function_exists('json_parse')) {
    function json_parse(string $data, bool $exception = true): mixed
    {
        $data = json_decode($data, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            if ($exception) {
                throw new \Exception('Invalid JSON, Failed to parse!');
            }

            $data = null;
        }

        return $data;
    }
}


