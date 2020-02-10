<?php

namespace App\Service\Domain\Repositories;
use Service;

class ServiceRepository extends Repository
{
    protected $model;

    public function __construct(Service $model)
    {
        $this->model = $model;
    }
}
