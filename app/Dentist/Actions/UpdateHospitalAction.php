<?php

namespace App\Dentist\Actions;

use App\Dentist\Domain\Requests\UpdateHospitalRequest;
use App\Dentist\Domain\Services\UpdateHospitalService;
use App\Dentist\Responders\UpdateHospitalResponder;

class UpdateHospitalAction 
{
    public function __construct(UpdateHospitalResponder $responder, UpdateHospitalService $services) 
    {
        $this->responder = $responder;
        $this->services = $services;
    }
    public function __invoke(UpdateHospitalRequest $request)
    {
        return $this->responder->withResponse(
            $this->services->handle($request->validated())
        )->respond();
    }
}