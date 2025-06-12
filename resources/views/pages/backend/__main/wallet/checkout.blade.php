@extends('layouts.backend.default')
@section('title', 'Checkout')

@push('head')
<script type="text/javascript"
  src="https://app.sandbox.midtrans.com/snap/snap.js"
  data-client-key="{{ config('midtrans.client_key') }}"></script>
  @endpush

@section('content')
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
          ――― <br>
          <b> Saldo akan otomatis masuk Dalam Hitungan Detik. </b>
        </p>
        <button id="pay-button" class="btn btn-info btn-lg btn-block"> Bayar </button>

      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-3">
  </div>
</div>
@endsection

@push('js')
<script type="text/javascript">
  // For example trigger on button clicked, or any time you need
  var payButton = document.getElementById('pay-button');
  payButton.addEventListener('click', function () {
    // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
    // window.snap.pay('{{ $snapToken }}');

    window.snap.pay('{{ $snapToken }}', {
      onSuccess: function(result){
        window.location.href = '{{ $url }}';
      },
      onPending: function(result){
        /* You may add your own implementation here */
        alert("wating your payment!"); console.log(result);
      },
      onError: function(result){
        /* You may add your own implementation here */
        alert("payment failed!"); console.log(result);
      },
      onClose: function(){
        /* You may add your own implementation here */
        alert('you closed the popup without finishing the payment');
      }
    })
    // customer will be redirected after completing payment pop-up
  });
</script>
@endpush
