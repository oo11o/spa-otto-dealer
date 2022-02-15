<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('customers','App\Http\Controllers\Api\CustomerController@index');
Route::get('customers/{customer}','App\Http\Controllers\Api\CustomerController@show');

Route::get('orders','App\Http\Controllers\Api\OrderController@index');
Route::get('orders/{id}','App\Http\Controllers\Api\OrderController@show');

Route::get('status','App\Http\Controllers\Api\StatusController@index');

Route::post('auth','\App\Http\Controllers\Api\UserValidateController@index');

