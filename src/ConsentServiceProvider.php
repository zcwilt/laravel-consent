<?php


namespace LaravelConsent;


use Illuminate\Support\ServiceProvider;
use LaravelConsent\Middleware\LaravelConsent;

class ConsentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadConfigs();
        $this->publishFiles();
        $this->registerMiddleWare();
    }

    protected function loadConfigs()
    {
        $this->mergeConfigFrom(__DIR__.'/config/laravel-consent.php', 'restive');
    }

    protected function publishFiles()
    {
        $config_files = [__DIR__.'/config' => config_path()];
        $this->publishes($config_files, 'laravel-consent');
    }

    protected function registerMiddleWare()
    {
        $router = $this->app['router'];
        $router->aliasMiddleware('laravel-consent', LaravelConsent::class);
    }
}