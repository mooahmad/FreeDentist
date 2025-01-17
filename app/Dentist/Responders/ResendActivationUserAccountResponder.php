<?php

namespace App\Dentist\Responders;

use App\App\Responders\Responder;
use App\App\Responders\ResponderInterface;
use App\Users\Domain\Resources\UserResource;

class ResendActivationUserAccountResponder extends Responder implements ResponderInterface
{
    public function respond()
    {
        if($this->response->getStatus() != 200) {
            return response()->json($this->response->getData(), $this->response->getStatus());
        }
        return (new UserResource($this->response->getData()))->additional([
            'message'=>'Email Activation send'
        ]);
    }
}
