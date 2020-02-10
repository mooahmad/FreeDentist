<?php

namespace App\Followers\Domain\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class RegisterFollowerRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'relation' => 'required|string|max:255',
            'gender' => 'required|string',
            'nationality' => 'required|integer',
            'birthdate' => 'required|date',
        ];
    }
    public function validated()
    {
        return array_merge(parent::validated(), [
            'user_id' => Auth::id()
        ]);
    }
}
