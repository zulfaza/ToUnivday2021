<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Answer;
use App\Models\Nilai;
use App\Models\Sesi;
use App\Models\User;
use App\Models\Variabel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    
    public function AdminDashboard()
    {
        $variabel = Variabel::where([
            ['type', 'AdminVariabel'],
            ['name', 'OpenRegisAdmin'],
        ])->firstOrFail();
        $OpenRegis = $variabel->value == 'true';
        $isSuper = Auth::guard('admin')->user()->isSuperAdmin == 1;
        $listAdmin = Admin::all();
        return view('admin.dashboard', compact('OpenRegis','listAdmin', 'isSuper'));
    }
    public function updateOpenRegisAdmin(Request $request)
    {
        $variabel = Variabel::where([
            ['type', 'AdminVariabel'],
            ['name', 'OpenRegisAdmin'],
        ])->firstOrFail();
        $value = $request->toggle == 'on' ? 'true' : 'false';
        $variabel->value = $value;
        $variabel->save();
        return back();
    }
    public function listUserPage()
    {
        $users = User::all();
        $variabel = Variabel::where([
            ['type', 'AdminVariabel'],
            ['name', 'OpenRegisUser'],
        ])->firstOrFail();
        $OpenRegis = $variabel->value == 'true';
        return view('admin.Users.list', compact('users', 'OpenRegis'));
    }
    public function updateOpenRegis(Request $request)
    {
        $variabel = Variabel::where([
            ['type', 'AdminVariabel'],
            ['name', 'OpenRegisUser'],
        ])->firstOrFail();
        $value = $request->toggle == 'on' ? 'true' : 'false';
        $variabel->value = $value;
        $variabel->save();
        return back();
    }
    public function detailUser(user $user)
    {
        if($user->status == 0){
            $user->status= 1;
            $user->save();
        }
        $nilai = Nilai::where('user_id',$user->id)->first();
        $progress = $user->progress;
        $show = $progress->status == 4;
        $answers = Answer::where([
            ['user_id',$user->id],
        ])->with(['soal.options'])->get();
        return view('dashboard', compact('nilai', 'answers', 'show'));
    }
}
