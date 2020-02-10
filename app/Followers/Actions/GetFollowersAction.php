<?php

namespace App\Followers\Actions;

use App\Followers\Domain\Services\GetFollowersService;
use App\Followers\Responders\GetFollowersResponder;

class GetFollowersAction 
{
    public function __construct(GetFollowersResponder $responder, GetFollowersService $services) 
    {
        $this->responder = $responder;
        $this->services = $services;
    }
    public function __invoke() 
    {
        return $this->responder->withResponse(
            $this->services->handle()
        )->respond();
    }
}