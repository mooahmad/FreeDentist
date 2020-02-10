<?php

namespace App\Users\Domain\Requests;

use App\App\Http\Requests\APIRequest;

class RegisterUserFormRequest extends APIRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'mobile'     => 'required|numeric|regex:/(05)[0-9]{8}/|unique:users',
            'email'      => 'required|string|email|max:255|unique:users',
            'password'   => 'required|string|min:6|confirmed',
            'birthdate' => 'required|date',

        ];
    }
    public function validated() {
        return array_merge(parent::validated(), [
            'admin' => 2
        ]);
    }
}
