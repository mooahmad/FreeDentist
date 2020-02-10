<?php

namespace App\Dentist\Domain\Requests;

use App\App\Http\Requests\APIRequest;

class UpdateHospitalRequest extends APIRequest
{
    public function rules()
    {
        return [
            'hospital' => 'required|integer'
        ];
    }
}
