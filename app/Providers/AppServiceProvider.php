<?php

namespace App\Providers;

use App\Http\Resources\BetResource;
use App\Models\MatchGame;
use App\Models\RoyalStudent;
use Illuminate\Support\ServiceProvider;
use App\Observers\MatchObserver;
use App\Observers\StudentObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        BetResource::withoutWrapping();
        MatchGame::observe(MatchObserver::class);
        RoyalStudent::observe(StudentObserver::class);
    }
}