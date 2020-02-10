<?php

namespace App\Users\Actions;

use App\Users\Domain\Requests\RegisterUserFormRequest;
use App\Users\Domain\Services\RegisterUserService;
use App\Users\Responders\RegisterUserResponder;

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
