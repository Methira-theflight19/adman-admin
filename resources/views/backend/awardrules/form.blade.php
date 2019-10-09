<div class="box-body">
    <div class="form-group">
        <label for="content" class="control-label required">Name</label> 
    @if(!empty($awardrules))
        <input class="form-control" placeholder="name" name="name" type="text" id="name" value="{{ $awardrules->name}}">
    @else   
        <input class="form-control" placeholder="name" name="name" type="text" id="name" >
    @endif
    </div><!--form control-->

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
        <label for="content" class="control-label required">Sort</label> 
    @if(!empty($awardrules))
        <input class="form-control" placeholder="sort" name="sort" type="text" id="sort" value="{{ $awardrules->sort}}">
    @else   
        <input class="form-control" placeholder="sort" name="sort" type="text" id="sort" >
    @endif
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
