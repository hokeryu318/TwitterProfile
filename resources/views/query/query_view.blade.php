@include('layout.page_header')

<div id="interview_post" class="interview_post" style="display: none;">インタビューを送信しました！</div>

<div class="container text-center">

    <div class="row hg-cont-0">

        <div class="col-sm-4"></div>

        <div class="col-sm-4 pl-40 pr-40">
            <img class="sticky" align="right" src="{{ asset('img/mic1.png') }}" width="50px" height="50px"
                 @if(session('login_flag') == 1)
                    onclick="query_post_modal()"
                 @else
                    onclick="twitt_login_modal()"
                 @endif
            >

            <div class="sp-20"></div>
            <div>
                <div class="ib vm" style="width: 30%;">
                    <img src="{{ asset('img/man2.png') }}">
                </div>
                <div class="ib vm" style="width: 1%;"></div>
                <div class="ib vm" style="width: 40%;">
                    <span style="float: left;">〇〇さんへ</span>
                    <br>
                    <span style="float: left;">聞いてみました!</span>
                </div>
            </div>

            <div class="sp-40"></div>
            <div class="border_bottom">
                <div align="left">
                    <img class="vm" src="{{ asset('img/logo.png') }}">
                    <span class="vm fs-15">好きな食べ物はなんですか?</span>
                </div>
                <div class="sp-20"></div>
                <div align="left">
                    <span class="fs-15" style="padding-left: 20px;">ブロッコリーと野菜全判好きです。</span>
                </div>
                <div class="sp-40"></div>
            </div>
            <div class="sp-40"></div>
            <div class="border_bottom">
                <div align="left">
                    <img class="vm" src="{{ asset('img/logo.png') }}">
                    <span class="vm fs-15">どこに遊びに行きますか？</span>
                </div>
                <div class="sp-20"></div>
                <div align="left">
                    <span class="fs-15" style="padding-left: 10px;">夏は、海で冬は箱根によく行ったりします。</span>
                </div>
                <div class="sp-40"></div>
            </div>
            <div class="sp-40"></div>
            <div class="border_bottom">
                <div align="left">
                    <img class="vm" src="{{ asset('img/logo.png') }}">
                    <span class="vm fs-15">どこに遊びに行きますか？</span>
                </div>
                <div class="sp-20"></div>
                <div align="left">
                    <span class="fs-15" style="padding-left: 10px;">夏は、海で冬は箱根によく行ったりします。</span>
                </div>
                <div class="sp-40"></div>
            </div>
            <div class="sp-40"></div>
            <div class="border_bottom">
                <div align="left">
                    <img class="vm" src="{{ asset('img/logo.png') }}">
                    <span class="vm fs-15">どこに遊びに行きますか？</span>
                </div>
                <div class="sp-20"></div>
                <div align="left">
                    <span class="fs-15" style="padding-left: 10px;">夏は、海で冬は箱根によく行ったりします。</span>
                </div>
                <div class="sp-40"></div>
            </div>
            <div class="sp-40"></div>
            <div class="border_bottom">
                <div align="left">
                    <img class="vm" src="{{ asset('img/logo.png') }}">
                    <span class="vm fs-15">どこに遊びに行きますか？</span>
                </div>
                <div class="sp-20"></div>
                <div align="left">
                    <span class="fs-15" style="padding-left: 10px;">夏は、海で冬は箱根によく行ったりします。</span>
                </div>
                <div class="sp-40"></div>
            </div>


            <div class="sp-20"></div>

            <div>
                <span class="fs-15">もっと見る</span>
            </div>

            <div class="sp-20"></div>

            @if(session('login_flag') != 1)
                <div onclick="window.location='{{ url("/twittlogin") }}'">
                    <div class="twittlogin">
                        <span><img src="{{ asset('img/twitter_icon.png') }}"></span>
                        <span>Twitterでログイン</span>
                    </div>
                </div>

                <div class="sp-20"></div>

                <div>
                    <span class="fs-15">インタビューを作成する</span>
                </div>
            @endif

            <div class="sp-20"></div>

            <div class="advertise">
                <p class="ad_text">Adが入るスペース</p>
            </div>

        </div>

        <div class="col-sm-4"></div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog"></div>
<div class="modal fade" id="thirdModal" role="dialog"></div>

@include('layout.page_footer')

<script>
    function twitt_login_modal(){

        $.ajax({
            type:"GET",
            url:"{{ route('twitt_login_modal') }}",
            data:{},
            success: function(result){
                $('#myModal').html(result);
            }
        });
        $("#myModal").modal("toggle");
    }

    function query_post_modal(){

        $.ajax({
            type:"GET",
            url:"{{ route('query_post_modal') }}",
            data:{},
            success: function(result){
                $('#myModal').html(result);
            }
        });
        $("#myModal").modal("toggle");
    }

</script>
