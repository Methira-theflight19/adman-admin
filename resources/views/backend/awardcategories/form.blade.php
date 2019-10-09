<div class="box-body">
    <div class="form-group">
        <label for="content" class="control-label required">Name</label> 
    @if(!empty($awardcategories))
        <input class="form-control" placeholder="name" name="name" type="text" id="name" value="{{ $awardcategories->name}}">
    @else   
        <input class="form-control" placeholder="name" name="name" type="text" id="name" >
    @endif
    </div><!--form control-->
    <div class="form-group">
        <label for="content" class="control-label required">Subtitle</label> 
    @if(!empty($awardcategories))
        <input class="form-control" placeholder="subtitle" name="subtitle" type="text" id="subtitle" value="{{ $awardcategories->subtitle}}">
    @else   
        <input class="form-control" placeholder="subtitle" name="subtitle" type="text" id="subtitle" >
    @endif
    </div><!--form control-->
    <div class="form-group pd-3">
            <label for="content" class="control-label required">Icon</label> 
            
            @if(!empty($awardcategories->image))
                <input type="file"  name="image" class="dropify" data-default-file="{{ url('storage/img/award/' . $awardcategories->image) }}" data-multiple-caption="{count} files selected" require />
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
@section('before-scripts')
<script src="/js/backend/admin.js"></script>
@endsection


@section("after-scripts")
<script type="text/javascript">
    Backend.Blog.selectors.GenerateSlugUrl = "{{route('admin.generate.slug')}}";
    Backend.Blog.selectors.SlugUrl = "{{url('/')}}";
    Backend.Blog.init('{{ config('locale.languages.' . app()->getLocale())[1] }}');
</script>
@endsection
