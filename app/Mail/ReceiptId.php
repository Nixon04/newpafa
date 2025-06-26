<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReceiptId extends Mailable
{
    use Queueable, SerializesModels;

     public $username;
     public $usertokenline;
    public function __construct($username, $usertokenline)
        {
            $this->username = $username;
            $this->usertokenline = $usertokenline;
        }

    public function build(){
      $this->subject("Welcome, {$this->username}")->markdown('emails.user');  
    }


    public function attachments(): array
    {
        return [];
    }
}
