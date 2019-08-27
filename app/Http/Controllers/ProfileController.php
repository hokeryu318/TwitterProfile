<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function index()
    {
        return view('profile');
    }

    public function confirm()
    {
        return view('profile_confirm');
    }

    public function finish()
    {
        return view('profile_finish');
    }
}
