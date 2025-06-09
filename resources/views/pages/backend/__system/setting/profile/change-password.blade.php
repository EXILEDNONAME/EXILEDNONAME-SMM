@extends('layouts.backend..default')
@section('title', 'Change Password')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-custom gutter-b card-sticky" data-card="true" id="exilednoname_card_sticky">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> {{ __('default.label.change-password') }} </h3>
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

        <form id="exilednoname-form" method="POST" action="{{ URL::current() }}/../update-password" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="form-group row">
            <label class="col-lg-3 col-form-label"> Current Password </label>
            <div class="col-lg-9">
              {{ Html::password('current-password')->class($errors->has('current-password') ? 'form-control is-invalid' : 'form-control')->required() }}
              @error('current-password') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
            </div>
          </div>

          <div class="form-group row">
            <label class="col-lg-3 col-form-label"> New Password </label>
            <div class="col-lg-9">
              {{ Html::password('new-password')->class($errors->has('new-password') ? 'form-control is-invalid' : 'form-control')->required() }}
              @error('new-password') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
            </div>
          </div>

          <div class="form-group row">
            <label class="col-lg-3 col-form-label"> Confirm Password </label>
            <div class="col-lg-9">
              {{ Html::password('confirm-password')->class($errors->has('confirm-password') ? 'form-control is-invalid' : 'form-control')->required() }}
              @error('confirm-password') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
            </div>
          </div>

        </form>

      </div>

    </div>
  </div>
</div>
@endsection
