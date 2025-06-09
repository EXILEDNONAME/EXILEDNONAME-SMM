<div class="form-group row">
  <label class="col-lg-3 col-form-label"> Name </label>
  <div class="col-lg-9">
    {{ Html::text('name', (isset($data->name) ? $data->name : ''))->class([ $errors->has('name') ? 'form-control is-invalid' : 'form-control'])->required() }}
    @error('name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>

<div class="form-group row">
  <label class="col-lg-3 col-form-label"> IP Address </label>
  <div class="col-lg-9">
    {{ Html::text('ip_address', (isset($data->ip_address) ? $data->ip_address : ''))->class([ $errors->has('ip_address') ? 'form-control is-invalid' : 'form-control'])->required() }}
    @error('ip_address') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>

<div class="form-group row">
  <label class="col-lg-3 col-form-label"> MAC Address </label>
  <div class="col-lg-9">
    {{ Html::text('mac_address', (isset($data->mac_address) ? $data->mac_address : '00:00:00:00:00:00'))->class([ $errors->has('mac_address') ? 'form-control is-invalid' : 'form-control'])->placeholder('00:00:00:00:00:00') }}
    @error('mac_address') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>

<div class="form-group row">
  <label class="col-lg-3 col-form-label"> Port </label>
  <div class="col-lg-9">
    {{ Html::number('port', (isset($data->port) ? $data->port : '80'))->class([ $errors->has('port') ? 'form-control is-invalid' : 'form-control'])->placeholder('80') }}
    @error('port') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>

<div class="form-group row">
  <label class="col-lg-3 col-form-label"> Description </label>
  <div class="col-lg-9">
    {{ Html::textarea('description', (isset($data->description) ? $data->description : ''))->class([ $errors->has('description') ? 'form-control is-invalid' : 'form-control', ])->id('ex-textarea') }}
    @error('description') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>
