@extends ('layouts.master')
@section('css')
<link href="{{ URL::asset('assets/libs/dropify/dropify.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section ('title', trans('labels.backend.aboutchairman.management') . ' | ' . trans('labels.backend.aboutchairman.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.aboutchairman.management') }}
        <small>{{ trans('labels.backend.aboutchairman.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.aboutchairman.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-aboutchairman','files' => true ]) }}

        <div class="card box box-info">
            <div class="box-header with-border">
                <h3 class="box-title ml-3">{{ trans('labels.backend.aboutchairman.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.aboutchairman.partials.aboutchairman-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.aboutchairman.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.aboutchairman.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-blue btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!-- form-group -->
            </div><!--box-body-->
        </div><!--box box-success-->
    {{ Form::close() }}
@endsection
@section('script')
        <script src="{{ URL::asset('assets/libs/dropify/dropify.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/pages/form-pickers.init.js')}}"></script>
        <script src="{{ URL::asset('assets/js/pages/form-fileuploads.init.js')}}"></script>
        <script src="{{ URL::asset('assets/libs/select2/select2.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/pages/form-advanced.init.js')}}"></script>
@endsection
