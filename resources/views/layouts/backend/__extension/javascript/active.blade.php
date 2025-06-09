<script>
  $('body').on('click', '#active', function () {
    var id = $(this).data("id");
    $.ajax({
      type: "get", url: "{{ URL::current() }}/active/"+id, processing: true, serverSide: true,
      success: function (data) {
        KTApp.block('#exilednoname_body', {
          overlayColor: '#000000',
          state: 'info',
          message: '{{ __('default.label.processing') }} ...'
        });
        setTimeout(function() {
          KTApp.unblock('#exilednoname_body');
          var oTable = $('#exilednoname_table').dataTable();
          oTable.fnDraw(false);
          toastr.options = { "positionClass": "toast-bottom-right", "closeButton": true, };
          toastr.success("{{ __('default.notification.success.item-active') }}");
        }, 2000);
      },
      error: function (data) {
        toastr.options = { "positionClass": "toast-bottom-right", "closeButton": true, };
        toastr.error("{{ __('default.notification.error./') }}");
      }
    });
  });
</script>
