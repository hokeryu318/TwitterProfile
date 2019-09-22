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

//        $url = request()->session()->get('redirect');
        $url = 'twittlogin';
        return redirect()->to($url);

    }

    function logout() {
        auth()->logout();
        request()->session()->put('redirect', route('interview'));
        return redirect()->route('twittlogin');
    }
}
