<div class="box-body">
    <div class="form-group">
        {{ Form::label('question', trans('validation.attributes.backend.faqs.question'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-12">
            {{ Form::text('question', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.faqs.question'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('answer', trans('validation.attributes.backend.faqs.answer'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-12 mce-box">
            {{ Form::textarea('answer', null, ['class' => 'form-control box-size']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->


    <div class="form-group row">
        <div class="col-lg-12 mt-1">
            <div class="control-group">
            <div class="checkbox checkbox-info mb-2">
                    <input  checked="checked" id="checkbox4" type="checkbox" id="status" name="status" value="1">
                     <label for="checkbox4">
                        Status
                    </label>
                </div> 
            </div>
        </div><!--col-lg-3-->
    </div><!--form control-->
</div>
@section('after-scripts')
    <script type="text/javascript">
        Backend.Faq.init('{{ config('locale.languages.' . app()->getLocale())[1] }}');
    </script>
@endsection