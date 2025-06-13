@extends('layouts.backend.default')
@section('title', 'Product 4')

@section('content')
<div class="row">
  <div class="col-lg-4">
    <div class="card card-custom gutter-b" data-card="true">
      <div class="card-body">
        <b> Product :</b> <br>
        ➥ {{ $product->name }}

        <hr>

        <b>Contoh Link :</b> <br>
        ➥ https://www.tiktok.com/@username <br>
        ➥ Pastikan akun tidak private
        <hr>
        <b> Detail :</b> <br>
        ➥ Proses Delay <br>
      </div>
    </div>
  </div>

  <div class="col-lg-8">
    <div class="card card-custom gutter-b" data-card="true">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> Order </h3>
        </div>
        <div class="card-toolbar">
          <a href="{{ $url }}" class="btn btn-sm btn-outline-primary font-weight-bolder mr-1">
            <i class="ki ki-long-arrow-back icon-xs"></i>
            {{ __('default.label.back') }}
          </a>
          <div class="btn-group">
            <button type="submit" class="btn btn-sm btn-outline-primary font-weight-bolder" form="exilednoname-form">
              Submit
            </button>
          </div>
        </div>
      </div>
      <div class="card-body">
        <form method="POST" id="exilednoname-form" action="{{ URL::current() }}/../" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input class="form-control" name="id_user" type="hidden" value="{{ Auth::User()->id }}">
          <input class="form-control" name="id_product" type="hidden" value="4">

          <div class="form-group row">
            <label class="col-lg-3 col-form-label"> Link </label>
            <div class="col-lg-9">
              {{ Html::text('target', (isset($data->target) ? $data->target : ''))->class([ $errors->has('target') ? 'form-control is-invalid' : 'form-control'])->required() }}
              @error('target') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
            </div>
          </div>

          <div class="form-group row">
            <label class="col-lg-3 col-form-label"> Quantity </label>
            <div class="col-lg-9">
              {{ Html::number('quantity', (isset($data->quantity) ? $data->quantity : ''))->class([ $errors->has('quantity') ? 'form-control is-invalid' : 'form-control'])->id('quantity') }}
              @error('quantity') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
              <span class="form-text text-muted"> Quantity 10 - 10.000 </span>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-lg-3 col-form-label"> Price </label>
            <div class="col-lg-9">
              {{ Html::text('price', (isset($data->price) ? $data->price : ''))->class([ $errors->has('price') ? 'form-control form-control-solid is-invalid' : 'form-control form-control-solid'])->required()->id('result') }}
              @error('price') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
<script>
$('#quantity').keyup(function(){
  var textone;
  var texttwo;
  textone = parseFloat($('#quantity').val());
  texttwo = {{ $product->price }};
  var result = textone * texttwo;
  $('#result').val(result.toFixed(2));
});
</script>
@endpush
