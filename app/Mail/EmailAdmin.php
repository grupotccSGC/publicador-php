<?php

namespace App\Mail;

use App\Models\ContatoAdmin;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Http\Requests\ContatoAdminRequest;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailAdmin extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $contato;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContatoAdmin $contato)
    {
        $this->contato = $contato;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(ContatoAdminRequest $request)
    {
        return $this->from('rafa92ivplucas@gmail.com', 'Rafael Pereira desenvolvedor web')
                    ->subject($request->assunto)
                    ->markdown('mail.templateEmail');
    }
}
