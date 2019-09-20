<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Query;
use App\Model\Mute;
use Twitter;

class InterviewController extends Controller
{
    public function interview()
    {
        return $this->get_query_data('interview');
    }

    public function add_interview()
    {
        return $this->get_query_data('add_interview');
    }

    public function interview_finish(Request $request) {

        //dd($request);

        $arr_id = $request->query_id;
        $arr_query = $request->query_text;
        $arr_answer = $request->answer;
        $arr_match = array();
        if($arr_id) {
            foreach($arr_id as $key => $v){
                $arr_match[$v]['query'] = $arr_query[$key];
                $arr_match[$v]['answer'] = $arr_answer[$key];
            }
            //dd($arr_query);

            //insert or update
            foreach($arr_id as $key => $id) {
                if($id == 0) {//insert
                    $query_insert = new query();
                    $query_insert->send_user_id = request()->session()->get('user_id');
                    $query_insert->receive_user_id = request()->session()->get('user_id');
                    $query_insert->query = $arr_query[$key];
                    $query_insert->answer = $arr_answer[$key];
                    $query_insert->is_new = 1;
                    $query_insert->save();

                } else {//update
                    $query_update1 = Query::where('id', $id)->update(['query' => $arr_query[$key]]);
                    $query_update2 = Query::where('id', $id)->update(['answer' => $arr_answer[$key]]);
                }
            }
        }

        //delete foreach delete_ids;
        $deleted_ids = $request['deleted_ids'];//dd($deleted_ids);
        if($deleted_ids[0] != null) {

            $deleted_arr = $this->get_arr_id($deleted_ids);//dd($deleted_arr);
            $query_delete = Query::whereIn('id', $deleted_arr)->delete();
        }

        return $this->get_query_data('redirect');
    }

    public function interview_modal()
    {
        $op = request()->op;
        if($op == 1)
            $alert = "募集質問する方法を選択しよう！";
        else
            $alert = "インタビューお疲れ様でした！";
        $user_id = request()->session()->get('user_id');
        $user = User::find($user_id);
        return view('interview/interview_modal')->with(compact('alert', 'user'));
    }

    public function url_copy_modal()
    {
        return view('interview/url_copy_modal');
    }

    public function interview_list()
    {
        $current_time = date("Y-m-d H:i:s");
        $user_id = request()->session()->get('user_id');
        $user = User::find($user_id);
        $receive_qurery_count = Query::where('send_user_id', '<>', $user_id)->where('receive_user_id', $user_id)->count();

        $mute_list = Mute::where('user1', $user_id)->pluck('user2')->toArray();

        //send query data
        $send_query_list = Query::where('send_user_id', $user_id)->where('receive_user_id', '<>', $user_id)->orderby('created_at', 'desc')->orderby('id', 'desc')->get();
        foreach($send_query_list as $sendquery) {
            $sendquery->logo = User::where('id', $sendquery->receive_user_id)->pluck('logo')->first();
            $sendquery->duration = $this->differenceInHours($sendquery->created_at, $current_time);
            if (in_array($sendquery->send_user_id, $mute_list)) {
                $sendquery->mute = 1;//mute status
            } else {
                $sendquery->mute = 0;//unmute status
            }
        }

        //receive query data
        $receive_query_list = Query::where('send_user_id', '<>', $user_id)->where('receive_user_id', $user_id)->orderby('created_at', 'desc')->orderby('id', 'desc')->get();
        foreach($receive_query_list as $receivequery) {
            $receivequery->logo = User::where('id', $receivequery->send_user_id)->pluck('logo')->first();
            $receivequery->duration = $this->differenceInHours($receivequery->created_at, $current_time);
            if (in_array($receivequery->send_user_id, $mute_list)) {
                $receivequery->mute = 1;//mute status
            } else {
                $receivequery->mute = 0;//unmute status
            }
        }

        //get all query count
        $query_count = Query::whereNotIn('send_user_id', $mute_list)
            ->where(function($q) use ($user_id) {
                $q->where('send_user_id', $user_id)
                    ->orwhere('receive_user_id', $user_id);
            })->count();
        //dd($receive_query_list);
        return view('interview/interview_list')->with(compact('user', 'send_query_list', 'receive_query_list', 'query_count', 'receive_qurery_count'));
    }

//    public function answer_post_modal(Request $request)
//    {
//        $logo = $request->logo;
//        $name = $request->name;
//        $id = $request->id;
//        return view('interview/answer_post_modal')->with(compact('logo', 'name', 'id'));
//    }
//
//    public function answer_post(Request $request)
//    {
//        $user_id = $request->session()->get('user_id');
//        $query_id = $request->query_id;
//        $answer = $request->new_answer;
//
//        //update query data
//        $query = Query::find($query_id);
//        $query->answer = $answer;
//        $query->save();
//
//        $answer_post_flag = 1;
//
//        return $answer_post_flag;
//    }

    public function answer_to_customer(Request $request)
    {
        $query_id = $request->id;
        $current_time = date("Y-m-d H:i:s");
        Query::where('id', $query_id)->update(['created_at' => $current_time]);

        return "success";
    }

    public function mute_change(Request $request)
    {
        $user1 = $request->user1;
        $user2 = $request->user2;
        $mute = $request->mute;

        if($mute == 0) {
            $mute = new Mute();
            $mute->user1 = $user1;
            $mute->user2 = $user2;
            $mute->save();
        } else {
            $mute = Mute::where('user1', $user1)->where('user2', $user2)->delete();
        }
    }

    public function delete_query(Request $request)
    {
        $query_id = $request->query_id;
        Query::where('id', $query_id)->delete();
    }

    public function get_query_data($url) {

        $user_id = request()->session()->get('user_id');
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

        if($url == 'redirect')
            return redirect(route('interview'))->with(compact('user', 'query_list', 'query_count', 'receive_qurery_count'));
        else
            return view('interview/'.$url)->with(compact('user', 'query_list', 'query_count', 'receive_qurery_count'));
    }

    public function get_arr_id($opt) {
        $arr = explode(",", $opt[0]);
        return $arr;
    }

    public function tweet() {

        return Twitter::postTweet(array('status' => 'Laravel Tweet.', 'format' => 'json'));
    }
}
