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
        $tmp = explode('twittlogin', $base_url);
        $query_view_url = $tmp[0]."query_view/";
        $url = $query_view_url.$encode_user_id;
        return $url;
    }

    public function check_user($user_email) {
        $check_user = User::where('email', $user_email)->pluck('id')->first();
        if($check_user)
            return $check_user;
        else
            return 0;
    }

    public function register_user($user_email, $user_name, $profile_name) {

        //check user exist in website
        $check_user = $this->check_user($user_email);

        if($check_user == 0) {//userinfo register
            $user = new user();
            $user->name = $user_name;
            $user->email = $user_email;
            $user->password = '12345678';
            $user->profile_name = $profile_name;
            $user->save();
            //logo image upload////////////

            ///////////////////////////////
            $user_id = $user->id;
            $user->logo = "user".$user_id.".png";
            $user->url = $this->make_url($user_id);
            $user->save();
        } else {//userinfo change
            $user_id = $check_user;
        }

        return $user_id;
    }

    function differenceInHours($startdate, $enddate){
        $starttimestamp = strtotime($startdate);
        $endtimestamp = strtotime($enddate);
        $difference = abs($endtimestamp - $starttimestamp)/3600;
        $difference = round($difference);
        return $difference;
    }


}
