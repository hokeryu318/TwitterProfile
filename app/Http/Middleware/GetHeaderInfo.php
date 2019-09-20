<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;
use App\Model\User;
use Illuminate\Support\Facades\Auth;
use App\Model\Query;
use App\Model\Mute;
class GetHeaderInfo
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

        if (Auth::check()){
            $user_id = Auth::id();
            $user = User::find($user_id);
            $receive_qurery_count = Query::where('send_user_id', '<>', $user_id)->where('receive_user_id', $user_id)->count();

            $mute_list = Mute::where('user1', $user_id)->pluck('user2')->toArray();

            $query_list_tmp = Query::whereNotIn('send_user_id', $mute_list)
                ->where(function($q) use ($user_id) {
                    $q->where('send_user_id', $user_id)
                        ->orwhere('receive_user_id', $user_id);
                })->orderby('created_at', 'desc')->orderby('id', 'desc')->get();
            $query_count = $query_list_tmp->count();
            $query_list = $query_list_tmp->take(5);
            foreach($query_list as $query) {
                $query->logo = User::where('id', $query->send_user_id)->pluck('logo')->first();
            }
            View::share(compact('user', 'query_list', 'query_count', 'receive_qurery_count'));
        }
        return $next($request);
    }
}