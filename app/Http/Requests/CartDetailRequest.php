<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartDetailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'cart_name' => 'required|min:2|max:150',
            'cart_name_en' => 'required|min:2|max:150',
            'cart_text' => 'required|min:2|max:150',
            'cart_text_en' => 'required|min:2|max:150',
            'short_descript' => 'required',
            'short_descript_en' => 'required',
            // 'sub_category_id'   => 'required',
            // 'amrecan_price'     => 'required',
        ];

        if (request()->getMethod() == 'POST') {
            $rules += ['image' => 'required'];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'cart_name.required' => trans('validation.required'),
            'cart_name_en.required' => trans('validation.required'),
            'short_descript.required' => trans('validation.required'),
            'short_descript_en.required' => trans('validation.required'),
            'cart_text.required' => trans('validation.required'),
            'cart_text_en.required' => trans('validation.required'),
            // 'sub_category_id.required'   => trans('validation.required'),
            // 'amrecan_price.required'     => trans('validation.required'),
        ];
    }
}
