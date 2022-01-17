<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderRow;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
       // return Order::with('order_row')->orderByDesc('dt')->paginate(15);

        return Order::with('order_row')->find('362833521');
    }

    public function show(){
        return $this->belongsTo(OrderRow::class);
    }
}
