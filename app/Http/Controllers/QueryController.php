<?php

namespace App\Http\Controllers;

use App\Model\Query;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class QueryController extends Controller
{
    //
//    public function query_view()
//    {
//        $login_flag = request()->session()->get('login_flag');
//        $interview_post_flag = 0;
//        return view('query/query_view')->with(compact('login_flag', 'interview_post_flag'));
//    }

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
        $query_list = new Query();
        $query_list->send_user_id = $user_id;
        $query_list->receive_user_id = $sample_user_id;
        $query_list->query = $query;
        $query_list->save();

        $interview_post_flag = 1;

        return $interview_post_flag;
    }

    public function query_sample($md_user_id)
    {
        dd($md_user_id);
    }

}
