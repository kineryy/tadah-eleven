<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DailyMoneyMiddleware
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
        if (Auth::check()) {
			Auth::user()->last_online = Carbon::now();
			if(strtotime(Auth::user()->last_daily_reward) < Carbon::now()->timestamp - (86400)) {
				Auth::user()->money = Auth::user()->money + config('app.daily_reward');
				Auth::user()->last_daily_reward = Carbon::now();
			}
			Auth::user()->save();
		}
		return $next($request);
    }
}
