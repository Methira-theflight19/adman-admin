
<div class="box-body">

    <div class="form-group">

        <!-- vvvvvvvvvv Don't Delete vvvvvvvvv -->
        <!-- {{ Form::label('name', trans('validation.attributes.backend.blogs.title'), ['class' => 'col-lg-12 control-label required']) }} -->
       <!-- ^^^^^^^^^^^ Don't Delete ^^^^^^^^^^ -->

        <label for="content" class="control-label required">Activity name</label> 
            {{ Form::text('name', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.blogs.title'), 'required' => 'required']) }}
    </div><!--form control-->


    <div class="form-group">
        <label for="content" class="control-label required">Activity image</label> 
        
        @if(!empty($activities->image))
            <input type="file" name="image" class="dropify" data-default-file="{{ url('storage/img/activity/' . $activities->image) }}" data-multiple-caption="{count} files selected" />
        @else   
            <input type="file" name="image" id="file-1" class="dropify"  data-multiple-caption="{count} files selected" />
        @endif
    </div><!--form control-->

    <div class="form-group">
        <label for="content" class="control-label required">Content</label> 
        <div class=" mce-box">
            {{ Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.blogs.content')]) }}  
        </div><!--col-lg-10-->
    </div><!--form control-->


    <div class="form-group">
        <label for="content" class="control-label required">Meta title</label> 
            {{ Form::text('meta_title', null, ['class' => 'form-control box-size ', 'placeholder' => trans('validation.attributes.backend.blogs.meta-title')]) }}
    </div><!--form control-->



    <div class="form-group">
        <label for="content" class="control-label required">Meta Keyword</label> 
            {{ Form::text('meta_keywords', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.blogs.meta_keyword')]) }}
    </div><!--form control-->

    <div class="form-group">
        <label for="content" class="control-label required">Meta Description</label> 
            {{ Form::text('meta_description', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.blogs.meta_keyword')]) }}
    </div><!--form control-->

    <div class="form-group">
        <label for="content" class="control-label required">Publish Date & Time</label> <br>

        @if(!empty($activities->publish_datetime))
            <input type="text" id="datetime-datepicker" class="form-control" placeholder="Date and Time" id="datetimepicker1" name="publish_datetime" value="{{$activities->publish_datetime}}">
        @else
            <input type="text" id="datetime-datepicker" class="form-control" placeholder="Date and Time" id="datetimepicker1" name="publish_datetime" >
        @endif

    </div>

    <div class="form-group">
        <label for="content" class="control-label required">Status</label> 
           {{ Form::select('status', $status, null, ['class' => 'form-control select2 status box-size', 'placeholder' => trans('validation.attributes.backend.blogs.status'), 'required' => 'required']) }}
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