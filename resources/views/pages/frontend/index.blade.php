<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="author" content="EXILEDNONAME">
  <meta name="description" content="EXILEDNONAME">
  <meta name="keywords" content="EXILEDNONAME">
  <title>
    @php $title = DB::table('system_settings')->first(); @endphp
    {{ $title->application_name; }}
   </title>
  <link rel="stylesheet" type="text/css" href="{{ public_path() }}/assets/frontend/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="{{ public_path() }}/assets/frontend/css/animate.css">
  <link rel="stylesheet" type="text/css" href="{{ public_path() }}/assets/frontend/css/star-animation.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="{{ public_path() }}/assets/frontend/css/reset.css">
  <link rel="stylesheet" type="text/css" href="{{ public_path() }}/assets/frontend/css/structure.css">
  <link rel="stylesheet" type="text/css" href="{{ public_path() }}/assets/frontend/css/main-style.css">
  <link rel="stylesheet" type="text/css" href="{{ public_path() }}/assets/frontend/css/responsive.css">
</head>
<body class="single-image star-animation">
  <div class="page-loader-wrapper">
    <div class="loader"></div>
  </div>

  <div id="main-wrapper">
    <main id="main" class="background" data-image="{{ public_path() }}/assets/frontend/images/background.jpg">

      <div class="bg-animation">
        <div id='stars'></div>
        <div id='stars2'></div>
        <div id='stars3'></div>
        <div id='stars4'></div>
      </div>

      <div class="overlay" style="background-color: rgba(0,0,0,0.3)"></div>
      <div class="nc-content-section index nc-active vhm">
        <div id="home-page" class="page-wrapper vhm-item active-home anim s01">
          <div class="container">
            <div class="tagline ac anim fadeInUp s01 delay-0-6s">
              <h1> EXILEDNONAME </h1>
              <p class="anim fadeInUp s01 delay-0-7s"> Our Website Is Coming Soon. We`ll be here soon with our new Imagination. </p>
            </div>

            <hr>

          <div class="copyrights ac anim fadeInUp s01 delay-15s">

          <br>
          @2025 - @php $title = DB::table('system_settings')->first(); @endphp
          {{ $title->application_name; }}
        </div>
        </div>
      </div>
    </div>

  </main>
</div>

<script src="{{ public_path() }}/assets/frontend/js/jquery-1.11.3.min.js"></script>
<script src="{{ public_path() }}/assets/frontend/js/plugins.js"></script>
<script src="{{ public_path() }}/assets/frontend/js/common.js"></script>

</body>
</html>
