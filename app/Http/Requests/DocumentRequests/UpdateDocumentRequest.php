<?php

namespace App\Http\Requests\DocumentRequests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateDocumentRequest extends FormRequest
{
    /**
     * Determine if the document is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'label'     => 'sometimes|required|string|max:255|unique:documents,label',
            'client'    => 'sometimes|required|string|max:255',
            'start_date'=> 'sometimes|required|date',
            'end_date'  => 'sometimes|required|date',
            'archived'  => 'sometimes|boolean'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json($validator->errors(),400)
        );
    }
}
