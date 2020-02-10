<?php

namespace App\Dentist\Actions;

use App\Dentist\Domain\Requests\AddCalendarRequest;
use App\Dentist\Domain\Services\AddCalendarService;
use App\Dentist\Responders\AddCalendarResponder;
use Carbon\Carbon;

class AddCalendarAction
{
    public function __construct(AddCalendarResponder $responder, AddCalendarService $services)
    {
        $this->responder = $responder;
        $this->services = $services;
    }

    public function __invoke(AddCalendarRequest $request)
    {
        return $this->responder->withResponse(
            $this->services->handle($request->validated())
        )->respond();
    }
}