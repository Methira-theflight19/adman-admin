@extends ('layouts.master')

@section ('title', trans('labels.backend.gallerycategories.management') . ' | ' . trans('labels.backend.gallerycategories.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.gallerycategories.management') }}
        <small>{{ trans('labels.backend.gallerycategories.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.gallerycategories.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-gallerycategory']) }}

        <div class="card box box-info">
            <div class="box-header with-border">
                <h3 class="box-title ml-3">{{ trans('labels.backend.gallerycategories.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.gallerycategories.partials.gallerycategories-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.gallerycategories.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.gallerycategories.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-blue btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!-- form-group -->
            </div><!--box-body-->
        </div><!--box box-success-->
    {{ Form::close() }}
@endsection
