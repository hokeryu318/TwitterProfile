<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Socialite;
use App\Model\User;
use App\Model\Query;
use App\Model\Mute;

class SocialAuthTwitterController extends Controller
{
    //
    public function index()
    {
        return view('twittlogin');
    }

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
               
        $getInfo = Socialite::driver($provider)->user();
         
        $user = $this->register_user($getInfo, $provider);
	    $user_id = $user->id;

        request()->session()->put('user_id', $user_id);

        auth()->login($user);

        $sample_user_id = request()->session()->get('sample_user_id');
        if($sample_user_id == 0) {

            return redirect()->route('interview');

        } elseif($sample_user_id > 0) {

//            $sample_user = User::find($sample_user_id);//dd($user);
//            $sample_query_list = Query::where('send_user_id', $sample_user_id)->orderby('created_at', 'desc')->orderby('id', 'desc')->get()->take(5);
//            foreach($sample_query_list as $query) {
//                $query->logo = User::where('id', $query->send_user_id)->pluck('logo')->first();
//            }
//
//            $receive_qurery_count = Query::where('send_user_id', '<>', $user_id)->where('receive_user_id', $user_id)->count();
//
//            request()->session()->put('sample_user_id', 0);
//
//            return view('query/query_sample')->with(compact('user', 'sample_user', 'sample_query_list', 'receive_qurery_count'));

            $md_user_id = md5($sample_user_id);
            return Redirect::to('query_view/'.$md_user_id);
        }

    }

    public function twittlogin()
    {
        //get userinfo from twitter
        $user_email = 'aaa@hotmail.com';
        $user_name = 'aaa';
        $profile_name = 'My Profile';

        $user_id = $this->register_user($user_email, $user_name, $profile_name);

        request()->session()->put('user_id', $user_id);
//        $user_id = request()->session()->get('user_id');

        $user = User::find($user_id);
        $query_list = Query::where('send_user_id', $user_id)->orwhere('receive_user_id', $user_id)->orderby('created_at', 'desc')->orderby('id', 'desc')->get()->take(5);
        $query_count = Query::where('send_user_id', $user_id)->orwhere('receive_user_id', $user_id)->get()->count();
        foreach($query_list as $query) {
            $query->logo = User::where('id', $query->send_user_id)->pluck('logo')->first();
        }

        $receive_qurery_count = Query::where('send_user_id', '<>', $user_id)->where('receive_user_id', $user_id)->count();

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
        request()->session()->put('user_id', $user_id);

        $sample_user = User::find($sample_user_id);//dd($user);
        $sample_query_list = Query::where('send_user_id', $sample_user_id)->orderby('created_at', 'desc')->orderby('id', 'desc')->get()->take(5);
        foreach($sample_query_list as $query) {
            $query->logo = User::where('id', $query->send_user_id)->pluck('logo')->first();
        }
        //dd($query_list);

        $receive_qurery_count = Query::where('send_user_id', '<>', $user_id)->where('receive_user_id', $user_id)->count();

        return view('query/query_sample')->with(compact('user', 'sample_user', 'sample_query_list', 'receive_qurery_count'));
    }

    function logout() {
        auth()->logout();
        return redirect()->route('twittlogin');
    }
}
