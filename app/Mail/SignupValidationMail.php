<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SignupValidationMail extends Mailable
{
    use SerializesModels;

    public $validationUrl;

    public function __construct($token) {
        $this->validationUrl = route('validate.token', ['token' => $token]); // Construct the full URL here
    }
    

    public function build(){
        return $this->view('emails.signup_validation')
                    ->subject('Account Validation')
                    ->with(['validationUrl' => $this->validationUrl]);
    }

}
