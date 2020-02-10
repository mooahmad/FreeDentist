<?php

namespace App\Service\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Service\Domain\Repositories\ServiceRepository;
class Service extends Service 
{
    protected $service;
    public function __construct(ServiceRepository $service) 
    {
        $this->service = $service;
    }
    public function handle($data = []) 
    {
        return new GenericPayload($this->service->all());
    }
}