<script>
  table.on('change', '.group-checkable', function() {
    var set = $(this).closest('table').find('td:first-child .checkable');
    var checked = $(this).is(':checked');
    $(set).each(function() {
      if (checked) {
        $(this).prop('checked', true);
        table.rows($(this).closest('tr')).select();
        var checkedNodes = table.rows('.selected').nodes();
        var count = checkedNodes.length;
        $('#exilednoname_selected').html(count);
        if (count > 0) {
          $('#toolbar_delete').collapse('show');
          $('#collapse_bulk').collapse('show');
        }
      } else {
        $(this).prop('checked', false);
        table.rows($(this).closest('tr')).deselect();
        $('#toolbar_delete').collapse('hide');
        $('#collapse_bulk').collapse('hide');
      }
    });
  });
</script>
