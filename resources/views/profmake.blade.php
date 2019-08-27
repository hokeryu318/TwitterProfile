@include('layout.page_header')

    <div class="container-fluid text-center">
        <div class="row">
            <div class="wd-side"></div>
            <div class="wd-cont">
                <div class="right">
                    <img class="bubble_image" src="{{ asset('img/bubble.png') }}">
                    <span class="querynum fs-20">12</span>
                </div>
            </div>
            <div class="wd-side"></div>
        </div>

        <div class="row">
            <div class="wd-side"></div>
            <div class="wd-cont">
               <div class="sp-40"></div>
               <div class="wd-100">
                   <div class="twittlogin">
                       <p class="fs-20" onclick="window.location='{{ route("profile.index") }}'">インタビューページを作成/編集</p>
                   </div>
               </div>
               <div class="sp-20"></div>
               <div>
                   <div class="askquery">
                       <p class="fs-20" onclick="window.location='{{ route("query.list") }}'">インタビューの質問を募集する</p>
                   </div>
               </div>
               <div class="sp-200"></div>
               <div class="advertise">
                   <p class="fs-20">Adが入るスペース</p>
               </div>
            </div>
            <div class="wd-side"></div>
        </div>
    </div>
@include('layout.page_footer')

<script>
    {{--function prof_make(){--}}
        {{--$.ajax({--}}
            {{--type:"GET",--}}
            {{--url:"{{ route('profile.index') }}",--}}
            {{--data:{--}}

            {{--},--}}
            {{--success: function(result){--}}
                {{--console.dir(result);--}}
            {{--}--}}
        {{--});--}}
    {{--}--}}
</script>
