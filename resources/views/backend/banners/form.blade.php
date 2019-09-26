<div class="box-body">

<div class="form-group">
    <label for="content" class="control-label required">Banner name</label> 
    @if(!empty($banners))
    <input class="form-control" placeholder="Banner name" name="banner_name" type="text" id="banner_name" value="{{ $banners->banner_name}}">
    @else   
    <input class="form-control" placeholder="Banner name" name="banner_name" type="text" id="banner_name" >
    @endif

</div><!--form control-->

<div class="form-group pd-3">
        <label for="content" class="control-label required">Banner picture</label> 
        
        @if(!empty($banners->banner_picture))
            <input type="file"  name="banner_picture" class="dropify" data-default-file="{{ url('storage/img/banner/' . $banners->banner_picture) }}" data-multiple-caption="{count} files selected" require />
        @else   
            <input type="file" name="banner_picture" id="file-1" class="dropify"  data-multiple-caption="{count} files selected" require />
        @endif
</div><!--form control-->

<div class="form-group pd-3">
        <label for="content" class="control-label required">Banner picture (mobile size)</label> 
        
        @if(!empty($banners->banner_picture_sm))
            <input type="file"  name="banner_picture_sm" class="dropify" data-default-file="{{ url('storage/img/banner/' . $banners->banner_picture_sm) }}" data-multiple-caption="{count} files selected" />
        @else   
            <input type="file" name="banner_picture_sm" id="file-2" class="dropify"  data-multiple-caption="{count} files selected" />
        @endif
</div><!--form control-->

<div class="checkbox checkbox-info ml-2 mb-2">

            <input id='banner_list' type='hidden' value='0' name='banner_list'>        
            <input id="checkbox4" type="checkbox" name="banner_list" value="1">
            <label for="checkbox4">
                Banner list
            </label>
</div> 
<div class="form-group">
    <label for="content" class="control-label required">Link</label> 
    @if(!empty($banners))
    <input class="form-control" placeholder="link" name="link" type="text" id="link" value="{{ $banners->link}}">
    @else   
    <input class="form-control" placeholder="link" name="link" type="text" id="link">
    @endif

</div><!--form control-->

<div class="form-group">
    <label for="content" class="control-label required">SEO title</label> 
    @if(!empty($banners))
    <input class="form-control" placeholder="SEO title" name="seo_title" type="text" id="content" value="{{ $banners->seo_title}}">
    @else 
    <input class="form-control" placeholder="SEO title" name="seo_title" type="text" id="content" >
    @endif
</div><!--form control-->

<div class="form-group">
    <label for="content" class="control-label required">SEO alt</label> 
    @if(!empty($banners))
    <input class="form-control" placeholder="SEO alt" name="seo_alt" type="text" id="content" value="{{ $banners->seo_alt}}">
    @else
    <input class="form-control" placeholder="SEO alt" name="seo_alt" type="text" id="content" >
    @endif
</div><!--form control-->

<div class="form-group">
    <label for="content" class="control-label required">SEO description</label> 
    @if(!empty($banners))
    <input class="form-control" placeholder="SEO description" name="seo_description" type="text" id="content" value="{{ $banners->seo_description}}">
    @else
    <input class="form-control" placeholder="SEO description" name="seo_description" type="text" id="content" >
    @endif
</div><!--form control-->

@section("after-scripts")
    <script type="text/javascript">
        //Put your javascript needs in here.
        //Don't forget to put `@`parent exactly after `@`section("after-scripts"),
        //if your create or edit blade contains javascript of its own
        $( document ).ready( function() {
            //Everything in here would execute after the DOM is ready to manipulated.
        });

        if(document.getElementById("checkbox4").checked) {
            document.getElementById('banner_list').disabled = true;
        }
    </script>

    
@endsection
