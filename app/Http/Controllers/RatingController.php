<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function submitRating(Request $request, $id)
    {
        $order = Order::find($id);

        if ($order) {
            $request->validate([
                'user_rate' => 'required'
            ]);
            $rate = Rating::create([
                'user_id' => $request->user_id,
                'order_id' => $request->order_id,
                'product_id' => $request->product_id,
                'user_rate' => $request->user_rate,
                'feedback' => $request->feedback,
            ]);

            return back()->with('order', 'Successfully send a rating ' . $rate->user_rate . ' stars.');
        } else {
            return back()->with('orderError', 'Order not found.');
        }
    }
}
