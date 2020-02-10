<?php

namespace App\Dentist\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;

class LogoutUserService extends Service
{
    public function handle($data = [])
    {
        auth()->logout();
        return new GenericPayload(['message' => 'Catch you soon.']);
    }
}
