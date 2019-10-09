<div class="box-body">
    <div class="form-group">
        <label for="content" class="control-label required">Judge Category</label> 
        <select class="form-control custom-select" name="judgecat" id="committeecat" data-toggle="select2" required>
        
        @if(!empty($selectedCat))
            @foreach($judgeCategory as $cat)
                @if($cat['id'] == $selectedCat[0])
                    <option selected value="{{$cat->id}}">{{$cat->name}}</option>
                @else
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endif
            @endforeach
        @else
                    <option value="" >None</option>
                @foreach($judgeCategory as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
        @endif
        </select>
    </div>

    <div class="form-group">
        <!-- vvvvvvvvvv Don't Delete vvvvvvvvv -->
        <!-- {{ Form::label('name', trans('validation.attributes.backend.blogs.title'), ['class' => 'col-lg-12 control-label required']) }} -->
    <!-- ^^^^^^^^^^^ Don't Delete ^^^^^^^^^^ -->

        <label for="content" class="control-label required">Name</label> 
            {{ Form::text('name', null, ['class' => 'form-control box-size', 'placeholder' => 'Name', 'required' => 'required']) }}
    </div><!--form control-->
    
    <div class="form-group">
        <label for="content" class="control-label required">Image</label> 
        
        @if(!empty($judges->judge_picture))
            <input type="file" name="judge_picture" class="dropify" data-default-file="{{ url('storage/img/judge/' . $judges->judge_picture) }}" data-multiple-caption="{count} files selected" />
        @else   
            <input type="file" name="judge_picture" id="file-1" class="dropify"  data-multiple-caption="{count} files selected" />
        @endif
    </div><!--form control-->

    <div class="form-group">
        <label for="content" class="control-label required">Content</label> 
        <div class=" mce-box">
            {{ Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.blogs.content')]) }}  
        </div><!--col-lg-10-->
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