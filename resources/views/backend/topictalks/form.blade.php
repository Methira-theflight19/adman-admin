<div class="box-body">
    <div class="form-group">
        <label for="content" class="control-label required">Topic Talk Name</label> 
    @if(!empty($topictalks))
        <input class="form-control" placeholder="topic talk name" name="name" type="text" id="name" value="{{ $topictalks->name}}">
    @else   
        <input class="form-control" placeholder="topic talk name" name="name" type="text" id="name" >
    @endif
</div><!--form control-->
</div><!--box-body-->

@section("after-scripts")
    <script type="text/javascript">
        //Put your javascript needs in here.
        //Don't forget to put `@`parent exactly after `@`section("after-scripts"),
        //if your create or edit blade contains javascript of its own
        $( document ).ready( function() {
            //Everything in here would execute after the DOM is ready to manipulated.
        });
    </script>
@endsection
