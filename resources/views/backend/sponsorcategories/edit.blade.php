@extends ('layouts.master')

@section ('title', trans('labels.backend.sponsorcategories.management') . ' | ' . trans('labels.backend.sponsorcategories.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.sponsorcategories.management') }}
        <small>{{ trans('labels.backend.sponsorcategories.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($sponsorcategories, ['route' => ['admin.sponsorcategories.update', $sponsorcategory], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-sponsorcategory']) }}

        <div class="card box box-info">
            <div class="box-header with-border">
                <h3 class="box-title ml-3">{{ trans('labels.backend.sponsorcategories.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.sponsorcategories.partials.sponsorcategories-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.sponsorcategories.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.sponsorcategories.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!--form-group-->
            </div><!--box-body-->
        </div><!--box box-success -->
    {{ Form::close() }}
@endsection
