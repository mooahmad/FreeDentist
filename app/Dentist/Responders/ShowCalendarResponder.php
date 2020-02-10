<?php

namespace App\Dentist\Responders;

use App\App\Responders\Responder;
use App\App\Responders\ResponderInterface;
use App\Dentist\Domain\Resources\ShowCalendarResource;

class ShowCalendarResponder extends Responder implements ResponderInterface
{
    public function respond()
    {
        return new ShowCalendarResource($this->response->getData());
    }
}
