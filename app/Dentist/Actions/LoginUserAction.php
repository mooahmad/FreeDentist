<?php

namespace App\Dentist\Actions;

use App\Dentist\Domain\Requests\LoginUserFormRequest;
use App\Dentist\Domain\Services\LoginUserService;
use App\Dentist\Responders\LoginUserResponder;

class LoginUserAction
{
    public function __construct(LoginUserResponder $responder, LoginUserService $services)
    {
        $this->responder = $responder;
        $this->services = $services;

    }
    public function __invoke(LoginUserFormRequest $request)
    {

        return $this->responder->withResponse(
            $this->services->handle($request->all())
        )->respond();
    }
}
