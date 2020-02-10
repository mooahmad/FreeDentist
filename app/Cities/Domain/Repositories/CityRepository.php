<?php

namespace App\Cities\Domain\Repositories;
use App\Cities\Domain\Models\City;
use App\App\Domain\Repositories\Repository;

class CityRepository extends Repository
{
    protected $model;

    public function __construct(City $model)
    {
        $this->model = $model;
    }
}
