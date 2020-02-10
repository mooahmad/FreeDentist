<?php

namespace App\Cities\Actions;

use App\Cities\Domain\Services\CityService;
use App\Cities\Responders\CityResponder;

class CityAction 
{
    public function __construct(CityResponder $responder, CityService $services) 
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