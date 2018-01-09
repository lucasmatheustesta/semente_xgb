<!DOCTYPE html>
<html class="no-js css-menubar" lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title') | @if(isset(Auth::user()->name)){{ Auth::user()->name }}@else Programa Semente @endif</title>

  <!-- Favicons  -->
  <link rel="icon" type="image/png" sizes="192x192"  href="{{ URL::asset('assets/images/favicons/android-icon-192x192.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('assets/images/favicons/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{ URL::asset('assets/images/favicons/favicon-96x96.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('assets/images/favicons/favicon-16x16.png') }}">

  <link rel="apple-touch-icon" sizes="152x152" href="{{ URL::asset('assets/images/favicons/touch-icon-ipad.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('assets/images/favicons/touch-icon-iphone-retina.png') }}">
  <link rel="apple-touch-icon" sizes="167x167" href="{{ URL::asset('assets/images/favicons/touch-icon-ipad-retina.png') }}">

  <link rel="manifest" href="{{ URL::asset('assets/images/favicons/manifest.json') }}">
  <meta name="msapplication-TileColor" content="#545454">
  <meta name="msapplication-TileImage" content="{{ URL::asset('assets/images/favicons/touch-icon-ipad.png') }}">
  <meta name="theme-color" content="#545454">
  
  <!-- Stylesheets -->
  <link rel="stylesheet" href="{{ URL::asset('global/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/css/bootstrap-extend.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/site.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/semente.css') }}">

  <!-- Plugins -->
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/animsition/animsition.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/asscrollable/asScrollable.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/switchery/switchery.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/slidepanel/slidePanel.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/waves/waves.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/jquery-mmenu/jquery-mmenu.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/toastr/toastr.css') }}">

  @yield('css')

  <!-- Fonts -->
  <link rel="stylesheet" href="{{ URL::asset('global/fonts/font-awesome/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/fonts/material-design/material-design.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/fonts/brand-icons/brand-icons.min.css') }}">


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

  @yield('content')
  
  @if(isset(Auth::user()->name))
    <footer class="site-footer">
      <div class="site-footer-legal">©{{ date('Y') }} Todos os Direitos Reservados |  <a title="Dashboard" href="{{ route('dashboard') }}">Programa Semente</a></div>
    </footer>
  @endif

  <!-- Core  -->
  <script src="{{ URL::asset('global/vendor/babel-external-helpers/babel-external-helpers.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/jquery/jquery.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/tether/tether.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/bootstrap/bootstrap.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/animsition/animsition.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/mousewheel/jquery.mousewheel.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/asscrollbar/jquery-asScrollbar.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/asscrollable/jquery-asScrollable.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/waves/waves.js') }}"></script>
  
  <!-- Plugins -->
  <script src="{{ URL::asset('global/vendor/jquery-mmenu/jquery.mmenu.min.all.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/switchery/switchery.min.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/screenfull/screenfull.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/slidepanel/jquery-slidePanel.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/tablesaw/tablesaw.jquery.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/slidepanel/jquery-slidePanel.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/bootbox/bootbox.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/toastr/toastr.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/jquery-mmenu/jquery.mmenu.min.all.js') }}"></script>
  
  @yield('plugins')

  <!-- Scripts -->
  <script src="{{ URL::asset('global/js/State.js') }}"></script>
  <script src="{{ URL::asset('global/js/Component.js') }}"></script>
  <script src="{{ URL::asset('global/js/Plugin.js') }}"></script>
  <script src="{{ URL::asset('global/js/Base.js') }}"></script>
  <script src="{{ URL::asset('global/js/Config.js') }}"></script>
  <script src="{{ URL::asset('assets/js/Section/Menubar.js') }}"></script>
  <script src="{{ URL::asset('assets/js/Section/Sidebar.js') }}"></script>
  <script src="{{ URL::asset('assets/js/Section/PageAside.js') }}"></script>
  <script src="{{ URL::asset('assets/js/Plugin/menu.js') }}"></script>
 
  @yield('scripts')

  <!-- Config -->
  <script src="{{ URL::asset('global/js/config/colors.js') }}"></script>
  <script src="{{ URL::asset('assets/js/config/tour.js') }}"></script>
  
  <script>
    Config.set('assets', "{{ URL::asset('assets') }}");
  </script>

  <!-- Page -->
  <script src="{{ URL::asset('assets/js/Site.js') }}"></script>
  <script src="{{ URL::asset('global/js/Plugin/asscrollable.js') }}"></script>
  <script src="{{ URL::asset('global/js/Plugin/slidepanel.js') }}"></script>
  <script src="{{ URL::asset('global/js/Plugin/switchery.js') }}"></script>
  <script src="{{ URL::asset('global/js/Plugin/tablesaw.js') }}"></script>
  <script src="{{ URL::asset('global/js/Plugin/sticky-header.js') }}"></script>
  <script src="{{ URL::asset('global/js/Plugin/action-btn.js') }}"></script>
  <script src="{{ URL::asset('global/js/Plugin/asselectable.js') }}"></script>
  <script src="{{ URL::asset('global/js/Plugin/editlist.js') }}"></script>
  <script src="{{ URL::asset('global/js/Plugin/aspaginator.js') }}"></script>
  <script src="{{ URL::asset('global/js/Plugin/animate-list.js') }}"></script>
  <script src="{{ URL::asset('global/js/Plugin/jquery-placeholder.js') }}"></script>
  <script src="{{ URL::asset('global/js/Plugin/material.js') }}"></script>
  
  @yield('page')

  <script type="text/javascript">
    jQuery(document).ready(function () {
      Site.run();
      @foreach (['danger', 'warning', 'success', 'info'] as $msg)
          @if(Session::has($msg))
              toastr.{{ $msg }}('{{ Session::get($msg) }}');
          @endif
      @endforeach
    });
  </script>
  
  @yield('scriptpersonalizado')
    
  </body>
</html>