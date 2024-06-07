<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class contact extends Mailable
{
    use Queueable, SerializesModels;

    public $ticit;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ticit)
    {

        $this->ticit = $ticit;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): static
    {
        // dd($this->ticit->email);
        return $this->to($this->ticit[0])
            ->bcc('another@another.com')
            ->subject('majal store')
            ->markdown('emails.contact');
    }
}
