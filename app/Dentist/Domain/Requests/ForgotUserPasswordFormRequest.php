<?php

namespace App\Dentist\Domain\Requests;

use App\App\Http\Requests\APIRequest;
use Illuminate\Foundation\Http\FormRequest;

class ForgotUserPasswordFormRequest extends APIRequest
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
            'mobile' => 'required|numeric|regex:/(05)[0-9]{8}/',

        ];
    }
}
