@extends('layouts.backend.__templates.index', ['page' => 'datatable-index', 'active' => 'true', 'activities' => 'true', 'charts' => 'true', 'date' => 'false'])
@section('title', 'Datatable Relations')

@section('table-header')
<th> General </th>
<th> Name </th>
<th> Description </th>
@endsection

@section('table-body')
{ data: 'id_generals' },
{ data: 'name' },
{ data: 'description' },
@endsection

@push('filter-header')
<div class="mb-2">
  <div class="col-lg-12 my-2 my-md-0">
  <div class="d-flex align-items-center">
    {{ Html::select(NULL, filter_DatatableGenerals(), '')->class('form-control filter-form filter_DatatableGenerals')->placeholder('- Select General -') }}
  </div>
</div>
</div>
@endpush

@push('filter-data')
$('.filter_DatatableGenerals').change(function () {
  var card = new KTCard('exilednoname_card');
  KTApp.block(card.getSelf(), {
    overlayColor: '#ffffff',
    type: 'loader',
    state: 'primary',
    message: '{{ __('default.label.processing') }} ...',
    opacity: 0.3,
    size: 'lg'
  });
  setTimeout(function() {
    KTApp.unblock(card.getSelf());
  }, 500);
  table.column(2).search($(this).val()).draw();
});
@endpush
