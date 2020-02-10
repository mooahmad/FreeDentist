<?php

namespace App\Dentist\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Dentist\Domain\Models\Dentist;
use App\Dentist\Domain\Repositories\ActivationRepository;
use App\Dentist\Domain\Repositories\UserRepository;
class ActivateUserAccountService extends Service
{
    protected $activations;
    public function __construct(ActivationRepository $activations)
    {
        $this->activations = $activations;
    }

    public function handle(Dentist $user = null, $token = null)
    {
        $this->activations->complete($user, $token);
        return new GenericPayload([
            'message' => 'Account has been activated, Thanks ' . $user->first_name . ' , For being with us !',
        ]);
    }
}
