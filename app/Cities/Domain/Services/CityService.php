<?php

namespace App\Cities\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Cities\Domain\Repositories\CityRepository;
class CityService extends Service 
{
    protected $cities;
    public function __construct(CityRepository $cities) 
    {
        $this->cities = $cities;
    }
    public function handle($data = []) 
    {
        return new GenericPayload($this->cities->all());
    }
}