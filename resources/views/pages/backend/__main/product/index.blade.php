@extends('layouts.backend.__templates.index', ['active' => 'false', 'activities' => 'false', 'charts' => 'false', 'date' => 'false'])
@section('title', 'Products')

@section('table-header')
<th> Name </th>
<th class="text-nowrap"> Price Order (+1000) </th>
@endsection

@section('table-body')
{ data: 'name', 'className': 'align-middle text-nowrap' },
{ data: 'rate', orderable: false, 'className': 'align-middle text-right', 'width': '1' },
@endsection
