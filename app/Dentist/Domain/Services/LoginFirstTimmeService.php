<?php

namespace App\Dentist\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Payloads\UnauthorizedPayload;
use App\App\Domain\Services\Service;
use App\Dentist\Domain\Models\Dentist;
use App\Dentist\Domain\Repositories\DentistRepository;
use App\Dentist\Domain\Repositories\UserRepository;
use App\Dentist\Domain\Resources\DentistResource;

class LoginFirstTimmeService extends Service
{
    protected $users;

    public function __construct(DentistRepository $users)
    {
        $this->users = $users;
    }

    public function handle($data = [], Dentist $user = null)
    {
        if (($checkOTP = $user->hasOTP($data['otp'])->first())) {
          $auth_user =  $this->users->activeDentist($data, $checkOTP);
            return new GenericPayload($auth_user);
        }
        if (isset($checkOTP) && !$checkOTP) {
            auth()->logout();
            return new UnauthorizedPayload([
                'message' => 'User is not activated yet.',
            ]);
        }
        return new UnauthorizedPayload;
    }
}