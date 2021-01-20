<?php

namespace App\Http\Controllers;

use App\Models\Sesi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function AdminDashboard()
    {
        return view('admin.dashboard');
    }
}
