@extends('layouts.backend.default', ['page' => 'dashboard'])
@section('title', 'Dashboard')

@section('content')
@if ($message = Session::get('success'))
<div id="toast-container" class="toast-bottom-right">
  <div class="toast toast-success" aria-live="polite">
    <div class="toast-message">{{ $message }}</div>
  </div>
</div>
@endif

@if ($message = Session::get('error'))
<div id="toast-container" class="toast-bottom-right">
  <div class="toast toast-error" aria-live="polite">
    <div class="toast-message">{{ $message }}</div>
  </div>
</div>
@endif

<div class="row">

  <div class="col-xl-6">
    <div class="card card-custom card-stretch gutter-b">
      <div class="card-body d-flex align-items-center py-0 mt-2">
        <div class="d-flex flex-column flex-grow-1 py-lg-5">
          <a class="card-title font-weight-bolder text-dark-75 mb-2 text-hover-danger"> Welcome, {{ Auth::User()->name }} </a>
          <span class="text-muted">
            <span id="fullyear"> {{ \Carbon\Carbon::now()->isoFormat('D MMMM Y'); }} </span>
            <span id="hours">00</span>:<span id="minutes">00</span>:<span id="seconds">00</span> <span id="amOrpm"></span>
          </span>
        </div>
        <img src="/assets/backend/media/svg/avatars/029-boy-11.svg" alt="" class="align-self-end h-100px">
      </div>
    </div>
  </div>


  <div class="col-xl-3 col-sm-6">
    <!--begin::Stats Widget 1-->
    <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(/assets/backend/media/svg/shapes/abstract-4.svg)">
      <!--begin::Body-->
      <div class="card-body">
        <center>
          <span class="font-weight-bold text-muted font-size-sm"><i class="icon-xl fas fa-wallet text-info"></i></span>
          <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-2 d-block"> Rp 10.000,00 </span>
          <span class="font-weight-bold text-muted font-size-sm"> Total Balances </span>
        </center>
      </div>
      <!--end::Body-->
    </div>
    <!--end::Stats Widget 1-->
  </div>

  <div class="col-xl-3 col-sm-6">
    <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(/assets/backend/media/svg/shapes/abstract-2.svg)">
      <div class="card-body">
        <center>
          <span class="font-weight-bold text-muted font-size-sm"><i class="icon-xl fas fa-exchange-alt text-danger"></i></span>
          <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-2 d-block text-center"> {{ \DB::table('main_transactions')->where('id_user', Auth::User()->id)->count() }} </span>
          <span class="font-weight-bold text-muted font-size-sm"> Total Transactions</span>
        </center>
      </div>
    </div>
  </div>

</div>

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
              <td class="text-nowrap text-right"> Rp {{ number_format($transaction->price, 2, ",", ".") }} </td>
              <td class="text-nowrap text-center"><a href="{{ $transaction->target }}" target="_blank"><i class="text-primary icon-md fas fa-link"></i></a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
<script type="text/javascript">
function SettingCurrentTime() {
  var currentTime = new Date();
  var hours = currentTime.getHours();
  var minutes = currentTime.getMinutes();
  var seconds = currentTime.getSeconds();
  var amOrPm = hours < 12 ? "AM" : "PM";
  hours = hours === 0 ? 12 : hours > 12 ? hours - 12 : hours;
  hours = addZero(hours);
  minutes = addZero(minutes);
  seconds = addZero(seconds);
  var currentDate = currentTime.getDate();
  var currentMonth = ConvertMonth(currentTime.getMonth());
  var currentYear = currentTime.getFullYear();
  var fullDateDisplay = `${currentDate} ${currentMonth} ${currentYear}`;
  document.getElementById("hours").innerText = hours;
  document.getElementById("minutes").innerText = minutes;
  document.getElementById("seconds").innerText = seconds;
  document.getElementById("amOrpm").innerText = amOrPm;
  document.getElementById("fullyear").innerText = fullDateDisplay;
  var timer = setTimeout(SettingCurrentTime, 1000);
}
function addZero(component) {
  return component < 10 ? "0" + component : component;
}
function ConvertMonth(component) {
  month_array = new Array('Januari', 'Febuari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
  return month_array[component];
}
SettingCurrentTime();
</script>
@endpush
