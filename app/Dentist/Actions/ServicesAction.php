<?php

namespace App\Dentist\Actions;

use App\Dentist\Domain\Services\ServicesService;
use App\Dentist\Responders\ServicesResponder;

class ServicesAction 
{
    public function __construct(ServicesResponder $responder, ServicesService $services) 
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