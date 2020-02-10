<?php

namespace App\Events\Actions;

use App\Events\Domain\Services\DentistPreviousReservationService;
use App\Events\Responders\DentistPreviousReservationResponder;

class DentistPreviousReservationAction 
{
    public function __construct(DentistPreviousReservationResponder $responder, DentistPreviousReservationService $services) 
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