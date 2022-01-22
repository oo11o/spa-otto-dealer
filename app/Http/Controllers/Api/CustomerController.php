<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return  Customer::paginate(15);
    }

    public function show($id){
     // return Customer::find($id)->orders()->orderByDesc('doc_date')->get();
        return new CustomerResource(Customer::with('orders')->find($id));
    }
}
