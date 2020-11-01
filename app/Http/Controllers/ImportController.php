<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ImportRequest;
use App\Import;
use App\Product;
use Illuminate\Http\Request;
use TCPDF;

class ImportController extends Controller
{

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $imports = Import::with('product');
            if ($request->input('sort.field') && in_array($request->input('sort.field'), ['id', 'product_id', 'quantity', 'num_of_box', 'num_of_Piece_in_package', 'category_id']))
                $imports->orderBy($request->input('sort.field'), $request->input('sort.sort'));
            if ($request->input('query.generalSearch')) {
                $imports->whereHas('product', function ($q) {
                    return $q->where('product_name', 'like', '%' . \request()->input('query.generalSearch') . '%');
                });
            }
            if ($request->input('query.category_id')) {
                $imports = Import::where('category_id', $request->input('query.category_id'))
                    ->with('product')->select('id', 'product_id', 'quantity', 'num_of_box', 'num_of_package_in_box', 'num_of_Piece_in_package', 'price_by_piece', 'price_by_package')->get();
                return response()->json(['data' => $imports]);
            }
            if ($request->category_id) {
                $product = Product::with('unit')->where('category_id', $request->category_id)->get();
                return response()->json(['data' => $product]);
            }
            $data = $imports->paginate(10);

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
        $imports = Import::all();
        $categories = Category::select('id', 'name')->get();
        return view('dashboard.import.index', compact('imports', 'categories'));
    }


    public function create()
    {
    }

    public function store(ImportRequest $request)
    {
        Import::create([
            'category_id' => $request->category_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'num_of_box' => $request->num_of_box,
            'num_of_package_in_box' => $request->num_of_package_in_box,
            'num_of_Piece_in_package' => $request->num_of_Piece_in_package,
            'price_by_package' => $request->price_by_package,
            'price_by_piece' => $request->price_by_piece,
            'manufacturer' => $request->manufacturer,
            'unit_id' => $request->unit_id
        ]);
        session()->flash('success', 'تم اضافة معلومات التوريد بنجاح');

        return response()->json(
            [
                'status' => true,
                'message' => 'تم اضافة معلومات التوريد بنجاح'
            ]);
    }

    public function show($id)
    {
        $import = Import::find($id);
        $categories = Category::selection();
        $products = Product::all();
        return view('dashboard.import.show', compact('import', 'categories', 'products'));
    }

    public function edit($id)
    {
        if (\request()->ajax()) {
            if (\request()->has('id')) {
                $import = Import::find(\request()->id);

                return response()->json([
                    'status' => true,
                    'data' => $import
                ]);
            }
        }
    }

    public function update(Request $request, $id)
    {
        $import = Import::find($id);
        $import->update([
            'quantity' => $request->quantity,
            'num_of_box' => $request->num_of_box,
            'num_of_package_in_box' => $request->num_of_package_in_box,
            'price_by_package' => $request->price_by_package,
            'price_by_piece' => $request->price_by_piece,
            'manufacturer' => $request->manufacturer,
        ]);

        return redirect()->back();

    }

    public function destroy($id)
    {
        $import = Import::find($id);
        $import->delete();
        return redirect()->back();
    }


    public function exportExcel()
    {
        $data = Import::selection('category');
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetAuthor('شركة أضواء البشير');
        $pdf->SetTitle('عرض المنتجات');
        $pdf->SetSubject('أضواء البشير');
        $lg = array();
        $lg['a_meta_charset'] = 'UTF-8';
        $lg['a_meta_dir'] = 'rtl';
        $lg['a_meta_language'] = 'fa';
        $lg['w_page'] = 'page';
        $pdf->setLanguageArray($lg);
        $pdf->AddPage();
        $pdf->SetFont('aealarabiya', '', 11);
        $pdf->writeHTML(view('dashboard.import.importExcel', compact('data')), true, false, true, false, '');
        $pdf->output('product.pdf', 'I');
    }

}
