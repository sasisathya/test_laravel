<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegistrationRequest extends FormRequest
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
            'company_name' => 'required|alpha_num',
            'email' => ['regex:/^((?!@gmail\.com|@yahoo\.com).)*$/'],
            'mobile'=> 'required|digits:10',
            'hr_name'=> 'required|alpha_num',
            'user_password'=> 'required'
        ];
    }
     public function messages()
    {
        return [
            'company_name.required' => 'The Company Name is required.',
            'company_name.alpha_num' => 'The Company Name Should contain only alphabets and numbers.',
            'mobile.required'       => 'Mobile Number is required.',
            'hr_name.required' => 'The HR Name is required.',
            'hr_name.alpha_num' => 'The HR Name Should contain only alphabets and numbers.',

        ];
    }
}
