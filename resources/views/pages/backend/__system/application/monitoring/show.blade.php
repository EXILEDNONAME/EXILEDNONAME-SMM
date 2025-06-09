@extends('layouts.backend.__templates.show')
@section('title', 'Monitorings')

@push('content')
<tr>
  <td class="align-middle font-weight-bold"> Status </td>
  <td class="align-middle">
    <?php
    if(!$socket = @fsockopen($data->ip_address, $data->port, $errNo, $errStr, 0.01)) { echo 'Offline'; }
    else { echo 'Online'; fclose($socket); }
    ?>
   </td>
</tr>
<tr>
  <td class="align-middle font-weight-bold"> Name </td>
  <td class="align-middle"> {!! $data->name !!} </td>
</tr>
<tr>
  <td class="align-middle font-weight-bold"> IP Address </td>
  <td class="align-middle"> {!! $data->ip_address !!} </td>
</tr>
<tr>
  <td class="align-middle font-weight-bold"> Device </td>
  <td class="align-middle"> {!! $data->device !!} </td>
</tr>
<tr>
  <td class="align-middle font-weight-bold"> MAC Address </td>
  <td class="align-middle"> {!! $data->mac_address !!} </td>
</tr>
<tr>
  <td class="align-middle font-weight-bold"> Port </td>
  <td class="align-middle"> {!! $data->port !!} </td>
</tr>
<tr>
  <td class="align-middle font-weight-bold"> Description </td>
  <td class="align-middle"> {!! nl2br(e($data->description)) !!} </td>
</tr>
@endpush
