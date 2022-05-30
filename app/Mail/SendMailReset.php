<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailReset extends Mailable
{
    use Queueable, SerializesModels;
    public $emailDetail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emailDetail)
    {
        $this->emailDetail = $emailDetail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('reset-password', ['data' => $this->emailDetail]);
    }
}
