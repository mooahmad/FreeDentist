<?php

namespace App\Nationality\Actions;

use App\Nationality\Domain\Services\NationalityService;
use App\Nationality\Responders\NationalityResponder;

class NationalityAction 
{
    public function __construct(NationalityResponder $responder, NationalityService $services) 
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