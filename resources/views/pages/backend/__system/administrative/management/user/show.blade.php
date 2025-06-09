@extends('layouts.backend.__templates.show')
@section('title', 'Management Users')

@push('content')
<tr>
  <td class="align-middle font-weight-bold"> Name </td>
  <td class="align-middle"> {!! $data->name !!} </td>
</tr>
<tr>
  <td class="align-middle font-weight-bold"> Email </td>
  <td class="align-middle"> {!! $data->email !!} </td>
</tr>
<tr>
  <td class="align-middle font-weight-bold"> Phone </td>
  <td class="align-middle"> {!! $data->phone !!} </td>
</tr>
<tr>
  <td class="align-middle font-weight-bold"> Username </td>
  <td class="align-middle"> {!! $data->username !!} </td>
</tr>
@endpush
