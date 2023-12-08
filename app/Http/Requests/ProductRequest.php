<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'=>'required',
            'text'=>'required',
            'price'=>'required',
            
            'image'=>'required|mimes:jpeg,png,jpg,gif',
            'cat_id'=>'required',
            'brand_id'=>'required',
            'gender_id'=>'required',
            'quantity'=>'required'
        ];
    }
}
