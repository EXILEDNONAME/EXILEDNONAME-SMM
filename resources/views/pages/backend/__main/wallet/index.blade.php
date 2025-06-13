@extends('layouts.backend.__templates.index', ['active' => 'false', 'activities' => 'false', 'charts' => 'false', 'date' => 'false'])
@section('title', 'Wallets')

@push('box')
<div class="row">
  <div class="col-xl-3 col-sm-3">
  </div>
  <div class="col-xl-6 col-sm-6">
    <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url({{ env('APP_URL') }}/assets/backend/media/svg/shapes/abstract-4.svg)">
      <div class="card-body">
        <center>
          <span class="font-weight-bold text-muted font-size-sm"><i class="icon-xl fas fa-wallet text-info"></i></span>
          <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-2 d-block">
            @if (!empty(\DB::table('main_wallets')->where('id_user', Auth::user()->id)->first()))
            <?php $fullbalance =\DB::table('main_wallets')->where('id_user', Auth::user()->id)->first(); ?>
            Rp {{ number_format($fullbalance->balance, 2, ",", "."); }}
            @else
            Rp {{ number_format(0, 2, ",", "."); }}
            @endif
          </span>
          <span class="font-weight-bold text-muted font-size-sm"> Total Balances </span>
        </center>

        <hr>

        <b> DESKRIPSI </b>
        <p>
          <br>
          ♦ Minimal Deposit ≈ Rp 1.000 <br>
          ♦ Masukkan Jumlah Deposit => <br>
          ♦ Periksa kembali dan Tekan Tombol Submit apabila telah sesuai. <br>
          <hr>
          <b> Saldo akan otomatis masuk Dalam Hitungan Detik. </b>
        </p>

        <form action="{{ URL::Current() }}/checkout" method="POST">
          @csrf
          <div class="form-group">
            <input class="form-control" name="user_id" type="hidden" value="{{ Auth::User()->id }}">

            {{ Html::number('balance', (isset($data->balance) ? $data->balance : ''))->class([ $errors->has('balance') ? 'form-control form-control-solid is-invalid' : 'form-control form-control-solid'])->id('balance')->required() }}
            @error('balance') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
            <br>

            <button type="submit" class="btn btn-info btn-lg btn-block"> Submit </button>
          </div>
        </form>

      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-3">
  </div>
</div>
@endpush

@section('table-header')
<th width="1"> Status </th>
<th> Transaction Date </th>
<th width="1"> Balance </th>
@endsection

@section('table-body')
{ data: 'status', 'className': 'align-middle text-nowrap text-center' },
{ data: 'date', 'className': 'align-middle text-nowrap' },
{ data: 'balance', 'className': 'align-middle text-nowrap text-right' },
@endsection
