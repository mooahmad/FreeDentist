<?php

namespace App\Dentist\Domain\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetUserPasswordFormRequest extends FormRequest
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
            'password' => 'required|min:6|max:32|confirmed',
        ];
    }
}
