<?php

namespace App\Dentist\Responders;

use App\App\Responders\Responder;
use App\App\Responders\ResponderInterface;
use App\Dentist\Domain\Resources\ReservationResource;

class SearchReservationReponder extends Responder implements ResponderInterface
{
    public function respond()
    {
        return (new ReservationResource($this->response->getData()));
    }
}
