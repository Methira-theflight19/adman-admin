

<div class="box-body">
    <div class="form-group">
        {{ Form::label('name', trans('validation.attributes.backend.blogs.title'), ['class' => 'col-lg-12 control-label required']) }}

        <div class="col-lg-12">
            {{ Form::text('name', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.blogs.title'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('categories', trans('validation.attributes.backend.blogs.category'), ['class' => 'col-lg-12 control-label required']) }}

        <div class="col-lg-12">
        
        @if(!empty($selectedCategories))
            {{ Form::select('categories[]', $blogCategories, $selectedCategories, ['class' => 'form-control tags box-size', 'required' => 'required', 'multiple' => 'multiple']) }}
        @else
            {{ Form::select('categories[]', $blogCategories, null, ['class' => 'form-control tags box-size', 'required' => 'required', 'multiple' => 'multiple']) }}
        @endif
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
    {{ Form::label('publish_datetime', trans('validation.attributes.backend.blogs.publish'), ['class' => 'col-lg-12 control-label required']) }}

        <div class="col-lg-12">
        @if(!empty($blog->publish_datetime))
            <input type="text" id="datetime-datepicker" class="form-control" placeholder="Date and Time" id="datetimepicker1" name="publish_datetime" value="{{$blog->publish_datetime}}">
        @else
            <input type="text" id="datetime-datepicker" class="form-control" placeholder="Date and Time" id="datetimepicker1" name="publish_datetime" >
        @endif
        </div>
    </div>


    <div class="form-group">
        {{ Form::label('featured_image', trans('validation.attributes.backend.blogs.image'), ['class' => 'col-lg-12 control-label required']) }}
        
        @if(!empty($blog->featured_image))
            <input type="file" name="featured_image" class="dropify" data-default-file="{{ Storage::disk('public')->url('img/blog/' . $blog->featured_image) }}" data-multiple-caption="{count} files selected" />
        @else   
            <input type="file" name="featured_image" id="file-1" class="dropify"  data-multiple-caption="{count} files selected" />
        @endif
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('content', trans('validation.attributes.backend.blogs.content'), ['class' => 'col-lg-12 control-label required']) }}
        
        <div class="col-lg-12 mce-box">
            {{ Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.blogs.content')]) }}  
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('tags', trans('validation.attributes.backend.blogs.tags'), ['class' => 'col-lg-12 control-label required']) }}

        <div class="col-lg-12">
        @if(!empty($selectedtags))
           {{ Form::select('tags[]', $blogTags, $selectedtags, ['class' => 'form-control tags box-size', 'required' => 'required', 'multiple' => 'multiple']) }}
        @else
            {{ Form::select('tags[]', $blogTags, null, ['class' => 'form-control tags box-size', 'required' => 'required', 'multiple' => 'multiple']) }}
        @endif
        </div><!--col-lg-3-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('meta_title', trans('validation.attributes.backend.blogs.meta-title'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-12">
            {{ Form::text('meta_title', null, ['class' => 'form-control box-size ', 'placeholder' => trans('validation.attributes.backend.blogs.meta-title')]) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('slug', trans('validation.attributes.backend.blogs.slug'), ['class' => 'col-lg-12 control-label']) }}

        <div class="col-lg-12">
            {{ Form::text('slug', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.blogs.slug'), 'disabled' => 'disabled']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('cannonical_link', trans('validation.attributes.backend.blogs.cannonical_link'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-12">
            {{ Form::text('cannonical_link', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.blogs.cannonical_link')]) }}
        </div><!--col-lg-10-->
    </div><!--form control-->


    <div class="form-group">
        {{ Form::label('meta_keywords', trans('validation.attributes.backend.blogs.meta_keyword'), ['class' => 'col-lg-12 control-label']) }}

        <div class="col-lg-12">
            {{ Form::text('meta_keywords', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.blogs.meta_keyword')]) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('meta_description', trans('validation.attributes.backend.blogs.meta_description'), ['class' => 'col-lg-12 control-label']) }}

        <div class="col-lg-12 mce-box">
            {{ Form::textarea('meta_description', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.blogs.meta_description')]) }}
            
        </div><!--col-lg-3-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('status', trans('validation.attributes.backend.blogs.status'), ['class' => 'col-lg-12 control-label required']) }}

        <div class="col-lg-12">
           {{ Form::select('status', $status, null, ['class' => 'form-control select2 status box-size', 'placeholder' => trans('validation.attributes.backend.blogs.status'), 'required' => 'required']) }}
        </div><!--col-lg-3-->
    </div><!--form control-->
</div>
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