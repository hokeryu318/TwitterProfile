<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Model\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function make_url($user_id) {

        $encode_user_id = md5($user_id);

        if(isset($_SERVER['HTTPS']) &&
            $_SERVER['HTTPS'] === 'on')
            $base_url = "https";
        else
            $base_url = "http";

        $base_url .= "://";

        $base_url .= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $tmp = explode('callback', $base_url);
        $query_view_url = $tmp[0]."query_view/";
        $url = $query_view_url.$encode_user_id;
        return $url;
    }

    public function register_user($getInfo, $provider) {

        $user = User::where('provider_id', $getInfo->id)->first();//dd($getInfo);
 
        if (!$user) {
           $user = new User();
           $user->name        = $getInfo->name;
           $user->email       = $getInfo->email;
           $user->token       = $getInfo->token;
           $user->tokenSecret = $getInfo->tokenSecret;
           $user->provider    = $provider;
           $user->provider_id = $getInfo->id;
           $user->logo        = $getInfo->avatar_original;
           $user->save();
           $user->url = $this->make_url($user->id);
           $user->save();
        } else {
           $user->name        = $getInfo->name;
           $user->email       = $getInfo->email;
           $user->token       = $getInfo->token;
           $user->tokenSecret = $getInfo->tokenSecret;
           $user->logo        = $getInfo->avatar_original;
           $user->save();
        }
        return $user;
    }

    function differenceInHours($startdate, $enddate){
        $starttimestamp = strtotime($startdate);
        $endtimestamp = strtotime($enddate);
        $difference = abs($endtimestamp - $starttimestamp)/3600;
        $difference = round($difference);
        return $difference;
    }


}
