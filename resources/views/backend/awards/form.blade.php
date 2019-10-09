<div class="box-body">
    <div class="form-group">
        <label for="content" class="control-label required">Award Name</label> 
    @if(!empty($awards))
        <input class="form-control" placeholder="name" name="name" type="text" id="name" value="{{ $awards->name}}">
    @else   
        <input class="form-control" placeholder="name" name="name" type="text" id="name" >
    @endif
    </div><!--form control-->
   
    <?php 
    
        if(!empty($selectedCat)){
            $selectedCatid = $selectedCat;
           echo '<script>myFunction('.$awardsubcat.','.$selectedCatid.');</script>';
        }else{
            $selectedCatid  = '';
        }
    ?>
    @if(!empty($selectedCat))
        @foreach($awardsubcat as $menu)
        <?php 
            if($menu['id'] == $selectedCat[0]){
                $selectcat = $menu->category[0]->id;
                
            }else {
                $selectcat = 0;
            }
        ?>
        @endforeach
    @endif
    <div class="form-group">
        <label for="content" class="control-label required">Menu Category</label> 
        <select onchange="myFunction({{$awardsubcat}},{{$selectedCatid}})" class="form-control custom-select" name="category" id="category" data-toggle="select2" required>
  


        @if(!empty($selectedCat))
   
            @foreach($awardcat as $menu)
       
                @if($menu['id'] == $selectcat)
                    <option selected value="{{$menu->id}}">{{$menu->name}}</option>
                @else
                    <option value="{{$menu->id}}">{{$menu->name}}</option>
                @endif
            @endforeach
        @else
                    <option value="" >None</option>
                @foreach($awardcat as $menu)
                    <option  value="{{$menu->id}}">{{$menu->name}}</option>
                @endforeach
            
        @endif
        
        </select>
    </div>

    <div class="form-group">
        <label for="content" class="control-label required">Menu Category</label> 
        <select class="form-control custom-select" name="subcategory" id="subcategory" data-toggle="select2" required>
            <option value="" >None</option>
            @if(!empty($selectedCat))
                @foreach($awardsubcat as $menu)
                    @if($menu['id'] == $selectedCat[0])
                        <option selected value="{{$menu->id}}">{{$menu->name}}</option>
                    @else
                        <option value="{{$menu->id}}">{{$menu->name}}</option>
                    @endif
                @endforeach
            @endif

        </select>

    </div>

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

@section('before-scripts')
<script src="/js/backend/admin.js"></script>
@endsection


@section("after-scripts")
<script type="text/javascript">
    Backend.Blog.selectors.GenerateSlugUrl = "{{route('admin.generate.slug')}}";
    Backend.Blog.selectors.SlugUrl = "{{url('/')}}";
    Backend.Blog.init('{{ config('locale.languages.' . app()->getLocale())[1] }}');
</script>

<script type="text/javascript">

        function myFunction(awardsubcat,selectedcat) {
            console.log('aaaaa');
      
        var subcat_id = document.getElementById("category").value;
        var x = document.getElementById("subcategory");
        var optionsAsString = " <option > None </option>";
        console.log(awardsubcat);
        $('#subcategory').empty();
            for (const key of awardsubcat) {
                if(key.category[0].id == subcat_id){
                    if(key.category[0].id == selectedcat){
                        optionsAsString += "<option selected value='" + key.id + "'>" + key.name+ "</option>";
                    }else{
                        optionsAsString += "<option value='" + key.id + "'>" + key.name+ "</option>";
                    }

                }     
 
            }
            $( 'select[name="subcategory"]' ).append( optionsAsString );

        }

    </script>
@endsection
