<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class SaveProduct extends FormRequest
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
     * @return array
     */
    public function rules(){
        return [
            'title' =>'required|string|max:150',
            'quantity' =>'required',
            'price' =>'required|numeric',
        ];
    }

    public function messages (){
        return [
            'required'=>'some input must be require',
            'max' => 'title must be smoller then 150 chr'
        ];
    }

}
