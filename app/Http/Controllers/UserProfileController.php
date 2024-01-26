<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Student;
use App\models\User;

class UserProfileController extends Controller
{
    public function userProfile()
    {
        return view('customer.profile');
    }

    //Subscribers ROute

    public function SubuserProfile()
    {
        return view('subscribers.profile');
    }

}
