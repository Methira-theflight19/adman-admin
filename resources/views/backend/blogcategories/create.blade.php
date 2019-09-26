@extends ('layouts.master')

@section ('title', trans('labels.backend.blogcategories.management') . ' | ' . trans('labels.backend.blogcategories.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.blogcategories.management') }}
        <small>{{ trans('labels.backend.blogcategories.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.blogCategories.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-permission']) }}

        <div class="card box box-info">
            <div class="box-header with-border ml-2">
                <h3 class="box-title">{{ trans('labels.backend.blogcategories.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.blogcategories.partials.blogcategories-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            {{-- Including Form blade file --}}
            <div class="box-body">
                <div class="form-group">
                    @include("backend.blogcategories.form")
                    <div class="edit-form-btn m-2" align="center">
                    {{ link_to_route('admin.blogCategories.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                    {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-blue btn-md']) }}
                    <div class="clearfix"></div>
                </div>
            </div>
        </div><!--box-->
    </div>
    {{ Form::close() }}
@endsection
