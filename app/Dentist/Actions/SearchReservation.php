<?php

namespace App\Dentist\Actions;

use App\Dentist\Domain\Requests\SearchReservationRequest;
use App\Dentist\Domain\Requests\UpdateHospitalRequest;
use App\Dentist\Domain\Services\SearchReservationService;
use App\Dentist\Domain\Services\UpdateHospitalService;
use App\Dentist\Responders\SearchReservationReponder;
use App\Dentist\Responders\UpdateHospitalResponder;
use GuzzleHttp\Psr7\Request;

class SearchReservation
{
    public function __construct(SearchReservationReponder $responder, SearchReservationService $services)
    {
        $this->responder = $responder;
        $this->services = $services;
    }
    public function __invoke(SearchReservationRequest $request)
    {
        return $this->responder->withResponse(
            $this->services->handle($request->validated())
        )->respond();
    }
}