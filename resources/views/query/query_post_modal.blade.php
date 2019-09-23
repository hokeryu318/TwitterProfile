<div class="modal-dialog">
    {{--<form name="query_post" action="{{ route('query_post') }}" method="post">--}}
        <input type="hidden" id="sample_user_id" name="sample_user_id" value="{{ $sample_user_id }}">
        {{--@csrf--}}
        <!-- Modal content-->
        <div class="modal-content tlm">
            <div class="modal-header" style="border-bottom: 0px;">
                <img src="{{ $sample_user_logo }}" style="width: 35px;border-radius:50%;margin-right:20px;">
                @if(strlen($sample_user_name) > 7)
                    <span style="margin:9px 0 0 -40px;">{{ $sample_user_name }}さん<br>へインタビュー</span>
                @else
                    <span style="margin:9px 0 0 -40px;">{{ $sample_user_name }}さんへインタビュー</span>
                @endif
            </div>
            <div class="modal-body" style="padding: 0px;">
                <textarea type="text" class="query_input wd-90 mar_left_5" id="new_query" name="new_query" rows="5"></textarea>
            </div>
            <div class="modal-footer" style="display: block;border-top: 0px;margin-bottom: 10px;">
                <div class="ib vm query_post_cancel" class="close" data-dismiss="modal">キャンセル</div>
                <div class="ib vm query_post" id="query_post_btn" onclick="query_post_click()">送る</div>
            </div>
        </div>
    {{--</form>--}}
</div>

<script>
    function query_post_click() {
        var sample_user_id = $('#sample_user_id').val();
        var new_query = $('#new_query').val();

        $.ajax({
            type:"POST",
            url:"{{ route('query_post') }}",
            data:{sample_user_id: sample_user_id, new_query: new_query, _token:"{{ csrf_token() }}"},
            success: function(result){
                if(result == 1) {
                    $(window).scrollTop(0);
                    $('#interview_post').fadeIn(2000).fadeOut(2000);
                }
            }
        });
        $("#myModal").modal("toggle");
    }
</script>
