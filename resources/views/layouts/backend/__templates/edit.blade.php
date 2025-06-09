@extends('layouts.backend.default')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-custom" data-card="true" id="kt_card_1">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> Create </h3>
        </div>
        <div class="card-toolbar">
          <a href="{{ $url }}" class="btn btn-sm btn-outline-primary font-weight-bolder mr-1">
            <i class="ki ki-long-arrow-back icon-xs"></i>
            {{ __('default.label.back') }}
          </a>
          <div class="btn-group">
            <button type="submit" class="btn btn-sm btn-outline-primary font-weight-bolder" form="exilednoname-form">
              {{ __('default.label.update') }}
            </button>
          </div>
        </div>
      </div>

      <div class="card-body">
        <form method="POST" id="exilednoname-form" action="{{ URL::current() }}/../../{{ $data->id }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
          {{ method_field('PATCH') }}
          {{ csrf_field() }}
          <input class="form-control" name="id" type="hidden" value="{{ $data->id }}">
          @include($path . 'form', ['formMode' => 'edit'])
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
