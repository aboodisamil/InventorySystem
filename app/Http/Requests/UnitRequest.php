<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitRequest extends FormRequest
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
            'unit' => 'required|unique:units,unit,'.$this->id

        ];
    }

    public function messages()
    {
        return
            [
                'unit.required'=>'هذا الحقل مطلوب' ,
                'unit.unique'=>'هذا الاسم مستخدم مسبقاً' ,
            ];
    }
}
