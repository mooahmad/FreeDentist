<?php

namespace App\Hospital\Domain\Repositories;
use App\Followers\Domain\Models\Follower;
use App\App\Domain\Repositories\Repository;
use App\Hospital\Domain\Models\Hospital;

class HospitalRepository extends Repository
{
    protected $model;

    public function __construct(Hospital $model)
    {
        $this->model = $model;
    }
}
