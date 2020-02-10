<?php

namespace App\Dentist\Actions;

use App\Dentist\Domain\Services\DeleteCalendarService;
use App\Dentist\Responders\DeleteCalendarResponder;

class DeleteCalendarAction 
{
    public function __construct(DeleteCalendarResponder $responder, DeleteCalendarService $services) 
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