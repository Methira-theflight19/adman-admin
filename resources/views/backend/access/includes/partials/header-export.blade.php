<!--Action Button-->
<div class="btn-group">
  <button type="button" class="btn btn-warning btn-flat dropdown-toggle" data-toggle="dropdown">@lang('menus.backend.access.export')
    <span class="fas fa-caret-down"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu dropdown-menu-right" role="menu">
    <li id="copyButton"><a href="#"><i class="fa fa-clone"></i> @lang('menus.backend.access.copy')</a></li>
    <li id="csvButton"><a href="#"><i class="far fa-file-alt"></i> CSV</a></li>
    <li id="excelButton"><a href="#"><i class="far fa-file-excel"></i> Excel</a></li>
    <li id="pdfButton"><a href="#"><i class="far fa-file-pdf"></i> PDF</a></li>
    <li id="printButton"><a href="#"><i class="fa fa-print"></i> @lang('menus.backend.access.print')</a></li>
  </ul>
</div>
