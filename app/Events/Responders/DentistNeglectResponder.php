<?php

namespace App\Events\Responders;

use App\App\Domain\Helpers\ApiHelper;
use App\App\Responders\Responder;
use App\App\Responders\ResponderInterface;

class DentistNeglectResponder extends Responder implements ResponderInterface 
{
    public function respond() 
    {
        return ApiHelper::responseSuccess($this->response->getData(), $this->response->getStatus());
    }
}
