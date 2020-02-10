<?php

namespace App\Events\Actions;

use App\Events\Domain\Requests\DeviceRequest;
use App\Events\Domain\Services\DeleteDeviceService;
use App\Events\Responders\DeleteDeviceResponder;
use GuzzleHttp\Psr7\Request;

class DeleteDeviceAction 
{
    public function __construct(DeleteDeviceResponder $responder, DeleteDeviceService $services) 
    {
        $this->responder = $responder;
        $this->services = $services;
    }
    public function __invoke(DeviceRequest $request)
    {
        return $this->responder->withResponse(
            $this->services->handle($request->validated())
        )->respond();
    }
}