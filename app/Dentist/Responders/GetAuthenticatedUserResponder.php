<?php

namespace App\Dentist\Responders;

use App\App\Responders\Responder;
use App\App\Responders\ResponderInterface;
use App\Dentist\Domain\Resources\AccountResource;
use App\Users\Domain\Resources\UserResource;

class GetAuthenticatedUserResponder extends Responder implements ResponderInterface
{
    public function respond()
    {
        return (new AccountResource($this->response->getData()))
            ->additional([
                'token' => auth()->getToken()->get(),
            ]);
    }
}
