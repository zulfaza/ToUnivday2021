<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function ShowHome()
    {
        return view('home');
    }
    public function ShowTermOfReference()
    {
        return view('termofref');
    }
}
