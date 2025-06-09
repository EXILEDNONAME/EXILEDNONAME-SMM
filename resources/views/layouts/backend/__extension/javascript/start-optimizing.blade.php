<script>
$('body').on('click', '#start-optimizing', function () {
  var id = $(this).data("id");
  $.ajax({
    type: "get", url: "{{ URL::current() }}/start-optimizing/"+id, processing: true, serverSide: true,
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
        toastr.info("{{ __('default.notification.success.optimizing') }}");
      }, 2000);

    },
    error: function (data) {
      toastr.options = { "positionClass": "toast-bottom-right", "closeButton": true, };
      toastr.error("{{ __('default.notification.error./') }}");
    }
  });
});
</script>
