<?php

namespace App\Events\Actions;

use App\Events\Domain\Services\AcceptReservationService;
use App\Events\Responders\AcceptReservationResponder;

class AcceptReservationAction
{
    public function __construct(AcceptReservationResponder $responder, AcceptReservationService $services)
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