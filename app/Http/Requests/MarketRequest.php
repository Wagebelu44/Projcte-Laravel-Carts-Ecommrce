<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required',
            'name_en' => 'required',
        ];

        if (request()->getMethod() == 'POST') {
            $rules += ['image' => 'required'];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required' => trans('validation.required'),
            'sub_categories_id.required' => trans('validation.required'),
            'name_en.required' => trans('validation.required'),
        ];
    }
}
