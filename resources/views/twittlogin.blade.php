@include('layout.page_header')

    <div class="container text-center">
        <div class="row hg-cont">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="sp-0"></div>
                <div>
                    <div class="sp-1"></div>
                    <p>インタビューに答えて</p>
                    <div class="sp-1"></div>
                    <p>この文章はダミーコピーです。</p>
                    <div class="sp-1"></div>
                </div>
                <div class="sp-1"></div>
                <div>
                    {{--<img src="{{ asset('img/man2.png') }}">--}}
                    {{--<img src="{{ asset('img/man1.png') }}">--}}
                    <img src="{{ $user->logo }}">
                </div>
                <div class="sp-2"></div>
                <div onclick="window.location='{{ url("/auth/redirect/twitter") }}'">
                    <div class="twittlogin">
                        <span><img src="{{ asset('img/twitter_icon.png') }}"></span>
                        <span>Twitterでログイン</span>
                    </div>
                </div>
                <div class="sp-3"></div>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>

@include('layout.page_footer')
