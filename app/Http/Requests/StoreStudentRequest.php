<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Validator;

class StoreStudentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'address' => 'required|string|max:100',
            'phone' => 'required|string'
        ];
    }
    protected function failedValidation($validator)
{
    throw new HttpResponseException(
        response()->json([
            'errors'  => $validator->errors(),
        ], 422)
    );
}

    public function messages(){
        return [
               'name.required' => 'Student name is required.',
               'address.required' => 'Address name is required.',
               'phone.required' => 'Phone is required.',
        ];
    }
}
