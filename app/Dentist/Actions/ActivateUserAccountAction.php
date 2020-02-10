<?php

namespace vctions;

use App\Dentist\Domain\Models\Dentist;
use App\Dentist\Domain\Services\ActivateUserAccountService;
use App\Dentist\Responders\ActivateUserAccountResponder;

class ActivateUserAccountAction
{
    public function __construct(ActivateUserAccountResponder $responder, ActivateUserAccountService $services)
    {
        $this->responder = $responder;
        $this->services = $services;
    }
    public function __invoke(Dentist $user, $token)
    {
        return $this->responder->withResponse(
            $this->services->handle($user, $token)
        )->respond();
    }
}
