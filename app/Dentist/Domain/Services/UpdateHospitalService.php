<?php

namespace App\Dentist\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Dentist\Domain\Repositories\DentistRepository;
class UpdateHospitalService extends Service 
{
    protected $dentist;
    public function __construct(DentistRepository $dentist) 
    {
        $this->dentist = $dentist;
    }
    public function handle($data = []) 
    {
        $user = auth()->user();
        $user->hospital = $data['hospital'];
        $user->save();
        return new GenericPayload($user);
    }
}