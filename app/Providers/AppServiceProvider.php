<?php

namespace App\Providers;

use App\Usecases\Posts\CreatePostService;
use App\Usecases\Posts\ICreatePost;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if($this->app->environment() === 'production'){ $this->app['request']->server->set('HTTPS', true);}
    }
}
