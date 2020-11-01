<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'name'=>'required | unique:customers,name,'.$this->id,
            'phone'=>'required' ,
            'address'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'هذا الحقل مطلوب' ,
            'phone.required'=>'هذا الحقل مطلوب' ,
            'address.required'=>'هذا الحقل مطلوب' ,
            'name.unique'=>'هذا الاسم مدخل من قبل' ,

        ];
    }
}
