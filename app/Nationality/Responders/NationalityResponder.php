<?php

namespace App\Nationality\Responders;

use App\App\Responders\Responder;
use App\App\Responders\ResponderInterface;
use App\Nationality\Domain\Resources\NationalityResource;

class NationalityResponder extends Responder implements ResponderInterface 
{
    public function respond() 
    {
        if($this->response->getStatus() != 200) {
            return response()->json($this->response->getData(), $this->response->getStatus());
        }
        return (new NationalityResource($this->response->getData()));
    }
}
