@extends('layouts.backend.default')
@section('title', 'Settings')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-custom gutter-b card-sticky" data-card="true" id="kt_page_sticky_card">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> {{ __('default.label.settings') }} </h3>
        </div>
        <div class="card-toolbar">
          <div class="btn-group">
            <button type="submit" class="btn btn-sm btn-outline-primary" form="exilednoname-form">
              <span class="font-weight-bolder"> {{ __('default.label.save') }} </span>
            </button>
          </div>
        </div>
      </div>

      <div class="card-body">

        @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert"> {{ $message }} </div><hr>
        @endif

        @if ($message = Session::get('error'))
        <div class="alert alert-danger" role="alert"> {{ $message }} </div><hr>
        @endif

        <form method="POST" id="exilednoname-form" action="{{ URL::current() }}/update/{{ $data->id }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
          {{ method_field('PATCH') }}
          {{ csrf_field() }}

          <div class="form-group row">
            <label class="col-lg-3 col-form-label"> Application Name </label>
            <div class="col-lg-9">
              {{ Html::text('application_name', (isset($data->application_name) ? $data->application_name : ''))->class([ $errors->has('application_name ') ? 'form-control is-invalid' : 'form-control'])->required() }}
              @error('application_name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 col-form-label"> Application Version </label>
            <div class="col-lg-9">
              {{ Html::text('application_version', (isset($data->application_version) ? $data->application_version : ''))->class([ $errors->has('application_version ') ? 'form-control is-invalid' : 'form-control'])->required() }}
              @error('application_version') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
@endsection
