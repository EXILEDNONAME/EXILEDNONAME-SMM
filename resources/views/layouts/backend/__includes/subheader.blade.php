<div class="subheader py-2 py-lg-6  subheader-solid " id="kt_subheader">
  <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">

    @include('layouts.backend.__includes.breadcrumb')

    <div class="d-flex align-items-center">
      @if (!empty($page) && $page == 'datatable-index')
      <a href="{{ URL::Current() }}/activities" data-toggle="tooltip" data-original-title="{{ __('default.label.activities') }}" data-placement="bottom" class="btn btn-xs btn-icon btn-info mr-1"><i class="fas fa-history"></i></a>
      <a href="{{ URL::Current() }}/trash" data-toggle="tooltip" data-original-title="{{ __('default.label.trash') }}" data-placement="bottom" class="btn btn-xs btn-icon btn-danger"><i class="fas fa-trash"></i></a>
      @endif
    </div>
  </div>
</div>
