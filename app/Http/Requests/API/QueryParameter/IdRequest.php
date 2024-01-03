<?php

namespace App\Http\Requests\API\QueryParameter;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class IdRequest extends FormRequest
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
        $this->merge(['id'=>$this->route('id')]); 
        return [
            'id'=>'numeric',
        ];
    }
        protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'msg'=>'Invalid URL query parameter (id)',
            'errors' => $validator->errors()->all(),
        ], 200));
    }
}
