<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Events\OrderReceivedeNoty;
use App\Export;
use App\ExportImports;
use App\ExportProduct;
use App\Import;
use App\Product;
use App\Store;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ExportController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $export = Export::with('imports')->with('customer')->with('user');
            if ($request->input('sort.field') && in_array($request->input('sort.field'), ['customer_id', 'user_id', 'dateTime', 'notes', 'status']))
                $export->orderBy($request->input('sort.field'), $request->input('sort.sort'));
            if ($request->input('query.status'))
                $export->where('status', $request->input('query.status'))->with('customer')->select('customer_id', 'user_id', 'dateTime', 'notes', 'status');

            if ($request->input('query.generalSearch')) {
                $export->whereHas('customer', function ($q) {
                    $q->where('name', 'like', '%' . \request('query.generalSearch') . '%');
                });
            }
            $data = $export->paginate($request->input('pagination.perpage'), ['*'], 'page', $request->input('pagination.page'));
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
        $customer = Customer::all();
        return view('dashboard.export.index', compact('customer'));
    }


    public function create()
    {


        if (\request()->ajax()) {
            if (\request()->id) {
                $product = Product::find(\request()->id);
                return response()->json([
                    'product' => $product->price_by_piece
                ]);
            }

            if (\request()->name) {
                $customer = Customer::where('name', \request()->name)->first();
                return response()->json([
                    'status' => true,
                    'data' => $customer
                ]);

            }
        }
        $store = Store::select('id', 'name')->get();
        $products = Import::all();
        return view('dashboard.export.create', compact('products', 'store'));
    }


    public function store(Request $request)
    {
        // dd($request->all());
        //      $price=Product::whereIn('id',Arr::pluck($request->products,'import_id'))->sum('price');

        // dd($price);

//        $arr=[];
//        $quantity=Arr::pluck($request->products , 'quantity' , 'import_id');

//        foreach ($quantity as $import_id => $quantity)
//        {
//            $import=Import::find($import_id);
//            $price=$import->price_by_piece;
//           $arr[$quantity]=$price;
//        }

        ////////////////////////////////////////////////////////////////
        $result = Arr::pluck($request->products, 'quantity', 'import_id');

        $total = 0;
        foreach ($result as $import_id => $quantity) {
            $import = Import::find($import_id);
            $price = $import->price_by_piece;
            $total_price = $quantity * $price;
            $total += $total_price;
        }

        $customer = Customer::firstOrCreate(['name' => $request->input('customer.name')], $request->input('customer'));
        $order = $request->input('order');
        $order['customer_id'] = $customer->id;
        $order['total_price'] = $total;
        $export = Export::create($order);
        $products = collect($request->input('products'))->keyBy('import_id')->toArray();
        $export->imports()->attach($products);


//        $user = User::whereHas('roles', function ($q) {
//            return $q->where('name', 'المخزن');
//        })->latest()->first();
//
//        $message = 'تم اضافة طلبية جديدة';
//        event(new OrderReceivedeNoty($message  , $user));
        return redirect()->route('dashboard.export.index');

    }


    public function show($id)
    {
        $export = Export::find($id);
        $quantity = ExportImports::where('export_id', $export->id)->select('price', 'quantity')->get();
        return view('dashboard.export.show', compact('export', 'quantity'));
    }

    public function edit($id)
    {
        $order = Export::find($id);
        $store = Store::selection();
        $products = Import::selection();
        return view('dashboard.export.edit', compact('order', 'store', 'products'));
    }

    public function update(Request $request, Export $export)
    {

        $result = Arr::pluck($request->products, 'quantity', 'import_id');
        $total = 0;
        foreach ($result as $import_id => $quantity) {
            $import = Import::find($import_id);
            $price = $import->price_by_piece;
            $total_price = $quantity * $price;
            $total += $total_price;
        }

        $customer = Customer::find($request->customer['id']);
        $customer->update($request->customer);

        $order=$request->order;
        $order['customer_id']=$customer->id;
        $order['total_price']=$total;

        $export->update($order);
        $products = collect($request->input('products'))->keyBy('import_id')->toArray();
        $export->imports()->sync($products);
        return redirect()->route('dashboard.export.index');
    }


    public function destroy(Export $export)
    {

    }

    public function suspendOrder(Request $request)
    {
        if ($request->ajax()) {
            $export = Export::with('imports')->with('customer')->with('user')->select('id', 'customer_id', 'user_id', 'dateTime', 'notes', 'status')->where('status', '2');
            if ($request->input('sort.field') && in_array($request->input('sort.field'), ['customer_id', 'user_id', 'dateTime', 'notes', 'status']))
                $export->orderBy($request->input('sort.field'), $request->input('sort.sort'));
            if ($request->input('query.status'))
                $export->where('status', $request->input('query.status'))->with('customer')->select('customer_id', 'user_id', 'dateTime', 'notes', 'status');
            $data = $export->paginate($request->input('pagination.perpage'), ['*'], 'page', $request->input('pagination.page'));
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
        $customer = Customer::all();
        return view('dashboard.export.suspend', compact('customer'));
    }

    public function updateSuspendOrder($id)
    {
        $result = \request()->order;

        $order = Export::find($id);

        $actualStatus = '';
        foreach ($result as $k => $v) {
            if ($v['spent_quantity'] == $v['quantity'] && @$v['status'] == '1') {
                $actualStatus = '1';

            } elseif ($v['spent_quantity'] < $v['quantity'] && @$v['status'] == '1') {
                $actualStatus = '0';
            } else {
                $actualStatus = '2';
            }

            $order->imports()->updateExistingPivot($v['product_id'], [
                'status' => $actualStatus,
                'spent_quantity' => $v['spent_quantity'],
            ]);
        }
        $Count_success_order_Status = $order->imports()->where('status', '1')->count();
        $Count_notcompleted_order_Status = $order->imports()->where('status', '2')->count();

        $count_of_product_in_order = $order->imports()->count();
        if ($Count_success_order_Status == $count_of_product_in_order) {
            $order->update([
                'status' => '1'
            ]);
        } elseif ($Count_notcompleted_order_Status < $count_of_product_in_order) {
            $order->update([
                'status' => '0'
            ]);
        } else {
            $order->update([
                'status' => '2'
            ]);
        }
    }

    public function notCompleteOrder(Request $request)
    {
        if ($request->ajax()) {
            $order = Export::with('imports')->with('user')->with('customer')->where('status', 0);

            $data = $order->paginate($request->input('pagination.perpage'), ['*'], 'page', $request->input('pagination.page'));


            return $data = [
                'data' => $data->items(),
                'meta' => [
                    'page' => $data->currentPage(),
                    "pages" => $data->lastPage(),
                    "perpage" => $data->perPage(),
                    "total" => $data->total(),
                ]
            ];
        }
        $customer = Customer::all();

        return view('dashboard.export.notCompleteOrder', compact('customer'));
    }

    public function showNotCompleteOrder($id)
    {
        $order = Export::with(['imports' => function ($q) {
            return $q->select('imports.id', 'product_id')->where('status', 0);
        }])->find($id);

        return view('dashboard.export.showNotCompleteOrder', compact('order'));
    }

    public function updateNotCompleteOrder($id)
    {
        $order = Export::find($id);

        foreach (\request()->order as $k => $v) {
            $actualStatus = '';
            if ($v['spent_quantity'] == $v['rest_quantity'] && @$v['status'] == '1') {
                $actualStatus = '1';
            } elseif ($v['spent_quantity'] < $v['rest_quantity'] && @$v['status'] == '1') {
                $actualStatus = '0';
            } else {
                $actualStatus = '2';
            }

            $order->imports()->updateExistingPivot($v['product_id'], [ // 'import_id'
                'status' => $actualStatus,
                'spent_quantity' => $v['spent_quantity'] + $v['old_spent_quantity']
            ]);
        }

        $Count_success_order_Status = $order->imports()->where('status', '1')->count();
        $Count_notcompleted_order_Status = $order->imports()->where('status', '2')->count();

        $count_of_product_in_order = $order->imports()->count();
        if ($Count_success_order_Status == $count_of_product_in_order) {
            $order->update([
                'status' => '1'
            ]);
        } elseif ($Count_notcompleted_order_Status < $count_of_product_in_order) {
            $order->update([
                'status' => '0'
            ]);
        } else {
            $order->update([
                'status' => '2'
            ]);
        }
    }

    public function completeOrder(Request $request)
    {


        if ($request->ajax()) {
            $order = Export::with('imports')->with('user')->with('customer')->where('status', 1);

            $data = $order->paginate($request->input('pagination.perpage'), ['*'], 'page', $request->input('pagination.page'));

            return $data = [
                'data' => $data->items(),
                'meta' => [
                    'page' => $data->currentPage(),
                    "pages" => $data->lastPage(),
                    "perpage" => $data->perPage(),
                    "total" => $data->total(),
                ]
            ];
        }
        $customer = Customer::all();
        return view('dashboard.export.completeOrder', compact('customer'));
    }

    public function order_invoice($id)
    {
        $export = Export::with('imports')->find($id);

        return view('dashboard.invoice.order', compact('export'));
    }

}
