<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Student;
use App\models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //Admin Profile//
    public function adminProfile()
    {
        return view('admin.profile');
    }

    //Subscribers Profile//



    public function edit(User $users)
    {
        return view('admin.users.edit', compact('users'));
    }

    public function update(Request $request, User $users)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $users->id,
            'type' => 'required', // Change 'role' to 'type'
            // Add more validation rules as needed
        ]);

        $users->update($request->all());

        return redirect()->route('admin.allusers')->with('message', 'User updated successfully!');
    }

    //avatar
    public function Profile()
    {
        $profile = User::all();
        return view('admin.profile',compact('profile'));
    }


    public function show()
    {
        // Get the currently authenticated user
        $users = Auth::user();

        // Pass the user information to the view
        return view('admin.profile', ['user' => $users]);
    }

    public function avatar(User $users)
    {
        return view('admin.users.avatar', compact('users'));
    }
}
