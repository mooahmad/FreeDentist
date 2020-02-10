<?php

namespace App\Dentist\Responders;

use App\App\Responders\Responder;
use App\App\Responders\ResponderInterface;
use App\Dentist\Domain\Resources\AddCalendarResource;

class AddCalendarResponder extends Responder implements ResponderInterface 
{
    public function respond() 
    {
        return $this->response->getData();
    }
}
