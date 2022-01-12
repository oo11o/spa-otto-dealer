<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use App\Models\TetraCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index(){
        $customer = TetraCustomer::paginate(15);

        return CustomerResource::collection($customer);
    }

    public function show($customer){
        $result = TetraCustomer::findOrFail($customer);
//        echo "<pre>";
//            print_r($result);
//        echo "</pre>";
        return new CustomerResource($result);
     //
    }
}
