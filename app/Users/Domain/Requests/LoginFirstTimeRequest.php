<?php

namespace App\Users\Domain\Requests;

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
