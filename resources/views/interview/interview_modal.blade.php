<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content isu">
        <div class="modal-header" style="border-bottom: 0px;">
            <div class="col-sm-2"></div>
            <div class="col-sm-8" align="center">
                <img src="{{ $user->logo }}" style="width: 50px;border-radius:50%;">
            </div>
            <div class="col-sm-2"></div>
        </div>
        <div class="modal-body" style="padding: 0px;">
            <p style="text-align: center;">{{ $alert }}</p>
        </div>
        <div class="modal-footer" style="display: block;border-top: 0px;margin-bottom: 20px;">
            <div>
                <div class="twittshare" onclick="window.location='{{ url("/tweet") }}'">
                    <span><img src="{{ asset('img/twitter_icon.png') }}"></span>
                    <span>Twitterでシェア！</span>
                </div>
                <div class="sp-10"></div>
                <div class="urlcopy" onclick="url_copy()">
                    <span>URLをコピーしてシェア!</span>
                </div>
            </div>
        </div>
    </div>

</div>



