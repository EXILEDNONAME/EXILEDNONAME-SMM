@extends('layouts.backend.__templates.trash')
@section('title', 'Sheets')

@section('table-header')
<th> Name </th>
<th> Description </th>
@endsection

@section('table-body')
{ data: 'name' },
{ data: 'description' },
@endsection
