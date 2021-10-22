<?php

namespace App\Listeners;

use App\Events\ProdutoAtualizado;
use App\Events\ProdutoCadastrado;
use App\Mail\ProdutoAtualizadoEmail;
use App\Models\Produto;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendProdutoAtualizadoNotification
{
    public $produto;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }

    /**
     * Handle the event.
     *
     * @param  ProdutoAtualizado $event
     * @return void
     */
    public function handle(ProdutoAtualizado $event)
    {
        $data = $event->produto;
        Mail::to(config('mail.from.address'))->send(new ProdutoAtualizadoEmail($data));
//        Mail::to('rayconbentes16@gmail.com')->send(new ProdutoAtualizadoEmail($data));
    }
}
