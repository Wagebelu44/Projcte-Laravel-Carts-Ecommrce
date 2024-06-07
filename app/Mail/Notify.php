<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Notify extends Mailable
{
    use Queueable, SerializesModels;

    public $cliants;

    public $product;

    public function __construct($cliants, $product)
    {
        $this->cliants = $cliants;
        $this->product = $product;
    }

    /**
     * Execute the job.
     *
     * @return void
     */

    /**
     * Build the message.
     */
    public function build(): static
    {
        $product = $this->product;

        return $this->to($this->cliants->email)
            ->bcc('majalstore@gmail.com')
            ->subject('majal store')
            ->markdown('emails.Notify');
    }
}
