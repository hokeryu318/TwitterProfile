@include('layout.page_header')

    <div class="container-fluid text-center">

        <div class="row">

            <div class="wd-side"></div>

            <div class="wd-cont">
                <div class="sp-20"></div>

                <div>
                    <p class="fs-25"><strong>〇〇さんに聞いてみました</strong></p>
                </div>
                <div class="advertise">
                    <p class="fs-20">写真画像</p>
                </div>
                <div>
                    <p class="fs-20">自分も作る/編集する</p>
                </div>
                <div>
                    <div class="twittlogin">
                        <p class="fs-20">Twitterでログイン</p>
                    </div>
                </div>
                <div class="sp-20"></div>
                <div class="border-top">
                    <p class="fs-20" align="left">質問内容その１</p>
                    <p class="fs-20" align="left">
                        回答その１<br>
                        〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇
                        〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇
                        〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇
                    </p>
                </div>
                <div class="border-top">
                    <p class="fs-20" align="left">質問内容その2</p>
                    <p class="fs-20" align="left">
                        回答その2<br>
                        〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇
                        〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇
                        〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇
                    </p>
                </div>
                <div class="border-top">
                    <p class="fs-20" align="left">質問内容その3</p>
                    <p class="fs-20" align="left">
                        回答その3<br>
                        〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇
                        〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇
                        〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇
                    </p>
                </div>
                <div class="border-top">
                    <p class="fs-20" align="left">質問内容その4</p>
                    <p class="fs-20" align="left">
                        回答その4<br>
                        〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇
                        〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇
                        〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇
                    </p>
                </div>
                <div class="border-top">
                    <p class="fs-20" align="left">質問内容その5</p>
                    <p class="fs-20" align="left">
                        回答その5<br>
                        〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇
                        〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇
                        〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇
                    </p>
                </div>
                <div class="advertise">
                    <p class="fs-20">Adが入るスペース</p>
                </div>
            </div>

            <div class="wd-side">
                <div class="sticky" align="left">
                    <img src="{{ asset('img/stick_query_btn.png') }}" width="60px" height="60px" onclick="window.location='{{ route("query.post") }}'">
                </div>
            </div>

        </div>

    </div>

@include('layout.page_footer')
