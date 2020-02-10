<?php

namespace App\Users\Actions;

use App\Users\Domain\Models\Dentist;
use App\Users\Domain\Models\User;
use App\Users\Domain\Requests\LoginFirstTimeRequest;
use App\Users\Domain\Services\LoginFirstTimmeService;
use App\Users\Responders\LoginFirstTimmeResponder;

class LoginFirstTimmeAction
{
    public function __construct(LoginFirstTimmeResponder $responder, LoginFirstTimmeService $services)
    {
        $this->responder = $responder;
        $this->services = $services;
    }

    public function __invoke(LoginFirstTimeRequest $request, User $user)
    {
        return $this->responder->withResponse(
            $this->services->handle($request->validated(), $user)
        )->respond();
    }
}