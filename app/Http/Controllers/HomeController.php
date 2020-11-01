<?php

namespace App\Http\Controllers;

use App\Category;
use App\Customer;
use App\Export;
use App\Import;
use App\Product;
use App\Role;
use App\Store;
use App\Supplier;
use App\User;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users=User::count();
        $roles=Role::count();
        $categories=Category::count();
        $suppliers=Supplier::count();
        $stores=Store::count();
        $products=Product::count();
        $imports=Import::count();
        $exports=Export::count();
        $customers=Customer::count();
        return view('dashboard.home' ,
            compact('users' , 'categories' , 'suppliers' , 'stores' , 'products' , 'imports' , 'exports' , 'customers' , 'roles'));
    }
}
