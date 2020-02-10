<?php

namespace App\Events\Domain\Requests;

use App\App\Http\Requests\APIRequest;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\DatabaseRule;

class AddReservationRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'start_time' => 'required|date_format:H:i:s',
            'event_date' => 'required|date',
            'treatment_id' => 'required|integer',
            'hospital_id' => 'required|integer',
            'diseases' => 'sometimes|nullable',
            'drugs' => 'sometimes|nullable',
            'device_id' => 'sometimes|nullable',
            'user' => 'sometimes|nullable',
            'description' => 'sometimes|required',
            'photo' => 'sometimes|required|nullable',
            'dentist_id' => 'required',
            'follower_id' => 'sometimes|integer|nullable',
        ];
    }


    public function validated()
    {
        return array_merge(parent::validated(), [
            'user_id' => Auth::id(),
            'end_time' => '00:00:00'
        ]);
    }

}
