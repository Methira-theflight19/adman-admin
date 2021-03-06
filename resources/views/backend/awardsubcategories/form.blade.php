<div class="box-body">
    <div class="form-group">
        <label for="content" class="control-label required">Award Category</label> 
        <select class="form-control custom-select" name="category" id="category" data-toggle="select2" required>

        @if(!empty($selectedcat))
            @foreach($awardcat as $cat)
                @if($cat['id'] == $selectedcat[0])
                    <option selected value="{{$cat->id}}">{{$cat->name}}</option>
                @else
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endif
            @endforeach
        @else
                    <option value="" >None</option>
                @foreach($awardcat as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
        @endif
        
        </select>
    </div>
    <div class="form-group">
        <label for="content" class="control-label required">Sub Category Name</label> 
    @if(!empty($awardsubcategories))
        <input class="form-control" placeholder="name" name="name" type="text" id="name" value="{{ $awardsubcategories->name}}">
    @else   
        <input class="form-control" placeholder="name" name="name" type="text" id="name" >
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
