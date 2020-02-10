<?php

namespace App\Events\Actions;

use App\Events\Domain\Services\Service;
use App\Events\Responders\Responder;

class Action 
{
    public function __construct(Responder $responder, Service $services) 
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