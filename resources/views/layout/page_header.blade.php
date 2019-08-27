<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Prof</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    </head>
    <body>
        <div class="header text-center">

            <div class="row">
                <div class="wd-side"></div>

                <div class="wd-cont">
                    <div>
                        <img src="{{ asset('img/prof_logo.png') }}" width="200px" height="100px" />
                    </div>
                    <div>
                        <p class="fs-20">みんなのインタビュー</p>
                    </div>
                </div>

                <div class="wd-side"></div>
            </div>

        </div>

