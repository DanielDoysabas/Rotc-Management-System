<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AccountUpdate extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public $user)
    {
    }
   
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), 'ROTC Students Performance Record Management and Monitoring System')
                    ->subject('ROTC Students Performance Record Management and Monitoring System - Account Status Update')
                    ->markdown('emails.account_update', [
                        'user' => $this->user,
                        'url' => route('auth.login'),

        ]); // with params
    }
}