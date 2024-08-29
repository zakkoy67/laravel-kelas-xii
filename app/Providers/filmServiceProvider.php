<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\filmRepositoryInterface;
use App\Repositories\filmRepository;

class filmServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(filmRepositoryInterface::class,filmRepository::class);
    }
    

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
