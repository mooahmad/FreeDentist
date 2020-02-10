<?php

namespace App\Events\Responders;

use App\App\Responders\Responder;
use App\App\Responders\ResponderInterface;
use App\Events\Domain\Resources\EventResourceCollection;

class PreviousReservationResponder extends Responder implements ResponderInterface 
{
    public function respond() 
    {
        return (new EventResourceCollection( $this->response->getData()));
    }
}
