@include('layout.page_header')

<div id="answer_post" class="interview_post" style="display: none;">インタビューに答えました。！</div>

<input type="text" id="copy_url" value="" style="margin-top:-1000px;position: absolute;"/>
<div class="container text-center">

    <div class="row">

        <div class="col-sm-4"></div>

        <div class="col-sm-4 pl-40 pr-40">
            <img class="sticky display-none" align="right" src="{{ asset('img/pen1.png') }}" width="50px" height="50px" onclick="">

            <div id="interview_top">
                <div class="sp-20"></div>
                <div class="interview_top">
                    <div class="ib vm" style="width: 30%;margin-top: 25px;margin-bottom: 15px;margin-left: -6%;">
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
                <div class="sp-40"></div>
                <div class="tab">
                    <button class="tablinks fs-17" onclick="openCity(event, 'query')" id="defaultOpen">質問</button>
                    <button class="tablinks fs-17" onclick="openCity(event, 'send_query')">送った質問</button>
                </div>

                <div class="sp-20"></div>

                <div id="query" class="tabcontent">
                    @foreach($receive_query_list as $receive)
                        <div id="item_{{ $receive->id }}">
                        <div class="sp-40"></div>
                        <div class="border_bottom">
                            <div class="ib vm">
                                <img src="{{ $receive->logo }}" style="width: 50px;border-radius:50%;" onclick="window.location='{{ url("query_view/".md5($receive->send_user_id)) }}'">
                            </div>
                            <div class="ib vm" style="width: 80%;">
                                <img src="{{ asset('img/close.png') }}" style="width: 22px;margin-left: 200px;" onclick="remove_query({{ $receive->id }})">
                                <div class="fs-12" align="left">
                                    <div class="ib w-1">{{ $receive->duration }}時間前</div>
                                    {{--<div class="ib" style="font-size: 35px;margin-top: -20px;" onclick="remove_query({{ $receive->id }})">&times;</div>--}}
                                </div>
                                <br>
                                @if($receive->mute == 1)
                                    <div align="left" class="mute_text_info_{{$receive->send_user_id}}">
                                        ミュート中の為、表示されません
                                    </div>
                                    <div align="left" class="mute_text_{{$receive->send_user_id}} display-none">
                                        {{ $receive->query }}
                                    </div>
                                @else
                                    <div align="left" class="mute_text_info_{{$receive->send_user_id}} display-none">
                                        ミュート中の為、表示されません
                                    </div>
                                    <div align="left" class="mute_text_{{$receive->send_user_id}}" style="word-break: break-all;">
                                        {{ $receive->query }}
                                    </div>
                                @endif
                                <br>
                                <div align="left">
                                    {{--<span onclick="answer_post_modal('{{ $receive->logo }}', '{{ $receive->name }}', '{{ $receive->id }}')">--}}
                                        {{--<img src="{{ asset('img/mic.png') }}">--}}
                                        {{--<span class="fs-10">答える</span>--}}
                                    {{--</span>--}}
                                    <span onclick="answer_to_customer('{{ $receive->id }}')">
                                        <img src="{{ asset('img/mic.png') }}">
                                        <span class="fs-10">答える</span>
                                    </span>
                                    <span>&nbsp;&nbsp;&nbsp;</span>
                                    <span class="mute_list" data-id = "{{ $receive->send_user_id }}" onclick="mute('{{ $user->id }}', '{{ $receive->send_user_id }}')">
                                        @if($receive->mute == 1)
                                            <img class="mute_img_{{$receive->send_user_id}}"
                                                 id="mute_{{ $receive->send_user_id }}"
                                                 src="{{ asset('img/muted.png') }}"
                                                 data-myval="{{ $receive->mute }}"
                                            >
                                            <span class="fs-10 mute_info_{{$receive->send_user_id}}">
                                                ミュート解除
                                            </span>
                                        @else
                                            <img class="mute_img_{{$receive->send_user_id}}"
                                                 id="mute_{{ $receive->send_user_id }}"
                                                 src="{{ asset('img/unmuted.png') }}"
                                                 data-myval="{{ $receive->mute }}"
                                            >
                                            <span class="fs-10 mute_info_{{$receive->send_user_id}}">
                                                ミュート
                                            </span>
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="sp-20"></div>
                        </div>
                    </div>
                    @endforeach

                </div>

                <div id="send_query" class="tabcontent">
                    @foreach($send_query_list as $send)
                        <div id="item_{{ $send->id }}">
                            <div class="sp-40"></div>
                            <div class="border_bottom">
                                <div class="ib vm">
                                    <img src="{{ $send->logo }}" style="width: 50px;border-radius:50%;" onclick="window.location='{{ url("query_view/".md5($send->receive_user_id)) }}'">
                                </div>
                                <div class="ib vm" style="width: 80%;">
                                    <img src="{{ asset('img/close.png') }}" style="width: 22px;margin-left: 200px;" onclick="remove_query({{ $send->id }})">
                                    <div class="fs-12" align="left">
                                        <div class="ib w-1">{{ $send->duration }}時間前</div>
                                        {{--<div class="ib" style="font-size: 35px;margin-top: -20px;" onclick="remove_query({{ $send->id }})">&times;</div>--}}
                                    </div>
                                    <br>
                                    @if($send->mute == 1)
                                        <div align="left" class="mute_text_info_{{$send->send_user_id}}">
                                            ミュート中の為、表示されません
                                        </div>
                                        <div align="left" class="mute_text_{{$send->send_user_id}} display-none">
                                            {{ $send->query }}
                                        </div>
                                    @else
                                        <div align="left" class="mute_text_info_{{$send->send_user_id}} display-none">
                                            ミュート中の為、表示されません
                                        </div>
                                        <div align="left" class="mute_text_{{$send->send_user_id}}" style="word-break: break-all;">
                                            {{ $send->query }}
                                        </div>
                                    @endif
                                    <br>
                                    <div align="left">
                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                        <span class="mute_list" data-id = "{{ $send->send_user_id }}" onclick="mute('{{ $send->receive_user_id }}', '{{ $user->id }}')">
                                        @if($send->mute == 1)
                                                <img class="mute_img_{{$send->send_user_id}}"
                                                     id="mute_{{ $send->send_user_id }}"
                                                     src="{{ asset('img/muted.png') }}"
                                                     data-myval="{{ $send->mute }}"
                                                >
                                                <span class="fs-10 mute_info_{{$send->send_user_id}}">
                                                ミュート解除
                                            </span>
                                            @else
                                                <img class="mute_img_{{$send->send_user_id}}"
                                                     id="mute_{{ $send->send_user_id }}"
                                                     src="{{ asset('img/unmuted.png') }}"
                                                     data-myval="{{ $send->mute }}"
                                                >
                                                <span class="fs-10 mute_info_{{$send->send_user_id}}">
                                                ミュート
                                            </span>
                                            @endif
                                    </span>
                                    </div>
                                </div>
                                <div class="sp-20"></div>
                            </div>
                        </div>
                    @endforeach
                </div>

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
    var cont1_height = cont_height - $('#interview_top').height() - $('#advertise').height();
    $('#cont1').css({'min-height': cont1_height + "px"});

    //tab content part
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";

    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();

    function interview_modal(op){

        $.ajax({
            type:"POST",
            url:"{{ route('interview_modal') }}",
            data:{op: op, redirect: 'interview_list', _token:"{{ csrf_token() }}"},
            success: function(result){
                $('#myModal').html(result);
            }
        });
        $("#myModal").modal("toggle");
    }

    function url_copy(){

        //var url = window.location.href;
        var user = <?php echo(json_encode($user)) ?>;

        //alert(user.url);
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

    {{--function answer_post_modal(logo, name, id) {--}}

        {{--$.ajax({--}}
            {{--type:"GET",--}}
            {{--url:"{{ route('answer_post_modal') }}",--}}
            {{--data:{logo: logo, name: name, id: id},--}}
            {{--success: function(result){--}}
                {{--$('#myModal').html(result);--}}
            {{--}--}}
        {{--});--}}
        {{--$("#myModal").modal("toggle");--}}
    {{--}--}}

    function answer_to_customer(id) {

        $.ajax({
            type:"GET",
            url:"{{ route('answer_to_customer') }}",
            data:{id: id},
            success: function(result){
                if(result == "success") {
                    window.location.href = "{{URL::to('add_interview')}}"
                }
            }
        });

    }

    function mute(user1, user2) {

        var mute_status = $('#mute_' + user2).data('myval');
        //alert(mute_status);
        $.ajax({
            type:"GET",
            url:"{{ route('mute_change') }}",
            data:{user1: user1, user2: user2, mute: mute_status},
            success: function(result){

            }
        });
    }

    $(document).ready(function() {
        $(".container").on("click", ".mute_list", function () {

            var user_id = $(this).attr("data-id");
            var mute_status = $('#mute_' + user_id).data('myval');
            if(mute_status == 1) {
                $('.mute_img_' + user_id).attr('src', "{{ asset('img/unmuted.png') }}");
                $('.mute_info_' + user_id).text('ミュート');
                $('.mute_text_info_' + user_id).css('display', 'none');
                $('.mute_text_' + user_id).css('display', 'block');
                $('#mute_' + user_id).data('myval', 0);
            } else {
                $('.mute_img_' + user_id).attr('src', "{{ asset('img/muted.png') }}");
                $('.mute_info_' + user_id).text('ミュート解除');
                $('.mute_text_info_' + user_id).css('display', 'block');
                $('.mute_text_' + user_id).css('display', 'none');
                $('#mute_' + user_id).data('myval', 1);
            }

        });
    });

    function remove_query(id) {

        $("#item_"+id).remove();
        $.ajax({
            type:"GET",
            url:"{{ route('delete_query') }}",
            data:{query_id: id},
            success: function(result){

            }
        });

    }

</script>
