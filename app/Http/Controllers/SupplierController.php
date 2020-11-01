<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\SupplierRequest;
use App\Supplier;

class SupplierController extends Controller
{

    public function index()
    {
        $suppliers = Supplier::with('categories')->whenSearch(request()->search)->paginate(5);
        return view('dashboard.supplier.index', compact('suppliers'));
    }


    public function create()
    {
        $category = Category::selection();
        return view('dashboard.supplier.create', compact('category'));
    }


    public function store(SupplierRequest $request)
    {

        try {
            $supplier = Supplier::create([
                'contact_person' => $request->contact_person,
                'phone' => $request->phone,
                'supplier' => $request->supplier,
            ]);

            $supplier->categories()->attach($request->categories);

            session()->flash('success', 'تم اضافة معلومات المورد بنجاح');

            return redirect()->route('dashboard.supplier.index');

        } catch (\Exception $exception) {
            session()->flash('success', 'هنالك بعض الاخطاء . يرجى التأكد من المعلومات المدخلة');
            return redirect()->back();
        }
    }


    public function show(Supplier $supplier)
    {
        try {
            if (!$supplier) {
                session()->flash('success', 'معلومات هذا المورد غير متوفر');

                return redirect()->back();
            }
            $category = Category::selection();
            return view('dashboard.supplier.show', compact('supplier', 'category'));

        } catch (\Exception $exception) {
            session()->flash('success', 'هنالك بعض الاخطاء . يرجى التأكد من المعلومات المدخلة');
            return redirect()->back();
        }

    }

    public function edit(Supplier $supplier)
    {
        try {
            if (!$supplier) {
                session()->flash('success', 'معلومات هذا المورد غير متوفر');

                return redirect()->back();
            }
            $category = Category::selection();
            return view('dashboard.supplier.edit', compact('supplier', 'category'));


        } catch (\Exception $exception) {
            session()->flash('success', 'هنالك بعض الاخطاء . يرجى التأكد من المعلومات المدخلة');
            return redirect()->back();
        }

    }

    public function update(SupplierRequest $request, Supplier $supplier)
    {

        try {
            if (!$supplier) {
                session()->flash('success', 'معلومات هذا المورد غير متوفر');

                return redirect()->back();
            }

            $supplier->update([
                'contact_person' => $request->contact_person,
                'phone' => $request->phone,
                'supplier' => $request->supplier,
            ]);

            $supplier->categories()->sync($request->categories);

            session()->flash('success', 'تم تعديل معلومات المورد بنجاح');

            return redirect()->route('dashboard.supplier.index');

        } catch (\Exception $exception) {
            session()->flash('success', 'هنالك بعض الاخطاء . يرجى التأكد من المعلومات المدخلة');
            return redirect()->back();
        }


    }

    public function destroy(Supplier $supplier)
    {

        if (!$supplier) {
            session()->flash('success', 'معلومات هذا المورد غير متوفر');

            return redirect()->back();
        }

        $supplier->categories()->detach();
        $supplier->delete();
        session()->flash('success', 'تم حذف معلومات المورد بنجاح');
        return redirect()->back();
    }
}
