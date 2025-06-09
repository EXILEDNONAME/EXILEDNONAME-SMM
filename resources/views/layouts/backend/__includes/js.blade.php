<script src="/assets/backend/plugins/global/plugins.bundle.js"></script>
<script src="/assets/backend/plugins/custom/prismjs/prismjs.bundle.js"></script>
<script src="/assets/backend/js/scripts.bundle.js"></script>
<script src="/assets/backend/js/pages/features/cards/tools.js?v=7.0.6"></script>
@stack('js')

<script>
$("#logout").click(function(e) {
  Swal.fire({
    title: "{{ __('default.notification.confirm.are-you-sure') }}?",
    text: "{{ __('default.label.logout-session') }}",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: '{{ __("default.label.yes") }}',
    cancelButtonText: '{{ __("default.label.no") }}',
    reverseButtons: false
  }).then(function(result) {
    if (result.value) {
      Swal.fire({
        text: "{{ __('default.label.redirect-login') }}",
        timer: 2000,
        onOpen: function() {
          Swal.showLoading()
        }
      }).then(function(result) {
        if (result.dismiss === "timer") {
          window.location = "{{ url('/dashboard/logout') }}";
        }
      })
    }
  });
});

$("#logout_topbar").click(function(e) {
  Swal.fire({
    title: "{{ __('default.notification.confirm.are-you-sure') }}?",
    text: "{{ __('default.label.logout-session') }}",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: '{{ __("default.label.yes") }}',
    cancelButtonText: '{{ __("default.label.no") }}',
    reverseButtons: false
  }).then(function(result) {
    if (result.value) {
      Swal.fire({
        text: "{{ __('default.label.redirect-login') }}",
        timer: 2000,
        onOpen: function() {
          Swal.showLoading()
        }
      }).then(function(result) {
        if (result.dismiss === "timer") {
          window.location = "{{ url('/dashboard/logout') }}";
        }
      })
    }
  });
});
</script>
