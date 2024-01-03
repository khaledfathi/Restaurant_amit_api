<?php

namespace App\Http\Requests\API\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreProductRequest extends FormRequest
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
            'product_category_id' => 'required|numeric|exists:product_categories,id', 
            'restaurant_id'=>'required|numeric|exists:restaurants,id', 
            'name'=>'required', 
            'quantity'=>'nullable', 
            'price'=>'nullable',
            'discount'=>'nullable',
            'image'=>'nullable|mimes:jpg,jpge,bmp,png,tiff,webp,heif|max:10000',
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
