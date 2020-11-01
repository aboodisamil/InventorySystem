<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Request;

class CategoryController extends Controller
{


    public function index()
    {
        $categories = Category::whereSearch(request()->search)->paginate(5);
        return view('dashboard.category.index', compact('categories'));
    }


    public function create()
    {
        return view('dashboard.category.create');
    }

    public function store(CategoryRequest $request)
    {

        try {

            $category = Category::create(['name' => $request->name, 'status' => 1]);
            session()->flash('success', 'تم اضافة القسم بنجاح');
            return redirect()->route('dashboard.category.index');
        } catch (\Exception $exception) {
            session()->flash('success', 'هنالك بعض الاخطاء . يرجى التأكد من المعلومات المدخلة');
            return redirect()->back();

        }

    }


    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        if (!$category) {
            session()->flash('success', 'معلومات هذا الصنف غير متوفرة');
            return redirect()->back();
        }
        return view('dashboard.category.edit', compact('category'));

    }

    public function update(CategoryRequest $request, Category $category)
    {
        try {
            if (!$category) {
                session()->flash('success', 'هنالك بعض الاخطاء . يرجى التأكد من المعلومات المدخلة');
                return redirect()->back();
            }

            $category->update(['name' => $request->name]);
            session()->flash('success', 'تم تعديل معلومات القسم بنجاح');
            return redirect()->route('dashboard.category.index');

        } catch (\Exception $exception) {
            return redirect()->back();
        }

    }

    public function destroy(Category $category)
    {
        try {
            if (!$category) {
                session()->flash('success', 'معلومات هذا الصنف غير متوفرة');
                return redirect()->back();
            }

            $category->delete();
            session()->flash('success', 'تم حذف القسم بنجاح');
            return redirect()->back();
        } catch (\Exception $exception) {

            return redirect()->back();
        }

    }

    public function updateStatus($id)
    {

        if (Request::ajax())
        {
            if (\request()->status =="1")
            {
                $category = Category::find($id);
                $category->update(['status' => 1]);
            }
            else
                {
                    $category = Category::find($id);
                    $category->update(['status' => 0]);

                }

        }

    }
}
