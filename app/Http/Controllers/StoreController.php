<?php

namespace App\Http\Controllers;

use App\Category;
use App\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    public function index()
    {
        $stores = Store::whenSearch(request()->search)->whenStatusSearch(\request()->status)->get();
        return view('dashboard.store.index', compact('stores'));
    }


    public function create()
    {
        $category = Category::selection();
        return view('dashboard.store.create', compact('category'));

    }


    public function store(Request $request)
    {

        try {

            $store = Store::create([
                'name' => $request->name,
                'address' => $request->address,
                'rental_date' => $request->rental_date,
                'duration_of_the_rental' => $request->duration_of_the_rental,
                'rental_salary' => $request->rental_salary,
                'status' => 1,
            ]);

            $store->categories()->attach($request->categories);
            session()->flash('success', 'تم اضافة معلومات المخزن بنجاح');
            return redirect()->route('dashboard.store.index');

        } catch (\Exception $exception) {
            session()->flash('success', 'هنالك بعض الاخطاء . يرجى التأكد من المعلومات المدخلة');
            return redirect()->back();
        }


    }


    public function show(Store $store)
    {

        try{

            if (! $store)
            {
                session()->flash('success', 'معلومات هذا المخزن غير متوفرة');

                return redirect()->back();
            }

            return view('dashboard.store.show', compact('store'));

        }

        catch (\Exception $exception)
        {
            session()->flash('success', 'هنالك بعض الاخطاء . يرجى التأكد من المعلومات المدخلة');
            return redirect()->back();
        }

    }

    public function edit(Store $store)
    {
        $category = Category::selection();
        $stores=Store::all();
        return view('dashboard.store.edit', compact('category', 'store','stores'));

    }

    public function update(Request $request, Store $store)
    {
     try
     {
         if (! $store)
         {
             session()->flash('success', 'معلومات هذا المخزن غير متوفرة');

             return redirect()->back();
         }
         $store->update([
             'name' => $request->name,
             'address' => $request->address,
             'rental_date' => $request->rental_date,
             'duration_of_the_rental' => $request->duration_of_the_rental,
             'rental_salary' => $request->rental_salary,
             'status' => $request->status,

         ]);
         $store->categories()->sync($request->categories);

         session()->flash('success', 'تم تعديل معلومات المخزن بنجاح');

         return redirect()->route('dashboard.store.index');

     } catch (\Exception $exception)
     {
         session()->flash('success', 'هنالك بعض الاخطاء . يرجى التأكد من المعلومات المدخلة');
         return redirect()->back();
     }


    }

    public function destroy(Store $store)
    {
        if ($store)
        {
            session()->flash('success', 'معلومات هذا المخزن غير متوفرة');

            return redirect()->back();

        }
        $store->delete();
        return redirect()->route('dashboard.store.index');

    }
}
