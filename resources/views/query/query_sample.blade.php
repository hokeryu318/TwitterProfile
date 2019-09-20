@include('layout.page_header')

<div id="interview_post" class="interview_post" style="display: none;">インタビューを送信しました！</div>

<div class="container text-center">

    <div class="row hg-cont-0">

        <div class="col-sm-4"></div>

        <div class="col-sm-4 pl-40 pr-40">
            <img class="sticky" align="right" src="{{ asset('img/mic1.png') }}" width="50px" height="50px"
                 @if(session('login_flag') == 1)
                    onclick="query_post_modal('{{ $sample_user->logo }}', '{{ $sample_user->name }}', '{{ $sample_user->id }}')"
                 @else
                    onclick="twitt_login_modal({{ $sample_user->id }})"
                 @endif
            >

            <div class="sp-20"></div>
            <div>
                <div class="ib vm" style="width: 30%;">
                    <img src="{{ $sample_user->logo }}" style="width: 70px;border-radius:50%;">
                </div>
                <div class="ib vm" style="width: 1%;"></div>
                <div class="ib vm" style="width: 40%;">
                    <span style="float: left;">{{ $sample_user->name }}さんへ</span>
                    <br>
                    <span style="float: left;">聞いてみました!</span>
                </div>
            </div>

            <div class="hg-cont-2">
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

            <div class="sp-20"></div>

            <div>
                <span class="fs-15">
                    @if(count($sample_query_list) > 5)
                        もっと見る
                    @else
                        &nbsp;
                    @endif
                </span>
            </div>

            <div class="sp-20"></div>

            @if(session('login_flag') != 1)
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
