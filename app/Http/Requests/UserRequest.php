<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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

    public function rules()
    {
        return [
            'name' => 'required|unique:users,name,'.$this->id,
            'address' => 'required',
            'email' => 'unique:users,email',
            'phone' => 'numeric|required|unique:users,email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'role' => 'required|min:1',
        ];
    }

    public function messages()
    {
        return [

            'name.required' => 'حقل الاسم  مطلوب',
            'name.unique' => 'حقل الاسم كاملاً مستخدم مسبقاً',
            'address.required' => 'حقل العنوان  مطلوب',
            'email.unique' => 'حقل البريد الالكتروني مستخدم مسبقاً',
            'phone.required' => 'حقل رقم التواصل  مطلوب',
            'phone.unique' => 'حقل رقم التواصل مستخدم مسبقا',
            'phone.numeric' => 'حقل رقم التواصل يجب ان يكون ارقام',
            'password.required' => 'حقل كلمة السر  مطلوب',
            'password.confirmed' => 'كلمة التأكيد غير متطابقة',
            'password_confirmation.required' => 'حقل كلمة السر للتأكيد  مطلوب',
            'role.required' => 'اختر نوع الوظيفة',
        ];
    }
}
