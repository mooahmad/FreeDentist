<?php

namespace App\Dentist\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Payloads\UnauthorizedPayload;
use App\App\Domain\Services\Service;

class LoginUserService extends Service
{

    public function handle($data = [])
    {

        if (auth()->guard('dentist')->attempt($data) && ($isActivated = auth()->guard('dentist')->user()->isActivated())) {
            return new GenericPayload(auth()->guard('dentist')->user());
        }

        if (isset($isActivated) && !$isActivated) {
            auth()->logout();
            return new UnauthorizedPayload([
                'message' => 'User is not activated yet.',
            ]);
        }
        return new UnauthorizedPayload;
    }
}
