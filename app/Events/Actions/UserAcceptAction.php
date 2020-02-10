<?php

namespace App\Events\Actions;

use App\Events\Domain\Models\Event;
use App\Events\Domain\Services\UserAcceptService;
use App\Events\Responders\UserAcceptResponder;

class UserAcceptAction 
{
    public function __construct(UserAcceptResponder $responder, UserAcceptService $services) 
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