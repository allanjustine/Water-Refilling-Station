<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (auth()->user()->type == 'admin') {
                return redirect()->route('admin.home');
            } else if (auth()->user()->type == 'WRF') {
                return redirect()->route('subscribers.home');
            } else if (auth()->user()->type == 'Not Approve') {
                auth()->logout();
                return back()->with('error', 'You can`t login at this moment your subscription request is not approved yet!');
            } else if (auth()->user()->type == 'Disabled') {
                auth()->logout();
                return back()->with('disableError', 'You can`t login at this moment your subscription was expired and your account was disabled at this moment! Submit a renewal here: ');
            } else {
                return redirect()->route('dashboard');
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'Email-Address And Password Are Wrong.');
        }
    }
}
