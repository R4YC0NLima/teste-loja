<?php

namespace App\Listeners;

use App\Events\ProdutoCadastrado;
use App\Mail\ProdutoCadastradoEmail;
use App\Models\Produto;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendProdutoCadastradoNotification
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
     * @param  ProdutoCadastrado $event
     * @return void
     */
    public function handle(ProdutoCadastrado $event)
    {
        $data = $event->produto;
        Mail::to(config('mail.from.address'))->send(new ProdutoCadastradoEmail($data));
    }
}
