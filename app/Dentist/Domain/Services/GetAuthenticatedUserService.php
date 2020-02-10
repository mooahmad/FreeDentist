<?php

namespace App\Dentist\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Payloads\UnauthorizedPayload;
use App\App\Domain\Services\Service;
use App\Dentist\Domain\Repositories\UserRepository;

class GetAuthenticatedUserService extends Service
{
    protected $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function handle($data = [])
    {
        if (auth()->user()) {
            return new GenericPayload(auth()->user());
        } else {
            auth()->logout();
            return new UnauthorizedPayload([
                'message' => 'User is not activated yet.',
            ]);
        }
    }
}
