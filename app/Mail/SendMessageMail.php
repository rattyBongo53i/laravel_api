<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMessageMail extends Mailable
{
    use Queueable, SerializesModels;

      public $messageBody; // Variable to store message
      public $subject; // Variable to store subject

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($messageBody, $subject)
    {
        //
           $this->messageBody = $messageBody;
          $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
            return $this->subject($this->subject)
                    ->view('emails.send-message');
    }
}