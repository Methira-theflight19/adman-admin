<div class="box-body">

    <div class="form-group">
        <label for="content" class="control-label required">Talk Detail</label> 
        <select class="form-control custom-select" name="talk_detail" id="talk_detail" data-toggle="select2" required>
    
    


        @if(!empty($selectedtalkdetail))
            @foreach($talkdetail as $talkdetails)
            <?php $room = $talkdetails->room[0]->name.' @'.$talkdetails->name.$talkdetails->time_start.' - '.$talkdetails->time_end ?>
                @if($talkdetails['id'] == $selectedtalkdetail[0])
                    <option selected value="{{$talkdetails->id}}">{{$room}}</option>
                @else
                    <option value="{{$talkdetails->id}}">{{$room}}</option>
                @endif
            @endforeach
        @else
                    <option value="" >None</option>
                @foreach($talkdetail as $talkdetails)
                <?php $room = $talkdetails->room[0]->name.' @'.$talkdetails->name.$talkdetails->time_start.' - '.$talkdetails->time_end ?>
                    <option value="{{$talkdetails->id}}">{{$room}}</option>
                @endforeach
        @endif

        
        </select>

    </div>

    <div class="form-group pd-3">
            <label for="content" class="control-label required">Speaker Picture</label> 
            
            @if(!empty($talkphotos->image))
                <input type="file"  name="image" class="dropify" data-default-file="{{ url('storage/img/talkdetailphoto/' . $talkphotos->image) }}" data-multiple-caption="{count} files selected" require />
            @else   
                <input type="file" name="image" id="file-1" class="dropify"  data-multiple-caption="{count} files selected" require />
            @endif
    </div><!--form control-->
    <div class="form-group">
            <label for="content" class="control-label required">Name</label> 
        @if(!empty($talkphotos))
            <input class="form-control" placeholder="name" name="name" type="text" id="name" value="{{ $talkphotos->name}}">
        @else   
            <input class="form-control" placeholder="name" name="name" type="text" id="name" >
        @endif
    </div><!--form control-->
    <div class="form-group">
            <label for="content" class="control-label required">Position</label> 
        @if(!empty($talkphotos))
            <input class="form-control" placeholder="position" name="position" type="text" id="position" value="{{ $talkphotos->position}}">
        @else   
            <input class="form-control" placeholder="position" name="position" type="text" id="position" >
        @endif
    </div><!--form control-->
    <div class="form-group">
            <label for="content" class="control-label required">Company</label> 
        @if(!empty($talkphotos))
            <input class="form-control" placeholder="company" name="company" type="text" id="company" value="{{ $talkphotos->company}}">
        @else   
            <input class="form-control" placeholder="company" name="company" type="text" id="company" >
        @endif
    </div><!--form control-->
    <div class="form-group pd-3">
            <label for="content" class="control-label required">Company picture</label> 
            
            @if(!empty($talkphotos->company_image))
                <input type="file"  name="company_image" class="dropify" data-default-file="{{ url('storage/img/talkdetailphoto/' . $talkphotos->company_image) }}" data-multiple-caption="{count} files selected" require />
            @else   
                <input type="file" name="company_image" id="file-1" class="dropify"  data-multiple-caption="{count} files selected" require />
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
