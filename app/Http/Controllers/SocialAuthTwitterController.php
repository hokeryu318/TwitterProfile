<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\query;

class SocialAuthTwitterController extends Controller
{
    //
    public function index()
    {
        request()->session()->put('login_flag', 0);
        return view('twittlogin');
    }

    public function twittlogin()
    {
        //get userinfo from twitter
        $user_email = 'aaa@hotmail.com';
        $user_name = 'aaa';
        $profile_name = 'My Profile';

        $user_id = $this->register_user($user_email, $user_name, $profile_name);

        request()->session()->put('login_flag', 1);
        request()->session()->put('user_id', $user_id);
//        $user_id = request()->session()->get('user_id');

        $user = User::find($user_id);
        $query_list = query::where('send_user_id', $user_id)->orwhere('receive_user_id', $user_id)->orderby('created_at', 'desc')->orderby('id', 'desc')->get()->take(5);
        $query_count = query::where('send_user_id', $user_id)->orwhere('receive_user_id', $user_id)->get()->count();
        foreach($query_list as $query) {
            $query->logo = User::where('id', $query->send_user_id)->pluck('logo')->first();
        }

        $receive_qurery_count = query::where('send_user_id', '<>', $user_id)->where('receive_user_id', $user_id)->count();

        return view('interview/interview')->with(compact('user', 'query_list', 'query_count', 'receive_qurery_count'));
    }

    public function twittlogin1($sample_user_id)
    {
        //get userinfo from twitter
        $user_email = 'bbb@hotmail.com';
        $user_name = 'aaa';
        $profile_name = 'My Profile';

        $user_id = $this->register_user($user_email, $user_name, $profile_name);
        $user = User::find($user_id);
        request()->session()->put('login_flag', 1);
        request()->session()->put('user_id', $user_id);

        $sample_user = User::find($sample_user_id);//dd($user);
        $sample_query_list = query::where('send_user_id', $sample_user_id)->orderby('created_at', 'desc')->orderby('id', 'desc')->get()->take(5);
        foreach($sample_query_list as $query) {
            $query->logo = User::where('id', $query->send_user_id)->pluck('logo')->first();
        }
        //dd($query_list);

        $receive_qurery_count = query::where('send_user_id', '<>', $user_id)->where('receive_user_id', $user_id)->count();

        return view('query/query_sample')->with(compact('user', 'sample_user', 'sample_query_list', 'receive_qurery_count'));
    }

    function logout() {
        request()->session()->put('login_flag', 0);
        return view('twittlogin');
    }
}
