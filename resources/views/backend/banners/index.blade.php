@extends ('layouts.master')

@section ('title', trans('labels.backend.banners.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.banners.management') }}</h1>
@endsection

<?php 
    
?>

@section('content')
    <div class="card box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.banners.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.banners.partials.banners-header-buttons')
            </div>

            <a id="menucat">test</a>
        </div><!--box-header with-border-->

        <div class="box-body">
            <div class="table-responsive data-table-wrapper">
                <table id="banners-table" class="w-100 table table-condensed table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.banners.table.id') }}</th>
                            <th>Menu Category</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <!-- <thead class="transparent-bg">
                        <tr>
                            <th></th>
                            <th></th>
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
            $("#menucat").click(function () {
               console.log("test")
            });

            
            var dataTable = $('#banners-table').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.banners.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: '{{config('module.banners.table')}}.id'},
                    {data: 'menu', name: 'menu'},
                    {data: 'banner_name', name: '{{config('module.banners.table')}}.banner_name'},
                    {data: 'banner_picture', name: '{{config('module.banners.table')}}.banner_picture'},
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
