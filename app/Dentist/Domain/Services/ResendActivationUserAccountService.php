<?php

namespace App\Dentist\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Dentist\Domain\Events\ResendActivation;
use App\Dentist\Domain\Repositories\ActivationRepository;
use App\Dentist\Domain\Repositories\UserRepository;
class ResendActivationUserAccountService extends Service
{
    protected $users;
    protected $activations;
    public function __construct(UserRepository $users,ActivationRepository $activations)
    {
        $this->users = $users;
        $this->activations=$activations;
    }
    public function handle($user = [])
    {
        $this->activations->regenerateToken($user);
        event(new ResendActivation($user));
        return new GenericPayload($user);
    }
}
