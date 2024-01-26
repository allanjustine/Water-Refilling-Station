<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function showSubscriptionForm()
    {
        return view('subscribe');
    }

    public function subscribe(Request $request)
    {
        $user = $request->user();

        $user->newSubscription('default', 'monthly')
            ->trialDays(30)
            ->create();

        // Send SMS notification
        // Implement your SMS notifier logic here

        return redirect()->route('dashboard')->with('message', 'Subscription successful!');
    }
}
