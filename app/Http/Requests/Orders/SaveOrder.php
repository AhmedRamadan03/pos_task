<?php

namespace App\Http\Requests\Orders;

use Illuminate\Foundation\Http\FormRequest;

class SaveOrder extends FormRequest
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
            'customer_id' =>'required',
            'date' =>'required|date',
            'total' =>'required',
            'order_no' =>'required',
            'products' =>'required|array',
        ];
    }

    public function messages (){
        return [
            'required'=>'some input must be require',
            'date' => 'date must be date'
        ];
    }

}
