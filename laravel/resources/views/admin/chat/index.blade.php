<!DOCTYPE html>
<html class="no-js css-menubar" lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Chat | Maximiza Odonto</title>

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
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/tablesaw/tablesaw.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/examples/css/apps/contacts.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/examples/css/apps/message.css') }}">

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
    .page-content-table .table > tbody > tr > td {
      cursor: default;
  }
  </style>
</head>

<body class="animsition app-message page-aside-scroll page-aside-left ">
  <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->

  @include('layout._includes.nav')

  @include('layout._includes.menu')

  <div class="page">
    <!-- Message Sidebar -->
    <div class="page-aside">
      <div class="page-aside-switch">
        <i class="icon md-chevron-left" aria-hidden="true"></i>
        <i class="icon md-chevron-right" aria-hidden="true"></i>
      </div>
      <div class="page-aside-inner">
        <div class="input-search">
          <button class="input-search-btn" type="submit">
            <i class="icon md-search" aria-hidden="true"></i>
          </button>
          <form>
            <input class="form-control" type="text" placeholder="Buscar usuário" name="">
          </form>
        </div>
        <div class="app-message-list page-aside-scroll">
          <div data-role="container">
            <div data-role="content">
              <ul class="list-group">
                <li class="list-group-item">
                  <div class="media">
                    <div class="media-left">
                      <a class="avatar avatar-online" href="javascript:void(0)">
                        <img class="img-fluid" src="../../../../global/portraits/1.jpg" alt="..."><i></i></a>
                    </div>
                    <div class="media-body">
                      <h4 class="media-heading">Luciano Buselli </h4>
                      <span class="media-time">Há 5 minutos</span>
                    </div>
                    <div class="media-right">
                      <span class="tag tag-pill tag-danger">3</span>
                    </div>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="media">
                    <div class="media-left">
                      <a class="avatar avatar-online" href="javascript:void(0)">
                        <img class="img-fluid" src="../../../../global/portraits/2.jpg" alt="..."><i></i></a>
                    </div>
                    <div class="media-body">
                      <h4 class="media-heading">Rebeca Gomes</h4>
                      <span class="media-time">Há 15 minutos</span>
                    </div>
                    <div class="media-right">
                      <span class="tag tag-pill tag-danger"></span>
                    </div>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="media">
                    <div class="media-left">
                      <a class="avatar avatar-online" href="javascript:void(0)">
                        <img class="img-fluid" src="../../../../global/portraits/3.jpg" alt="..."><i></i></a>
                    </div>
                    <div class="media-body">
                      <h4 class="media-heading">David Rodrigues</h4>
                      <span class="media-time">Há 16 minutos</span>
                    </div>
                    <div class="media-right">
                      <span class="tag tag-pill tag-danger"></span>
                    </div>
                  </div>
                </li>
                <li class="list-group-item active">
                  <div class="media">
                    <div class="media-left">
                      <a class="avatar avatar-online" href="javascript:void(0)">
                        <img class="img-fluid" src="../../../../global/portraits/4.jpg" alt="..."><i></i></a>
                    </div>
                    <div class="media-body">
                      <h4 class="media-heading">Sabrina Morais</h4>
                      <span class="media-time">Há 2 horas</span>
                    </div>
                    <div class="media-right">
                      <span class="tag tag-pill tag-danger">5</span>
                    </div>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="media">
                    <div class="media-left">
                      <a class="avatar avatar-away" href="javascript:void(0)">
                        <img class="img-fluid" src="../../../../global/portraits/10.jpg" alt="..."><i></i></a>
                    </div>
                    <div class="media-body">
                      <h4 class="media-heading">Tiago Rodrigues</h4>
                      <span class="media-time">Há 3 horas</span>
                    </div>
                    <div class="media-right">
                      <span class="tag tag-pill tag-danger"></span>
                    </div>
                  </div>
                </li>              
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Message Sidebar -->
    <div class="page-main">
      <!-- Chat Box -->
      <div class="app-message-chats">
        <button type="button" id="historyBtn" class="btn btn-round btn-default">Mensagens Anteriores</button>
        <div class="chats">
          <div class="chat">
            <div class="chat-avatar">
              <a class="avatar" data-toggle="tooltip" href="#" data-placement="right" title="">
                <img src="../../../../global/portraits/4.jpg" alt="June Lane">
              </a>
            </div>
            <div class="chat-body">
              <div class="chat-content">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit?
                </p>
              </div>
            </div>
          </div>
          <div class="chat chat-left">
            <div class="chat-avatar">
              <a class="avatar" data-toggle="tooltip" href="#" data-placement="left" title="">
                <img src="../../../../global/portraits/4.jpg" alt="Edward Fletcher">
              </a>
            </div>
            <div class="chat-body">
              <div class="chat-content">
                <p>
                  Donec maximus quam quis est eleifend
                </p>
              </div>
              <div class="chat-content">
                <p>
                  Nulla facilisi. Etiam feugiat et magna in mollis
                </p>
              </div>
            </div>
          </div>
          <div class="chat">
            <div class="chat-avatar">
              <a class="avatar" data-toggle="tooltip" href="#" data-placement="right" title="">
                <img src="../../../../global/portraits/21.jpg" alt="June Lane">
              </a>
            </div>
            <div class="chat-body">
              <div class="chat-content">
                <p>
                  Vestibulum?
                </p>
              </div>
              <div class="chat-content">
                <p>
                  Cras nisi ligula, tempus finibus turpis eu, consequat interdum tortor.
                </p>
              </div>
            </div>
          </div>
          <div class="chat chat-left">
            <div class="chat-avatar">
              <a class="avatar" data-toggle="tooltip" href="#" data-placement="left" title="">
                <img src="../../../../global/portraits/4.jpg" alt="Edward Fletcher">
              </a>
            </div>
            <div class="chat-body">
              <div class="chat-content">
                <p>Pellentesque viverra dolor id dui accumsan.</p>
              </div>
              <div class="chat-content">
                <p>Consectetuorem ipsum dolor sit?</p>
              </div>
              <div class="chat-content">
                <p>OK?</p>
              </div>
            </div>
          </div>
          <p class="time btn btn-default">1 mensagem não lida</p>
          <div class="chat">
            <div class="chat-avatar">
              <a class="avatar" data-toggle="tooltip" href="#" data-placement="right" title="">
                <img src="../../../../global/portraits/21.jpg" alt="June Lane">
              </a>
            </div>
            <div class="chat-body">
              <div class="chat-content">
                <p>OK!</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Chat Box -->
      <!-- Message Input-->
      <form class="app-message-input">
        <div class="input-group form-material">
          <span class="input-group-btn">
            <a href="javascript: void(0)" class="btn btn-pure btn-default icon md-camera"></a>
          </span>
          <input class="form-control" type="text" placeholder="Digite uma Mensagem">
          <span class="input-group-btn">
            <button type="button" class="btn btn-pure btn-default icon md-mail-send"></button>
          </span>
        </div>
      </form>
      <!-- End Message Input-->
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
  <script src="{{ URL::asset('global/vendor/aspaginator/jquery.asPaginator.min.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/bootbox/bootbox.js') }}"></script>

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
  <script src="{{ URL::asset('global/js/Plugin/tablesaw.js') }}"></script>
  <script src="{{ URL::asset('global/js/Plugin/sticky-header.js') }}"></script>
  <script src="{{ URL::asset('global/js/Plugin/action-btn.js') }}"></script>
  <script src="{{ URL::asset('global/js/Plugin/asselectable.js') }}"></script>


  <script src="{{ URL::asset('global/js/Plugin/editlist.js') }}"></script>
  <script src="{{ URL::asset('global/js/Plugin/aspaginator.js') }}"></script>
  <script src="{{ URL::asset('global/js/Plugin/animate-list.js') }}"></script>
  <script src="{{ URL::asset('global/js/Plugin/jquery-placeholder.js') }}"></script>
  <script src="{{ URL::asset('global/js/Plugin/material.js') }}"></script>
  <script src="{{ URL::asset('global/js/Plugin/selectable.js') }}"></script>
  <script src="{{ URL::asset('global/js/Plugin/bootbox.js') }}"></script>
  <script src="{{ URL::asset('assets/js/BaseApp.js') }}"></script>
  <script src="{{ URL::asset('assets/js/App/Contacts.js') }}"></script>
  <script src="{{ URL::asset('assets/examples/js/apps/contacts.js') }}"></script>
</body>
</html>