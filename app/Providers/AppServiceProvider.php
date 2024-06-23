<?php

namespace App\Providers;

use App\Models\Topic;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Gate::define('manage-topic', function ($user, Topic $topic) {
            return $user->id === $topic->user_id;
        });

        JsonResource::withoutWrapping();
    }
}
