<?php

namespace App\Http\Controllers;

use App\Model\query;
use App\Model\User;
use Illuminate\Http\Request;


class QueryController extends Controller
{
    //
    public function query_view()
    {
        $login_flag = request()->session()->get('login_flag');
        $interview_post_flag = 0;
        return view('query/query_view')->with(compact('login_flag', 'interview_post_flag'));
    }

    public function twitt_login_modal(Request $request)
    {
        $sample_user_id = $request->sample_user_id;
        return view('twitt_login_modal')->with(compact('sample_user_id'));
    }

    public function query_post_modal(Request $request)
    {
        $sample_user_logo = $request->sample_user_logo;
        $sample_user_name = $request->sample_user_name;
        $sample_user_id = $request->sample_user_id;
        return view('query/query_post_modal')->with(compact('sample_user_logo', 'sample_user_name', 'sample_user_id'));
    }

    public function query_post(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $sample_user_id = $request->sample_user_id;
        $query = $request->new_query;

        //insert query data
        $query_list = new query();
        $query_list->send_user_id = $user_id;
        $query_list->receive_user_id = $sample_user_id;
        $query_list->query = $query;
        $query_list->save();

        $interview_post_flag = 1;

        return $interview_post_flag;
    }

    public function query_sample($user_id)
    {
        if(isset($_SERVER['HTTPS']) &&
            $_SERVER['HTTPS'] === 'on')
            $full_url = "https";
        else
            $full_url = "http";

        $full_url .= "://";

        $full_url .= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        //dd($full_url);

        $sample_user_id = User::where('url', $full_url)->pluck('id')->first();

        $sample_user = User::find($sample_user_id);
        $sample_query_list = query::where('send_user_id', $sample_user_id)->orderby('created_at', 'desc')->orderby('id', 'desc')->get()->take(5);
        foreach($sample_query_list as $query) {
            $query->logo = User::where('id', $query->send_user_id)->pluck('logo')->first();
        }
        //dd($sample_query_list);

        return view('query/query_sample')->with(compact('sample_user', 'sample_query_list'));
    }

}
