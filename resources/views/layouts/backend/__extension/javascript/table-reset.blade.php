<script>
  $("#table-reset").on("click", function() {

    $.ajax({
      type: "get", url: "{{ URL::current() }}/reset", processing: true, serverSide: true,
      success: function (data) {

        KTApp.block('#exilednoname_body', {
          overlayColor: '#000000',
          state: 'info',
          message: '{{ __('default.label.processing') }} ...'
        });

        setTimeout(function() {
          KTApp.unblock('#exilednoname_body');
          table.ajax.reload();
          toastr.options = { "positionClass": "toast-bottom-right", "closeButton": true, };
          toastr.info("{{ __('default.notification.success.table-reset') }}");
        }, 2000);

      },
      error: function (data) {
        toastr.options = { "positionClass": "toast-bottom-right", "closeButton": true, };
        toastr.error("{{ __('default.notification.error./') }}");
      }
    });

  });
</script>
