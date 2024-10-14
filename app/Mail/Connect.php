<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Connect extends Mailable
{
    use Queueable, SerializesModels;

    public $sender;
    public $email;
    public $phone;
    public $website;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->sender = $data['name'];
        $this->email = $data['email'];
        $this->phone = $data['phone'];
        $this->website = $data['website'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.connect')->subject('New "Let\'s connect" Inquiry: '.$this->sender);
    }
}
