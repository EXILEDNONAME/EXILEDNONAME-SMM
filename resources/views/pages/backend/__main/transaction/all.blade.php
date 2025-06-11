@extends('layouts.backend.__templates.index', ['active' => 'false', 'activities' => 'false', 'charts' => 'false', 'date' => 'false'])
@section('title', 'All Transactions')

@section('table-header')
<th> Status </th>
<th> Date </th>
<th> TID </th>
<th> Order </th>
<th> User </th>
<th> Product </th>
<th> Quantity </th>
<th> Price </th>
<th> Link </th>
@endsection

@section('table-body')
{ data: 'status', 'className': 'align-middle text-nowrap', 'width': '1' },
{ data: 'start_date', 'className': 'align-middle text-nowrap', 'width': '1' },
{ data: 'transaction_id', 'className': 'align-middle text-nowrap text-right', 'width': '1' },
{ data: 'id_order', 'className': 'align-middle text-nowrap', 'width': '1' },
{ data: 'users', 'className': 'align-middle text-nowrap', 'width': '1' },
{ data: 'id_product', 'className': 'align-middle text-nowrap' },
{ data: 'quantity', orderable: false, 'className': 'align-middle text-nowrap text-center', 'width': '1' },
{ data: 'price', orderable: false, 'className': 'align-middle text-nowrap text-right', 'width': '1' },
{ data: 'target', orderable: false, 'className': 'align-middle text-nowrap text-center', 'width': '1' },
@endsection
