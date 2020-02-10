<?php

namespace App\Followers\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Followers\Domain\Repositories\FollowerRepository;
use Carbon\Carbon;

class RegisterFollowerService extends Service
{
    protected $followers;

    public function __construct(FollowerRepository $followers)
    {
        $this->followers = $followers;
    }

    public function handle($data = [])
    {
        $follower = $this->followers->create($data);
        return new GenericPayload($follower);
    }
}