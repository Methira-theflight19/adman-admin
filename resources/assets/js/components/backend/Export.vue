<template>
    <div class="btn-group">
        <button type="button" class="btn btn-warning btn-flat dropdown-toggle" data-toggle="dropdown">Export
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu" role="menu">
            <li id="copyButton"><a href="#"><i class="fa fa-clone"></i> Copy</a></li>
            <li id="csvButton"><a href="#"><i class="far fa-file-alt"></i> CSV</a></li>
            <li id="excelButton"><a href="#"><i class="far fa-file-excel"></i> Excel</a></li>
            <li id="pdfButton"><a href="#"><i class="far fa-file-pdf"></i> PDF</a></li>
            <li id="printButton"><a href="#"><i class="fa fa-print"></i> Print</a></li>
        </ul>
    </div>
</template>
<script>
export default {
  props: [],

  data() {
    return {};
  }
};
</script>
