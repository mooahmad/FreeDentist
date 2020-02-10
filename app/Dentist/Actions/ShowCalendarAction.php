<?php

namespace App\Dentist\Actions;

use App\Dentist\Domain\Requests\ShowCalendarRequest;
use App\Dentist\Domain\Services\ShowCalendarService;
use App\Dentist\Responders\ShowCalendarResponder;

class ShowCalendarAction 
{
    public function __construct(ShowCalendarResponder $responder, ShowCalendarService $services) 
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