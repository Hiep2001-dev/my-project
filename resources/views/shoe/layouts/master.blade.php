<!DOCTYPE html>
<html lang="en">
  <link rel="icon" type="image/png" href="{{ asset('assets/images/logo/logo.png') }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/animate/animate.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome/all.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/webfonts/font.css') }}">
  <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}" type="text/css">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

  <!-- UIkit CSS -->
  <link rel="stylesheet" href="{{ asset('plugins/uikit/uikit.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/sign.css') }}">

  <title>Runner</title>
</head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<body>
  @yield('content')

   <script async defer crossorigin="anonymous" src="{{ asset('plugins/sdk.js') }}"></script>
  <script src="{{ asset('plugins/jquery-3.4.1/jquery-3.4.1.min.js') }}"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
  <script src="{{ asset('plugins/bootstrap/popper.min.js') }}"></script>
  <script src="{{ asset('plugins/bootstrap/bootstrap.min.js') }}"></script>
  <script src="{{ asset('plugins/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('js/home.js') }}"></script>
  <script src="{{ asset('js/script.js') }}"></script>
  <script src="{{ asset('plugins/uikit/uikit.min.js') }}"></script>
  <script src="{{ asset('plugins/uikit/uikit-icons.min.js') }}"></script>
</body>
</html>