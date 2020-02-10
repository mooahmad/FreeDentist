<?php

namespace App\Nationality\Domain\Repositories;
use App\Nationality\Domain\Models\Nationality;
use App\App\Domain\Repositories\Repository;


class NationalityRepository extends Repository
{
    protected $model;

    public function __construct(Nationality $model)
    {
        $this->model = $model;
    }
}
