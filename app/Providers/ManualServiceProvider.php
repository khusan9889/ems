<?php

namespace App\Providers;

use App\Services\BranchService;
use App\Services\Contracts\BranchServiceInterface;
use App\Services\Contracts\PolytraumaServiceInterface;
use App\Services\Contracts\UserServiceInterface;
use App\Services\PolytraumaService;
use App\Services\UserService;
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
        $this->app->singleton(UserServiceInterface::class, UserService::class);
        $this->app->singleton(BranchServiceInterface::class, BranchService::class);
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
