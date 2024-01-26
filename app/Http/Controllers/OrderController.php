<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function orderStatus(Order $order)
    {
        return view('subscribers.order_status', compact('order'));
    }


}
