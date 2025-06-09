<script>
  $('body').on('click', '.delete', function () {
    var id = $(this).data("id");
    Swal.fire({ title: "{{ __('default.notification.confirm.are-you-sure') }}?", text: "{{ __('default.notification.confirm.delete') }}", icon: "warning", showCancelButton: true, confirmButtonText: '{{ __("default.label.yes") }}', cancelButtonText: '{{ __("default.label.no") }}', reverseButtons: false }).then(function(result) {
      if (result.value) {
        $.ajax({
          type: "get", url: "{{ URL::current() }}/delete/"+id,
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
              toastr.success("{{ __('default.notification.success.item-deleted') }}");
            }, 2000);
          },
          error: function (data) {
            toastr.options = { "positionClass": "toast-bottom-right", "closeButton": true, };
            toastr.error("{{ __('default.notification.error./') }}");
          }
        });
      }
    });
  });
</script>
