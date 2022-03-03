# illumine-admin
This is Illumine Admin, a package that can help you bootstrap your administration panel in minutes.

## Requirements
```
Laravel >=5.5
PHP >= 7.4
```

## Importing the Package Locally

Create `packages/jouleslabs/illumine-admin` directory in the root of your laravel application and clone this repo: 
```
git clone git@github.com:JoulesLabs/illumine-admin.git packages/jouleslabs/illumine-admin
```

Add the following "repositories" key below the "scripts" section in `composer.json` file of your Laravel app
```
{
  "scripts": { ... },

  "repositories": [
    {
      "type": "path",
      "url": "./packages/jouleslabs/illumine-admin"
    }
  ]
}
```

You can now require the package in the Laravel application using:
```
composer require jouleslabs/illumine-admin
```
Then run this commands to publish necessay files：
```
php artisan vendor:publish --provider="JoulesLabs\IllumineAdmin\IllumineAdminServiceProvider"
```

This package deepends on nahid/permit package. So run the following command to publish necessary files:
```
php artisan vendor:publish --provider="Nahid\Permit\PermitServiceProvider"
```

Create a Role model for your laravel application:
```
php artisan make:model Role
```

In config/auth.php add admin authentication guard as:
```
'admin' => [
           'driver' => 'session',
           'provider' => 'illumineadmin',
        ],
```

In config/auth.php add illumineadmin Providers as:
```
'illumineadmin' => [
            'driver' => 'eloquent',
            'model' => JoulesLabs\IllumineAdmin\Models\IllumineAdmin::class,
        ],
```

In config/illumineadmin.php update authentication guard as:
```
'auth' => [
        'guard' => 'admin',
        'provider' => 'users'
    ],
```
In RouteServiceProvider update `public const HOME = 'admin::home';`

In Authenticate middleware update:
```
protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            // return route('login');
            return route('admin::auth.login.page');
        }
    }
```

In config/permit.php update 'users' according to config/illumineadmin 'users' key:
```
'users' => [
        'model' => \JoulesLabs\IllumineAdmin\Models\IllumineAdmin::class,
        'table' => 'illumine_admin_users',
    ],
```
In config/permit.php update 'abilities' as:
```
'abilities'   => [
        /*"module"  => ['create', 'update', 'delete'],*/
        'user' => ['create', 'update', 'view', 'list', 'reset_password'],
        'role' => ['create', 'update', 'list'],
    ],
```

(Manual task) This package deepends on diglactic/laravel-breadcrumbs package so publish it's config file:
```
php artisan vendor:publish --tag=breadcrumbs-config
```

Update config/breadcrumbs.php as:
```
'view' => 'admin.partials.breadcrumbs',
```

Now run this command for migrations 
```
php artisan migrate
```
Then run the seeder 
```
php artisan db:seed --class=IllumineAdminDatabaseSeeder
```

IllumineAdmin is ready now. Go to `$basepath/admin/login`

An admin user is created for you with the following credentials:
> admin@jouleslabs.com /
> secret
