<?php

namespace App\Hospital\Responders;

use App\App\Responders\Responder;
use App\App\Responders\ResponderInterface;
use App\Hospital\Domain\Resources\HospitalResource;

class HospitalsResponder extends Responder implements ResponderInterface 
{
    public function respond() 
    {
        return (new HospitalResource($this->response->getData()));
    }
}
