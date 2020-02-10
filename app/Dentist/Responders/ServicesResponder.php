<?php

namespace App\Dentist\Responders;

use App\App\Responders\Responder;
use App\App\Responders\ResponderInterface;
use App\Dentist\Domain\Resources\ServiceCollectionResource;

class ServicesResponder extends Responder implements ResponderInterface 
{
    public function respond() 
    {
        return (new ServiceCollectionResource($this->response->getData()));
    }
}
