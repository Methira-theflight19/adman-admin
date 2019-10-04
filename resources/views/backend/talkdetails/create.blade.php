@extends ('layouts.master')
@section('css')
<link href="{{ URL::asset('assets/libs/dropify/dropify.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section ('title', trans('labels.backend.talkdetails.management') . ' | ' . trans('labels.backend.talkdetails.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.talkdetails.management') }}
        <small>{{ trans('labels.backend.talkdetails.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.talkdetails.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-talkdetail']) }}

        <div class="card box box-info">
            <div class="box-header with-border">
                <h3 class="box-title ml-3">{{ trans('labels.backend.talkdetails.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.talkdetails.partials.talkdetails-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.talkdetails.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.talkdetails.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
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
