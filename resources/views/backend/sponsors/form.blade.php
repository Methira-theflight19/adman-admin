<div class="box-body">

    <div class="form-group">
        <label for="content" class="control-label required">Sponsor Name</label> 
        @if(!empty($sponsors))
        <input class="form-control" placeholder="sponsor name" name="sponsor_name" type="text" id="sponsor_name" value="{{ $sponsors->sponsor_name}}">
        @else   
        <input class="form-control" placeholder="sponsor name" name="sponsor_name" type="text" id="sponsor_name" >
        @endif

    </div><!--form control-->

    <div class="form-group">
    <label for="content" class="control-label required">Menu Category</label> 
    <select class="form-control custom-select" name="sponsor_category" id="sponsor_category" data-toggle="select2" required>
  
  
    @if(!empty($selectedsponsorcat))
        @foreach($sponsorCategory as $sponsorcat)
            @if($sponsorcat['id'] == $selectedsponsorcat[0])
                <option selected value="{{$sponsorcat->id}}">{{$sponsorcat->sponsor_category}}</option>
            @else
                <option value="{{$sponsorcat->id}}">{{$sponsorcat->sponsor_category}}</option>
            @endif
        @endforeach
    @else
                <option value="" >None</option>
            @foreach($sponsorCategory as $sponsorcat)
                <option value="{{$sponsorcat->id}}">{{$sponsorcat->sponsor_category}}</option>
            @endforeach
    @endif

    
    </select>

</div>
    <div class="form-group pd-3">
            <label for="content" class="control-label required">Sponsor picture</label> 
            
            @if(!empty($sponsors->sponsor_picture))
                <input type="file"  name="sponsor_picture" class="dropify" data-default-file="{{ url('storage/img/sponsor/' . $sponsors->sponsor_picture) }}" data-multiple-caption="{count} files selected" require />
            @else   
                <input type="file" name="sponsor_picture" id="file-1" class="dropify"  data-multiple-caption="{count} files selected" require />
            @endif
    </div><!--form control-->
    <div class="form-group">
    <label for="content" class="control-label required">Link</label> 
    @if(!empty($sponsors))
    <input class="form-control" placeholder="link" name="link" type="text" id="link" value="{{ $sponsors->link}}">
    @else   
    <input class="form-control" placeholder="link" name="link" type="text" id="link">
    @endif

</div><!--form control-->

<div class="form-group">
    <label for="content" class="control-label required">SEO title</label> 
    @if(!empty($sponsors))
    <input class="form-control" placeholder="SEO title" name="seo_title" type="text" id="content" value="{{ $sponsors->seo_title}}">
    @else 
    <input class="form-control" placeholder="SEO title" name="seo_title" type="text" id="content" >
    @endif
</div><!--form control-->

<div class="form-group">
    <label for="content" class="control-label required">SEO alt</label> 
    @if(!empty($sponsors))
    <input class="form-control" placeholder="SEO alt" name="seo_alt" type="text" id="content" value="{{ $sponsors->seo_alt}}">
    @else
    <input class="form-control" placeholder="SEO alt" name="seo_alt" type="text" id="content" >
    @endif
</div><!--form control-->

<div class="form-group">
    <label for="content" class="control-label required">SEO description</label> 
    @if(!empty($sponsors))
    <input class="form-control" placeholder="SEO description" name="seo_description" type="text" id="content" value="{{ $sponsors->seo_description}}">
    @else
    <input class="form-control" placeholder="SEO description" name="seo_description" type="text" id="content" >
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
