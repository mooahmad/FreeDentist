<?php

namespace App\Dentist\Domain\Requests;

use App\App\Http\Requests\APIRequest;

class SearchReservationRequest extends APIRequest
{
    public function rules()
    {
        return [
            'date' => 'required|date',
            'service_id' => 'required|integer',
            'hospital_id'=> 'required|integer'
        ];
    }
}
