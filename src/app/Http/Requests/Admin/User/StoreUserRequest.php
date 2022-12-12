<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|unique:users,name',
            'role' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:20|confirmed',
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
            'name.required' => 'User name is required',
            'role.required' => 'User role is required',
            'email.required' => 'User email is required',
            'email.email' => 'Please use correct email',
            'email.unique' => 'Email is already used',
            'password.required' => 'Password is required',
            'password.confirmed' => 'Please enter the same password'
        ];
    }
}
