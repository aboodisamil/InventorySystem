<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExportRequest extends FormRequest
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
            'order.stor_id'=>'required' ,
            'order.customer_id'=>'required' ,
            'order.user_id'=>'required' ,
            'order.dateTime'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'store_id.required'=>'هذا الجقل مطلوب',
            'customer_id.required'=>'هذا الجقل مطلوب',
            'user_id.required'=>'هذا الجقل مطلوب',
            'dateTime.required'=>'هذا الجقل مطلوب',
        ];
    }
}
