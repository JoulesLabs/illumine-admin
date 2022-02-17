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
            ], 'assets');

            // Publish views
            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views'),
            ], 'views');

            // Publish config
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('illumineadmin.php'),
              ], 'config');
            $this->publishes([
                __DIR__.'/../config/admin.php' => config_path('admin.php'),
              ], 'config');

            // Publish seeder
            $this->publishes([
                realpath(__DIR__.'/../database/seeders/') => database_path('seeders'),
            ], 'seeders');

            // Publish factories
            $this->publishes([
                realpath(__DIR__.'/../database/factories/') => database_path('factories'),
            ], 'factories');
        }

        $this->registerRoutes();

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'illumine-admin');

        Blade::component('btn-ico', BtnIco::class);
        Blade::component('confirm-modal', ConfirmModal::class);
    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/admin.php');
            $this->loadRoutesFrom(__DIR__ . '/../routes/breadcrumbs.php');
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
