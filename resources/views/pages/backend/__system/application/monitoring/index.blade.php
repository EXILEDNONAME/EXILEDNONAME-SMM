@extends('layouts.backend.__templates.index', ['page' => 'datatable-index', 'active' => 'true', 'activities' => 'true', 'charts' => 'true', 'date' => 'false'])
@section('title', 'Monitorings')

@section('table-header')
<th> Status </th>
<th> Name </th>
<th> IP Address </th>
<th> Device </th>
<th> MAC Address </th>
<th> Port </th>
@endsection

@section('table-body')
{ data: 'status_device', 'className': 'align-middle text-nowrap', 'width': '1' },
{ data: 'name' },
{ data: 'ip_address', 'className': 'align-middle text-nowrap', 'width': '1' },
{ data: 'device', 'className': 'align-middle text-nowrap', 'width': '1' },
{ data: 'mac_address', 'className': 'align-middle text-nowrap', 'width': '1' },
{ data: 'port', 'className': 'align-middle text-nowrap', 'width': '1' },
@endsection
