<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MonthlyMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $cliant;

    public function __construct($cliant)
    {

        $this->cliant = $cliant;
    }

    /**
     * Build the message.
     */
    public function build(): static
    {
        return $this->to($this->cliant->email, $this->cliant->id)
            ->bcc('majalstore@gmail.com')
            ->subject('majal store')
            ->markdown('emails.monthlyemail');
    }
}
