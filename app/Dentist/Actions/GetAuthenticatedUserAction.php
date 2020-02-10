<?php

namespace App\Dentist\Actions;

use App\Dentist\Domain\Services\GetAuthenticatedUserService;
use App\Dentist\Responders\GetAuthenticatedUserResponder;
use Illuminate\Http\Request;

class GetAuthenticatedUserAction
{
    public function __construct(GetAuthenticatedUserResponder $responder, GetAuthenticatedUserService $services)
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
