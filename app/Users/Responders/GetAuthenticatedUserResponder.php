<?php

namespace App\Users\Responders;

use App\App\Responders\Responder;
use App\App\Responders\ResponderInterface;
use App\Users\Domain\Resources\AccountResource;
use App\Users\Domain\Resources\UserResource;

class GetAuthenticatedUserResponder extends Responder implements ResponderInterface
{
    public function respond()
    {
        $this->response->getData()->load('country');
        return (new AccountResource($this->response->getData()))
            ->additional([
                'token' => auth()->getToken()->get(),
            ]);
    }
}
