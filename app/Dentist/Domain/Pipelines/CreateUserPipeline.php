<?php

namespace App\Dentist\Domain\Pipelines;

use App\App\Domain\Helpers\Helper;
use App\Dentist\Domain\Repositories\DentistRepository;
use Carbon\Carbon;

class CreateUserPipeline
{
    protected $users;

    public function __construct(DentistRepository $users)
    {
        $this->users = $users;
    }

    public function handle($data, \Closure $next)
    {
        if (!empty($data['photo'])) {
            $photo = (new Helper())->UploadFile($data['photo'], 'dentist/photo');
        }
        if (!empty($data['profile_photo'])) {
            $profile = (new Helper())->UploadFile($data['profile_photo'], 'dentist/profile');
        }
        $data['photo'] = $photo;
        $data['profile_photo'] = $profile;
        $user = $this->users->create($data);

        return $next($user);
    }

}
