<!--Action Button-->
@if( Active::checkUriPattern( 'admin/achives' ) )
    <div class="btn-group">
        <button type="button" class="btn btn-warning btn-flat dropdown-toggle" data-toggle="dropdown">Export
            <span class="fas fa-caret-down"></span>
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-right" role="menu">
            <li id="copyButton"><a href="#"><i class="fa fa-clone"></i> Copy</a></li>
            <li id="csvButton"><a href="#"><i class="far fa-file-alt"></i> CSV</a></li>
            <li id="excelButton"><a href="#"><i class="far fa-file-excel"></i> Excel</a></li>
            <li id="pdfButton"><a href="#"><i class="fa fa-file-pdf"></i> PDF</a></li>
            <li id="printButton"><a href="#"><i class="fa fa-print"></i> Print</a></li>
        </ul>
    </div>
@endif
<!--Action Button-->
<div class="btn-group">
    <button type="button" class="btn btn-blue btn-flat dropdown-toggle" data-toggle="dropdown">Action
        <span class="fas fa-caret-down"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu dropdown-menu-right" role="menu">
        <li>
            <a href="{{ route( 'admin.achives.index' ) }}">
                <i class="fa fa-list-ul"></i> {{ trans( 'menus.backend.achives.all' ) }}
            </a>
        </li>
        @permission( 'create-achive' )
            <li>
                <a href="{{ route( 'admin.achives.create' ) }}">
                    <i class="fa fa-plus"></i> {{ trans( 'menus.backend.achives.create' ) }}
                </a>
            </li>
        @endauth
    </ul>
</div>
<div class="clearfix"></div>
