<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookingNotification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    private $message = '';
    private $link = false;
    private $toWhom = '';
    private $buttonText = '';
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($toWhom, $message, $link=false, $buttonText='')
    {
        $this->message = $message;
        $this->link = $link;
        $this->toWhom = $toWhom;
        $this->buttonText = $buttonText;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.booking-notification')->with([
            'text' => $this->message,
            'link' => $this->link,
            'toWhom' => $this->toWhom,
            'buttonText' => $this->buttonText,
        ]);
    }
}
