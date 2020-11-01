<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Store;
use App\Unit;
use PDF;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    public function index(Request $request)
    {
        if ($request->datatable) {
            $products = Product::with('category');
            if ($request->input('query.generalSearch'))
                $products->where('product_name', 'like', '%' . $request->input('query.generalSearch') . '%');
            if ($request->input('sort.field') && in_array($request->input('sort.field'), ['id', 'product_name', 'num_of_box', 'num_of_Piece_in_package']))
                $products->orderBy($request->input('sort.field'), $request->input('sort.sort'));
            if ($request->input('query.category_id'))
                $products->where('category_id', 'like', '%' . $request->input('query.category_id') . '%');

            $data = $products->paginate($request->input('pagination.perpage') , ['*'], 'page' , $request->input('pagination.page'));
            return [
                'data' => $data->items(),
                'meta' => [
                    'page' => $data->currentPage(),
                    "pages" => $data->lastPage(),
                    "perpage" => $data->perPage(),
                    "total" => $data->total(),
                ],
            ];
        }

        $category = Category::selection();
        $products = Product:: whereSearch(request()->search)->get();
        return view('dashboard.product.index', compact('products', 'category'));

    }


    public function create()
    {
        try {
            $stores = Store::selection();
            $categories = Category::selection();
            $units = Unit::select('id', 'unit')->get();
            return view('dashboard.product.create', compact('stores', 'categories', 'units'));

        } catch (\Exception $exception) {
            session()->flash('success', 'هنالك بعض الاخطاء . يرجى التأكد من المعلومات المدخلة');
            return redirect()->back();
        }

    }


    public function store(Request $request)
    {
        $product = Product::create([
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'num_of_box' => $request->num_of_box,
            'num_of_package_in_box' => $request->num_of_package_in_box,
            'num_of_Piece_in_package' => $request->num_of_Piece_in_package,
            'price_by_piece' => $request->price_by_piece,
            'price_by_package' => $request->price_by_package,
            'manufacturer' => $request->manufacturer,
            'unit_id' => $request->unit_id,
        ]);

        $product->stores()->attach($request->store_id);
        session()->flash('success', 'تم اضافة معلومات المنتج بنجاح');
        return redirect()->route('dashboard.product.index');
    }


    public function show(Product $product)
    {
        return view('dashboard.product.show', compact('product'));
    }


    public function edit(Product $product)
    {
        try {
            if (!$product) {
                session()->flash('success', 'معلومات هذا المنتج غير متوفرة');
                return redirect()->back();
            }
            $categories = Category::selection();
            $units = Unit::select('id', 'unit')->get();
            return view('dashboard.product.edit', compact('product', 'categories', 'units'));

        } catch (\Exception $exception) {
            session()->flash('success', 'هنالك بعض الاخطاء . يرجى التأكد من المعلومات المدخلة');
            return redirect()->back();
        }

    }


    public function update(Request $request, Product $product)
    {
        try {
            if (!$product) {
                session()->flash('success', 'معلومات هذا المنتج غير متوفرة');
                return redirect()->back();
            }
            $product->update([

                'product_name' => $request->product_name,
                'category_id' => $request->category_id,
                'store_id' => $request->store_id,
                'num_of_box' => $request->num_of_box,
                'num_of_package_in_box' => $request->num_of_package_in_box,
                'num_of_Piece_in_package' => $request->num_of_Piece_in_package,
                'price_by_piece' => $request->price_by_piece,
                'price_by_package' => $request->price_by_package,
                'manufacturer' => $request->manufacturer,
                'unit_id' => $request->unit_id,
            ]);

            session()->flash('success', 'تم تعديل معلومات المنتج بنجاح');

            return redirect()->route('dashboard.product.index');

        } catch (\Exception $exception) {
            session()->flash('success', 'هنالك بعض الاخطاء . يرجى التأكد من المعلومات المدخلة');
            return redirect()->back();
        }

    }


    public function destroy($product)
    {
        $product = Product::find($product);
        $product->delete();
        session()->flash('success', 'تم حذف المنتج بنجاح');
        return redirect()->route('dashboard.product.index');

    }

    public function ExportExcel()
    {
        $data = Product::all();
        $pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->SetAuthor('شركة أضواء البشير');
        $pdf->SetTitle('عرض المنتجات');
        $pdf->SetSubject('أضواء البشير');
        $lg = Array();
        $lg['a_meta_charset'] = 'UTF-8';
        $lg['a_meta_dir'] = 'rtl';
        $lg['a_meta_language'] = 'fa';
        $lg['w_page'] = 'page';
        $pdf->setLanguageArray($lg);
        $pdf->AddPage();
        $pdf->SetFont('aealarabiya', '', 11);
        $pdf->writeHTML(view('dashboard.product.productExcel' , compact('data')), true, false, true, false, '');
        $pdf->output('product.pdf' , 'I');
        // IF YOU WANT TP DOWNLOAD
       // $pdf->output('product.pdf' , 'D');


    }


}
