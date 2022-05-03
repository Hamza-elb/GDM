<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{

    public function register(){

        $this->app->bind('App\Interfaces\IPfe','App\Interfaces\PfeImp');
    }


    public function boot()
    {
        //
    }
}
