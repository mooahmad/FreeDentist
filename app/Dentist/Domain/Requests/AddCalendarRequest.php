<?php

namespace App\Dentist\Domain\Requests;

use App\App\Http\Requests\APIRequest;
use Illuminate\Support\Facades\Auth;

class AddCalendarRequest extends APIRequest
{
    public function rules()
    {
        return [
            'hospital_id' => 'required|numeric',
            'service_id' => 'required|numeric',
            'start_date' => 'required|date|after:now',
            'end_date' => 'required|date|after:now',
            'day' => 'required',
            'start_time' => 'required|date_format:H:i:s',
            'end_time' => 'nullable|date_format:H:i:s',

        ];
    }

    public function validated() {
        return array_merge(parent::validated(), [
            'dentist_id' => Auth::id()
        ]);
    }
}
