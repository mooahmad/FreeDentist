<?php


namespace App\Dentist\Domain\Events;


use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ResendActivation
{
    use Dispatchable,SerializesModels;
    public $user;


    public function __construct($user)
    {
        $this->user=$user;
    }

}
