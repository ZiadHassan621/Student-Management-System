<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreEnrollmentRequest extends FormRequest
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
        'enroll_no' => 'required|string',
        'batch_id' => 'required|string',
        'student_id' => 'required|string',
        'join_date' => 'required|date',
        'fee' => 'required|numeric'
        ];
    }

    protected function failedValidation($validator){
        return new HttpResponseException(response()->json($validator->errors()));
    }


    public function messages() {
         return [
        'enroll_no' => 'invalid',
        'batch_id' => 'invalid',
        'student_id' => 'invalid',
        'join_date' => 'invalid',
        'fee' => 'invalid'
        ];
    }
}
