@if (!empty($charts) && $charts == 'true')
<script>
  $("#chart-refresh").on("click", function() {
    KTApp.block('#exilednoname_chart', {
      overlayColor: '#000000',
      state: 'primary',
      message: "{{ __('default.label.please-wait') }} ..."
    });
    setTimeout(function() {
      KTApp.unblock('#exilednoname_chart');
      $('#collapse_bulk').collapse('hide');
      $('.filter-form').val('');
      table.search( '' ).columns().search( '' ).draw();
      table.ajax.reload();
    }, 2000);
  });
</script>
@endif
