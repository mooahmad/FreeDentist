<?php

namespace App\Users\Domain\Pipelines;

use App\Users\Domain\Repositories\UserRepository;
use Carbon\Carbon;

class CreateUserPipeline
{
    protected $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function handle($data, \Closure $next)
    {
        $data['otp'] = $this->users->quickRandom(4);
        $user = $this->users->create($data);
        return $next($user);
    }

}
