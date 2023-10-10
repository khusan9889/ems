<?php

namespace App\Providers;


use App\Services\FilialSubWeek\Contracts\FilialSubWeekServiceInterface;
use App\Services\FilialSubWeek\FilialSubWeekService;
use App\Services\SubFilial\Contracts\SubFilialServiceInterface;
use App\Services\SubFilial\SubFilialService;
use App\Services\Week\Contracts\WeekServiceInterface;
use App\Services\Week\WeekService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Services\ACSService;
use App\Services\Contracts\ACSServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ACSServiceInterface::class, ACSService::class);
        $this->app->bind(WeekServiceInterface::class, WeekService::class);
        $this->app->bind(SubFilialServiceInterface::class, SubFilialService::class);
        $this->app->bind(FilialSubWeekServiceInterface::class, FilialSubWeekService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFour();
    }
}
