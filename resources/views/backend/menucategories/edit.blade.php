@extends ('layouts.master')

@section ('title', trans('labels.backend.menucategories.management') . ' | ' . trans('labels.backend.menucategories.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.menucategories.management') }}
        <small>{{ trans('labels.backend.menucategories.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($menucategories, ['route' => ['admin.menucategories.update', $menucategories], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-menucategory']) }}

        <div class="card box box-info">
            <div class="box-header with-border">
                <h3 class="box-title ml-3">{{ trans('labels.backend.menucategories.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.menucategories.partials.menucategories-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.menucategories.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.menucategories.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-blue btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!--form-group-->
            </div><!--box-body-->
        </div><!--box box-success -->
    {{ Form::close() }}
@endsection
