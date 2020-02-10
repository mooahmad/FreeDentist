<?php

namespace App\Service\Actions;

use App\Service\Domain\Services\Service;
use App\Service\Responders\Responder;

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