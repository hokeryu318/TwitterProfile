@include('layout.page_header')

<div id="interview_post" class="interview_post" style="display: none;">インタビューを送信しました！</div>

<div class="container text-center">

    <div class="row">

        <div class="col-sm-4"></div>

        <div class="col-sm-4 pl-40 pr-40" id="cont">

            <img class="sticky" align="right" src="{{ asset('img/mic1.png') }}" width="50px" height="50px"
                 @if(Auth::check())
                    onclick="query_post_modal('{{ $sample_user->logo }}', '{{ $sample_user->name }}', '{{ $sample_user->id }}')"
                 @else
                    onclick="twitt_login_modal({{ $sample_user->id }})"
                 @endif
            >

            <div id="user_data">
                <div class="sp-20"></div>
                <div class="ib vm" style="width: 30%;">
                    <img src="{{ $sample_user->logo }}" style="width: 70px;border-radius:50%;">
                </div>
                <div class="ib vm" style="width: 1%;"></div>
                <div class="ib vm" style="width: 40%;">
                    <span style="float: left;font-size: 15px;">{{ $sample_user->name }}さんへ</span>
                    <br>
                    <span style="float: left;font-size: 15px;">聞いてみました!</span>
                </div>
            </div>

            <div id="cont1">
                <div id="cont2">
                @foreach($sample_query_list as $query)
                    <div class="sp-40"></div>
                    <div class="border_bottom">
                        <div align="left">
                            <img class="vm" src="{{ $sample_user->logo }}" style="width: 30px;border-radius:50%;">
                            <span class="vm fs-15" style="word-break: break-all;">{{ $query->query }}</span>
                        </div>
                        <div class="sp-20"></div>
                        <div align="left">
                            <span class="fs-15" style="padding-left: 20px;word-break: break-all;">{{ $query->answer }}</span>
                        </div>
                        <div class="sp-40"></div>
                    </div>
                @endforeach
                </div>

                @if(count($sample_query_list) > 5)
                    <div style="margin-top: 20px;">
                        <span class="fs-15">
                            もっと見る
                        </span>
                    </div>
                @endif

                @if(!(Auth::check()))
                    <input type="hidden" id="unauth_check" value="1">
                    <div id="login">
                        <div class="sp-20"></div>
                        <div onclick="window.location='{{ url("/auth/redirect/twitter") }}'">
                            <div class="twittlogin">
                                <span><img src="{{ asset('img/twitter_icon.png') }}"></span>
                                <span>Twitterでログイン</span>
                            </div>
                        </div>
                        <div class="sp-20"></div>
                        <div>
                            <span class="fs-15">インタビューを作成する</span>
                        </div>
                    </div>
                @endif
            </div>

            <div id="advertise">
                <div class="sp-40"></div>
                <div class="advertise">
                    <p class="ad_text fs-15">Adが入る<br>スペース</p>
                    <div class="sp-30"></div>
                </div>
                <div class="sp-30"></div>
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

    var screen_height = window.innerHeight;
    var cont_height = screen_height-118;
    $('#cont').css({'min-height': cont_height + "px"});
    var cont1_height = cont_height - $('#user_data').height() - $('#advertise').height();
    $('#cont1').css({'min-height': cont1_height + "px"});
    if($('#unauth_check').val() == 1) {
        var cont2_height = cont1_height - $('#login').height();
        $('#cont2').css({'min-height': cont2_height + "px"});
    } else {
        var cont2_height = cont1_height;
        $('#cont2').css({'min-height': cont2_height + "px"});
    }

    function twitt_login_modal(id){
        $.ajax({
            type:"GET",
            url:"{{ route('twitt_login_modal') }}",
            data:{sample_user_id: id},
            success: function(result){
                $('#myModal').html(result);
            }
        });
        $("#myModal").modal("toggle");
    }

    function query_post_modal(sample_user_logo, sample_user_name, sample_user_id){
        $.ajax({
            type:"GET",
            url:"{{ route('query_post_modal') }}",
            data:{sample_user_logo: sample_user_logo, sample_user_name: sample_user_name, sample_user_id: sample_user_id},
            success: function(result){
                $('#myModal').html(result);
            }
        });
        $("#myModal").modal("toggle");
    }

</script>
