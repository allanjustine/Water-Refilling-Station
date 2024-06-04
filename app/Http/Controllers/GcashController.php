<?php

namespace App\Http\Controllers;

use App\Models\GcashDetail;
use Illuminate\Http\Request;

class GcashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = GcashDetail::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        return view('subscribers.gcash-info', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subscribers.gcash');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'account_name' => 'required',
            'account_number' => 'required'
        ]);

        GcashDetail::create([
            'user_id' => auth()->user()->id,
            'account_name' => $request->account_name,
            'account_number' => $request->account_number,
        ]);

        return redirect('/subscribers/gcash-information')->with('gcashMessage', 'Gcash Information created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gcashUpdate = GcashDetail::find($id);

        return view('subscribers.gcash-update', compact('gcashUpdate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $gcash = GcashDetail::find($id);

        if(!$gcash)
        {
            return redirect('/subscribers/gcash-information')->with('gcashMessageError', 'Gcash Information not found.');
        } else {
            $request->validate([
                'account_name' => ['required', 'unique:gcash_details,account_name'],
                'account_number' => ['required', 'numeric', 'digits:11', 'regex:/^9\d{9}$/']
            ]);
            $gcash->update([
                'account_name'  =>  $request->account_name,
                'account_number'  =>  $request->account_number
            ]);
            return redirect('/subscribers/gcash-information')->with('gcashMessage', 'Gcash Information Updated Successfully.');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gcashDelete = GcashDetail::find($id);

        if(!$gcashDelete)
        {
            return redirect('/subscribers/gcash-information')->with('gcashMessageError', 'Gcash Information not found.');
        } else {
            $gcashDelete->delete();
            return redirect('/subscribers/gcash-information')->with('gcashMessage', 'Gcash Information deleted successfully.');
        }
    }
}
