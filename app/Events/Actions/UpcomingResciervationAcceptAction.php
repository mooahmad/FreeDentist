<?php

namespace App\Events\Actions;

use App\Events\Domain\Services\UpcomingResciervationAcceptService;
use App\Events\Responders\UpcomingResciervationAcceptResponder;

class UpcomingResciervationAcceptAction 
{
    public function __construct(UpcomingResciervationAcceptResponder $responder, UpcomingResciervationAcceptService $services) 
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