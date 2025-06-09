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

  <div class="col-xl-3">
    <div class="card card-custom bgi-no-repeat card-stretch gutter-b">
      <div class="card-body">
        <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-2 d-block text-center"> {{ \DB::table('users')->count() }} </span>
        <span class="font-weight-bold text-muted font-size-sm"><center> Total Users </center></span>
      </div>
    </div>
  </div>

  <div class="col-xl-3">
    <div class="card card-custom bgi-no-repeat card-stretch gutter-b">
      <div class="card-body">
        <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-2 d-block text-center"> {{ \DB::table('sessions')->count() }} </span>
        <span class="font-weight-bold text-muted font-size-sm"><center> Sessions </center></span>
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
