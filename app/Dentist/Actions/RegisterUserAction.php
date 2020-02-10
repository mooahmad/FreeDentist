<?php

namespace App\Dentist\Actions;

use App\Dentist\Domain\Requests\RegisterUserFormRequest;
use App\Dentist\Domain\Services\RegisterUserService;
use App\Dentist\Responders\RegisterUserResponder;

class RegisterUserAction
{
    public function __construct(RegisterUserResponder $responder, RegisterUserService $services)
    {
        $this->responder = $responder;
        $this->services = $services;
    }
    public function __invoke(RegisterUserFormRequest $request)
    {

        return $this->responder->withResponse(
            $this->services->handle($request->all())
        )->respond();
    }
}
