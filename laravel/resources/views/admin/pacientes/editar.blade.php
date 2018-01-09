<!DOCTYPE html>
<html class="no-js css-menubar" lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Clínicas | Maximiza Odonto</title>

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
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/flag-icon-css/flag-icon.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/waves/waves.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/dropify/dropify.css') }}">


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
  <style type="text/css">
    .tag{
      font-size: 100%
    }
    .avatar{
      border:1px solid #CCC;
    }
    .dropify-wrapper{
      width: 200px;
      height: 200px;
      margin: auto
    }
    .text-center{
      text-align: center;
    }
  </style>
</head>
<body class="animsition site-menubar-hide">
  <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->

  @include('layout._includes.nav')

  @include('layout._includes.menu')

  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Editar Clínica - <b>{{ $registro->nome }}</b></h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../index.html">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{ route('admin.clinicas') }}">Clínicas</a>
        </li>
        <li class="breadcrumb-item active">Editar Clínica</li>
      </ol>
    </div>

    <div class="page-content">
      <div class="panel">
        <div class="panel-body container-fluid">
          <div class="example-wrap">
            <form name="editarClinica" autocomplete="off" enctype="multipart/form-data" action="{{ route('admin.clinicas.atualizar', $registro->id) }}" method="post">
              
              @include('admin.clinicas._form')

              {{ csrf_field() }}
              <input type="hidden" name="_method" value="put">


              <div class="form-group form-material text-center">
                <a style="margin-right:20px;" title="Cancelar" href="{{ route('admin.clinicas') }}" class="btn btn-default btn-inline btn-lg"><i class="fa fa-ban" aria-hidden="true"></i> Cancelar</a>
                <button type="submit" class="btn btn-success btn-inline btn-lg"><i class="fa fa-floppy-o" aria-hidden="true"></i> Atualizar</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
    
  </div>
  
    @include('layout._includes.footer')

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
  <script src="{{ URL::asset('global/vendor/switchery/switchery.min.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/intro-js/intro.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/screenfull/screenfull.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/slidepanel/jquery-slidePanel.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/tablesaw/tablesaw.jquery.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/slidepanel/jquery-slidePanel.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/bootbox/bootbox.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/formatter/jquery.formatter.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/dropify/dropify.js') }}"></script>

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
  <script src="{{ URL::asset('global/js/Plugin/sticky-header.js') }}"></script>


  <script src="{{ URL::asset('global/js/Plugin/animate-list.js') }}"></script>
  <script src="{{ URL::asset('global/js/Plugin/jquery-placeholder.js') }}"></script>
  <script src="{{ URL::asset('global/js/Plugin/material.js') }}"></script>
  <script src="{{ URL::asset('global/js/Plugin/bootbox.js') }}"></script>
  <script src="{{ URL::asset('assets/js/BaseApp.js') }}"></script>
  <script src="{{ URL::asset('global/js/Plugin/material.js') }}"></script>

  <script src="{{ URL::asset('assets/js/App/Contacts.js') }}"></script>
  <script src="{{ URL::asset('assets/examples/js/apps/contacts.js') }}"></script>
  <script src="{{ URL::asset('global/js/Plugin/dropify.js') }}"></script>

  <script type="text/javascript">
    jQuery(document).ready(function($) {

    //   $('#inputTelefone').formatter({
    //     'patterns': [
    //         {'^[0-9][0-9]9': '({{99}}){{99999}}-{{9999}}'},
    //         {'*': '({{99}}){{9999}}-{{9999}}'},
    //     ],
    //     'persistent': true
    // });
    });
  </script>
</body>
</html>