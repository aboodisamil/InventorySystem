<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
           'name' => 'required|unique:categories,name,'.$this->id

        ];
    }
    public function messages()
    {
        return  [

            'name.required' => 'حقل الاسم مطلوب',
            'name.unique' => 'هذا الاسم مستخدم مسبقاً',
        ];
    }
}
