<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content hg-cont-0 add_it">
        <div class="modal-header" style="border-bottom: 0px;"></div>
        <div class="modal-body" style="padding: 0px;">

            <span class="sticky it_finish" align="right" onclick="interviewfinish()">完了</span>

            <div class="row">
                <div class="wd-10"></div>
                <div class="wd-80 add_it_cont" class="add_it_cont">

                    <span class="add_it_btn fs-15">+&nbsp;&nbsp;&nbsp;インタビューを追加</span>

                    <form name="interview_finish" action="{{ route('interview_finish') }}" method="post">
                    @csrf
                    <div class="field_wrapper">

                        @if($query_list)
                            @foreach($query_list as $query)
                                <div id="{{ $query->id }}">
                                    <div class="sp-20"></div>
                                    <div class="border_bottom">
                                        <div>
                                            <img class="vm" src="{{ asset('logo/'.$query->logo) }}" style="width: 30px;">
                                            <input type="text" class="add_it_input" value="{{ $query->query }}" name="query1[]" />
                                            <span class="remove_it" onclick="remove_query('{{ $query->id }}')">&times;</span>
                                        </div>
                                        <div>
                                            <textarea type="text" class="fs-15 add_id_textarea" name="answer1[]" rows="5">{{ $query->answer }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="sp-20"></div>
                            <div class="border_bottom">
                                <div>
                                    <img class="vm" src="{{ asset('logo/'.$user->logo) }}" style="width: 30px;">
                                    <input type="text" class="add_it_input" value="" name="query[]" />
                                </div>
                                <div>
                                    <textarea type="text" class="fs-15 add_id_textarea" name="answer[]" rows="5"></textarea>
                                </div>
                            </div>
                        @endif

                    </div>
                    </form>

                </div>
                <div class="wd-10"></div>
            </div>

        </div>
        <div class="modal-footer" style="display: block;border-top: 0px;"></div>

    </div>

</div>

{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
<script>
    $(document).ready(function(){
        var maxField = 5; //Input fields increment limitation
        var addButton = $('.add_it_btn'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div class="sp-20"></div>'+
                        '<div class="border_bottom">'+
                        '<div>'+
                        '<img class="vm" src="{{ asset('logo/'.$user->logo) }}" style="width: 30px;">'+
                        '<input type="text" class="add_it_input" value="" name="query[]" style="margin-left: 5px;" />'+
                        '</div>'+
                        '<div>'+
                        '<textarea type="text" class="fs-15 add_id_textarea" name="answer[]" rows="5"></textarea>'+
                        '</div>'+
                        '</div>';
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });

    });

    function remove_query(id) {

        document.getElementById(id).style.display = "none";
    }

    function interviewfinish() {

        document.interview_finish.submit();
    }
</script>