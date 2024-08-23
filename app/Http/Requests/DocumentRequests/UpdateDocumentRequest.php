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
            'name'          => 'sometimes|required|string|max:255',
            'file'          => 'sometimes|required|file|mimes:pdf,doc,docx,jpg,png|max:2048', // Validation du fichier
            'author_id'     => 'sometimes|required|exists:users,id',
            'project_id'    => 'sometimes|required|exists:projects,id',
            'archived'      => 'sometimes|required|boolean',
            'updater_id'    => 'sometimes|required|exists:users,id',
            'commit'        => 'required|string',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json($validator->errors(),400)
        );
    }
}
