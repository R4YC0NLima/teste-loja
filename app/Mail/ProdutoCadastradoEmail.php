<?php

namespace App\Mail;

use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Produto;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProdutoCadastradoEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $produto;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Produto $produto)
    {
        $this->produto  = $produto;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Produto Cadastrado')
                    ->markdown('emails.produtoCadastrado');
    }
}
