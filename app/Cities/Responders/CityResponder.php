<?php

namespace App\Cities\Responders;

use App\App\Responders\Responder;
use App\App\Responders\ResponderInterface;
use App\Cities\Domain\Resources\CityResource;
use phpDocumentor\Reflection\Types\This;

class CityResponder extends Responder implements ResponderInterface 
{
    public function respond() 
    {
        if($this->response->getStatus() != 200) {
            return response()->json($this->response->getData(), $this->response->getStatus());
        }
        return (new CityResource($this->response->getData()));

       }
}
