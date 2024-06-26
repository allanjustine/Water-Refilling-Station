<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function regAcc(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|digits:10|regex:/^9\d{9}$/|numeric',
            'municipality' => 'required',
            'address' => 'required',
            'password' => 'required|confirmed',
        ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => "+63" . $request['phone'],
            'municipality' => $request['municipality'],
            'address' => $request['address'],
            'password' => Hash::make($request['password']),
            'status' => 'pending',
        ]);

        // Redirect to admin dashboard after registration
        auth()->loginUsingId($user->id);
        return redirect('/water-refilling/products/' . $user->municipality);
    }

    public function register1(Request $request)
    {

        $request->validate([
            'email'         =>      ['required', 'email', 'unique:users,email'],
            'password'      =>      ['required', 'min:8'],
            'phone' => 'required|digits:10|regex:/^9\d{9}$/|numeric',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => "+63" . $request->phone,
            'municipality' => $request->municipality,
            'station' => $request->station,
            'address' => $request->address,
            'password' => bcrypt($request->password),
            'subscription_type' => $request->subscription_type,
            'type' =>   3
        ]);

        // Redirect to admin dashboard after registration
        return redirect('/login')->with('loginM', 'Thank you ' . $user->email . ' for the ' . $user->subscription_type . ' of subscription. Please wait for the admin`s approval and you can login!');
    }


    public function showRegistrationForm1($subscription_type)
    {
        $valid_types = ['1_month', '1_year'];

        if (!in_array($subscription_type, $valid_types)) {
            abort(404);
        }

        return view('auth.register1', compact('subscription_type'));
    }
}
