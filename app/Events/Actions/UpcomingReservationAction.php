<?php

namespace App\Events\Actions;

use App\Events\Domain\Services\UpcomingREservationService;
use App\Events\Responders\UpcomingREservationResponder;

class UpcomingReservationAction
{
    public function __construct(UpcomingREservationResponder $responder, UpcomingREservationService $services) 
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