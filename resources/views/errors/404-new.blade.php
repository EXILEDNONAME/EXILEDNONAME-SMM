<!DOCTYPE html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <base href="../../../">
    <meta charset="utf-8"/>
    <title> @yield('title')</title>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <link href="/public/assets/backend/css/pages/error/error-6.css?v=7.0.6" rel="stylesheet" type="text/css"/>
    <link href="/public/assets/backend/plugins/global/plugins.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
    <link href="/public/assets/backend/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
    <link href="/public/assets/backend/css/style.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
    <link href="/public/assets/backend/css/themes/layout/header/base/light.css?v=7.0.6" rel="stylesheet" type="text/css"/>
    <link href="/public/assets/backend/css/themes/layout/header/menu/light.css?v=7.0.6" rel="stylesheet" type="text/css"/>
    <link href="/public/assets/backend/css/themes/layout/brand/dark.css?v=7.0.6" rel="stylesheet" type="text/css"/>
    <link href="/public/assets/backend/css/themes/layout/aside/dark.css?v=7.0.6" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="/public/assets/backend/media/logos/favicon.ico"/>
  </head>

  <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <div class="d-flex flex-column flex-root">
      <div class="error error-6 d-flex flex-row-fluid bgi-size-cover bgi-position-center" style="background-image: url(/assets/backend/media/error/bg6.jpg);">
        <div class="d-flex flex-column flex-row-fluid text-center">
          <h1 class="error-title font-weight-boldest text-white mb-12" style="margin-top: 12rem;"> </h1>
          <p class="display-4 font-weight-bold text-white">
            @yield('code') | @yield('message')
          </p>
          <div class="separator separator-dashed separator-border-2 mb-5"></div>
          <a href="/" class="text-white"><u> Back To Main </u></a>
        </div>
        <!--end::Content-->
      </div>
      <!--end::Error-->
    </div>
    <!--end::Main-->


    <script>var HOST_URL = "#";</script>
    <!--begin::Global Config(global config for global JS scripts)-->
    <script>
      var KTAppSettings = { };
    </script>
    <!--end::Global Config-->

    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="/public/assets/backend/plugins/global/plugins.bundle.js?v=7.0.6"></script>
    <script src="/public/assets/backend/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6"></script>
    <script src="/public/assets/backend/js/scripts.bundle.js?v=7.0.6"></script>
    <!--end::Global Theme Bundle-->


  </body>
  <!--end::Body-->
</html>
