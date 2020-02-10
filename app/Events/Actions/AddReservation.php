<?php

namespace App\Events\Actions;

use App\Events\Domain\Requests\AddReservationRequest;
use App\Events\Domain\Services\AddReservationService;
use App\Events\Domain\Services\Service;
use App\Events\Responders\AddReservationResponder;
use App\Events\Responders\Responder;

class AddReservation
{
    public function __construct(AddReservationResponder $responder, AddReservationService $services)
    {
        $this->responder = $responder;
        $this->services = $services;
    }
    public function __invoke(AddReservationRequest $request)
    {
        return $this->responder->withResponse(
            $this->services->handle($request->validated())
        )->respond();
    }
}