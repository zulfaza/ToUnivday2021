<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUjian
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            $progress = Auth::user()->progress;
            if(($progress->start_time < now()->getPreciseTimestamp(3) && $progress->stop_time > now()->getPreciseTimestamp(3)) && ($progress->status%2 == 1) ){
                return redirect()->route('user.pengerjaan.doing');
            }else if($progress->status == 2){
                return redirect()->route('user.pengerjaan.persiapan');
            }
        }
        return $next($request);
    }
}
