<?php

namespace App\Dentist\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Dentist\Domain\Pipelines\CreateActivationTokenForUserPipeline;
use App\Dentist\Domain\Pipelines\CreateUserPipeline;
use App\Dentist\Domain\Repositories\DentistRepository;
use Illuminate\Pipeline\Pipeline;

class RegisterUserService extends Service
{
    protected $users;

    public function __construct(DentistRepository $users)
    {
        $this->users = $users;
    }

    public function handle($data = [])
    {
        $pipes = [
            CreateUserPipeline::class,
        ];
        $user = app(Pipeline::class)->through($pipes)->send($data)->then(function ($user) {
            return $user;
        });

        return new GenericPayload($user);
    }
}
