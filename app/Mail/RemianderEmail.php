<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RemianderEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $ad;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ad)
    {
        //
        $this->ad=$ad;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.remainder');
    }
}
