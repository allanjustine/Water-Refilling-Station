<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function municipality()
    {
        $municipalities = User::where('type', 2)->distinct()->pluck('municipality');

        return view('customer.muni_product', compact('municipalities'));
    }

    public function products($municipality)
    {
        $user = User::where('municipality', $municipality)->first();
        $usersWithMunicipality = User::where('municipality', $municipality)->get();
        $products = Product::whereIn('user_id', $usersWithMunicipality->pluck('id'))->get();

        return view('customer.product_details', compact('products', 'user'));
    }

    public function addToCart(Request $request, $productId)
    {

        $request->validate([
            'quantity' => 'required|integer|min:1|max:50',
        ]);

        $product = Product::findOrFail($productId);
        $quantityAdd = $request->quantity;

        // Check if the product is already in the cart
        $existingCartItem = Cart::where('user_id', auth()->id())
            ->where('product_id', $productId)
            ->first();

        if ($existingCartItem) {
            // Increment quantity if the product is already in the cart
            $existingCartItem->increment('quantity');
        } else {
            // Add a new item to the cart with the product_id
            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $productId,
                'quantity' => $quantityAdd,
            ]);
        }

        return redirect('/customer/cart')->with('order', 'Product added to cart.');
    }


    public function viewCart()
    {
        $cartItems = Cart::where('user_id', auth()->id())->get();
        $latestOrder = Order::where('user_id', auth()->id())->latest()->first();

        // Extract the attributes of the order
        $latestOrderAttributes = optional($latestOrder)->toArray();

        return view('customer.cart', compact('cartItems', 'latestOrderAttributes'));
    }


    public function removeFromCart($cartItemId)
    {
        $cartItem = Cart::findOrFail($cartItemId);

        // Check if there is an associated order and it's not approved
        if ($cartItem->order && $cartItem->order->status !== 'approved') {
            return redirect('/customer/cart')->with('error', 'Cannot remove item. Order approval pending.');
        }

        $cartItem->delete();

        return redirect('/customer/cart')->with('order', 'Product removed from cart.');
    }

    public function buy(Request $request)
    {
        // Validate the request if needed

        // Create a new order with a pending status

        $order = new Order();
        $order->user_id = auth()->user()->id; // Assuming you have a user_id in your orders table
        $order->product_id = $request->input('product_id');
        $order->payment_method = $request->input('payment_method');
        $order->order_quantity = $request->input('order_quantity'); // Add this line to capture the product_id
        $order->status = 'pending'; // Add this line to set the status to pending
        $order->save();

        // If the order doesn't require admin approval, clear the user's cart

        Cart::where('user_id', auth()->user()->id)->delete();

        // Redirect to the confirmation page with the order ID
        return redirect('/customer/my-orders')->with('order', 'Ordered successfully');
    }


    public function purchaseConfirmation($id)
    {
        // Add debugging statement
        $order = Order::findOrFail($id);

        return view('customer.purchase_confirmation', compact('order'));
    }
    public function purchaseDelete($id)
    {
        // Add debugging statement
        $order = Order::findOrFail($id);

        if(!$order)
        {
            return back()->with('error', 'No order founded');
        } else {
            $order->delete();
        }

        return redirect('/customer/my-orders')->with('order', 'Order ID: ' . $order->id . ' deleted successfully');
    }

    public function myOrders()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();

        return view('customer.my-orders', compact('orders'));
    }






    private function adminApprovalRequired(Order $order)
    {
        // Implement your logic to determine if admin approval is required
        // For example, check order total, specific products, etc.
        // For simplicity, let's assume admin approval is required for all orders.
        return true;
    }



    //////////////////APROVE ORDER
    public function acknowledgeWater($orderId)
    {
        $order = Order::findOrFail($orderId);

        // Ensure the authenticated user owns the order
        if (Auth::user()->id !== $order->user_id) {
            abort(403, 'Unauthorized action.');
        }

        // Perform any additional logic for acknowledging water
        // For example, send a notification, update the order status, etc.

        // Update the order status to acknowledged
        $order->update(['status' => 'acknowledged']);

        // Optionally, you can clear the cart or perform other actions

        return redirect('/customer/purchase-confirmation/' . $order->id)->with('message', 'Water Acknowledged successfully');
    }





}
