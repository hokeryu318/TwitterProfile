@include('layout.page_header')

    <div class="container-fluid text-center">

        <div class="row">
            <div class="wd-side"></div>
            <div class="wd-cont">
                <div>
                    <p class="fs-25"><strong>インタビューの質問一覧</strong></p>
                </div>
                <div>
                    <div class="twittlogin">
                        <p class="fs-20" onclick="window.location='{{ route("query.get") }}'">質問をTwitterで募集する</p>
                    </div>
                </div>
            </div>
            <div class="wd-side"></div>
        </div>

        <div class="min-hg-600">

            <div class="row">
                <div class="sp-20"></div>
            </div>
            <div class="row">
                <div class="wd-side"></div>
                <div class="wd-cont border-top">
                    <div class="sp-20"></div>
                    <p class="fs-20 left">おつかれさまです。趣味は何ですか？</p>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="querybtn wd-100">
                                <p class="fs-20">インタビューに答える</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="querydelbtn wd-100">
                                <p class="fs-20">質問を削除</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wd-side"></div>
            </div>

            <div class="row">
                <div class="sp-20"></div>
            </div>
            <div class="row">
                <div class="wd-side"></div>
                <div class="wd-cont border-top">
                    <div class="sp-20"></div>
                    <p class="fs-20 left">明日死ぬなら何を食べたい？</p>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="querybtn wd-100">
                                <p class="fs-20">インタビューに答える</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="querydelbtn wd-100">
                                <p class="fs-20">質問を削除</p>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="wd-side"></div>
        </div>

        </div>
    </div>

@include('layout.page_footer')
