<div class="box-body">
    <div class="form-group">
        <label for="content" class="control-label required">Gallery name</label> 
    @if(!empty($gallerycategories))
        <input class="form-control" placeholder="gallery name" name="name" type="text" id="name" value="{{ $gallerycategories->name}}">
    @else   
        <input class="form-control" placeholder="gallery name" name="name" type="text" id="name" >
    @endif
    </div><!--form control-->

    
    <div class="form-group">
            <div class="control-group">
                <div class="checkbox checkbox-info mb-2">
                    <input id='not_active' type='hidden' value='0' name='active'>        
                    <input id="checkbox4" type="checkbox" name="active" value="1">
                    <label for="checkbox4">
                            Active
                    </label>
                </div> 
            </div>  
    </div><!--form control-->
    
</div><!--box-body-->

@section("after-scripts")
    <script type="text/javascript">
        //Put your javascript needs in here.
        //Don't forget to put `@`parent exactly after `@`section("after-scripts"),
        //if your create or edit blade contains javascript of its own
        if(document.getElementById("checkbox4").checked) {
            document.getElementById('not_active').disabled = true;
        }
    </script>
@endsection
