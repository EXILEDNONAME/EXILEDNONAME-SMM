<div class="topbar">
  <!-- @!include('layouts.backend.__includes.topbar.search') -->
  <!-- @!include('layouts.backend.__includes.topbar.chat') -->
  <!-- @!include('layouts.backend.__includes.topbar.quick-action') -->
  @role('master-administrator')
  @include('layouts.backend.__includes.topbar.notification')
  @endrole
  @include('layouts.backend.__includes.topbar.language')
  @include('layouts.backend.__includes.topbar.user')
</div>
