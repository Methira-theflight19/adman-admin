<div class="box-body">
<div class="form-group">
        <label for="content" class="control-label required">Name</label> 
    @if(!empty($achivecategories))
        <input class="form-control" placeholder="name" name="name" type="text" id="name" value="{{ $achivecategories->name}}">
    @else   
        <input class="form-control" placeholder="name" name="name" type="text" id="name" >
    @endif
    </div><!--form control-->
    <div class="form-group">
        <label for="content" class="control-label required">Subtitle</label> 
    @if(!empty($achivecategories))
        <input class="form-control" placeholder="subtitle" name="subtitle" type="text" id="subtitle" value="{{ $achivecategories->subtitle}}">
    @else   
        <input class="form-control" placeholder="subtitle" name="subtitle" type="text" id="subtitle" >
    @endif
    </div><!--form control-->
    <div class="form-group pd-3">
            <label for="content" class="control-label required">Icon</label> 
            
            @if(!empty($achivecategories->image))
                <input type="file"  name="image" class="dropify" data-default-file="{{ url('storage/img/achive/' . $achivecategories->image) }}" data-multiple-caption="{count} files selected" require />
            @else   
                <input type="file" name="image" id="file-1" class="dropify"  data-multiple-caption="{count} files selected" require />
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
        $( document ).ready( function() {
            //Everything in here would execute after the DOM is ready to manipulated.
        });
    </script>
@endsection
