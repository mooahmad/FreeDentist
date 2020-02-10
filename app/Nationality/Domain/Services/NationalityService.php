<?php

namespace App\Nationality\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Nationality\Domain\Repositories\NationalityRepository;
class NationalityService extends Service 
{
    protected $nationality;
    public function __construct(NationalityRepository $nationality) 
    {
        $this->nationality = $nationality;
    }
    public function handle($data = []) 
    {
        return new GenericPayload($this->nationality->all());
    }
}