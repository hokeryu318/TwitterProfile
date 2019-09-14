<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;
use App\Model\User;

class UserInfo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        $user_id = request()->session()->get('user_id');
//        $user = User::find($user_id);

//        View::share(compact('user_id'));

        return $next($request);
    }
}