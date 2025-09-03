<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class EditStudentRequest extends FormRequest
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
              'name' => 'string|max:100',
            'address' => 'string|max:100',
            'phone' => 'string'
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
               'name.required' => 'invalid',
               'address.required' => 'invalid',
               'phone.required' => 'invalid',
        ];
    }
}
