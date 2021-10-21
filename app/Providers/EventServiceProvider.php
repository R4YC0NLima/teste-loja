<?php

namespace App\Providers;

use App\Events\ProdutoAtualizado;
use App\Events\ProdutoCadastrado;
use App\Listeners\SendProdutoAtualizadoNotification;
use App\Listeners\SendProdutoCadastradoNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ProdutoCadastrado::class => [
            SendProdutoCadastradoNotification::class,
        ],
        ProdutoAtualizado::class => [
            SendProdutoAtualizadoNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
