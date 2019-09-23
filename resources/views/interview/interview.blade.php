@include('layout.page_header')

{{--@if($interview_post_flag == 1)--}}
    {{--<div id="interview_post" class="interview_post">インタビューを送信しました！</div>--}}
{{--@endif--}}
<p id="copy_url" value="" style="margin-top:-1000px;position: absolute;"></p>
<div class="container text-center">

    <div class="row">

        <div class="col-sm-4"></div>

        <div class="col-sm-4 pl-40 pr-40" id="cont">

            <img class="sticky" align="right" src="{{ asset('img/pen1.png') }}" width="50px" height="50px" onclick="window.location='{{ route("add_interview") }}'">

            <div id="interview_top">
                <div class="sp-20"></div>
                <div class="interview_top">
                    <div class="ib vm" style="width: 30%;margin-top: 25px;margin-bottom: 15px;margin-left: 9%;">
                        <img src="{{ $user->logo }}" class="avatar" />
                        <div class="query_collect" onclick="interview_modal(1)">質問を募集</div>
                    </div>
                    <div class="ib vm" style="width: 1%;"></div>
                    <div class="ib vm" style="width: 40%; margin-bottom: 15px;margin-top: 25px;">
                        <div style="width: 120%; margin-bottom: 32px;">
                            <span style="float: left;margin-left: 10px;font-size: 15px;">{{ $user->name }}さんの</span>
                            <br>
                            <span style="float: left;margin-left: 10px;font-size: 15px;">インタビュー数{{ $query_count }}</span>
                        </div>
                        <div class="interview_share" onclick="interview_modal(2)">
                            <span><img src="{{ asset('img/share.png') }}"></span>
                            <span>インタビューをシェア</span>
                        </div>
                    </div>
                </div>
            </div>

            <div id="cont1">
            @foreach($query_list as $query)
                <div class="sp-40"></div>
                <div class="border_bottom">
                    <div align="left">
                        <img class="vm" src="{{ $query->logo }}" style="width: 30px;border-radius:50%;">
                        <span class="vm fs-15" style="word-break: break-all;">{{ $query->query }}</span>
                        {{--<img onclick="" class="vm" src="{{ asset('img/pen.png') }}" sytle="right: 5px;">--}}
                    </div>
                    <div class="sp-20"></div>
                    <div align="left">
                        <span class="fs-15" style="padding-left: 20px;word-break: break-all;">{{ $query->answer }}</span>
                    </div>
                    <div class="sp-40"></div>
                </div>
            @endforeach
            </div>

            @if(count($query_list) > 5)
                <div style="margin-top: 20px;">
                    <span class="fs-15">
                        もっと見る
                    </span>
                </div>
            @endif

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
    var cont1_height = cont_height - $('#interview_top').height() - $('#advertise').height();
    $('#cont1').css({'min-height': cont1_height + "px"});

    function interview_modal(op){

        $.ajax({
            type:"POST",
            url:"{{ route('interview_modal') }}",
            data:{op: op, redirect: 'interview', _token:"{{ csrf_token() }}"},
            success: function(result){
                $('#myModal').html(result);
            }
        });
        $("#myModal").modal("toggle");
    }

    function url_copy(){

        //var url = window.location.href;
        var user = <?php echo(json_encode($user)) ?>;

        //copy
        var copyUrl = document.getElementById('copy_url');
        copyUrl.value = user.url;
        copyUrl.select();
        copyUrl.setSelectionRange(0, 99999);
        document.execCommand("copy");

        $.ajax({
            type:"GET",
            url:"{{ route('url_copy') }}",
            data:{},
            success: function(result){
                $('#thirdModal').html(result);
            }
        });
        $("#thirdModal").modal("toggle");
    }

</script>
