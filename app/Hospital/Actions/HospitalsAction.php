<?php

namespace App\Hospital\Actions;

use App\Hospital\Domain\Services\HospitalsService;
use App\Hospital\Responders\HospitalsResponder;

class HospitalsAction 
{
    public function __construct(HospitalsResponder $responder, HospitalsService $services) 
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