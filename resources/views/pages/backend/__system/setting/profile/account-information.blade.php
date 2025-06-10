@extends('layouts.backend..default')
@section('title', 'Account Informations')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-custom gutter-b card-sticky" data-card="true" id="exilednoname_card_sticky">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> {{ __('default.label.account-informations') }} </h3>
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
            <label class="col-lg-3 col-form-label"> Avatar </label>
            <div class="col-lg-9">
              <div class="image-input image-input-outline" id="kt_profile_avatar" style="background: white">
                @if(Auth::User()->avatar)
                <div class="image-input-wrapper" style="background-image: url(/storage/avatar/{{ Auth::User()->id }}/{{ Auth::User()->avatar }})"></div>
                @else
                <div class="image-input-wrapper" style="background-image: url(/assets/backend/media/users/blank.png)"></div>
                @endif

                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                  <i class="fa fa-pen icon-sm text-muted"></i>
                  <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
                  <input type="hidden" name="avatar_remove">
                </label>

                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancel avatar">
                  <i class="ki ki-bold-close icon-xs text-muted"></i>
                </span>

                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="" data-original-title="Remove avatar">
                  <i class="ki ki-bold-close icon-xs text-muted"></i>
                </span>
              </div>
              <span class="form-text text-muted">Allowed file types:  png, jpg, jpeg.</span>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-lg-3 col-form-label"> Name </label>
            <div class="col-lg-9">
              {{ Html::text('name', (isset($data->name) ? $data->name : ''))->class([ $errors->has('name ') ? 'form-control is-invalid' : 'form-control'])->required() }}
              @error('name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 col-form-label"> Email </label>
            <div class="col-lg-9">
              {{ Html::email('email', (isset($data->email) ? $data->email : ''))->class([ $errors->has('email') ? 'form-control form-control-solid is-invalid' : 'form-control form-control-solid'])->isReadOnly() }}
              @error('email') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 col-form-label"> Phone </label>
            <div class="col-lg-9">
              {{ Html::text('phone', (isset($data->phone) ? $data->phone : ''))->class([ $errors->has('phone ') ? 'form-control form-control-solid is-invalid' : 'form-control form-control-solid'])->isReadOnly() }}
              @error('phone') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 col-form-label"> Username </label>
            <div class="col-lg-9">
              {{ Html::text('username', (isset($data->username) ? $data->username : ''))->class([ $errors->has('username ') ? 'form-control form-control-solid is-invalid' : 'form-control form-control-solid'])->isReadOnly() }}
              @error('username') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 col-form-label"> Role </label>
            <div class="col-lg-9">
              <tags class="tagify form-control" readonly="" tabindex="-1">
                @php $roles = \DB::table('model_has_roles')->where('model_id', Auth::user()->id)->get(); @endphp
                @foreach($roles as $role)
                @php $tests = \DB::table('roles')->where('id', $role->role_id)->get(); @endphp
                @foreach($tests as $test)
                <tag class="tagify__tag tagify--noAnim"><div><span class="tagify__tag-text"> {{ $test->name }} </span></div></tag>
                @endforeach
                @endforeach
              </tags>
            </div>
          </div>
        </form>

      </div>

    </div>
  </div>
</div>
@endsection

@push('js')
<script src="/public/assets/backend/js/pages/custom/profile/profile.js?v=7.0.6"></script>
@endpush
