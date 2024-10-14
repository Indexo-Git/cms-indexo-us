<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Solutions extends Mailable
{
    use Queueable, SerializesModels;

    public $answers;
    public $selectedValues;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($answers, $selectedValues)
    {
        $this->answers = $answers;
        $this->selectedValues = $selectedValues;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.landing.index')->subject('Tu solución digital personalizada en indexo');
    }
}
