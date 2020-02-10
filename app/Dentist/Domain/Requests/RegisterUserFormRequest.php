<?php

namespace App\Dentist\Domain\Requests;

use App\App\Http\Requests\APIRequest;

class RegisterUserFormRequest extends APIRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'mobile'     => 'required|numeric|regex:/(05)[0-9]{8}/|unique:users',
            'email'      => 'required|string|email|max:255|unique:dentists',
            'password'   => 'required|string|min:6|confirmed',
            'birthdate' => 'required|date',
            'nation_id' => 'required|digits:10|numeric|regex:/(1)[0-9]{9}/',
            'dgree' => 'required|numeric',
        ];
    }
}
