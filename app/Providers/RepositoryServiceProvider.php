<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use app\Interfaces\{
    FilmRepositoryInterface,
};

use app\Interfaces\{
    FilmReposioty,
};

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(FilmRepositoryInterface::class,
        FilmReposiotry::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
