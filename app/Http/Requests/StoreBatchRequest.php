<?php

namespace App\Http\Requests;

use Exception;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreBatchRequest extends FormRequest
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
        'course_id' => 'required|string',
        'start_date' => 'required|date'
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
