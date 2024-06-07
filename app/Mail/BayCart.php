<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BayCart extends Mailable
{
    use Queueable, SerializesModels;

    public $carts;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($carts)
    {
        $this->carts = $carts;

    }

    /**
     * Build the message.
     */
    public function build(): static
    {
        return $this->to(\Auth::guard('cliants')->user()->email)
            ->subject('majal store')
            ->markdown('emails.payment_cart');
    }
}
