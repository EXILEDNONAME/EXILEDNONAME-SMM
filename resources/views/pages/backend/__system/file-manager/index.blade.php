@extends('layouts.backend.default')
@section('title', 'File Manager')

@push('head')
<link rel="stylesheet" type="text/css" href="/assets/backend/elfinder/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="/assets/backend/elfinder/css/elfinder.full.css">
<link rel="stylesheet" type="text/css" href="/assets/backend/elfinder/css/theme.css">
@endpush

@section('content')
<div id="elfinder"></div>
@endsection

@push('js')
<script src="/assets/backend/elfinder/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="/assets/backend/elfinder/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<script src="/assets/backend/elfinder/js/elfinder.full.js"></script>
<script type="text/javascript" charset="utf-8">
$().ready(function() {
  $('#elfinder').elfinder({
    customData: {
      _token: '{{ csrf_token() }}'
    },
    url : '{{ route("elfinder.connector") }}',
    soundPath: '/assets/backend/elfinder/sounds'
  });
});
</script>
@endpush
