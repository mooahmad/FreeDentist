<?php

namespace App\Dentist\Domain\Pipelines;

use App\Dentist\Domain\Events\UserWasRegistered;
use App\Dentist\Domain\Repositories\ActivationRepository;
use App\Dentist\Domain\Repositories\UserRepository;

class CreateActivationTokenForUserPipeline
{
    protected $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    public function handle($user, \Closure $next)
    {
        $this->user->generateToken($user);
       // event(new UserWasRegistered($user));
        return $next($user);
    }

}
