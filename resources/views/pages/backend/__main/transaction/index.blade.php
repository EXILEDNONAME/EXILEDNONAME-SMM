@extends('layouts.backend.__templates.index', ['active' => 'false', 'activities' => 'false', 'charts' => 'false', 'date' => 'false'])
@section('title', 'Transactions')

@push('toolbar-button')
<a id="table-sync" class="btn btn-icon btn-xs btn-hover-light-primary" data-toggle="tooltip" title="{{ __('default.label.synchronization') }}"><i class="fas fa-sync-alt"></i></a>
<div class="dropdown dropdown-inline" bis_skin_checked="1">
  <button type="button" class="btn btn-clean btn-xs btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-download"></i>
  </button>
  <div class="dropdown-menu dropdown-menu-right" bis_skin_checked="1">
    <ul class="navi navi-hover py-5">
      <li class="navi-item" data-toggle="tooltip" data-original-title="{{ __('default.label.export.description.copy') }}"><a href="javascript:void(0);" class="navi-link" id="export_copy"><i class="navi-icon fa fa-copy"></i> {{ __('default.label.export.copy') }} </a></li>
      <li class="navi-item" data-toggle="tooltip" data-original-title="{{ __('default.label.export.description.excel') }}"><a href="javascript:void(0);" class="navi-link" id="export_excel"><i class="navi-icon fa fa-file-excel"></i> {{ __('default.label.export.excel') }} </a></li>
      <li class="navi-item" data-toggle="tooltip" data-original-title="{{ __('default.label.export.description.pdf') }}"><a href="javascript:void(0);" class="navi-link" id="export_pdf"><i class="navi-icon fa fa-file-pdf"></i> {{ __('default.label.export.pdf') }} </a></li>
      <li class="navi-item" data-toggle="tooltip" data-original-title="{{ __('default.label.export.description.print') }}"><a href="javascript:void(0);" class="navi-link" id="export_print"><i class="navi-icon fa fa-print"></i> {{ __('default.label.export.print') }} </a></li>
    </ul>
  </div>
</div>
<a href="javascript:void(0);" class="btn btn-icon btn-xs btn-hover-light-primary" data-card-tool="toggle"><i class="fas fa-caret-down"></i></a>
@endpush

@section('table-header')
<th> Status </th>
<th> Date </th>
<th> TID </th>
<th> Product </th>
<th> Quantity </th>
<th> Price </th>
<th> Link </th>
@endsection

@section('table-body')
{ data: 'status', 'className': 'align-middle text-nowrap', 'width': '1' },
{ data: 'created_at', 'className': 'align-middle text-nowrap', 'width': '1' },
{ data: 'transaction_id', 'className': 'align-middle text-nowrap text-right', 'width': '1' },
{ data: 'id_product', 'className': 'align-middle text-nowrap' },
{ data: 'quantity', orderable: false, 'className': 'align-middle text-nowrap text-center', 'width': '1' },
{ data: 'price', orderable: false, 'className': 'align-middle text-nowrap text-right', 'width': '1' },
{ data: 'target', orderable: false, 'className': 'align-middle text-nowrap text-center', 'width': '1' },
@endsection
