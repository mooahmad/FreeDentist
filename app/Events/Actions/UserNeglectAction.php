<?php

namespace App\Events\Actions;

use App\Events\Domain\Models\Event;
use App\Events\Domain\Services\UserNeglectService;
use App\Events\Responders\UserNeglectResponder;

class UserNeglectAction 
{
    public function __construct(UserNeglectResponder $responder, UserNeglectService $services) 
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