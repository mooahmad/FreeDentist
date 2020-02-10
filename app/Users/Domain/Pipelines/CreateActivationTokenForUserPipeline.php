<?php

namespace App\Users\Domain\Pipelines;

use App\Users\Domain\Events\UserWasRegistered;
use App\Users\Domain\Repositories\ActivationRepository;
use App\Users\Domain\Repositories\UserRepository;

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
