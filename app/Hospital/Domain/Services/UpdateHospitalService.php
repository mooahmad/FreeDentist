<?php

namespace App\Hospital\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Hospital\Domain\Repositories\HospitalRepository;
class UpdateHospitalService extends Service 
{
    protected $hospital;
    public function __construct(HospitalRepository $hospital) 
    {
        $this->hospital = $hospital;
    }
    public function handle($data = []) 
    {
        return new GenericPayload($this->hospital->all());
    }
}