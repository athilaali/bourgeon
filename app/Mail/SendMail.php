<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     
    public $friend_email;
    public $refer_link;

    public function __construct($friend_email, $refer_link)
    {
        //
        $this->friend_email = $friend_email;
        $this->refer_link = $refer_link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject('Refer')
                    ->view('emails.referemail');

    }
}
