<?php

namespace App\Mail;

use App\Models\SupportCart;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Ticit extends Mailable
{
    use Queueable, SerializesModels;

    public $ticit;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(SupportCart $ticit)
    {

        $this->ticit = $ticit;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // dd($this->ticit->email);
        return $this->to($this->ticit->cliant_email)
            ->bcc('another@another.com')
            ->subject('majal store')
            ->markdown('emails.ticit');
    }
}
