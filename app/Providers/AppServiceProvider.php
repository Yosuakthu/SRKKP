<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\RekomRequests;
use App\Observers\RekomRequestObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        RekomRequests::observe(RekomRequestObserver::class);
    }
}
