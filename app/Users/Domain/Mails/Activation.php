<?php

namespace App\Users\Domain\Mails;

use App\Users\Domain\Models\Dentist;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Activation extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $token;
    public function __construct(Dentist $user)
    {
        $this->user = $user;

    }

    public function build()
    {
        return $this->markdown('mails.activate');
    }
}
