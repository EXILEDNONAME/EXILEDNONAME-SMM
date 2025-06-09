@extends('layouts.backend.default')
@section('title', 'Optimizations')

@push('head')
<link rel="stylesheet" type="text/css" href="/assets/backend/plugins/custom/datatables/datatables.bundle.css?v=7.0.6" />
@endpush

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-custom" data-card="true" id="exilednoname_card">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> {{ __('default.label.optimizations') }} </h3>
        </div>
        <div class="card-toolbar">
          <a id="table-refresh" class="btn btn-icon btn-xs btn-hover-light-primary" data-toggle="tooltip" data-original-title="{{ __('default.label.refresh') }}"><i class="fas fa-sync-alt"></i></a>
          <a href="#" class="btn btn-icon btn-xs btn-hover-light-primary" data-card-tool="toggle"><i class="fas fa-caret-down"></i></a>

        </div>
      </div>
      <div class="card-body" id="exilednoname_body">

        @if ($message = Session::get('success'))
        <div id="toast-container" class="toast-bottom-right">
          <div class="toast toast-success" aria-live="polite">
            <div class="toast-message">{{ $message }}</div>
          </div>
        </div>
        @endif

        @if ($message = Session::get('error'))
        <div id="toast-container" class="toast-bottom-right">
          <div class="toast toast-error" aria-live="polite">
            <div class="toast-message">{{ $message }}</div>
          </div>
        </div>
        @endif

        <div class="table-responsive">
          <table width="100%" class="table table-hover table-checkable table-sm rounded" id="exilednoname_table">
            <thead>
              <tr>
                <th> No. </th>
                <th> Name </th>
                <th> Description </th>
                <th class="no-export"> </th>
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
<script src="/assets/backend/js/pages/crud/forms/widgets/bootstrap-datetimepicker.js?v=7.0.6"></script>
<script src="/assets/backend/js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.0.6"></script>
<script src="/assets/backend/plugins/custom/datatables/datatables.bundle.js?v=7.0.6"></script>
<script src="/assets/backend/js/pages/features/cards/tools.js?v=7.0.6"></script>

<script>
$(document).ready(function() {
  $('#toast-container').fadeOut(5000);
  KTApp.block('#exilednoname_body', {
    overlayColor: '#000000',
    state: 'primary',
    message: "{{ __('default.label.please-wait') }} ..."
  });
  setTimeout(function() {
    KTApp.unblock('#exilednoname_body');
  }, 2000);
});

"use strict";

var table = $('#exilednoname_table').DataTable({
  serverSide: true,
  searching: true,
  rowId: 'Collocation',
  select: {
    style: 'multi',
    selector: 'td:first-child .checkable',
  },
  ajax: {
    url: "{{ URL::current() }}",
  },
  "lengthMenu": [[50, 100, 250, 500, -1], [50, 100, 250, 500, "All"]],
  columns: [
    {
      data: 'autonumber', orderable: false, searchable: false, 'className': 'align-middle text-center', 'width': '1',
      render: function(data, type, row, meta) { return meta.row + meta.settings._iDisplayStart + 1; }
    },

    { data: 'name' },
    { data: 'description' },

    {
      data: 'action', orderable: false, 'className': 'align-middle text-center', 'width': '1',
      render: function ( data, type, row ) {
        return '<a id="start-optimizing" href="javascript:void(0);" data-toggle="tooltip" data-id="' + row.id + '"><span class="label label-info label-inline"> {{ strtoupper(__("default.label.start")) }} </span></a>'
      }
    },

  ],
  order: [
    [0, 'asc']
  ]
});

</script>

@include('layouts.backend.__extension.javascript.table-refresh')
@include('layouts.backend.__extension.javascript.start-optimizing')

@endpush
