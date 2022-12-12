<?php

namespace App\Http\Requests\Admin\Item;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class EditItemRequest extends FormRequest
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
            'name' => 'required',
            'price' => [
                'required',
                function ($attribute, $value, $fail) {
                    if ($value < 100) {
                        $fail('The ' . $attribute . ' should be at least 100 mmk');
                    }
                },
            ],
            'category' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
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
            'name.required' => 'Item name is required',
            'price.required' => 'Please describe your selling price',
            'image.required' => 'Please upload your item photo',
        ];
    }
}
