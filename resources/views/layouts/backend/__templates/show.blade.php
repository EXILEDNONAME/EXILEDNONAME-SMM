@extends('layouts.backend.default')

@section('content')
<div class="row">

  <div class="col-lg-8">
      <div class="card card-custom gutter-b" data-card="true" id="exilednoname_card">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> {{ __('default.label.details') }} </h3>
        </div>
        <div class="card-toolbar">
          <a href="{{ $url }}" class="btn btn-sm btn-outline-primary font-weight-bolder mr-2" title="{{ __('default.label.back') }}">
            <i class="ki ki-long-arrow-back icon-xs"></i>
            {{ __('default.label.back') }}
          </a>
          <a data-toggle="modal" class="btn btn-sm btn-icon btn-outline-primary mr-2" data-target="#qrcode_modal" title="{{ __('default.label.qr-code') }}"><i class="fas fa-qrcode"></i></a>
          <a data-toggle="modal" class="btn btn-sm btn-icon btn-outline-primary mr-2" title="{{ __('default.label.print') }}" onclick="printData('printData')"><i class="fas fa-print"></i></a>
          <div class="btn-group">
            <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
              <ul class="nav nav-hover flex-column">
                <li class="nav-item">
                  <a href="{{ URL::current() }}/edit" class="nav-link">
                    <i class="nav-icon flaticon2-contract"></i>
                    <span class="nav-text"> {{ __('default.label.edit') }} </span>
                  </a>
                </li>
                <li class="nav-item">
                  <form method="POST" id="exilednoname-form" class="nav-link" action="{{ URL::current() }}/../{{ $data->id }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    @method('DELETE')
                    @csrf
                    <i class="nav-icon flaticon2-trash"></i>
                    <a href="javascript:void(0);" class="nav-text delete"> {{ __('default.label.delete./') }} </a>
                  </form>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div id="printData">
        <div class="card-body" style="">

          <div class="table-responsive">
            <table width="100%" class="table table-bordered table-checkable" id="exilednoname_table">
              <input class="form-control" name="id" type="hidden" value="{{ $data->id }}">
              @stack('content')
              <tr class="text-nowrap">
                <td class="align-middle font-weight-bold" width="300"> {{ __('default.label.active') }} </td>
                <td class="align-middle">
                  @if ( $data->active == 1 ) {{ __('default.label.yes') }}
                  @else {{ __('default.label.no') }}
                  @endif
                </td>
              </tr>
              <tr class="text-nowrap">
                <td class="align-middle font-weight-bold"> {{ __('default.label.created-by') }} </td>
                <td class="align-middle">
                  @if ($data->created_by == 0 || $data->created_by == NULL)
                  - System -
                  @else
                  {{ \DB::table('users')->where('id', $data->created_by)->first()->name }}
                  @endif
                </td>
              </tr>
              <tr class="text-nowrap">
                <td class="align-middle font-weight-bold"> {{ __('default.label.created-at') }} </td>
                <td class="align-middle"> {!! \Carbon\Carbon::parse($data->created_at)->format('d F Y, H:i') !!} </td>
              </tr>
              <tr class="text-nowrap">
                <td class="align-middle font-weight-bold" width="200px"> {{ __('default.label.updated-at') }} </td>
                <td class="align-middle"> {!! \Carbon\Carbon::parse($data->updated_at)->format('d F Y, H:i') !!} </td>
              </tr>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="col-lg-4">
    <div class="card card-custom gutter-b" data-card="true" id="exilednoname_card">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> {{ __('default.label.activities') }} </h3>
        </div>
        <div class="card-toolbar">
          <a data-toggle="modal" class="btn btn-sm btn-icon btn-outline-primary mr-2" onclick="printData('printDataActivities')" title="{{ __('default.label.print') }}"><i class="fas fa-print"></i></a>
        </div>
      </div>

      <div id="printDataActivities">
      <div class="card-body">

        <div class="example-preview">
          <div class="timeline timeline-2">
            <div class="timeline-bar"></div>

            @php $activity = activities($model)->where('subject_id', $data->id)->take(7); @endphp
            @if (!empty($activity) && !empty($activity->count()))
            @foreach($activity as $item)
            <div class="timeline-item">

              @foreach($item['properties'] as $data_object)
              @if ($item->description == 'created')
              <span class="timeline-badge bg-success"></span>
              <div class="timeline-content d-flex align-items-center justify-content-between">
                <span class="mr-3">
                  <span class="text-muted"> {{ $item->created_at->diffForHumans() }}, {{ $item->causer->name }} </span><br>
                  @if (!empty($item->causer->name) && !empty($data_object['name']))
                  {{ __('default.activity.item-created') }} <span class="font-weight-bolder"> {{ mb_strimwidth($data_object['name'], 0, 10, ' ...') }} </span>
                  @else
                  {{ __('default.activity.item-created') }} ...
                  @endif
                </span>
              </div>
              @endif
              @endforeach


              @if ($item->description == 'updated')
              @if ($item['properties']['attributes']['deleted_at'] == NULL && !empty($item['properties']['old']['deleted_at']))
              <span class="timeline-badge bg-info"></span>
              <div class="timeline-content d-flex align-items-center justify-content-between">
                <span class="mr-3">
                  <span class="text-muted"> {{ $item->created_at->diffForHumans() }}, {{ $item->causer->name }} </span><br>
                  @if (!empty($item->causer->name) && !empty($data_object['name']))
                  {{ __('default.activity.item-restored') }} <span class="font-weight-bolder"> {{ mb_strimwidth($data_object['name'], 0, 10, ' ...') }} </span>
                  @else
                  {{ __('default.activity.item-restored') }} ...
                  @endif
                </span>
              </div>
              @else
              <span class="timeline-badge bg-warning"></span>
              <div class="timeline-content d-flex align-items-center justify-content-between">
                <span class="mr-3">
                  <span class="text-muted"> {{ $item->created_at->diffForHumans() }}, {{ $item->causer->name }} </span><br>
                  @if (!empty($data_object['name']))
                  {{ __('default.activity.item-updated') }} <span class="font-weight-bolder"> {{ mb_strimwidth($item['properties']['old']['name'], 0, 10, ' ...') }} </span> to <span class="font-weight-bolder"> {{ mb_strimwidth($item['properties']['attributes']['name'], 0, 10, ' ...') }} </span>
                  @else
                  {{ __('default.activity.item-updated') }} ...
                  @endif
                </span>
              </div>
              @endif
              @endif

              @foreach($item['properties'] as $data_object)
              @if ($item->description == 'deleted')
              <span class="timeline-badge bg-danger"></span>
              <div class="timeline-content d-flex align-items-center justify-content-between">
                <span class="mr-3">
                  <span class="text-muted"> {{ $item->created_at->diffForHumans() }}, {{ $item->causer->name }} </span><br>
                  @if (!empty($data_object['name']))
                  {{ __('default.activity.item-deleted') }} <b>{{ $data_object['name'] }}</b>
                  @else
                  {{ __('default.activity.item-deleted') }} ...
                  @endif
                </span>
              </div>
              @endif
              @endforeach

            </div>
            @endforeach
            @else
            <span class="text-muted"> {{ trans('default.activity.no-recent-activities') }} ... </span>
            @endif

          </div>
        </div>

      </div>
    </div>
    </div>
  </div>

</div>

<div class="modal fade" id="qrcode_modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"> {{ __('default.label.qr-code') }} </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <div id="printQR">
          <p class="text-center"> {!! QrCode::size(300)->generate(URL::current()); !!} </p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-icon btn-outline-primary" onclick="printQR('printQR')"><i class="fas fa-print"></i></button>
        <button type="button" class="btn btn-outline-primary font-weight-bolder" data-dismiss="modal"> {{ __('default.label.close') }} </button>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
<script>
function printData(divName) {
  var printContents = document.getElementById(divName).innerHTML;
  var originalContents = document.body.innerHTML;
  document.body.innerHTML = printContents;
  window.print();
  document.body.innerHTML = originalContents;
}

function printDataActivities(divName) {
  var printContents = document.getElementById(divName).innerHTML;
  var originalContents = document.body.innerHTML;
  document.body.innerHTML = printContents;
  window.print();
  document.body.innerHTML = originalContents;
}
</script>

<script>
function printQR(divName){
  var myWindow=window.open('','','');
  myWindow.document.write(document.getElementById(divName).innerHTML);
  myWindow.document.close();
  myWindow.focus();
  myWindow.print();
  myWindow.document.close();
}
</script>

<script>
$('body').on('click', '.delete', function (e) {
  e.preventDefault()
  Swal.fire({ title: "{{ __('default.notification.confirm.are-you-sure') }}?", text: "{{ __('default.notification.confirm.delete') }}", icon: "warning", showCancelButton: true, confirmButtonText: '{{ __("default.label.yes") }}', cancelButtonText: '{{ __("default.label.no") }}', reverseButtons: false }).then(function(result) {
    if (result.value) {
      $(e.target).closest('form').submit()
    }
  });
});
</script>
@endpush
