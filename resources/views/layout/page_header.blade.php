<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>WHO</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    @if(Route::currentRouteName() == 'query_sample')
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:site" content="@"{{ $sample_user->name }} />
        <meta name="twitter:creator" content="@"{{ $sample_user->name }} />
        <meta property="og:url" content="{{ $sample_user->url }}" />
        <meta property="og:title" content="Tweet from WHO" />
        <meta property="og:description" content="プロフ作りました" />
        <meta property="og:image" content="{{ asset('logo/'.$sample_user->logo) }}" />
    @endif
        {{--<meta property="og:image" content="'@if(Auth::check()) {{ asset('logo/user1.png') }} @endif'" />--}}

        {{--<meta name="twitter:card" content="summary" />--}}
        {{--<meta name="twitter:site" content="@jiuhejong" />--}}
        {{--<meta name="twitter:creator" content="@jiuhejong" />--}}
        {{--<meta property="og:url" content="who-japnan.com/query_view/1" />--}}
        {{--<meta property="og:title" content="Tweet from WHO" />--}}
        {{--<meta property="og:description" content="プロフ作りました" />--}}
        {{--<meta property="og:image" content="http://pbs.twimg.com/profile_images/1088202672857964549/IO_0O6ZS.jpg" />--}}

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
    <div style="min-height: 100vh;position: relative;min-height: calc(var(--vh, 1vh) * 100);">
        <div class="container text-center">
            <div style="height: 11px;"></div>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <div class="top_left">
                        <span class="fs-17">WHO</span>
                    </div>
                    <div class="top_right">
                        {{--@if(session('login_flag') != 1)--}}
                        @if(!(Auth::check()))
                            {{--<span onclick="window.location='{{ url("/login") }}'">ログイン</span>--}}
                            <span class="fs-12" onclick="window.location='{{ url("/auth/redirect/twitter") }}'">ログイン</span>
                        @else
                            <span onclick="window.location='{{ route("interview_list") }}'">
                                <img class="" src="{{ asset('img/mic.png') }}">
                                <p class="querynum ib">
                                    {{ $receive_qurery_count }}
                                </p>
                            </span>
                            {{--@if(isset($user))--}}
                            <span><img src="{{ asset('logo/'.$user->logo) }}" style="width:30px;margin-top: -9px;border-radius: 50%;"></span>
                            {{--@endif--}}
                            <span onclick="openNav()" class="menu_none">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <img src="{{ asset('img/menu.png') }}" style="width:30px;margin-top: -4px;" />
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4"></div>
            </div>
            <div style="height: 6px;"></div>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4 border_top">
                    <div class="se_top_menu">
                    {{--@if(session('login_flag') == 1)--}}
                    @if(Auth::check())
                        <span style="margin-left: 10px;padding-top: 15px;" onclick="window.location='{{ url('/') }}'">ホーム&nbsp;</span>
                        <span style="margin-left: 10px;" onclick="window.location='{{ route("interview_list") }}'">質問たち&nbsp;</span>
                        <span style="margin-left: 10px;" onclick="window.location='{{ route("interview") }}'">作成・編集&nbsp;</span>
                        <span style="margin-left: 10px;" onclick="window.location='{{ url('/logout') }}'">ログアウト</span>
                    @endif
                    </div>
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>

        {{--slide side menu--}}
        <div id="mySidenav" class="sidenav" style="width: 50%;display: none;">
            <div class="row" style="border-bottom: 1px solid #CCC;">
                <span href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</span>
            </div>
            {{--@if(session('login_flag') == 1)--}}
            @if(Auth::check())
                {{--<a href="{{ url('query_view/'.md5($user->id)) }}"><img src="{{ asset('img/home.png') }}" class="vm"><span class="vm" style="margin-left: 10px;padding-top: 15px;">ホーム</span></a>--}}
                <a href="{{ url('/') }}"><img src="{{ asset('img/home.png') }}" class="vm"><span class="vm" style="margin-left: 10px;padding-top: 15px;">ホーム</span></a>
                <a href="{{ route('interview_list') }}"><img src="{{ asset('img/mic.png') }}" class="vm"><span class="vm" style="margin-left: 10px;">質問たち</span></a>
                <a href="{{ route('interview') }}"><img src="{{ asset('img/pen.png') }}" class="vm"><span class="vm" style="margin-left: 10px;">作成・編集</span></a>
                <a href="{{ url('/logout') }}"><img src="{{ asset('img/logout.png') }}" class="vm"><span class="vm" style="margin-left: 10px;">ログアウト</span></a>
            @endif
        </div>

        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "50%";
                document.getElementById("mySidenav").style.display = "block";
                document.getElementsByTagName("body")[0].style.position = "fixed";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
                document.getElementsByTagName("body")[0].style.position = "unset";
            }
        </script>

        <script>
            let vh = window.innerHeight * 0.01;
            document.documentElement.style.setProperty('--vh', `${vh}px`);
        </script>
