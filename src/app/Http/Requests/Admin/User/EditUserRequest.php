<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'username' => 'required|unique:users,username,' . $this->id,
            'email' => 'required|unique:users,email,' . $this->id,
            'phone' => 'required',
            'address' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'username.required' => 'User name is required',
            'username.unique' => 'User name is already used',
            'email.required' => 'Email is required',
            'email.unique' => 'Email is already used',
            'phone.required' => 'Phone is required',
            'address.required' => 'Address is required',
        ];
    }
}
