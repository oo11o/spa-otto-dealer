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
    $res = \App\Models\Customer::find(3813)->orders()->orderByDesc('doc_date')->get();
   // $res = \App\Models\Order::where('customer_id','b001298')->get();
    return view('index');

});
