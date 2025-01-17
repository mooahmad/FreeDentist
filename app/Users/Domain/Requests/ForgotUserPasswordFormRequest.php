<?php

namespace App\Users\Domain\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForgotUserPasswordFormRequest extends FormRequest
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
