<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public $subj,
        public $body,
        )
    {
    }
   
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))
                    ->subject($this->subj)
                    ->markdown('emails.send_otp', [
                        'body' => $this->body,
                        'url' => route('auth.login'),
        ]); 
        // with params
        
        // return $this->view('emails.send_otp',[
        //     'body' => $this->body,
        // ]);
    }
}