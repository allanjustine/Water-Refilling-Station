<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderStatusController extends Controller
{
    public function index($status)
    {
        $user = auth()->user();

        $orders = Order::where('status', $status)
        ->whereIn('product_id', $user->products->pluck('id'))
        ->paginate(5);

        return view('subscribers.order_status', compact('orders', 'status'));
    }


}
