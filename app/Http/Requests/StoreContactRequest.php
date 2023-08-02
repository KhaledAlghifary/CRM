<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'firstname' => 'required|string|max:255',
            'middle' => 'nullable|string|max:255',
            'lastname' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'mobile' => 'required|numeric',
            'email' => 'required|email|max:100',
            'dateofbirth' => 'required|date',
            'gender' => 'required|integer',
            'maritalstatus' => 'required|integer',
            'image_path' => 'nullable|image',
        ];
    }
}
