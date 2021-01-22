<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Progress;
use App\Models\Sesi;
use App\Models\User;
use App\Models\Variabel;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $variabel = Variabel::where([
            ['type', 'AdminVariabel'],
            ['name', 'OpenRegisUser'],
        ])->firstOrFail();
        $OpenRegis = $variabel->value == 'true';
        if($OpenRegis){
            return view('auth.register');
        }
        else{
            abort(404);
        }
    }
    public function AdminCreate()
    {
        $variabel = Variabel::where([
            ['type', 'AdminVariabel'],
            ['name', 'OpenRegisAdmin'],
        ])->firstOrFail();
        $OpenRegis = $variabel->value == 'true';
        if($OpenRegis){
            return view('auth.admin-regis');
        }
        else{
            abort(404);
        }
    }
    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'kelas'=>$request->kelas
        ]);
        Auth::login($user);
        $progress = new Progress;
        $progress->sesi_id = Sesi::first()->id;
        $progress->user_id = Auth::id();
        $progress->save();
        event(new Registered($user));

        return redirect()->route('user.dashboard');
    }
    public function AdminStore(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8',
        ]);

        Auth::guard('admin')->login($admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]));

        event(new Registered($admin));

        return redirect()->route('admin.dashboard');
    }
}
