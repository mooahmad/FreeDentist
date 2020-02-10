<?php

namespace App\Dentist\Actions;

use App\Dentist\Domain\Services\LogoutUserService;
use App\Dentist\Responders\LogoutUserResponder;

class LogoutUserAction
{
    public function __construct(LogoutUserResponder $responder, LogoutUserService $services)
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
