<div class="box-body">
    <div class="form-group">
        <label for="content" class="control-label required">Award Level</label> 
        <select class="form-control custom-select" name="level" id="level" data-toggle="select2" required>
        <?php 
        $level = ['Gold','Silver','Bronze'];
        ?>

        @foreach($level as $levels)
            @if(!empty($achives))
                @if($levels == $achives->level)
                <option value="{{$levels}}">{{$levels}}</option>
                @endif
                <option selected value="{{$levels}}">{{$levels}}</option>
            @else
                <option value="{{$levels}}">{{$levels}}</option>
            @endif

        @endforeach
        </select>
    </div>
    <?php 
    
        if(!empty($selectedCat)){
            $selectedCatid = $selectedCat;
           echo '<script>myFunction('.$achivesubcat.','.$selectedCatid.');</script>';
        }else{
            $selectedCatid  = '';
        }
    ?>
    @if(!empty($selectedCat))
        @foreach($achivesubcat as $menu)
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
        <label for="content" class="control-label required">Archive Category</label> 
        <select onchange="myFunction({{$achivesubcat}},{{$selectedCatid}})" class="form-control custom-select" name="category" id="category" data-toggle="select2" required>
  


        @if(!empty($selectedCat))
   
            @foreach($achivecat as $menu)
       
                @if($menu['id'] == $selectcat)
                    <option selected value="{{$menu->id}}">{{$menu->name}}</option>
                @else
                    <option value="{{$menu->id}}">{{$menu->name}}</option>
                @endif
            @endforeach
        @else
                    <option value="" >None</option>
                @foreach($achivecat as $menu)
                    <option  value="{{$menu->id}}">{{$menu->name}}</option>
                @endforeach
            
        @endif
        
        </select>
    </div>
    <div class="form-group">
        <label for="content" class="control-label required">Archive SubCategory</label> 
        <select class="form-control custom-select" name="subcategory" id="subcategory" data-toggle="select2" required>
            <option value="" >None</option>
            @if(!empty($selectedCat))
                @foreach($achivesubcat as $menu)
                    @if($menu['id'] == $selectedCat[0])
                        <option selected value="{{$menu->id}}">{{$menu->name}}</option>
                    @else
                        <option value="{{$menu->id}}">{{$menu->name}}</option>
                    @endif
                @endforeach
            @endif

        </select>

    </div>

    <div class="form-group">
        <label for="content" class="control-label required">Entry Title</label> 
        @if(!empty($achives))
            <input class="form-control" placeholder="Title" name="name" type="text" id="name" value="{{ $achives->name}}">
        @else   
            <input class="form-control" placeholder="Title" name="name" type="text" id="name" >
        @endif
    </div><!--form control-->
    <div class="form-group">
        <label for="content" class="control-label required">Brand </label> 
        @if(!empty($achives))
            <input class="form-control" placeholder="Brand" name="brand" type="text" id="name" value="{{ $achives->brand}}">
        @else   
            <input class="form-control" placeholder="Brand" name="brand" type="text" id="name" >
        @endif
    </div><!--form control-->
    <div class="form-group">
        <label for="content" class="control-label required">Advertiser </label> 
        @if(!empty($achives))
            <input class="form-control" placeholder="Advertiser" name="advertiser" type="text" id="name" value="{{ $achives->advertiser}}">
        @else   
            <input class="form-control" placeholder="Advertiser" name="advertiser" type="text" id="name" >
        @endif
    </div><!--form control-->
    <div class="form-group">
        <label for="content" class="control-label required"></label>Advertiser Agency </label> 
        @if(!empty($achives))
            <input class="form-control" placeholder="Advertiser Agency
" name="agency" type="text" id="name" value="{{ $achives->agency}}">
        @else   
            <input class="form-control" placeholder="Advertiser Agency
" name="agency" type="text" id="name" >
        @endif
    </div><!--form control-->

    <div class="form-group">
        <label for="content" class="control-label required">Award Link ( only link Embed Youtube ) </label> 
        @if(!empty($achives))
            <input class="form-control" placeholder="Award Link" name="youtube_link" type="text" id="name" value="{{ $achives->youtube_link}}">
        @else   
            <input class="form-control" placeholder="Award Link" name="youtube_link" type="text" id="name" >
        @endif
    </div><!--form control-->

    <div class="form-group pd-3">
            <label for="content" class="control-label required">Sponsor picture</label> 
            
            @if(!empty($achives->image))
                <input type="file"  name="
                image" class="dropify" data-default-file="{{ url('storage/img/archive/' . $achives->image) }}" data-multiple-caption="{count} files selected" require />
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
    Backend.Blog.selectors.GenerateSlugUrl = "{{route('admin.generate.slug')}}";
    Backend.Blog.selectors.SlugUrl = "{{url('/')}}";
    Backend.Blog.init('{{ config('locale.languages.' . app()->getLocale())[1] }}');
</script>

<script type="text/javascript">

        function myFunction(achivesubcat,selectedcat) {
            console.log('aaaaa');
      
        var subcat_id = document.getElementById("category").value;
        var x = document.getElementById("subcategory");
        var optionsAsString = " <option > None </option>";
        console.log(achivesubcat);
        $('#subcategory').empty();
            for (const key of achivesubcat) {
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

