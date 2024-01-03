<?php

namespace App\Http\Requests\API\Restaurant;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateRestaurantRequest extends FormRequest
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
            'restaurant_category_id'=> 'nullable| numeric|exists:restaurant_categories,id',
            'name' => 'nullable|unique:restaurants,name,'.$this->id,
            'phone'=> 'nullable',
            'address'=>'nullable', 
            'lat'=>'nullable',
            'long'=>'nullable'
        ];
    }
    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator) {
        throw new HttpResponseException(response()->json([
            'operation' => false,
            'msg'=>'one or more fileds is invalid !',
            'errors' => $validator->errors()->all(),
        ], 200));   
    }
 
}
