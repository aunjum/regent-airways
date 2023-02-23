<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class evilEventCatch extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $user = '';
    protected $uri_link = '';
    protected $client_ip = '';
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $uri_link, $client_ip)
    {
        $this->user = $user;
        $this->uri_link = $uri_link;
        $this->client_ip = $client_ip;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $timestamp = Carbon::now('Asia/Dhaka');
        $user = $this->user;
        $uri_link = $this->uri_link;
        $client_ip = $this->client_ip;

        return $this->view('emails.evil', compact('timestamp', 'user', 'uri_link', 'client_ip'));
    }
}
