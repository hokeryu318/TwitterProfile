@include('layout.page_header')

    <div class="container-fluid text-center">
        <div class="row">
            <div class="wd-side"></div>
            <div class="wd-cont">
                <div>
                    <p class="fs-25"><strong>確認画面</strong></p>
                    <p class="fs-20">内容を確認し最下部の「プロフを作成！」ボタンを押してください。
                    </p>
                </div>
                <div class="advertise">
                    <p class="fs-20">Adが入るスペース</p>
                </div>
                <div>
                    <p class="fs-25"><strong>〇〇さんに聞いてみました</strong></p>
                </div>
                <div class="advertise">
                    <p class="fs-20">画像をアップロード</p>
                </div>
                <div class="sp-40"></div>
                <form action="{{ route('profile.finish') }}">
                    <div class="form-group">
                        <span class="fs-20"><strong>プロフの表示名 : </strong></span>
                        <input type="text" class="profile_name" id="profile_name" name="profile_name">
                    </div>
                    <div class="form-group">
                        {{--<label for="query" class="fs-20">質 問 : </label>--}}
                        <input type="text" class="profile_name wd-80" id="query" name="query" value="名前/アカウント名/あだ名">
                    </div>
                    <div class="form-group">
                        {{--<label for="answer" class="fs-20 ver-align-top">回 答 : </label>--}}
                        <textarea type="text" class="wd-80 answer_text" id="answer" name="answer" rows="5">
                        </textarea>
                    </div>

                    <div class="sp-20"></div>
                    <div class="advertise">
                        <p class="fs-20">Adが入るスペース</p>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-info fs-20">インタビューを作成</button>
                    </div>
                    <div class="sp-20"></div>
                </form>
            </div>
            <div class="wd-side"></div>
        </div>
    </div>

@include('layout.page_footer')

