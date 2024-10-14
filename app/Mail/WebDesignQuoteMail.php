<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WebDesignQuoteMail extends Mailable
{
    use Queueable, SerializesModels;

    public $id;
    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id, $email)
    {
        $this->id = $id;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.quotes.web-design')->subject('Cotización de sitio web en indexo.mx');
    }
}
