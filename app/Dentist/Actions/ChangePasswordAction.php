<?php

namespace App\Dentist\Domain\Actions;

use App\Dentist\Domain\Requests\ChangePasswordFormRequest;
use App\Dentist\Domain\Services\ChangePasswordService;
use App\Dentist\Responders\ChangePasswordResponder;

class ChangePasswordAction
{
    public function __construct(ChangePasswordResponder $responder, ChangePasswordService $services)
    {
        $this->responder = $responder;
        $this->services = $services;
    }
    public function __invoke(ChangePasswordFormRequest $request)
    {
        return $this->responder->withResponse(
            $this->services->handle($request->validated())
        )->respond();
    }
}
