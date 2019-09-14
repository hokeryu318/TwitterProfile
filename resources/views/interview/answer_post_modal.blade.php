<div class="modal-dialog">
        <input type="hidden" id="qeury_id" name="qeury_id" value="{{ $id }}">
        <!-- Modal content-->
        <div class="modal-content tlm">
            <div class="modal-header" style="border-bottom: 0px;">
                <img src="{{ asset('logo/'.$logo) }}" style="width: 35px;">
                <span style="margin:9px 0 0 -40px;">{{ $name }}さんへインタビュー</span>
            </div>
            <div class="modal-body" style="padding: 0px;">
                <textarea type="text" class="query_input wd-90 mar_left_5" id="new_answer" name="new_answer" rows="5"></textarea>
            </div>
            <div class="modal-footer" style="display: block;border-top: 0px;margin-bottom: 10px;">
                <div class="ib vm query_post_cancel" class="close" data-dismiss="modal">キャンセル</div>
                <div class="ib vm query_post" id="query_post_btn" onclick="answer_post_click()">送る</div>
            </div>
        </div>
</div>

<script>
    function answer_post_click() {
        var query_id = $('#qeury_id').val();
        var new_answer = $('#new_answer').val();

        $.ajax({
            type:"POST",
            url:"{{ route('answer_post') }}",
            data:{query_id: query_id, new_answer: new_answer, _token:"{{ csrf_token() }}"},
            success: function(result){
                if(result == 1)
                    $('#answer_post').fadeIn(2000).fadeOut(5000);
            }
        });
        $("#myModal").modal("toggle");
    }
</script>
