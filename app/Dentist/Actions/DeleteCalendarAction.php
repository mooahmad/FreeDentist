<?php

namespace App\Dentist\Actions;

use App\Dentist\Domain\Requests\CalendarIdRequest;
use App\Dentist\Domain\Services\DeleteCalendarService;
use App\Dentist\Responders\DeleteCalendarResponder;
use App\Events\Domain\Models\Event;

class DeleteCalendarAction 
{
    public function __construct(DeleteCalendarResponder $responder, DeleteCalendarService $services) 
    {
        $this->responder = $responder;
        $this->services = $services;
    }
    public function __invoke(CalendarIdRequest $request)
    {
        return $this->responder->withResponse(
            $this->services->handle($request->validated())
        )->respond();
    }
}