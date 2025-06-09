<!DOCTYPE html>
<html lang="en" >
  <head>
    <base href="../../../../">
    <meta charset="utf-8"/>
    <title>
      @php $title = DB::table('system_settings')->first(); @endphp
      @if (request()->is('dashboard')) {{ $title->application_name; }} - Dashboard
      @elseif (request()->is('login')) {{ $title->application_name; }}
      @elseif (request()->is('register')) {{ $title->application_name; }}
      @else {{ $title->application_name; }} - @stack('title')
      @endif
    </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Created By EXILEDNONAME - Page Login"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <link href="/assets/backend/css/pages/login/classic/login-5.css?v=7.0.6" rel="stylesheet" type="text/css"/>
    <link href="/assets/backend/plugins/global/plugins.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
    <link href="/assets/backend/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
    <link href="/assets/backend/css/style.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
    <link href="/assets/backend/css/themes/layout/header/base/light.css?v=7.0.6" rel="stylesheet" type="text/css"/>
    <link href="/assets/backend/css/themes/layout/header/menu/light.css?v=7.0.6" rel="stylesheet" type="text/css"/>
    <link href="/assets/backend/css/themes/layout/brand/dark.css?v=7.0.6" rel="stylesheet" type="text/css"/>
    <link href="/assets/backend/css/themes/layout/aside/dark.css?v=7.0.6" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="/assets/favicon.png"/>
    <style>
      /* Chrome, Safari, Edge, Opera */
      input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }

      /* Firefox */
      input[type=number] {
        -moz-appearance: textfield;
      }
    </style>
  </head>

  <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading"  >

    <div class="d-flex flex-column flex-root">
      <div class="login login-5 login-signin-on d-flex flex-row-fluid" id="kt_login">
        <div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url(/assets/backend/media/bg/bg-2.jpg);">
          <div class="login-form text-center text-white p-7 position-relative overflow-hidden">

            <div class="login-signin text-white">
              <div class="mb-10">
                <h3 class="opacity-40 font-weight-normal"> - LOGIN AREA - </h3>
                <p class="opacity-40"> Enter your details to login to your account </p>
              </div>

              <form class="form" method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                  <input id="name" type="text" class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name" autocomplete="off" required>
                  <!-- <input class="form-control " type="text" placeholder="Account" name="name" autocomplete="off" required/> -->
                </div>
                <div class="form-group">
                  <input id="email" type="email" class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" autocomplete="off" required>
                  <!-- <input class="form-control " type="text" placeholder="Account" name="name" autocomplete="off" required/> -->
                </div>
                <div class="form-group">
                  <input id="username" type="text" class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8 @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Username" autocomplete="off" required>
                  <!-- <input class="form-control " type="text" placeholder="Account" name="name" autocomplete="off" required/> -->
                </div>
                <div class="form-group">
                  <input id="phone" type="number" class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8 @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Phone" autocomplete="off" required>
                  <!-- <input class="form-control " type="text" placeholder="Account" name="name" autocomplete="off" required/> -->
                </div>
                  <div class="form-group">
                    <input id="password" type="password" class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8 @error('password') is-invalid @enderror" placeholder="Password" name="password" autocomplete="new-password" required>
                    <!-- <input class="form-control " type="password" placeholder="Password" name="password" required/> -->
                  </div>
                  <div class="form-group">
                    <input id="password_confirmation" type="password" class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8 @error('password_confirmation') is-invalid @enderror" placeholder="Password Confirm" name="password_confirmation" autocomplete="password_confirmation" required>
                    <!-- <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"> -->

                  </div>


                  <center>
                    @error('email')
                    <div class="fv-plugins-message-container mt-0">
                      <div data-field="email" class="fv-help-block"><strong>{{ $message }}</strong></div>
                    </div>
                    <br>
                    @enderror

                    @error('phone')
                    <div class="fv-plugins-message-container mt-0">
                      <div data-field="phone" class="fv-help-block"><strong>{{ $message }}</strong></div>
                    </div>
                    <br>
                    @enderror

                    @error('username')
                    <div class="fv-plugins-message-container mt-0">
                      <div data-field="phone" class="fv-help-block"><strong>{{ $message }}</strong></div>
                    </div>
                    <br>
                    @enderror

                    @error('password')
                    <div class="fv-plugins-message-container mt-0">
                      <div data-field="password" class="fv-help-block"><strong>{{ $message }}</strong></div>
                    </div>
                    <br>
                    @enderror

                    @error('password_confirmation')
                    <div class="fv-plugins-message-container mt-0">
                      <div data-field="password" class="fv-help-block"><strong>{{ $message }}</strong></div>
                    </div>
                    <br>
                    @enderror
                  </center>

                  <div class="form-group text-center d-flex flex-wrap justify-content-between align-items-center px-8 opacity-60">
                    <div class="checkbox-inline">
                      <label class="checkbox checkbox-outline checkbox-white text-white m-0">
                        <input type="checkbox" name="remember"/>
                        <span></span>
                        Remember me
                      </label>
                    </div>
                    <a href="/password/reset" class="text-white font-weight-bold">Forget Password ?</a>
                  </div>
                  <div class="form-group text-center mt-10">
                    <button type="submit" class="btn btn-pill btn-primary opacity-90 px-15 py-3">Sign In</button>
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

      <script src="/assets/backend/plugins/global/plugins.bundle.js?v=7.0.6"></script>
      <script src="/assets/backend/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6"></script>
      <script src="/assets/backend/js/scripts.bundle.js?v=7.0.6"></script>
      <script>
        $("#alert_facebook").click(function (e) {
          Swal.fire({
            title: "Maintenance",
            text: "Not available at the moment!",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "OK",
            customClass: {
              confirmButton: "btn btn-dark"
            }
          });
        });
      </script>

    </body>
  </html>
