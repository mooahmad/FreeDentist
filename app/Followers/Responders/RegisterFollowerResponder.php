<?php

namespace App\Followers\Responders;

use App\App\Responders\Responder;
use App\App\Responders\ResponderInterface;

class RegisterFollowerResponder extends Responder implements ResponderInterface
{
    public function respond()
    {
        if ($this->response->getStatus() !=200){
            return response()->json($this->response->getData(),$this->response->getStatus());
        }
        return response()->json($this->response->getData(),$this->response->getStatus());

    }
}
