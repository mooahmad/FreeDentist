<?php

namespace App\Dentist\Domain\Requests;

use App\App\Http\Requests\APIRequest;

class CalendarIdRequest extends APIRequest
{
    public function rules()
    {
        return [
            'id' => 'required|integer'
        ];
    }
}
