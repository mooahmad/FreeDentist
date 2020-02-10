<?php

namespace App\Dentist\Actions;

use App\Dentist\Domain\Requests\UpdateCalendarRequest;
use App\Dentist\Domain\Services\DentistCalendarUpdateService;
use App\Dentist\Responders\DentistCalendarUpdateResponder;

class DentistCalendarUpdateAction 
{
    public function __construct(DentistCalendarUpdateResponder $responder, DentistCalendarUpdateService $services) 
    {
        $this->responder = $responder;
        $this->services = $services;
    }
    public function __invoke(UpdateCalendarRequest $request)
    {
        return $this->responder->withResponse(
            $this->services->handle($request->validated())
        )->respond();
    }
}