<?php

namespace App\Dentist\Responders;

use App\App\Responders\Responder;
use App\App\Responders\ResponderInterface;
use App\Dentist\Domain\Resources\DentistResource;

class RegisterUserResponder extends Responder implements ResponderInterface
{
    public function respond()
    {
        if($this->response->getStatus() != 200) {
            return response()->json($this->response->getData(), $this->response->getStatus());
        }
        return (new DentistResource($this->response->getData()))
         ->additional(['token' => $this->response->getData()->generateAuthToken()]);
    }
}
