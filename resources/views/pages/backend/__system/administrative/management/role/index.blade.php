@extends('layouts.backend.__templates.index', ['page' => 'datatable-index', 'date' => 'false', 'charts' => 'true', 'activities' => 'true'])
@section('title', 'Management Roles')

@section('table-header')
<th> Name </th>
@endsection

@section('table-body')
{ data: 'name' },
@endsection
