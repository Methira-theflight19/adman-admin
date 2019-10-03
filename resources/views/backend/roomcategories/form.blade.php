<div class="box-body">
    <div class="form-group">
        <label for="content" class="control-label required">Topic Talk</label> 
        <select class="form-control custom-select" name="topic" id="topic" data-toggle="select2" required>
    
    
        @if(!empty($selectedtopic))
            @foreach($topic as $topics)
                @if($topics['id'] == $selectedtopic[0])
                    <option selected value="{{$topics->id}}">{{$topics->name}}</option>
                @else
                    <option value="{{$topics->id}}">{{$topics->name}}</option>
                @endif
            @endforeach
        @else
                    <option value="" >None</option>
                @foreach($topic as $topics)
                    <option value="{{$topics->id}}">{{$topics->name}}</option>
                @endforeach
        @endif
        
        </select>

    </div>

    <div class="form-group">
        <label for="content" class="control-label required">Name</label> 
    @if(!empty($roomcategories))
        <input class="form-control" placeholder="Name" name="name" type="text" id="name" value="{{ $roomcategories->name}}">
    @else   
        <input class="form-control" placeholder="Name" name="name" type="text" id="name" >
    @endif
    </div><!--form control-->

    <div class="form-group">
        <label for="content" class="control-label required">Room</label> 
    @if(!empty($roomcategories))
        <input class="form-control" placeholder="Name" name="room" type="text" id="room" value="{{ $roomcategories->room}}">
    @else   
        <input class="form-control" placeholder="Name" name="room" type="text" id="room" >
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
