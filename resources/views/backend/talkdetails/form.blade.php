<div class="box-body">

    <div class="form-group">
        <label for="content" class="control-label required">Topic Talk</label> 
        <select class="form-control custom-select" name="room" id="room" data-toggle="select2" required>
    
    
        @if(!empty($selectedroom))
            @foreach($rooms as $room)
                @if($room['id'] == $selectedroom[0])
                    <option selected value="{{$room->id}}">{{$room->name.' @'.$room->room}}</option>
                @else
                    <option value="{{$room->id}}">{{$room->name.' @'.$room->room}}</option>
                @endif
            @endforeach
        @else
                    <option value="" >None</option>
                @foreach($rooms as $room)
                    <option value="{{$room->id}}">{{$room->name.' @'.$room->room}}</option>
                @endforeach
        @endif
        
        </select>
    </div>
    <div class="form-group">
        <label for="content" class="control-label required">Name</label> 
    @if(!empty($talkdetails))
        <input class="form-control" placeholder="name" name="name" type="text" id="name" value="{{ $talkdetails->name}}">
    @else   
        <input class="form-control" placeholder="name" name="name" type="text" id="name" >
    @endif
    </div><!--form control-->
    <div class="form-group">
        <label for="content" class="control-label required">Time Start</label> 
    @if(!empty($talkdetails))
        <input class="form-control" placeholder="time start" name="time_start" type="text" id="time_end" value="{{ $talkdetails->time_start}}">
    @else   
        <input class="form-control" placeholder="time start" name="time_start" type="text" id="time_end" >
    @endif
    </div><!--form control-->
    <div class="form-group">
        <label for="content" class="control-label required">Time End</label> 
    @if(!empty($talkdetails))
        <input class="form-control" placeholder="Time End" name="time_end" type="text" id="time_end" value="{{ $talkdetails->time_end}}">
    @else   
        <input class="form-control" placeholder="Time End" name="time_end" type="text" id="time_end" >
    @endif
    </div><!--form control-->

        <!-- vvvvvvvvvv Don't Delete vvvvvvvvv -->
        <!-- {{ Form::label('name', trans('validation.attributes.backend.blogs.title'), ['class' => 'col-lg-12 control-label required']) }} -->
       <!-- ^^^^^^^^^^^ Don't Delete ^^^^^^^^^^ -->

       <div class="form-group">
        <label for="content" class="control-label required">Content</label> 
        <div class=" mce-box">
            {{ Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.blogs.content')]) }}  
        </div><!--col-lg-10-->
    </div><!--form control-->
    <div class="form-group">
        <div class="checkbox checkbox-info mb-2">
        <input  checked="checked" id="checkbox4" type="checkbox" id="active" name="active" value="1">
        <label for="checkbox4">Active</label>
        </div> 
    </div> 


</div><!--box-body-->

@section('before-scripts')
    <script src="/js/backend/admin.js"></script>
@endsection


@section("after-scripts")
    <script type="text/javascript">
        Backend.Blog.selectors.GenerateSlugUrl = "{{route('admin.generate.slug')}}";
        Backend.Blog.selectors.SlugUrl = "{{url('/')}}";
        Backend.Blog.init('{{ config('locale.languages.' . app()->getLocale())[1] }}');
    </script>
@endsection