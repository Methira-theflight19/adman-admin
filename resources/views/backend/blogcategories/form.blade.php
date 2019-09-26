
        {{ Form::label('name', trans('validation.attributes.backend.blogcategories.title'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-12">
            {{ Form::text('name', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.blogcategories.title'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        <div class="col-lg-10">
            <div class="control-group">
                <div class="checkbox checkbox-info mb-2">
                    <input  checked="checked" id="checkbox4" type="checkbox" id="status" name="status" value="1">
                     <label for="checkbox4">
                        Active
                    </label>
                </div> 
            </div>
        </div><!--col-lg-3-->
    </div>
