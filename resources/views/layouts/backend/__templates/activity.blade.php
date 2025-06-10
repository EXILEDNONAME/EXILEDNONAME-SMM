@extends('layouts.backend.default')

@push('head')
<link href="/public/assets/backend/plugins/custom/datatables/datatables.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-custom gutter-b card-sticky" data-card="true" id="kt_page_sticky_card">
      <div class="card-header">
        <div class="card-title">
          <h4 class="card-label"> {{ __('default.label.activities') }} </h4>
        </div>
        <div class="card-toolbar">
          <a href="{{ $url }}" class="btn btn-icon btn-xs btn-hover-light-primary mr-1" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ __('default.label.back') }}"><i class="fas fa-arrow-left"></i></a>
          <a id="table-refresh" class="btn btn-icon btn-xs btn-hover-light-primary mr-1" data-card-tool="reload" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ __('default.label.refresh') }}"><i class="fas fa-sync-alt"></i></a>
          <div class="dropdown dropdown-inline">
            <button type="button" class="btn btn-clean btn-xs btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-download"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
              <ul class="navi navi-hover py-5">
                <li class="navi-item" data-toggle="tooltip" title="{{ __('default.label.export.description.copy') }}">
                  <a href="javascript:void(0);" id="export_copy" class="navi-link"><i class="navi-icon fa fa-copy"></i> {{ __('default.label.export.copy') }}</a>
                </li>
                <li class="navi-item" data-toggle="tooltip" title="{{ __('default.label.export.description.excel') }}">
                  <a href="javascript:void(0);" id="export_excel" class="navi-link"><i class="navi-icon fa fa-file-excel"></i> {{ __('default.label.export.excel') }}</a>
                </li>
                <li class="navi-item" data-toggle="tooltip" title="{{ __('default.label.export.description.pdf') }}">
                  <a href="javascript:void(0);" id="export_pdf" class="navi-link"><i class="navi-icon fa fa-file-pdf"></i> {{ __('default.label.export.pdf') }}</a>
                </li>
                <li class="navi-item" data-toggle="tooltip" title="{{ __('default.label.export.description.print') }}">
                  <a href="javascript:void(0);" id="export_print" class="navi-link"><i class="navi-icon fa fa-print"></i> {{ __('default.label.export.print') }}</a>
                </li>
              </ul>
            </div>
          </div>
          <a href="#" class="btn btn-icon btn-xs btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="" data-original-title=""><i class="fas fa-caret-down"></i></a>
          <div class="collapse" id="collapse_bulk">
            <a id="selected-restore" data-url="" class="btn btn-xs btn-icon btn-clean btn-icon-md" data-toggle="tooltip" title="{{ __('default.label.selected-restore') }}"><i class="text-success fas fa-undo"></i></a>
            <a id="selected-delete-permanent" data-url="" class="btn btn-xs btn-icon btn-clean btn-icon-md" data-toggle="tooltip" title="{{ __('default.label.selected-delete-permanent') }}"><i class="text-danger fas fa-trash"></i></a>
          </div>
        </div>
      </div>

      <div class="card-body" id="exilednoname_body">

        <div class="table-responsive">
          <table width="100%" class="table table-striped-table-bordered table-hover table-checkable" id="exilednoname_table">
            <thead>
              <tr>
                <th width="1"> No. </th>
                <th width="1"> </th>
                <th width="1"> Status </th>
                <th> Subject </th>
                <th width="1"> Causer </th>
                <th> Date </th>
              </tr>
            </thead>
          </table>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
<script src="/public/assets/backend/js/pages/crud/forms/widgets/bootstrap-datetimepicker.js?v=7.0.6"></script>
<script src="/public/assets/backend/js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.0.6"></script>
<script src="/public/assets/backend/plugins/custom/datatables/datatables.bundle.js?v=7.0.6"></script>
<script>
  $(document).ready(function() {
    $('#toast-container').fadeOut(5000);
    KTApp.block('#exilednoname_body', { overlayColor: '#000000', state: 'primary', message: "{{ __('default.label.please-wait') }} ..." });
    });
    setTimeout(function() {
      KTApp.unblock('#exilednoname_body');
    }, 2000);

  "use strict";
  var table = $('#exilednoname_table').DataTable({
    serverSide: true,
    searching: true,
    rowId: 'Collocation',
    select: {
      style: 'multi',
      selector: 'td:first-child .checkable',
    },
    ajax: { url: "{{ URL::current() }}", },
    "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
    buttons: [
      {
        extend: 'print',
        exportOptions: {
          columns: "thead th:not(.no-export)",
          orthogonal: "Export"
        },
      },
      {
        extend: 'copyHtml5',
        autoClose: 'true',
        exportOptions: {
          columns: "thead th:not(.no-export)",
          orthogonal: "Export"
        },
      },
      {
        extend: 'excelHtml5',
        exportOptions: {
          columns: "thead th:not(.no-export)",
          orthogonal: "Export"
        },
      },
      {
        extend: 'csvHtml5',
        exportOptions: {
          columns: "thead th:not(.no-export)",
          orthogonal: "Export"
        },
      },
      {
        extend: 'pdfHtml5',
        exportOptions: {
          columns: "thead th:not(.no-export)",
          orthogonal: "Export"
        },
      },
      {
        extend: 'pdfHtml5',
        exportOptions: {
          columns: "thead th:not(.no-export)",
          orthogonal: "Export",
          rows: { selected: true }
        },
      },
      {
        extend: 'excelHtml5',
        exportOptions: {
          columns: "thead th:not(.no-export)",
          orthogonal: "Export",
          rows: { selected: true }
        },
      },
      {
        extend: 'copyHtml5',
        autoClose: 'true',
        exportOptions: {
          columns: "thead th:not(.no-export)",
          orthogonal: "Export",
          rows: { selected: true }
        },
      },
      {
        extend: 'print',
        exportOptions: {
          columns: "thead th:not(.no-export)",
          orthogonal: "Export",
          rows: { selected: true }
        },
      },
    ],
    columns: [
      {
        data: 'autonumber', orderable: false, orderable: false, searchable: false, 'className': 'align-middle text-center', 'width': '1',
        render: function (data, type, row, meta) {
          return meta.row + meta.settings._iDisplayStart + 1;
        }
      },
      {
        data: 'description', orderable: false, 'className': 'align-middle', 'width': '1',
        render: function ( data, type, row ) {
          if ( data == 'created' ) { return '<span class="label label-dot label-success"></span>'; }
          else if ( data == 'updated' ) { return '<span class="label label-dot label-warning"></span>'; }
          else if ( data == 'deleted' ) { return '<span class="label label-dot label-danger"></span>'; }
          else if ( data == 'restored' ) { return '<span class="label label-dot label-info"></span>'; }
          else { return ''; }
        }
      },
      {
        data: 'description', orderable: true, 'className': 'align-middle',
        render: function ( data, type, row ) {
          if ( data == 'created' ) { return 'Created'; }
          else if ( data == 'updated' ) { return 'Updated'; }
          else if ( data == 'deleted' ) { return 'Deleted'; }
          else if ( data == 'restored' ) { return 'Restored'; }
          else { return ''; }
        }
      },
      { data: 'subjects' },
      { data: 'causer_id', 'className': 'align-middle text-nowrap', 'width': '1' },
      { data: 'updated_at', 'className': 'align-middle text-nowrap', 'width': '1' },
    ],
    order: [[0, 'asc']]
  });

  $('#export_print').on('click', function(e) { e.preventDefault(); table.button(0).trigger(); });
  $('#export_copy').on('click', function(e) { e.preventDefault(); table.button(1).trigger(); });
  $('#export_excel').on('click', function(e) { e.preventDefault(); table.button(2).trigger(); });
  $('#export_csv').on('click', function(e) { e.preventDefault(); table.button(3).trigger(); });
  $('#export_pdf').on('click', function(e) { e.preventDefault(); table.button(4).trigger(); });
</script>

@include('layouts.backend.__extension.javascript.table-refresh')

@endpush
