<div class="box-body">
    <div class="form-group">
            <label for="content" class="control-label required">Sponsor Category</label> 
            @if(!empty($menucategories))
            <input class="form-control" placeholder="sponsor category" name="sponsor_category" type="text" id="sponsor_category" value="{{ $menucategories->menu_name}}">
            @else   
            <input class="form-control" placeholder="sponsor category" name="sponsor_category" type="text" id="sponsor_category" >
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
