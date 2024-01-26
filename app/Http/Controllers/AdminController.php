<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Invoice;
use App\Models\CartItem;
use App\Models\Cart;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\OrderController;




class AdminController extends Controller
{
    public function manageProducts()
    {
        $products = Product::all();

        return view('subscribers.manage_products', compact('products'));
    }

    public function createProduct()
    {
        // Implement logic to display the product creation form
        return view('subscribers.create_product');
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            // your validation rules here
        ]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->product_quantity = $request->input('product_quantity');
        // other fields

        // Associate the product with the authenticated user
        $product->user_id = auth()->user()->id;

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('products', 'public');
            $product->image = $path;
        }

        $product->save();

        return redirect('/subscribers/products')->with('message', 'Product created successfully');
    }


    public function editProduct($id)
    {
        $product = Product::findOrFail($id);

        $this->authorize('update', $product);

        return view('subscribers.edit_product', compact('product'));
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Check if the authenticated user owns the product
        if ($product->user_id != auth()->user()->id) {
            abort(403, 'Unauthorized action.');
        }

        $product->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'product_quantity' => $request->input('product_quantity'),
            // Add more fields as needed
        ]);

        return redirect('/subscribers/products')->with('message', 'Product updated successfully.');
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);

        $this->authorize('delete', $product);

        // Delete related orders
        $product->orders()->delete();

        // Delete the product
        $product->delete();

        return redirect('/subscribers/products')->with('message', 'Product deleted successfully');
    }


    ///////APROVE ORDER///

    public function viewOrdersForApproval()
    {
        // Retrieve orders where the associated product is owned by the authenticated user
        $orders = Order::where('status', 'pending')
            ->whereHas('product', function ($query) {
                // Assuming there is a 'user_id' column in the products table
                $query->where('user_id', auth()->user()->id);
            })
            ->get();

        return view('subscribers.view_orders_for_approval', compact('orders'));
    }

    public function approval(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return back()->with('error', 'No subscribers founded');
        } else {

            $user->update([
                'type'      =>       2,
                'created_at'    =>  now(),
                'billings'       =>      $request->billings
            ]);
            $user->created_at = now();
            $user->save();
        }

        return back()->with('admin', $user->email . ' Subscriber approved!');
    }

    public function disable($id)
    {
        $user = User::find($id);

        if (!$user) {
            return back()->with('error', 'No subscribers founded');
        } else {
            $user->update([
                'type'      =>       4,
                'created_at'    =>  now(),
                'billings'      =>     0
            ]);
            $user->created_at = now();
            $user->save();
        }

        return back()->with('admin', $user->email . ' Subscriber disabled!');
    }

    public function enable(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return back()->with('error', 'No subscribers founded');
        } else {
            $user->update([
                'type'      =>       2,
                'created_at'    =>  now(),
                'billings'       =>      $request->billings
            ]);
            $user->created_at = now();
            $user->save();
        }

        return back()->with('admin', $user->email . ' Subscriber enabled!');
    }

    public function createInvoice(Request $request)
    {
        $request->validate([
            'invoice_no'              =>          ['numeric', 'required', 'min:1', 'unique:invoices,invoice_no'],
            'invoice_due_date'        =>          ['required', 'date', 'after_or_equal:today'],
            'invoice_discount'        =>          ['numeric', 'required', 'min:0', 'max:100'],
            'status'                  =>          ['required'],
        ]);

        $user = Invoice::create([
            'invoice_no'                  =>          $request->invoice_no,
            'invoice_due_date'            =>          $request->invoice_due_date,
            'invoice_total'               =>          $request->invoice_total,
            'invoice_discount'            =>          $request->invoice_discount,
            'status'                      =>          $request->status,
            'user_id'                     =>          $request->user_id,
        ]);

        return back()->with('admin', 'Successfully sent an Invoice to ' . $user->email);
    }


    public function updateOrderStatus(Order $order, $status)
    {
        // Assuming 'status' is a field in your 'orders' table
        $order->status = $status;
        // $order->approved = true; // Assuming you have an 'approved' field

        // Save the changes to the order
        $order->save();
    }


    public function approveOrder($orderId)
    {
        $order = Order::find($orderId);

        if ($order->product) {
            if ($order->product->product_quantity == 0) {

                return back()->with('error', 'No available products. Please select another one.');
            } else {
                if ($order->product->product_quantity < $order->order_quantity) {
                    return back()->with('error', 'You can`t approve this order because you only have ' . $order->product->product_quantity . ' JUGS remaining and customer order is ' . $order->order_quantity);
                } else {
                    // Handle the case where there isn't enough quantity (e.g., mark product as out of stock)
                    $this->updateOrderStatus($order, 'On Process');
                }
                $order->product->decrement('product_quantity', $order->order_quantity);
            }
        } else {
            return back()->with('error', 'Product not found. Please try again.');
        }



        $order->save();

        // Redirect to the corresponding status page
        return redirect('/subscribers/orders')->with('approve', 'Order approved successfully with product ID ' . $order->product->id);
    }


    public function verifyOrder(Request $request, Product $product, $id)
    {
        $order = Order::find($id);

        if (!$order) {
            return back()->with('error', 'No Order available');
        } else {
            $order->update([
                'status'        =>      $request->status,
                'jug_status'        =>      $request->jug_status,
                'created_at'        =>      now()
            ]);

            $order->created_at = now();

            $order->save();
        }

        if ($request->jug_status == 'Return') {
            $product->increment('product_quantity', $request->order_quantity);
        }

        return redirect('/subscribers/orders')->with('approve', 'Order verified successfully as ' . $order->status . ' Jug Status ' . $order->jug_status);
    }

    // public function sendSms(Request $request)
    // {
    //     $userPhoneNumber = $request->user()->phone;

    //     $formattedPhoneNumber = '+63' . $userPhoneNumber;

    //     $message = "Hello, this is a test SMS from your Laravel app!";

    //     $twilioPhoneNumber = config('services.twilio.phone_number');

    //     $this->sendTwilioSms($formattedPhoneNumber, $message, $twilioPhoneNumber);

    //     return back()->with('sms_sent', true);
    // }

    // private function sendTwilioSms($to, $message, $from)
    // {
    //     $twilioSid = config('services.twilio.sid');
    //     $twilioToken = config('services.twilio.token');

    //     $twilio = new Client($twilioSid, $twilioToken);

    //     $twilio->messages
    //         ->create($to, [
    //             "from" => $from,
    //             "body" => $message,
    //         ]);
    // }
}
