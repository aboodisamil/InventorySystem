<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            'contact_person' => 'required|unique:suppliers,contact_person,'.$this->id,
            'supplier' => 'required|unique:suppliers,supplier,'.$this->id,
            'phone' => 'required|numeric|unique:suppliers,phone,'.$this->id,
            'categories' => 'required|array|min:1'
        ];
    }
    public function messages()
    {
        return [

            'contact_person.required' => 'حقل اسم المورد مطلوب',
            'contact_person.unique' => 'اسم المورد مستخدم من مسبقاً',

            'supplier.required' => 'حقل اسم شركة التوريد مطلوب',
            'supplier.unique' => 'اسم شركة التوريد مدخل مسبقاً',

            'phone.required' => 'حقل رقم التواصل مطلوب',
            'phone.unique' => 'حقل رقم التواصل مستخدم مسبقاً',
            'phone.numeric' => ' ادخل رقم بدلاً من نصوص في حقل رقم التواصل',

            'categories.required' => 'اختر قسم واحد على الاقل',
        ];
    }
}
