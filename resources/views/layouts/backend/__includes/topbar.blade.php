<div class="topbar">
  <!-- @!include('layouts.backend.__includes.topbar.search') -->
  <!-- @!include('layouts.backend.__includes.topbar.chat') -->
  <!-- @!include('layouts.backend.__includes.topbar.quick-action') -->
  @role('master-administrator')
  @include('layouts.backend.__includes.topbar.notification')
  @endrole
  @include('layouts.backend.__includes.topbar.language')
  @include('layouts.backend.__includes.topbar.user')
  <div class="dropdown">
    <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
      <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
        <i class="icon-lg fas fa-wallet text-info"></i>
      </div>
    </div>

    <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
      <ul class="navi navi-hover py-4">
        <span class="navi-text p-5"><strong> Your Balances : </strong></span>
        <li class="navi-item active">
          <a class="navi-link">
            <span class="navi-text"> Rp 10.000,00 </span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>
