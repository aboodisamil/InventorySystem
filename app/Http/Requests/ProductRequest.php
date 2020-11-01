<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'product_name' => 'required|unique:products,product_name,'.$this->id,
            'category_id' => 'required',
            'num_of_box' => 'required|numeric',
            'num_of_package_in_box' => 'required|numeric',
            'num_of_Piece_in_package' => 'required|numeric',
            'price_by_piece' =>'required|numeric',
            'price_by_package' =>'required|numeric',
            'manufacturer' => 'required',
            'unit_id' => 'required',
        ];
    }

    public function messages()
    {
        return
            [
                'product_name.required'=>'هذا الحقل مطلوب',
                'product_name.unique'=>'هذا الحقل مستخدم مسبقاً' ,
                'category_id.required'=>'هذا الحقل مطلوب',
                'num_of_box.required'=>'هذا الحقل مطلوب',
                'num_of_box.numeric'=>'هذا الحقل يجب أن يكون أرقام',
                'num_of_package_in_box.required'=>'هذا الحقل مطلوب',
                'num_of_package_in_box.numeric'=>'هذا الحقل يجب أن يكون أرقام',
                'num_of_Piece_in_package.required'=>'هذا الحقل مطلوب',
                'num_of_Piece_in_package.numeric'=>'هذا الحقل يجب أن يكون أرقام',
                'price_by_piece.required'=>'هذا الحقل مطلوب',
                'price_by_piece.numeric'=>'هذا الحقل يجب أن يكون أرقام',
                'price_by_package.required'=>'هذا الحقل مطلوب',
                'price_by_package.numeric'=>'هذا الحقل يجب أن يكون أرقام',
                'manufacturer.required'=>'هذا الحقل مطلوب',
                'unit_id.required'=>'هذا الحقل مطلوب',


            ];
    }
}
