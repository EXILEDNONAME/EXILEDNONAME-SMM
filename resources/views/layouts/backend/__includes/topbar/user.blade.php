<div class="dropdown">

  <div class="topbar-item" data-toggle="dropdown" data-offset="0px,0px">
    <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2">
      <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1"> Hi, </span>
      <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3"> {{ Auth::User()->name }} </span>
      <div class="symbol symbol-lg-35 symbol-30 symbol-circle symbol-light-success">
        <i class="symbol-badge symbol-badge-bottom bg-success"></i>
        <img alt="Pic" src="{{ isset(Auth::User()->avatar) ? '/storage/avatar/' . Auth::User()->id . '/' . Auth::User()->avatar : '/assets/backend/media/users/blank.png' }}">
      </div>
    </div>
  </div>

  <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
    <ul class="navi navi-hover py-4">
      <li class="navi-item">
        <a href="/dashboard/settings/profiles" class="navi-link">
          <span class="navi-text"> {{ __('default.label.profile.account-information') }} </span>
        </a>
      </li>
      <li class="navi-item">
        <a id="logout_topbar" href="{{ URL::Current() }}#" class="navi-link">
          <span class="navi-text"> {{ __('default.label.logout') }} </span>
        </a>
      </li>
    </ul>
  </div>
</div>
