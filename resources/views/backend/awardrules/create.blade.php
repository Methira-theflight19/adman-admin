@extends ('layouts.master')

@section ('title', trans('labels.backend.awardrules.management') . ' | ' . trans('labels.backend.awardrules.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.awardrules.management') }}
        <small>{{ trans('labels.backend.awardrules.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.awardrules.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-awardrule']) }}

        <div class="card box box-info">
            <div class="box-header with-border">
                <h3 class="box-title ml-3">{{ trans('labels.backend.awardrules.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.awardrules.partials.awardrules-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.awardrules.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.awardrules.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-blue btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!-- form-group -->
            </div><!--box-body-->
        </div><!--box box-success-->
    {{ Form::close() }}
@endsection
