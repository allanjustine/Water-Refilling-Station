<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function AbuyogHome()
    {
        return view('Main');
    }

    public function Abuyog1Home()
    {
        return view('abuyog1');
    }

}
