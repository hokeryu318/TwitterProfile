@include('layout.page_header')

    <div class="container text-center">
        <div class="row" id="cont">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="sp-0"></div>
                <div>
                    <div class="sp-1"></div>
                    {{--<p>インタビューに答えて</p>--}}
                    @if(Auth::check())
                    <p class="fs-17">インタビューに答えて</p>
                    @else
                    <p class="fs-17">インタビューに答えて</p>
                    @endif
                    <div class="sp-1"></div>
                    {{--<p>この文章はダミーコピーです。</p>--}}
                    <div class="sp-1"></div>
                </div>
                <div class="sp-1"></div>
                <div>
                    @if(!(Auth::check()))
                        <img src="{{ asset('img/man2.png') }}">
                        <img src="{{ asset('img/man1.png') }}">
                    @else
                        <img src="{{ asset('logo/'.$user->logo) }}" style="width: 70px;border-radius: 50%;" onclick="window.location='{{ url("interview") }}'">
                    @endif
                </div>
                <div class="sp-2"></div>
                @if(!(Auth::check()))
                <div onclick="window.location='{{ url("/auth/redirect/twitter") }}'">
                    <div class="twittlogin">
                        <span><img src="{{ asset('img/twitter_icon.png') }}" style="margin-top: -5px;"></span>
                        <span class="fs-17">Twitterでログイン</span>
                    </div>
                </div>
                @endif
                <div class="sp-3"></div>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>

@include('layout.page_footer')

<script>
    var screen_height = window.innerHeight;
    var cont_height = screen_height-116;
    $('#cont').css({'height': cont_height + "px"});
</script>

