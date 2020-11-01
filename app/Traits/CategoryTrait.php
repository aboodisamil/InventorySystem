<?

namespace App\Traits;

Trait CategoryTrait
{
    public function rules()
    {
        return $rules =
            [
                'name' => 'required | unique:categories,name'

            ];
    }

    public function messages()
    {
        return $messages =
            [
                'name.required' => 'This Name Is Required',
                'name.unique' => 'This is Name Used , Please Enter Another Name',

            ];


    }

}