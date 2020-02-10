<?php

namespace App\Events\Responders;

use App\App\Responders\Responder;
use App\App\Responders\ResponderInterface;

class EventDetailsResponder extends Responder implements ResponderInterface 
{
    public function respond() 
    {
        return $this->response->getData();
    }
}
