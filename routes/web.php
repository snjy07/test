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

require __DIR__.'/web-front.php';


// Auth::routes();


/************** Admin Panel Routes ********************/
Route::group(['prefix' => 'administrator','namespace' => 'Admin','middleware' => ['web','api']], function () {
    
    // admin default page
    Route::view('/', 'admin/dashboard')->name('admin.dashboard');
    
    // product routes
    Route::get('products/confirm-delete/{id}', 'ProductController@confirmDestroy')->name('admin.products.confirmDelete');
    Route::name('admin')->resource('products','ProductController'); 

    // customers routes
    Route::get('customers/confirm-delete/{id}', 'CustomerController@confirmDestroy')->name('admin.customers.confirmDelete');
    Route::name('admin')->resource('customers','CustomerController'); 

    // orders routes
    // Route::get('orders/confirm-delete/{id}', 'OrderController@confirmDestroy')->name('admin.orders.confirmDelete');
    Route::name('admin')->resource('orders','OrderController'); 

    
    Route::match(['get','post'],'/updateBag', 'OrderController@updateBag')->name('updateBag');


});