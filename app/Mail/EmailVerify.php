<?php

namespace App\Mail;

use App\Models\Cliant;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailVerify extends Mailable
{
    use Queueable, SerializesModels;

    public $cliant;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Cliant $cliant)
    {
        $this->cliant = $cliant;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        // dd($this->cliant);

        return $this->to($this->cliant->email, $this->cliant->id)
            ->subject('majal store')
            ->markdown('emails.verifyemail');

    }
}
