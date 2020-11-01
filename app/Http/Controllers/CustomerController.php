<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Export;
use App\Http\Requests\CustomerRequest;
use App\Import;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $customer = Customer::with('orders')->withCount('orders');

            if ($request->input('query.generalSearch'))
                $customer->where('name', 'like', '%' . $request->input('query.generalSearch') . '%');
            $data = $customer->paginate($request->input('pagination.perpage'), ['*'], 'page', $request->input('pagination.page'));

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
        $order = Export::all();

        return view('dashboard.customer.index', compact('order'));
    }

    public function create()
    {
        return view('dashboard.customer.create');

    }

    public function store(CustomerRequest $request)
    {

        $customer = Customer::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);


        session()->flash('success', 'تم اضافة الزبون بنجاح');

        return redirect()->route('dashboard.customer.index');

    }

    public function show($id)
    {
        $customer = Customer::find($id);
        return view('dashboard.customer.profile', compact('customer'));

    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('dashboard.customer.edit', compact('customer'));
    }

    public function update(CustomerRequest $request, Customer $customer)
    {
        $customer->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('dashboard.customer.index');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
    }

    public function get_customer_order($id)
    {
        if (\request()->ajax()) {


            $export = Export::with( ['customer','user' , 'imports'=>function($q){
                return $q->with('product');
            }]  )->where('id' , \request()->export_id)->where('customer_id' , \request()->id)->get();
            return response()->json([
                'status' => true ,
                'data'=> $export ,
            ]);

        }


    }
}
