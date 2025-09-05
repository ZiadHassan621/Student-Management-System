<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class EditBatchRequest extends FormRequest
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
        'course_id' => 'string',
        'start_date' => 'date'
        ];

    }
     protected function failedValidation($validator){
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()]));
    }
       public function messages(){
        return [
            'name.required' => 'invalid',
            'course_id' => 'invalid',
            'start_date' => 'invalid'
        ];
    }
}
