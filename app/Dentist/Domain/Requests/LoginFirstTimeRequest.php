<?php

namespace App\Dentist\Domain\Requests;

use App\App\Http\Requests\APIRequest;

class LoginFirstTimeRequest extends APIRequest
{
    public function rules()
    {
        return [
            'otp' => 'required|numeric',
        ];
    }
}
