<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title') | Maximiza Odonto</title>

  <link rel="apple-touch-icon" href="{{ URL::asset('assets/images/apple-touch-icon.png') }}">
  <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}">
  
  <!-- Stylesheets -->
  <link rel="stylesheet" href="{{ URL::asset('global/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/css/bootstrap-extend.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/css/site.min.css') }}">

  <!-- Plugins -->
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/animsition/animsition.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/asscrollable/asScrollable.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/switchery/switchery.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/intro-js/introjs.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/slidepanel/slidePanel.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/waves/waves.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/toastr/toastr.css') }}">
  

  @yield('css')

  <!-- Fonts -->
  <link rel="stylesheet" href="{{ URL::asset('global/fonts/font-awesome/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/fonts/material-design/material-design.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/fonts/brand-icons/brand-icons.min.css') }}">
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

  <!--[if lt IE 9]>
    <script src="{{ URL::asset('global/vendor/html5shiv/html5shiv.min.js') }}"></script>
    <![endif]-->
  <!--[if lt IE 10]>
    <script src="{{ URL::asset('global/vendor/media-match/media.match.min.js') }}"></script>
    <script src="{{ URL::asset('global/vendor/respond/respond.min.js') }}"></script>
  <![endif]-->

  <!-- Scripts -->
  <script src="{{ URL::asset('global/vendor/breakpoints/breakpoints.js') }}"></script>
  <script>
    Breakpoints();
  </script>
</head>