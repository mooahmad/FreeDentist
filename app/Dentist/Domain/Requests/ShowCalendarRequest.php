<?php

namespace App\Dentist\Domain\Requests;

use App\App\Http\Requests\APIRequest;

class  ShowCalendarRequest extends APIRequest
{
    public function rules()
    {
        return [
            'date'=>'required|date',
            'dentist_id' => 'required|integer'
        ];
    }
}
