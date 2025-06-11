<!DOCTYPE html>
<html lang="en" >
<head>
  <base href="../../../../">
  <meta charset="utf-8"/>
  <title>
    @php $title = DB::table('system_settings')->first(); @endphp
    {{ $title->application_name; }} - Forget Password
  </title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="Login page example"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
  <link href="{{ env('APP_URL') }}/assets/backend/css/pages/login/classic/login-5.css?v=7.0.6" rel="stylesheet" type="text/css"/>
  <link href="{{ env('APP_URL') }}/assets/backend/plugins/global/plugins.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
  <link href="{{ env('APP_URL') }}/assets/backend/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
  <link href="{{ env('APP_URL') }}/assets/backend/css/style.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
  <link href="{{ env('APP_URL') }}/assets/backend/css/themes/layout/header/base/light.css?v=7.0.6" rel="stylesheet" type="text/css"/>
  <link href="{{ env('APP_URL') }}/assets/backend/css/themes/layout/header/menu/light.css?v=7.0.6" rel="stylesheet" type="text/css"/>
  <link href="{{ env('APP_URL') }}/assets/backend/css/themes/layout/brand/dark.css?v=7.0.6" rel="stylesheet" type="text/css"/>
  <link href="{{ env('APP_URL') }}/assets/backend/css/themes/layout/aside/dark.css?v=7.0.6" rel="stylesheet" type="text/css"/>
  <link rel="shortcut icon" href="{{ env('APP_URL') }}/assets/backend/media/logos/favicon.ico"/>
</head>

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

  <div class="d-flex flex-column flex-root">
    <div class="login login-5 login-signin-on d-flex flex-row-fluid" id="kt_login">
      <div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url(/assets/backend/media/bg/bg-2.jpg);">
        <div class="login-form text-center text-white p-7 position-relative overflow-hidden">

          <div class="login-signin text-white">
            <div class="mb-10">
              <h3 class="opacity-40 font-weight-normal"> - RESET PASSWORD - </h3>
              <p class="opacity-40"> Confirm Reset Password For Your Account </p>
            </div>

            <form method="POST" action="{{ route('password.store') }}">
              @csrf

              <input type="hidden" name="token" value="{{ $request->route('token') }}">

              <div class="form-group">
                <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8 @error('email') is-invalid @enderror" id="email" type="email" value="{{ $request->email ?? old('email') }}" placeholder="Email" name="email" autocomplete="off" autofocus/>
                <!-- <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" /> -->
              </div>

              <div class="form-group">
                <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8 @error('password') is-invalid @enderror" id="password" type="password" name="password" required autocomplete="new-password" placeholder="{{ __('Password') }}" />
              </div>

              <div class="form-group">
                <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8 @error('password') is-invalid @enderror" id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}" />
              </div>



              <center>
                @error('email')
                <div class="fv-plugins-message-container mt-0">
                  <div data-field="password" class="fv-help-block"><strong>{{ $message }}</strong></div>
                </div>
                <br>
                @enderror
                @error('password')
                <div class="fv-plugins-message-container mt-0">
                  <div data-field="password" class="fv-help-block"><strong>{{ $message }}</strong></div>
                </div>
                <br>
                @enderror

                @if (session('status'))
                <div class="fv-plugins-message-container mt-0">
                  {{ session('status') }}
                </div>
                @endif
              </center>
              <div class="form-group text-center mt-10">
                <button type="submit" class="btn btn-pill btn-primary opacity-90 px-15 py-3"> {{ __('Reset Password') }} </button>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>

  <script>
  var KTAppSettings = { "font-family": "Poppins" };
  </script>

  <script src="{{ env('APP_URL') }}/assets/backend/plugins/global/plugins.bundle.js?v=7.0.6"></script>
  <script src="{{ env('APP_URL') }}/assets/backend/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6"></script>
  <script src="{{ env('APP_URL') }}/assets/backend/js/scripts.bundle.js?v=7.0.6"></script>

</body>
</html>
