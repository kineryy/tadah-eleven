<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;


class UserOnlineMiddleware
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
            Cache::put('last_online' . Auth::user()->id, true, Carbon::now()->addMinutes(1));

            if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            }

            $ip = $_SERVER['REMOTE_ADDR'];

            $user = User::find(Auth::user()->id);
            $user->update(['last_online' => (new \DateTime())->format("Y-m-d H:i:s"), 'last_ip' => $ip]);
            if ($user->register_ip == "0.0.0.0") {
                $user->update(['register_ip' => $ip]);
            }
        }
        return $next($request);
    }
}
