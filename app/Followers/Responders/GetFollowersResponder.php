<?php

namespace App\Followers\Responders;

use App\App\Responders\Responder;
use App\App\Responders\ResponderInterface;
use App\Followers\Domain\Models\Follower;
use App\Followers\Domain\Resources\FollowerResource;

class GetFollowersResponder extends Responder implements ResponderInterface 
{
    public function respond() 
    {
        return response()->json((new FollowerResource($this->response->getData())),$this->response->getStatus());
    }
}
