<?php

namespace App\Events\Actions;

use App\Events\Domain\Services\UpcomingDentistReservationService;
use App\Events\Responders\UpcomingDentistReservationResponder;

class UpcomingDentistReservationAction 
{
    public function __construct(UpcomingDentistReservationResponder $responder, UpcomingDentistReservationService $services) 
    {
        $this->responder = $responder;
        $this->services = $services;
    }
    public function __invoke() 
    {
        return $this->responder->withResponse(
            $this->services->handle()
        )->respond();
    }
}