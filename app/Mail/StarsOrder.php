<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StarsOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $purchases;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($purchases)
    {
        $this->purchases = $purchases;
    }

    /**
     * Build the message.
     */
    public function build(): static
    {
        return $this->to(\Auth::guard('cliants')->user()->email)
            ->subject('majal store')
            ->markdown('emails.StarsOrder');
    }
}
