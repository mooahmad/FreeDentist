<?php

namespace App\Dentist\Actions;

use App\Dentist\Domain\Models\Dentist;
use App\Dentist\Domain\Requests\LoginFirstTimeRequest;
use App\Dentist\Domain\Services\LoginFirstTimmeService;
use App\Dentist\Responders\LoginFirstTimmeResponder;

class LoginFirstTimmeAction
{
    public function __construct(LoginFirstTimmeResponder $responder, LoginFirstTimmeService $services)
    {
        $this->responder = $responder;
        $this->services = $services;
    }

    public function __invoke(LoginFirstTimeRequest $request, Dentist $user)
    {
        return $this->responder->withResponse(
            $this->services->handle($request->validated(), $user)
        )->respond();
    }
}