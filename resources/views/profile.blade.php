@include('layout.page_header')

    <div class="container-fluid text-center">
        <div class="row">
            <div class="wd-side"></div>
            <div class="wd-cont">
                <div class="tab">
                    <button class="tablinks" onclick="openCity(event, 'private')" id="defaultOpen">個人</button>
                    <button class="tablinks" onclick="openCity(event, 'official')">仕事</button>
                </div>

                <br>
                <div>
                    <p class="fs-25"><strong>質問と答えを自由に編集</strong></p>
                    <p class="fs-20">あなただけのインタビュー記事をつくろう</p>
                </div>

                <div class="sp-20"></div>
                <div class="advertise">
                    <p class="fs-20">画像をアップロード</p>
                </div>

                <div class="sp-40"></div>

                <div id="private" class="tabcontent">

                    <form action="#">
                        <div class="form-group">
                            <span class="fs-20"><strong>プロフの表示名 : </strong></span>
                            <input type="text" class="profile_name" id="profile_name" name="profile_name">
                        </div>
                        <div class="form-group">
                            <label for="query" class="fs-20">質 問 : </label>
                            <input type="text" class="profile_name wd-80" id="query" name="query">
                        </div>
                        <div class="form-group">
                            <label for="answer" class="fs-20 ver-align-top">回 答 : </label>
                            <textarea type="text" class="wd-80 answer_text" id="answer" name="answer" rows="5"></textarea>
                        </div>

                        <div class="sp-20"></div>
                        <div class="advertise">
                            <p class="fs-20">Adが入るスペース</p>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-info fs-20">登録する</button>
                        </div>
                    </form>

                </div>

                <div id="official" class="tabcontent">
                    <form action="{{ route('profile.confirm') }}">
                        <div class="form-group">
                            <span class="fs-20"><strong>プロフの表示名 : </strong></span>
                            <input type="text" class="profile_name" id="profile_name" name="profile_name">
                        </div>
                        <div class="form-group">
                            <label for="query" class="fs-20">質 問 : </label>
                            <input type="text" class="profile_name wd-80" id="query" name="query">
                        </div>
                        <div class="form-group">
                            <label for="answer" class="fs-20 ver-align-top">回 答 : </label>
                            <textarea type="text" class="wd-80 answer_text" id="answer" name="answer" rows="5"></textarea>
                        </div>

                        <div class="sp-20"></div>
                        <div class="advertise">
                            <p class="fs-20">Adが入るスペース</p>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-info fs-20">確認画面へ</button>
                        </div>
                    </form>
                </div>
                <div class="sp-20"></div>
            </div>
            <div class="wd-side"></div>
        </div>
    </div>

@include('layout.page_footer')

<script>
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
</script>
