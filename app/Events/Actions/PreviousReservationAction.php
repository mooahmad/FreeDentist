<?php

namespace App\Events\Actions;

use App\Events\Domain\Services\PreviousReservationService;
use App\Events\Responders\PreviousReservationResponder;

class PreviousReservationAction 
{
    public function __construct(PreviousReservationResponder $responder, PreviousReservationService $services) 
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