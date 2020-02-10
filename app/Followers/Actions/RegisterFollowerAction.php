<?php

namespace App\Followers\Actions;

use App\Followers\Domain\Requests\RegisterFollowerRequest;
use App\Followers\Domain\Services\RegisterFollowerService;
use App\Followers\Responders\RegisterFollowerResponder;

class RegisterFollowerAction 
{
    public function __construct(RegisterFollowerResponder $responder, RegisterFollowerService $services) 
    {
        $this->responder = $responder;
        $this->services = $services;
    }
    public function __invoke(RegisterFollowerRequest $request)
    {
        return $this->responder->withResponse(
            $this->services->handle($request->validated())
        )->respond();
    }
}