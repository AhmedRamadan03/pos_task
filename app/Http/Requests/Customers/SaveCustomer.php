<?php

namespace App\Http\Requests\Customers;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveCustomer extends FormRequest
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
    public function rules()
    {
        return [
            'email' => [
                'required',
                'email',
                Rule::unique('customers', 'email')->ignore($this->route('customer')),
            ],
            'address' => 'nullable',
            'name' => 'required|string|max:150',
        ];

    }

    public function messages (){
        return [
            'required'=>'this input must be require',
            'string'=>'this input must be string',
            'unique' => 'Email must be unique',
        ];
    }

}
