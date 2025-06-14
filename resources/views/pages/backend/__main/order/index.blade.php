@extends('layouts.backend.__templates.index', ['active' => 'false', 'activities' => 'false', 'charts' => 'false', 'date' => 'false'])
@section('title', 'Orders')

@push('box')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-custom gutter-b p-5" data-card="true">
      <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th class="text-nowrap text-center" width="1" scope="col"> Status </th>
            <th class="text-nowrap text-center" width="1" scope="col"> Created </th>
            <th class="text-nowrap text-center" width="1" scope="col"> TID </th>
            <th scope="col"> Product </th>
            <th class="text-nowrap text-center" width="1" scope="col"> Quantity </th>
            <th class="text-nowrap text-center" width="1" scope="col"> Price </th>
            <th class="text-nowrap text-center" width="1" scope="col"> Link </th>
          </tr>
        </thead>
        <tbody>
          @foreach($model as $transaction)
          <tr>
            <td class="text-nowrap text-center">
              @if ($transaction->status == 1) <span class="label label-warning label-inline"> Pending </span>
              @elseif ($transaction->status == 2) <span class="label label-info label-inline"> In Progress </span>
              @elseif ($transaction->status == 3) <span class="label label-success label-inline"> Completed </span>
              @elseif ($transaction->status == 4) <span class="label label-danger label-inline"> Canceled </span>
              @else -
              @endif
            </td>
            <td class="text-nowrap"> {{ \Carbon\Carbon::parse($transaction->created_at)->format('d F Y, H:i') }} </td>
            <td class="text-nowrap"> #{{ implode('', str_split(sprintf('%05d',  $transaction->id), 3)) }}</td>
            <td class="text-nowrap"> {{ $transaction->id_products->name }}</td>
            <td class="text-nowrap text-center"> {{ $transaction->quantity }}</td>
            <td class="text-nowrap text-right"> Rp {{ $transaction->price }} </td>
            <td class="text-nowrap text-center"><a href="{{ $transaction->target }}" target="_blank"><i class="text-primary icon-md fas fa-link"></i></a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    </div>
  </div>
</div>
@endpush

@push('toolbar-button')
<a href="javascript:void(0);" class="btn btn-icon btn-xs btn-hover-light-primary" data-card-tool="toggle"><i class="fas fa-caret-down"></i></a>
@endpush

@section('table-header')
<th> </th>
<th> Name </th>
<th> Price </th>
@endsection

@section('table-body')
{
  data: 'show', orderable: false, searchable: false, 'className': 'align-middle text-center', 'width': '1',
  render: function(data, type, row, meta) {
    return '<a href="{{ URL::current() }}/' + row.id + '"><button type="button"  class="btn btn-sm btn-outline-dark" data-id=""> Order </button></a>'
  }
},
{ data: 'name', 'className': 'align-middle text-nowrap' },
{ data: 'price', 'className': 'align-middle text-nowrap text-right', 'width': '1' },
@endsection
