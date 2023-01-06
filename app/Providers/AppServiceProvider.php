<?php

namespace App\Providers;

use App\Repository\answerRepository;
use App\Repository\questionRepository;
use App\Repository\UserRepository;
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
        $this->app->bind(answerRepository::class);
        $this->app->bind(questionRepository::class);
        $this->app->bind(UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
