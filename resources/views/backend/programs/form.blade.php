<div class="box-body">
    <div class="form-group">
        <label for="content" class="control-label required">Header</label> 
        @if(!empty($programs))
        <input class="form-control" placeholder="Header" name="name" type="text" id="name" value="{{ $programs->name}}">
        @else   
        <input class="form-control" placeholder="Header" name="name" type="text" id="name" >
        @endif
    </div><!--form control-->
    <div class="form-group pd-3">
        <label for="content" class="control-label required">Picture</label> 
        
        @if(!empty($programs->image))
            <input type="file"  name="image" class="dropify" data-default-file="{{ url('storage/img/program/' . $programs->image) }}" data-multiple-caption="{count} files selected" require />
        @else   
            <input type="file" name="image" id="file-1" class="dropify"  data-multiple-caption="{count} files selected" require />
        @endif
    </div><!--form control-->
    <div class="form-group pd-3">
        <label for="content" class="control-label required">PDF</label> 
        
        @if(!empty($programs->pdf))
            <input type="file"  name="pdf" class="dropify" data-default-file="{{ url('storage/pdf/program/' . $programs->pdf) }}" data-multiple-caption="{count} files selected" require />
        @else   
            <input type="file" name="pdf" id="file-1" class="dropify"  data-multiple-caption="{count} files selected" require />
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
