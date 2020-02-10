<?php

namespace App\Events\Actions;

use App\Events\Domain\Models\Event;
use App\Events\Domain\Services\EventDetailsService;
use App\Events\Responders\EventDetailsResponder;

class EventDetailsAction 
{
    public function __construct(EventDetailsResponder $responder, EventDetailsService $services) 
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