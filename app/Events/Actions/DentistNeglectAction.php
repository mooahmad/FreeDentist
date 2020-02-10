<?php

namespace App\Events\Actions;

use App\Events\Domain\Models\Event;
use App\Events\Domain\Services\DentistNeglectService;
use App\Events\Responders\DentistNeglectResponder;

class DentistNeglectAction 
{
    public function __construct(DentistNeglectResponder $responder, DentistNeglectService $services) 
    {
        $this->responder = $responder;
        $this->services = $services;
    }
    public function __invoke(Event $event)
    {
        return $this->responder->withResponse(
            $this->services->handle($event)
        )->respond();
    }
}