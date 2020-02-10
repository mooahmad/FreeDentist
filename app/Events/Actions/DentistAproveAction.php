<?php

namespace App\Events\Actions;

use App\Events\Domain\Models\Event;
use App\Events\Domain\Services\DentistAproveService;
use App\Events\Responders\DentistAproveResponder;

class DentistAproveAction 
{
    public function __construct(DentistAproveResponder $responder, DentistAproveService $services) 
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