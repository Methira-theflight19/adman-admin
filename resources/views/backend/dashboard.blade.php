@extends('layouts.master')

@section('page-header')
    <h2 class="pt-2 pb-2">
        {{ app_name() }}
        <small>{{ trans('strings.backend.dashboard.title') }}</small>
    </h2>
@endsection

@section('content')
    <div class="card pl-2 box box-info">
        <div class="box-header with-border">
            <h3 class=" box-title">{{ trans('history.backend.recent_history') }}</h3>
            <div class="box-tools pull]-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            {!! history()->render() !!}
        </div><!-- /.box-body -->
    </div><!--box box-info-->
@endsection