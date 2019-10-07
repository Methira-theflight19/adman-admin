<div class="box-body">
    <div class="form-group pd-3">
            <label for="content" class="control-label required">Winner Picture</label> 
            
            @if(!empty($winners->image))
                <input type="file"  name="image" class="dropify" data-default-file="{{ url('storage/img/winner/' . $winners->image) }}" data-multiple-caption="{count} files selected" require />
            @else   
                <input type="file" name="image" id="file-1" class="dropify"  data-multiple-caption="{count} files selected" require />
            @endif
    </div><!--form control-->
    <div class="form-group pd-3">
            <label for="content" class="control-label required">PDF - Full Entry Kit</label> 
            
            @if(!empty($winners->pdf_1))
                <input type="file"  name="pdf_1" class="dropify" data-default-file="{{ url('storage/pdf/winner/' . $winners->pdf_1) }}" data-multiple-caption="{count} files selected" require />
            @else   
                <input type="file" name="pdf_1" id="file-1" class="dropify"  data-multiple-caption="{count} files selected" require />
            @endif
    </div><!--form control-->
    <div class="form-group pd-3">
            <label for="content" class="control-label required">PDF - Client Endoesement Form</label> 
            
            @if(!empty($winners->pdf_2))
                <input type="file"  name="pdf_2" class="dropify" data-default-file="{{ url('storage/pdf/winner/' . $winners->pdf_1) }}" data-multiple-caption="{count} files selected" require />
            @else   
                <input type="file" name="pdf_2" id="file-1" class="dropify"  data-multiple-caption="{count} files selected" require />
            @endif
    </div><!--form control-->
    


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
