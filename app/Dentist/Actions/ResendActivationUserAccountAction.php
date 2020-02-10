<?php

namespace App\Dentist\Actions;

use App\Dentist\Domain\Models\Dentist;
use App\Dentist\Domain\Requests\ResendActivationUserAccountFormRequest;
use App\Dentist\Domain\Services\ResendActivationUserAccountService;
use App\Dentist\Responders\ResendActivationUserAccountResponder;

class ResendActivationUserAccountAction
{
    public function __construct(ResendActivationUserAccountResponder $responder, ResendActivationUserAccountService $services)
    {
        $this->responder = $responder;
        $this->services = $services;
    }
    public function __invoke(Dentist $user)
    {
        return $this->responder->withResponse(
            $this->services->handle($user)
        )->respond();
    }
}
