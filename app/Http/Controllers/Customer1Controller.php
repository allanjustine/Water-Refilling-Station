<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class Customer1Controller extends Controller
{

    public function municipality()
    {
        $municipalities = User::where('type', 2)->distinct()->pluck('municipality');

        return view('municipal', compact('municipalities'));
    }

    public function products($municipality)
    {
        $user = User::where('municipality', $municipality)->first();
        $usersWithMunicipality = User::where('municipality', $municipality)->get();
        $products = Product::whereIn('user_id', $usersWithMunicipality->pluck('id'))->get();

        return view('product', compact('products', 'user'));
    }

    public function renewal()
    {
        return view('renew');
    }

    public function renewalSubmit(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'subscription_type' => ['required']
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Email not found');
        } else {
            $user->update([
                'type' => 3,
                'subscription_type' => $request->subscription_type,
                'created_at' => now(),
            ]);

            $user->created_at = now();
            $user->save();

            return redirect('/login')->with('loginM', 'Your renewal request was sent. Please wait for the admins\' approval');
        }
    }

}
