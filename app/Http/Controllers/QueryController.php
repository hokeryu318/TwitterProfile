<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QueryController extends Controller
{
    //
    public function query_list()
    {
        return view('query_list');
    }

    public function query_get()
    {
        return view('query_get');
    }

    public function query_post()
    {
        return view('query_post');
    }

    public function query_view()
    {
        return view('query_view');
    }
}
