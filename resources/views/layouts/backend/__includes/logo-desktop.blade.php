<div class="brand flex-column-auto" id="kt_brand">
  <a href="/dashboard" class="brand-logo">
    <h3 class="text-white">
      @php $title = DB::table('system_settings')->first(); @endphp
      {{ $title->application_name; }}
    </h3>
  </a>
</div>
