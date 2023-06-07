<?php

namespace App\Providers;

use App\Services\Contracts\ExampleServiceInterface;
use App\Services\Contracts\PolytraumaServiceInterface;
use App\Services\ExampleService;
use App\Services\PolytraumaService;
use Illuminate\Support\ServiceProvider;

class ManualServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(PolytraumaServiceInterface::class, PolytraumaService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
