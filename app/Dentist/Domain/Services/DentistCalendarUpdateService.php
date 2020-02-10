<?php

namespace App\Dentist\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Dentist\Domain\Repositories\DentistRepository;
class DentistCalendarUpdateService extends Service 
{
    protected $dentist;
    public function __construct(DentistRepository $dentist) 
    {
        $this->dentist = $dentist;
    }
    public function handle($data = []) 
    {
        return new GenericPayload($this->dentist->all());
    }
}