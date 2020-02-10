<?php

namespace App\Events\Responders;

use App\App\Domain\Helpers\ApiHelper;
use App\App\Responders\Responder;
use App\App\Responders\ResponderInterface;
use App\Dentist\Domain\Resources\DentistResource;

class AddReservationResponder extends Responder implements ResponderInterface
{
    public function respond()
    {
        if ($this->response->getStatus() != 200) {
            return ApiHelper::responseFail($this->response->getData());
        }
        return ApiHelper::responseSuccess($this->response->getData(), $this->response->getStatus());
    }
}
