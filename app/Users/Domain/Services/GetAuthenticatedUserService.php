<?php

namespace App\Users\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Payloads\UnauthorizedPayload;
use App\App\Domain\Services\Service;
use App\Users\Domain\Repositories\UserRepository;

class GetAuthenticatedUserService extends Service
{
    protected $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function handle($data = [])
    {
            return new GenericPayload(auth()->user());
    }
}
