<div class="box-body">


    <div class="form-group pd-3">
            <label for="content" class="control-label required">Chairman Picture</label>
            @if(!empty($aboutchairman->image))
                <input type="file"  name="image" class="dropify" data-default-file="{{ url('storage/img/about/chairman/' . $aboutchairman->image) }}" data-multiple-caption="{count} files selected" require />
            @else   
                <input type="file" name="image" id="file-1" class="dropify"  data-multiple-caption="{count} files selected" require />
            @endif
    </div><!--form control-->

    <div class="form-group pd-3">
            <label for="content" class="control-label required">Chairman Message Picture</label>
            @if(!empty($aboutchairman->image))
                <input type="file"  name="message_image" class="dropify" data-default-file="{{ url('storage/img/about/chairman/' . $aboutchairman->message_image) }}" data-multiple-caption="{count} files selected" require />
            @else   
                <input type="file" name="message_image" id="file-1" class="dropify"  data-multiple-caption="{count} files selected" require />
            @endif
    </div><!--form control-->

</div><!--box-body-->

@section('before-scripts')
    <script src="/js/backend/admin.js"></script>
@endsection