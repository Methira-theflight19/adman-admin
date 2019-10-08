@extends ('layouts.master')

@section ('title', trans('labels.backend.judgecategories.management') . ' | ' . trans('labels.backend.judgecategories.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.judgecategories.management') }}
        <small>{{ trans('labels.backend.judgecategories.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.judgecategories.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-judgecategory']) }}

        <div class="card box box-info">
            <div class="box-header with-border">
                <h3 class="box-title ml-3">{{ trans('labels.backend.judgecategories.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.judgecategories.partials.judgecategories-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.judgecategories.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.judgecategories.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-blue btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!-- form-group -->
            </div><!--box-body-->
        </div><!--box box-success-->
    {{ Form::close() }}
@endsection
