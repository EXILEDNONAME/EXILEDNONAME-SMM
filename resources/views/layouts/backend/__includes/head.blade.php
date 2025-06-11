<head>
  <base href="../../">
  <meta charset="utf-8"/>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>
    @php $title = DB::table('system_settings')->first(); @endphp
    {{ $title->application_name; }} - @yield('title')
   </title>
  <meta name="description" content="Dashboard EXILEDNONAME"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
  <link href="{{ env('APP_URL') }}/assets/backend/plugins/custom/fullcalendar/fullcalendar.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
  <link href="{{ env('APP_URL') }}/assets/backend/plugins/global/plugins.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
  <link href="{{ env('APP_URL') }}/assets/backend/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
  @stack('head')
  <link href="{{ env('APP_URL') }}/assets/backend/css/style.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
  <link href="{{ env('APP_URL') }}/assets/backend/css/themes/layout/header/base/light.css?v=7.0.6" rel="stylesheet" type="text/css"/>
  <link href="{{ env('APP_URL') }}/assets/backend/css/themes/layout/header/menu/light.css?v=7.0.6" rel="stylesheet" type="text/css"/>
  <link href="{{ env('APP_URL') }}/assets/backend/css/themes/layout/brand/dark.css?v=7.0.6" rel="stylesheet" type="text/css"/>
  <link href="{{ env('APP_URL') }}/assets/backend/css/themes/layout/aside/dark.css?v=7.0.6" rel="stylesheet" type="text/css"/>
  <link rel="shortcut icon" href="{{ env('APP_URL') }}/assets/favicon.png"/>
</head>
