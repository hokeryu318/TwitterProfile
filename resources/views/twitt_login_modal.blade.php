<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content tlm">
        <div class="modal-header" style="border-bottom: 0px;">
            <div class="col-sm-2"></div>
            <div class="col-sm-8" align="center">
                <img src="{{ asset('img/man2.png') }}" style="width: 60px;border-radius:50%;">
            </div>
            <div class="col-sm-2">
                <button type="button" class="close" data-dismiss="modal" style="font-size: 40px;">&times;</button>
            </div>
        </div>
        <div class="modal-body" style="padding: 0px;">
            <p style="text-align: center;">ログインして〇〇さんへインタビュー</p>
        </div>
        <div class="modal-footer" style="display: block;border-top: 0px;margin-bottom: 20px;">
            <div>
                <div class="twittlogin" onclick="window.location='{{ url("/twittlogin1/".$sample_user_id) }}'">
                    <span><img src="{{ asset('img/twitter_icon.png') }}"></span>
                    <span>Twitterでログイン</span>
                </div>
            </div>
        </div>
    </div>

</div>

