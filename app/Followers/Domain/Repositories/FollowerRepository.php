<?php

namespace App\Followers\Domain\Repositories;
use App\Followers\Domain\Models\Follower;
use App\App\Domain\Repositories\Repository;

class FollowerRepository extends Repository
{
    protected $model;

    public function __construct(Follower $model)
    {
        $this->model = $model;
    }
}
