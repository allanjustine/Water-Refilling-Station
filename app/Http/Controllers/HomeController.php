<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\models\Student;
use App\models\User;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Invoice;
use App\Models\Order;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function customerHome()
    {
        return view('customer.home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $userCount = User::count();
        $totalProducts = Product::count();

        return view('admin.home', compact('userCount', 'totalProducts'));
    }

    public function AllUsers()
    {
        $allusers = User::where('type', false)->get();
        return view('admin.allusers', compact('allusers'));
    }
    public function AllSubscribers()
    {

        $allsubscribers = User::whereIn('type', [3, 2, 4])->get();

        $subscriberData = [];

        foreach ($allsubscribers as $subscriber) {
            if ($subscriber->subscription_type === '1_month') {
                $expirationDate = Carbon::parse($subscriber->created_at)->addMonth();
            } elseif ($subscriber->subscription_type === '1_year') {
                $expirationDate = Carbon::parse($subscriber->created_at)->addYear();
            } else {
                $expirationDate = null;
            }

            if ($expirationDate && $expirationDate->isFuture()) {
                $expirationRemaining = now()->diffInDays($expirationDate);
            } else {
                $expirationRemaining = 0;
            }

            $subscriberData[] = [
                'user' => $subscriber,
                'expirationRemaining' => $expirationRemaining,
            ];
        }
        return view('admin.allsubscribers', compact('subscriberData'));
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function mySettings($id)
    {
        $user = User::find($id);

        return view('subscribers.settings', compact('user'));
    }

    public function updateSettings(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'station'           =>          ['required']
        ]);

        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            $imagePath = $request->file('avatar')->store('images/pictures', 'public');
        } else {
            $imagePath = $user->avatar;
        }

        $user->update([
            'station'        =>          $request->station,
            'avatar'        =>          $imagePath
        ]);

        return back()->with('settingsUpdate', 'Settings Updated successfully');
    }

    public function subscriberInfo($id)
    {
        $user = User::find($id);

        $subscriberInvoices = Invoice::where('user_id', $user->id)->get();

        return view('admin.subscriber_info', compact('subscriberInvoices', 'user'));
    }

    public function subscriberPaid(Request $request, $id)
    {
        $invoice = Invoice::find($id);

        $invoice->update([
            'invoice_discount'      =>          $request->invoice_discount,
            'status'                =>          $request->status
        ]);

        return back()->with('invoice', $invoice->user->name . ' Updated Successfully');
    }

    public function subscribersHome()
    {
        $user = auth()->user();

        $invoices = Invoice::where('user_id', $user->id)->get();

        $daysUntilExpiration1Month = now()->diffInDays($user->created_at->addMonth());
        $daysUntilExpiration1Year = now()->diffInDays($user->created_at->addYear());


        $borrow = Order::where('jug_status', 'Borrow')
            ->whereIn('product_id', $user->products->pluck('id'))
            ->sum('order_quantity');
        $sold = Order::where('jug_status', 'Sold')
            ->whereIn('product_id', $user->products->pluck('id'))
            ->sum('order_quantity');

        $totalSales = Order::where('status', 'Paid')
            ->whereIn('product_id', $user->products->pluck('id'))
            ->get()
            ->sum(function ($order) {
                return $order->product->price * $order->order_quantity;
            });

        $today = now()->toDateString();

        $todaySales = Order::where('status', 'Paid')
            ->whereIn('product_id', $user->products->pluck('id'))
            ->whereDate('created_at', $today)
            ->get()
            ->sum(function ($order) {
                return $order->product->price * $order->order_quantity;
            });

        $now = now();

        $monthlySales = Order::where('status', 'Paid')
            ->whereIn('product_id', $user->products->pluck('id'))
            ->whereYear('created_at', $now->year)
            ->whereMonth('created_at', $now->month)
            ->get()
            ->sum(function ($order) {
                return $order->product->price * $order->order_quantity;
            });


        return view('subscribers.home', compact('user', 'daysUntilExpiration1Month', 'daysUntilExpiration1Year', 'borrow', 'sold', 'totalSales', 'todaySales', 'monthlySales', 'invoices'));
    }

    /** Delete */
    public function delete($id)
    {
        $data = User::find($id);

        $data->delete();

        return redirect()->back();
    }

    //Edit
    public function update_view($id)
    {

        $data = User::find($id);

        return view('admin.update_page', compact('data'));
    }

    // AdminController.php

    public function approval()
    {
        return view('admin.approval'); // Replace with the actual view name
    }
}
