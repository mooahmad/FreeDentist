<?php

namespace App\Events\Domain\Repositories;


use App\Events\Domain\Models\Event;
use App\App\Domain\Repositories\Repository;

class EventRepository extends Repository
{
    protected $model;

    public function __construct(Event $model)
    {
        $this->model = $model;
    }

}
