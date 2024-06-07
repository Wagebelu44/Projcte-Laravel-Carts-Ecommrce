<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
        return [
            'name' => 'required|min:2|max:150',
            'email' => 'required|unique:contact_us',
            'subject' => 'required',
            'message' => 'required',

        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => trans('validation.required'),
            'email.required' => trans('validation.required'),
            'subject.required' => trans('validation.required'),
            'message.required' => trans('validation.required'),
        ];
    }
}
