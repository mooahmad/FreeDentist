<?php

namespace App\Dentist\Responders;

use App\App\Responders\Responder;
use App\App\Responders\ResponderInterface;

class UpdateHospitalResponder extends Responder implements ResponderInterface 
{
    public function respond() 
    {
        return $this->response->getData();
    }
}
