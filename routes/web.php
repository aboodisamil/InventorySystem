<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false, 'reset' => fALse]);

Route::get('home', 'HomeController@index')->name('home');

Route::prefix('dashboard')
    ->name('dashboard.')
    ->middleware('auth')
    ->group(function () {

        ///////////////////////////////////////////////////////////////////////
        Route::resource('category', 'CategoryController');
        Route::post('updateStatus/{id}', 'CategoryController@updateStatus')->name('updateStatus');
        Route::get('getCategories', 'CategoryController@getCategories')->name('getCategories');
        //////////////////////////////////////////////////////////////////////
        ///
        ///
        /// ////////////////////////////////////////////////////////////////////
        Route::resource('role', 'RoleController');
        ////////////////////////////////////////////////////////////////////////
        Route::resource('user', 'UserController');
        ////////////////////////////////////////////////////////////////////////
        Route::resource('supplier', 'SupplierController');
        ////////////////////////////////////////////////////////////////////////
        Route::resource('location', 'ProductLocationController');
        //////////////////////////////////////////////////////////////////////
        Route::resource('store', 'StoreController');
        //////////////////////////////////////////////////////////////////

        Route::resource('unit', 'UnitController');
        //////////////////////////////////////////////////////////////////////
        Route::resource('import', 'ImportController');
        Route::post('selectAjax', 'ImportController@select');
        //////////////////////////////////////////////////////////////////////

        Route::get('getData', 'UnitController@getData')->name('getData');
        Route::get('getUnit', 'UnitController@getUnit')->name('getUnit');
        Route::post('updateUnitStatus/{id}', 'UnitController@updateUnitStatus')->name('updateUnitStatus');

        //////////////////////////////////////////////////////////////////////
        Route::resource('product', 'ProductController');
        Route::get('deleteproduct/{id}', 'ProductController@destroy')->name('deleteproduct');
        Route::get('exportExcel', 'productController@exportExcel')->name('exportExcel');

        //////////////////////////////////////////////////////////////////////////////////
        ///
        Route::resource('export', 'ExportController');
        Route::get('order/suspend', 'ExportController@suspendOrder')->name('order.suspend');
        Route::post('order/suspendedit/{id}', 'ExportController@updateSuspendOrder');
        Route::get('order/notComplete-Order', 'ExportController@notCompleteOrder')->name('order.not-complete-order');
        Route::get('order/show-Not-Complete-Order/{id}', 'ExportController@showNotCompleteOrder')->name('order.show-not-complete-order');
        Route::post('order/update-not-complete-order/{id}', 'ExportController@updateNotCompleteOrder')->name('order.update-not-complete-order');
        Route::get('order/complete-Order', 'ExportController@completeOrder')->name('order.complete-order');

        ////////////////////////////////////////////////////////////////////////////////////
        Route::get('importExcel', 'ImportController@exportExcel')->name('importExcel');
        ////////////////////////////////////////////////////////////////////////////////////

        Route::resource('customer', 'CustomerController');
        Route::get('customer/order/{id}', 'CustomerController@get_customer_order');

        ////////////////////////////////////////
        Route::get('order/invoice/{id}','ExportController@order_invoice')->name('order.invoice');

    });

