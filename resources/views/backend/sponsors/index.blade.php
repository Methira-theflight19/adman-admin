@extends ('layouts.master')

@section ('title', trans('labels.backend.sponsors.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.sponsors.management') }}</h1>
@endsection

@section('content')
    <div class="card box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.sponsors.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.sponsors.partials.sponsors-header-buttons')
            </div>
        </div><!--box-header with-border-->

        <div class="box-body">
            <div class="table-responsive data-table-wrapper">
                <table id="sponsors-table" class="w-100 table table-condensed table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.sponsors.table.id') }}</th>
                            <th>Sponsor Category</th>
                            <th>Sponsor Name</th>
                            <th>Sponsor Picture</th>
                            <th>{{ trans('labels.general.actions') }}</th>
                        </tr>
                    </thead>
                    <!-- <thead class="transparent-bg">
                        <tr>
                            <th></th>
                            <th>{!! Form::text('sponsor_cat', null, ["class" => "search-input-text form-control", "data-column" => 0, "placeholder" => trans('labels.backend.blogs.table.title')]) !!}
                                <a class="reset-data" href="javascript:void(0)"><i class="fa fa-times"></i></a></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead> -->
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->
@endsection

@section('after-scripts')
    {{-- For DataTables --}}
    {{ Html::script(mix('js/dataTable.js')) }}

    <script>
        //Below written line is short form of writing $(document).ready(function() { })
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            var dataTable = $('#sponsors-table').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.sponsors.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: '{{config('module.sponsors.table')}}.id'},
                    {data: 'sponsor_cat', name: 'sponsor_cat'},
                    {data: 'sponsor_name', name: '{{config('module.sponsors.table')}}.sponsor_name'},
                    {data: 'sponsor_picture', name: '{{config('module.sponsors.table')}}.sponsor_picture'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500,
                dom: 'lBfrtip',
                buttons: {
                    buttons: [
                        { extend: 'copy', className: 'copyButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'csv', className: 'csvButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'excel', className: 'excelButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'pdf', className: 'pdfButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'print', className: 'printButton',  exportOptions: {columns: [ 0, 1 ]  }}
                    ]
                }
            });

            Backend.DataTableSearch.init(dataTable);
        });
    </script>
@endsection
