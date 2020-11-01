<?php

namespace App\Http\Controllers;

use App\Category;
use App\ProductLocation;
use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProductLocationController extends Controller
{

    public function index()
    {
        $categoires = Category::select('id' , 'name')->get();
        $locations = ProductLocation::orderBy('category_id')->get();
        return view('dashboard.productLocation.index', compact('locations', 'categoires'));
    }


    public function create()
    {
        $category = Category::all();
        $stores = Store::all();
        return view('dashboard.productLocation.create', compact('category', 'stores'));
    }


    public function store(Request $request)
    {

        $this->validate($request,
            [
                'section' => 'required',
                'subsection' => 'required',
                'shelf' => Rule::unique('product_locations', 'shelf')->where('category_id', $request->category_id),
                'category_id' => 'required',
                'store_id' => 'required',
            ]

            , $this->messages());


        $section = $request->section;
        $subsection = $request->subsection;
        $shelf = $request->shelf;

        for ($count = 0; $count < count($section); $count++) {
            $data = array(
                'section' => $section[$count],
                'subsection' => $subsection[$count],
                'shelf' => $shelf[$count],
                'category_id' => $request->category_id,
                'store_id' => $request->store_id,
            );

            $insert_data[] = $data;
        }
        DB::table('product_locations')->insert($insert_data);
//        DB::table('product_locations')->update([
//            'category_id' => $request->category_id,
//            'store_id' => $request->store_id,
//        ]);


        session()->flash('success', 'تم اضافة معلومات المكان بنجاح');

        return redirect()->route('dashboard.location.index');
    }

    public function messages()
    {
        return $messages = [
            'section.required' => 'This Is Section Filed Is required',
            'store_id.required' => 'This Is Store Filed Is required',
            'category_id.required' => 'This Is Category Filed Is required',
            'subsection.required' => 'This Is Subsection Filed Is required',
            'shelf.required' => 'This Is Shelf Filed Is required',
            'shelf.unique' => 'This Is Shelf Filed Is Taken',
        ];

    }

    public function rules()
    {
        return $rules = [
            'section' => 'required',
            'subsection' => 'required',
            'shelf' => 'required|unique:product_locations,bin',
            'category_id' => 'required',
            'store_id' => 'required',
        ];

    }

    public function show(ProductLocation $productLocation)
    {
        //
    }

    public function edit($productLocation)
    {

        $category = Category::all();
        $stores = Store::all();

        $productLocation = ProductLocation::find($productLocation);

        return view('dashboard.productLocation.edit', compact('productLocation', 'category', 'stores'));
    }

    public function update(Request $request, $id)
    {
        $productLocation = ProductLocation::find($id);

        $validate = Validator::make($request->all(),
            [
                'section' => 'required',
                'subsection' => 'required',
                'shelf' => Rule::unique('product_locations', 'shelf')->where('category_id', $request->category_id),
                'category_id' => 'required',
                'store_id' => 'required',
            ], $this->messages());

        if ($validate->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validate);
        }

        $productLocation->update([
            'section' => $request->section,
            'subsection' => $request->subsection,
            'shelf' => $request->shelf,
            'category_id' => $request->category_id,
            'store_id' => $request->store_id,
        ]);

        session()->flash('success', 'تم تعديل معلومات المكان بنجاح');

        return redirect()->route('dashboard.location.index');
    }

    public function destroy($productLocation)
    {


        ProductLocation::find($productLocation)->delete();

        session()->flash('success', 'The Location Is Deleted Successfully');
        return redirect()->back();


    }
}
