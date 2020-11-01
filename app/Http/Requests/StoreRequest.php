<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|unique:stores,name,',$this->id,
            'address' => 'required',
            'duration_of_the_rental' => 'required',
            'rental_date' => 'required',
            'rental_salary' => 'required |numeric',
            'categories' => 'required |min:1',
        ];
    }
    public function messages()
    {
        return
            [

                'name.required' => 'حقل الاسم مطلوب للادخال',
                'name.unique' => 'هذا الاسم مستخدم مسبقاً',
                'address.required' => 'حقل العنوان مطلوب للادخال',
                'duration_of_the_rental.required' => 'حقل تاريخ نهاية الأجار مطلوب للادخال',
                'rental_date.required' => 'حقل تاريخ بداية الأجار مطلوب للادخال',
                'rental_salary.required' => 'حقل سعر الأجار مطلوب للادخال',
                'rental_salary.numeric' => 'حقل سعر الأجار يجب أن يكزن ارقام ',
                'num_of_section.required' => 'حقل عدد القواطع الرئيسية مطلوب للادخال',
                'num_of_subsection.required' => 'حقل عدد القواطع الفرعية مطلوب للادخال',
                'num_of_shelf.required' => 'حقل عدد الرفوف مطلوب للادخال',
                'num_of_section.numeric' => 'حقل عدد القواطع الرئيسية يجب ان يكون ارقام ',
                'num_of_subsection.numeric' => 'حقل عدد القواطع الفرعية يجب ان يكون ارقام',
                'num_of_shelf.numeric' => 'حقل عدد الرفوف يجب ان يكون ارقام',
                'categories.required' => 'اختر صنف واحد على الأقل',


            ];
    }
}
