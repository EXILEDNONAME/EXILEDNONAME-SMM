@extends('layouts.backend.__templates.index', ['page' => 'datatable-index-sheet', 'active' => 'false', 'activities' => 'false', 'charts' => 'false', 'date' => 'false'])
@section('title', 'Sheets')

@section('table-header')
<th> IP Address </th>
<th> Device </th>
<th> MAC Address </th>
<th> Location </th>
<th> Office </th>
<th> Status </th>
@endsection

@section('table-body')
{ data: 'col_1', 'className': 'align-middle text-nowrap', 'width': '1' },
{ data: 'col_2', 'className': 'align-middle text-nowrap', 'width': '1' },
{ data: 'col_3' },
{ data: 'col_4', 'className': 'align-middle text-nowrap', 'width': '1' },
{ data: 'col_5', 'className': 'align-middle text-nowrap', 'width': '1' },
{ data: 'status_device', 'className': 'align-middle text-nowrap', 'width': '1' },
@endsection
