<?php

namespace App\Dentist\Responders;

use App\App\Responders\Responder;
use App\App\Responders\ResponderInterface;

class ValidateUserPasswordResetTokenResponder extends Responder implements ResponderInterface
{
    public function respond()
    {
        return response()->json($this->response->getData(),$this->response->getStatus());

    }
}
