<?php

namespace App\Dentist\Actions;

use App\Dentist\Domain\Requests\ForgotUserPasswordFormRequest;
use App\Dentist\Domain\Services\ForgotUserPasswordService;
use App\Dentist\Responders\ForgotUserPasswordResponder;

class ForgotUserPasswordAction
{
    public function __construct(ForgotUserPasswordResponder $responder, ForgotUserPasswordService $services)
    {
        $this->responder = $responder;
        $this->services = $services;
    }
    public function __invoke(ForgotUserPasswordFormRequest $request)
    {
        return $this->responder->withResponse(
            $this->services->handle($request->validated())
        )->respond();
    }
}
