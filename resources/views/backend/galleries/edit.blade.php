@extends ('layouts.master')
@section('css')
<link href="{{ URL::asset('assets/css/gallery_style.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/clockpicker/clockpicker.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section ('title', trans('labels.backend.galleries.management') . ' | ' . trans('labels.backend.galleries.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.galleries.management') }}
        <small>{{ trans('labels.backend.galleries.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($galleries, ['route' => ['admin.galleries.update', $galleries], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-gallery','enctype' => 'multipart/form-data','files' => true]) }}

        <div class="card box box-info">
            <div class="box-header with-border">
                <h3 class="box-title ml-3">{{ trans('labels.backend.galleries.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.galleries.partials.galleries-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.galleries.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.galleries.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-blue btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!--form-group-->
            </div><!--box-body-->
        </div><!--box box-success -->
    {{ Form::close() }}
@endsection
@section('script')

        <!-- Plugins js-->
        <script src="{{ URL::asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>
        <script src="{{ URL::asset('assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js')}}"></script>
        <script src="{{ URL::asset('assets/libs/clockpicker/clockpicker.min.js')}}"></script>
        <script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

        <!-- Init js-->
        <script src="{{ URL::asset('assets/js/pages/form-pickers.init.js')}}"></script>
        <script src="{{ URL::asset('assets/libs/select2/select2.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/pages/form-advanced.init.js')}}"></script>

@endsection

