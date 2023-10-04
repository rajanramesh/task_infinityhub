<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productstorerequest extends FormRequest
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
            'product_name' =>'required|string|min:5',
            'category' =>'required',
            'unit_type' =>'required',
            'product_images' =>'required|array|min:3',
            
            'product_price' =>'required|numeric',
            
            'discount_pre' =>'required|numeric',
            'discount_amount' =>'required',
            'discount_rangefrom' =>'required',
            'discount_rangeto' =>'required',
            'tax' => 'required|numeric',
            'tax_amount' =>'required',
            'stock'=>'required|numeric'

        ];
    }
}
