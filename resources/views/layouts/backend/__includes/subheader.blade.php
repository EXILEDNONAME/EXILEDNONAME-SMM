<div class="subheader py-2 py-lg-6  subheader-solid " id="kt_subheader">
  <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">

    @include('layouts.backend.__includes.breadcrumb')

    <div class="d-flex align-items-center">
      @if (!empty($page) && $page == 'datatable-index')
      <a href="{{ URL::Current() }}/activities" data-toggle="tooltip" data-original-title="{{ __('default.label.activities') }}" data-placement="bottom" class="btn btn-xs btn-icon btn-info mr-1"><i class="fas fa-history"></i></a>
      <a href="{{ URL::Current() }}/trash" data-toggle="tooltip" data-original-title="{{ __('default.label.trash') }}" data-placement="bottom" class="btn btn-xs btn-icon btn-danger"><i class="fas fa-trash"></i></a>
      @endif
    </div>

    <div class="d-flex align-items-center">
      <a href="javascript:void(0);" class="btn btn-secondary btn-sm font-weight-bold font-size-base mr-1">
        <i class="icon-md fas fa-wallet text-info"></i>
        @if (!empty(\DB::table('main_wallets')->where('id_user', Auth::user()->id)->first()))
        <?php $fullbalance =\DB::table('main_wallets')->where('id_user', Auth::user()->id)->first(); ?>
        Rp {{ number_format($fullbalance->balance, 2, ",", "."); }}
        @else
          Rp {{ number_format(0, 2, ",", "."); }}
        @endif
      </a>
      @role('master-administrator')
      <a href="/dashboard/transactions/all" class="btn btn-secondary btn-sm font-weight-bold font-size-base"><i class="icon-md fas fa-server text-danger"></i></a>
      @endrole
    </div>

  </div>
</div>
