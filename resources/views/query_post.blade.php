@include('layout.page_header')

    <div class="container-fluid text-center">
        <div class="row">
            <div class="wd-side"></div>
            <div class="wd-cont">
                <div class="min-hg-700">
                    <div class="sp-40"></div>
                    <form action="#">

                        <div class="form-group">
                            <textarea type="text" class="wd-80 answer_text" id="answer" name="answer" rows="8"></textarea>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-info fs-20">質問を送る</button>
                        </div>

                        <div class="sp-20"></div>
                        <div class="advertise">
                            <p class="fs-20">Adが入るスペース</p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="wd-side"></div>
        </div>
    </div>

@include('layout.page_footer')

