<?php

namespace [__OWNER__]\[__PACKAGE__];

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class [__PACKAGE__]ServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', '[__PACKAGE_NAME__]');

        // Register the main class to use with the facade
        $this->app->singleton('base-class', function () {
            return new BaseClass;
        });
    }


    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        $this->loadViewsFrom(__DIR__ . '/../resources/views', '[__PACKAGE_NAME__]');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // Blade::componentNamespace('[__OWNER__]\\[__PACKAGE__]\\View\\Components', 'base-class');

        $this->bootRoutes();
        $this->bootPublishable();
    }

    /**
     * Boot the package routes.
     *
     * @return void
     */
    protected function bootRoutes()
    {
        Route::group([
            'namespace' => '[__OWNER__]\[__PACKAGE__]\Http\Controllers',
            'as' => 'cashier.',
        ], function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        });
    }

    protected function bootPublishable()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => $this->app->configPath('[__PACKAGE_NAME__].php'),
            ], '[__PACKAGE_NAME__]-config');

            $this->publishes([
                __DIR__.'/../database/migrations' => $this->app->databasePath('migrations'),
            ], '[__PACKAGE_NAME__]-migrations');

            $this->publishes([
                __DIR__.'/../resources/views' => $this->app->resourcePath('views/vendor/[__PACKAGE_NAME__]'),
            ], '[__PACKAGE_NAME__]-views');
        }
    }
}
