<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Prof</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>--}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>--}}

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    </head>
    <body>
        <div class="container-fluid text-center">
            <div class="sp-10"></div>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <div class="top_left">
                        <span>WHO</span>
                    </div>
                    <div class="top_right">
                        @if(session('login_flag') != 1)
                            {{--<span onclick="window.location='{{ url("/login") }}'">ログイン</span>--}}
                            <span>ログイン</span>
                        @else
                            <img class="" src="{{ asset('img/mic.png') }}">
                            <p class="querynum ib">1</p>
                            @if(isset($user))
                            <img src="{{ asset('logo/'.$user->logo) }}" style="width:30px;margin-top: -5px;" onclick="openNav()">
                            @endif
                        @endif
                    </div>
                </div>
                <div class="col-sm-4"></div>
            </div>
            <div class="sp-10"></div>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4 border_top"></div>
                <div class="col-sm-4"></div>
            </div>
        </div>

        {{--slide side menu--}}
        <div id="mySidenav" class="sidenav" style="width: 50%;">
            <div class="row" style="border-bottom: 1px solid #CCC;">
                <span href="javascript:void(0)" class="closebtn" onclick="closeNav()" >&times;</span>
            </div>
            <a href="#"><img src="{{ asset('img/home.png') }}" class="vm"><span class="vm" style="margin-left: 10px;padding-top: 15px;">ホーム</span></a>
            <a href="{{ route('interview_list') }}"><img src="{{ asset('img/mic.png') }}" class="vm"><span class="vm" style="margin-left: 10px;">質問たち</span></a>
            <a href="{{ route('interview') }}"><img src="{{ asset('img/pen.png') }}" class="vm"><span class="vm" style="margin-left: 10px;">作成・編集</span></a>
            <a href="{{ url('/logout') }}"><img src="{{ asset('img/logout.png') }}" class="vm"><span class="vm" style="margin-left: 10px;">ログアウト</span></a>
        </div>

        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "50%";
                document.getElementById("mySidenav").style.display = "block";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
            }
        </script>
