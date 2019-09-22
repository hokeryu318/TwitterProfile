@include('layout.page_header')

<div id="int_input_plz" class="int_input_plz" style="display: none;">インタビューを入力してください</div>

<div id="int_input_finish" class="interview_post" style="display: none;">インタビューが完成しました！</div>

<span class="it_finish" align="right" id="interviewfinish">完了</span>

<div class="container text-center">

    <div class="row">

        <div class="col-sm-4"></div>

        <div class="col-sm-4 pl-40 pr-40">

            {{--<span class="it_finish" align="right" id="interviewfinish">完了</span>--}}

            <div class="sp-20"></div>
            <div class="interview_top" style="opacity: 0.2;">
                <div class="ib vm" style="width: 30%;margin-top: 15px;margin-bottom: 15px;margin-left: 9%;">
                    <img src="{{ $user->logo }}" class="avatar" />
                    <div class="query_collect">質問を募集</div>
                </div>
                <div class="ib vm" style="width: 1%;"></div>
                <div class="ib vm" style="width: 40%; margin-bottom: 15px;margin-top: 15px;">
                    <div style="width: 120%; margin-bottom: 32px;">
                        <span style="float: left;margin-left: 10px;">{{ $user->name }}さんの</span>
                        <br>
                        <span style="float: left;margin-left: 10px;">インタビュー数{{ $query_count }}</span>
                    </div>
                    <div class="interview_share">
                        <span><img src="{{ asset('img/share.png') }}"></span>
                        <span>インタビューをシェア</span>
                    </div>
                </div>
            </div>

            <div class="hg-cont-1">
            <div class="sp-20"></div>

                <span class="add_it_btn fs-15" >+&nbsp;&nbsp;&nbsp;インタビューを追加</span>
                <div class="sp-40"></div>
                <form name="interview_finish" action="{{ route('interview_finish') }}" method="post">
                    @csrf
                    <input type="hidden" id="deleted_ids" name="deleted_ids[]">
                    <div class="field_wrapper" id="field_wrapper">
                        @if($query_list)
                            @foreach($query_list as $key => $query)
                                <div id="add_{{ $query->id }}">
                                    <div class="sp-10"></div>
                                    <div class="row">
                                        <div class="wd-20"></div>
                                        <div class="wd-60"></div>
                                        <div class="wd-20" style="font-size: 30px;opacity: 0.5" onclick="remove_query({{ $query->id }})">&times;</div>
                                    </div>
                                    <div class="border_bottom1">
                                        <div align="left">
                                            <img class="vm" src="{{ $query->logo }}" style="width: 30px;border-radius:50%;">
                                            <input type="text" class="fs-15 add_it_input query-text" value="{{ $query->query }}" name="query_text[]" />
                                            <input type="hidden" class="query-id" value="{{ $query->id }}" name="query_id[]"/>
                                        </div>
                                        <div class="sp-20"></div>
                                        <div align="left">
                                            <textarea type="text" class="fs-15 add_id_textarea" id="an_{{ $key }}" name="answer[]" rows="3">{{ $query->answer }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </form>

            </div>

            <div class="sp-20"></div>

            <div>
                <span class="fs-15">
                    @if(count($query_list) > 5)
                    もっと見る
                    @else
                    &nbsp;
                    @endif
                </span>
            </div>

            <div class="sp-40"></div>

            {{--<div class="advertise">--}}
                {{--<p class="ad_text">Adが入るスペース</p>--}}
            {{--</div>--}}

        </div>

        <div class="col-sm-4"></div>
    </div>
</div>

<div class="container text-center">

    <div class="row">

        <div class="col-sm-4"></div>

        <div class="col-sm-4 pl-40 pr-40">
            <div class="advertise">
                <p class="ad_text">Adが入るスペース</p>
            </div>
        </div>

        <div class="col-sm-4"></div>

    </div>
</div>

<div id="add_text" style="display: none;">
    <div class="sp-40"></div>
    <div class="border_bottom1">
        <div align="left">
            <img class="vm" src="{{ $user->logo }}" style="width: 30px;border-radius: 50%;">
            <input type="text" class="fs-15 add_it_input query-text" value="" name="query_text[]" />
            <input type="hidden" class="query-id" value="0" name="query_id[]"/>
        </div>
        <div class="sp-20"></div>
        <div align="left">
            <textarea type="text" class="fs-15 add_id_textarea" name="answer[]" rows="3"></textarea>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog"></div>
<div class="modal fade" id="thirdModal" role="dialog"></div>

@include('layout.page_footer')

<script>
    $(document).ready(function(){
        var maxField = 5; //Input fields increment limitation
        var addButton = $('.add_it_btn'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper

        var x = 0; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){
                x++; //Increment field counter
                var fieldHTML = $("#add_text").html();
                // var fieldHTML = $("#add_text").clone();
                $(fieldHTML).css("display", "block");
                $(wrapper).prepend(fieldHTML); //Add field html
            }
        });

        $('#an_0').focus();

    });

    var deleted_ids = [];
    function remove_query(id) {

        deleted_ids.push(id);//console.log(deleted_ids);
        $('#deleted_ids').val(deleted_ids);

        // document.getElementById(id).style.display = "none";
        $("#add_"+id).remove();
    }

    // function interviewfinish() {
    //
    //     var wrapper = document.getElementById('field_wrapper');
    //     if(wrapper.innerHTML.length == 97) {//if there is no data
    //         $('#int_input_plz').fadeIn(2000).fadeOut(5000);
    //     } else {
    //         document.interview_finish.submit();
    //     }
    // }

    $('#interviewfinish').on('click', function () {

        var reqlength = $('.query-text').length;
        // /console.log(reqlength);
        var value = $('.query-text').filter(function () {
            return this.value == '';
        });
        console.log(value.length);
        if (value.length >= 2) {
            $('#int_input_plz').fadeIn(1000).fadeOut(1000);
        } else {
            $('#int_input_finish').fadeIn(200);
            document.interview_finish.submit();
        }
    });

</script>
