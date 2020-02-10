<?php

namespace App\Followers\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Followers\Domain\Models\Follower;
use App\Followers\Domain\Repositories\HospitalRepository;
use Illuminate\Support\Facades\Auth;

class GetFollowersService extends Service
{
    protected $followers;
    public function __construct(Follower $followers)
    {
        $this->followers = $followers;
    }
    public function handle($data = []) 
    {
        return new GenericPayload(Auth::user()->followers()->paginate(1));
    }
}