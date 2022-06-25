<?php

namespace JoulesLabs\IllumineAdmin;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use JoulesLabs\IllumineAdmin\View\Components\ConfirmModal;
use JoulesLabs\IllumineAdmin\View\Components\UI\Buttons\BtnIco;

class IllumineAdminServiceProvider extends ServiceProvider
{
    public function register()
    {
        // $this->mergeConfigFrom(
        //     __DIR__.'/../config/config.php', 'illumineadmin'
        // );

        // $config = $this->app['config']->get('auth');

        // dd($config);
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            // Publish assets
            $this->publishes([
                __DIR__ . '/../resources/assets' => public_path('illumine-admin'),
            ], 'illumine-assets');

            // Publish views
            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views'),
            ], 'illumine-views');

            // Publish config
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('illumineadmin.php'),
            ], 'illumine-config');


            // Publish seeder
            $this->publishes([
                realpath(__DIR__ . '/../database/seeders/') => database_path('seeders'),
            ], 'illumine-seeders');

            // Publish factories
            $this->publishes([
                realpath(__DIR__ . '/../database/factories/') => database_path('factories'),
            ], 'illumine-factories');

            // Publish routes
            $this->publishes([
                realpath(__DIR__ . '/../routes/admin.php.stub') => base_path('routes/admin.php'),
                realpath(__DIR__ . '/../routes/breadcrumbs.php.stub') => base_path('routes/breadcrumbs.php'),
            ], 'illumine-routes');

            // Publish migrations
            if (!class_exists('CreateIllumineAdminsTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_illumine_admins_table.php.stub' => database_path('migrations/' . '2014_10_12_000000' . '_create_illumine_admins_table.php'),
                    // you can add any number of migrations here
                ], 'migrations');
            }
        }

        $this->registerRoutes();

        // $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // $this->loadViewsFrom(__DIR__ . '/../resources/views', 'k');


        Blade::component('btn-ico', BtnIco::class);
        Blade::component('confirm-modal', ConfirmModal::class);
    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $route = base_path('routes/admin.php');
            if (file_exists($route)) {
                $this->loadRoutesFrom($route);
            }



        });
    }

    protected function routeConfiguration()
    {
        return [
            'prefix' => config('illumineadmin.route_prefix'),
            'middleware' => config('illumineadmin.route_middleware'),
            'as' => config('illumineadmin.route_as'),
        ];
    }
}
