<?php

namespace App\Users\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Payloads\UnauthorizedPayload;
use App\App\Domain\Services\Service;
use App\Users\Domain\Models\Dentist;
use App\Users\Domain\Models\User;
use App\Users\Domain\Repositories\UserRepository;
use App\Users\Domain\Resources\UserResource;

class LoginFirstTimmeService extends Service
{
    protected $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function handle($data = [], User $user = null)
    {
        if ($user->hasOTP($data['otp'])) {
          $auth_user =  $this->users->complete($data, $user);
          return new GenericPayload($auth_user);
        } else {
            auth()->logout();
            return new UnauthorizedPayload([
                'message' => 'User is not activated yet.',
            ]);
        }
        return new UnauthorizedPayload();
    }
}