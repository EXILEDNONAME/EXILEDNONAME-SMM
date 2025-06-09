<script>
@if (empty($active) || $active == 'true')
$('.filter_active').change(function () {
  var card = new KTCard('exilednoname_card');
  KTApp.block(card.getSelf(), {
    overlayColor: '#ffffff',
    type: 'loader',
    state: 'primary',
    message: '{{ __('default.label.processing') }} ...',
    opacity: 0.3,
    size: 'lg'
  });
  setTimeout(function() {
    KTApp.unblock(card.getSelf());
  }, 500);
  table.column(-2).search( $(this).val() ).draw();
});
@endif
</script>
