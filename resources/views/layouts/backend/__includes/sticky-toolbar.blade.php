@php $sticky = DB::table('system_customizations')->first(); @endphp

@if ($sticky->sticky_toolbar == 1)
<ul class="sticky-toolbar nav flex-column pl-2 pr-2 pt-3 pb-3 mt-4">

  <li class="nav-item mb-2" id="kt_demo_panel_toggle" data-toggle="tooltip" title="Documentation" data-placement="right">
    <a class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-success" href="#">
      <i class="flaticon2-drop"></i>
    </a>
  </li>

  <li class="nav-item mb-2" data-toggle="tooltip" title="FAQ" data-placement="left">
    <a class="btn btn-sm btn-icon btn-bg-light btn-icon-primary btn-hover-primary" href="#" target="_blank">
      <i class="flaticon2-gear"></i>
    </a>
  </li>

  <li class="nav-item mb-2" data-toggle="tooltip" title="Documentation" data-placement="left">
    <a class="btn btn-sm btn-icon btn-bg-light btn-icon-warning btn-hover-warning" href="#" target="_blank">
      <i class="flaticon2-telegram-logo"></i>
    </a>
  </li>

  <li class="nav-item" id="kt_sticky_toolbar_chat_toggler" data-toggle="tooltip" title="Chat Example" data-placement="left">
    <a class="btn btn-sm btn-icon btn-bg-light btn-icon-danger btn-hover-danger" href="#" data-toggle="modal" data-target="#kt_chat_modal">
      <i class="flaticon2-chat-1"></i>
    </a>
  </li>

</ul>
@endif
