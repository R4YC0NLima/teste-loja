<?php

namespace App\Providers;

use App\Repositories\Contracts\LojaRepositoryInterface;
use App\Repositories\Core\Eloquent\EloquentLojaRepository;
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
        $this->app->bind(
            LojaRepositoryInterface::class,
            EloquentLojaRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
