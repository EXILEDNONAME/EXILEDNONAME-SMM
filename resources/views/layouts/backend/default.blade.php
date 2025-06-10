<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  @include('layouts.backend.__includes.head')
  <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    @include('layouts.backend.__includes.logo-mobile')
    <div class="d-flex flex-column flex-root">
      <div class="d-flex flex-row flex-column-fluid page">
        <div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
          @include('layouts.backend.__includes.logo-desktop')
          @include('layouts.backend.__includes.sidebar')
        </div>

        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
          @include('layouts.backend.__includes.header')
          <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            @include('layouts.backend.__includes.subheader')
            <div class="d-flex flex-column-fluid">
              <div class="container-fluid">
                @if (\Session::has('error'))
                <div class="alert alert-danger" role="alert">
                  {!! \Session::get('error') !!}
                </div>
                @endif

                @yield('content')

              </div>
            </div>
          </div>

          @include('layouts.backend.__includes.footer')

        </div>
      </div>
    </div>

    <!-- @!include('layouts.backend.__includes.panel-chat') -->
    @include('layouts.backend.__includes.scroll-top')
    @include('layouts.backend.__includes.sticky-toolbar')
    @include('layouts.backend.__includes.js')

  </body>
</html>
