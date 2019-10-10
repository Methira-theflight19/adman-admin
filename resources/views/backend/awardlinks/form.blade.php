<div class="box-body">
    <div class="form-group pd-3">
            <label for="content" class="control-label required">full entry kit</label> 
            
            @if(!empty($awardlinks->link1))
                <input type="file"  name="link1" id="link2" class="dropify" data-default-file="{{ url('storage/pdf/award/' . $awardlinks->link1) }}" data-multiple-caption="{count} files selected" require />
            @else   
                <input type="file" name="link1"  id="link2" class="dropify"  data-multiple-caption="{count} files selected" require />
            @endif
    </div><!--form control-->
    <div class="form-group pd-3">
            <label for="content" class="control-label required">client endorsement form</label> 
            
            @if(!empty($awardlinks->link2))
                <input type="file"  name="link2" id="link2" class="dropify" data-default-file="{{ url('storage/pdf/award/' . $awardlinks->link2) }}" data-multiple-caption="{count} files selected" require />
            @else   
                <input type="file" name="link2" id="link2" id="file-1" class="dropify"  data-multiple-caption="{count} files selected" require />
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
