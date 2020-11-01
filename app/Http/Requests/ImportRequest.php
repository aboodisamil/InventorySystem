<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportRequest extends FormRequest
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
            'category_id'=>'required',
            'product_id'=>'required' ,
            'quantity'=>'required' ,
            'num_of_box'=>'required',
            'num_of_package_in_box'=>'required',
            'num_of_Piece_in_package'=>'required',
            'price_by_package'=>'required',
            'price_by_piece'=>'required',
            'manufacturer'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'category_id.required'=>'هذا الحقل مطلوب' ,
            'product_id.required'=>'هذا الحقل مطلوب' ,
            'quantity.required'=>'هذا الحقل مطلوب' ,
            'num_of_box.required'=>'هذا الحقل مطلوب' ,
            'num_package_in_box.required'=>'هذا الحقل مطلوب' ,
            'num_of_piece_in_package.required'=>'هذا الحقل مطلوب' ,
            'price_by_package.required'=>'هذا الحقل مطلوب' ,
            'price_by_piece.required'=>'هذا الحقل مطلوب' ,
            'manufacturer.required'=>'هذا الحقل مطلوب' ,
        ];
    }
}
