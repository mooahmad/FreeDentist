<?php

namespace App\Dentist\Domain\Mails;

use App\Dentist\Domain\Models\PasswordReset;
use App\Dentist\Domain\Models\Dentist;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $token;

    public function __construct(Dentist $user, PasswordReset $passwordReset)
    {
        $this->user = $user;
        $this->token = $passwordReset->token;
    }

    public function build()
    {
        return $this->markdown('mails.resetPassword');
    }
}
