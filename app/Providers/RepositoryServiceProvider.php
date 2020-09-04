<?php

namespace App\Providers;

use App\Repositories\LookRepository;
use App\Repositories\LookRepositoryInterface;
use App\Repositories\RankingRepositoryInterface;
use App\Repositories\RankingRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(LookRepositoryInterface::class, LookRepository::class);
        $this->app->bind(RankingRepositoryInterface::class, RankingRepository::class);
    }
}
