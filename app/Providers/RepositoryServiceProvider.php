<?php

namespace App\Providers;

use App\Contracts\AuthRepositoryInterface;
use App\Contracts\TopicRepositoryInterface;
use App\Repositories\AuthRepository;
use App\Repositories\TopicRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TopicRepositoryInterface::class,TopicRepository::class);
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}