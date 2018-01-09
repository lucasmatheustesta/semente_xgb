<!DOCTYPE html>
<html class="no-js css-menubar" lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Consultores | Maximiza Odonto</title>

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

<body class="animsition app-contacts page-aside-left">
  <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->

  @include('layout._includes.nav')

  @include('layout._includes.menu')

 <div class="page bg-white" style="max-width: 100%; margin-top:0;margin-bottom:0">
    <div class="page-aside">
      <!-- Contacts Sidebar -->
      <div class="page-aside-switch">
        <i class="icon md-chevron-left" aria-hidden="true"></i>
        <i class="icon md-chevron-right" aria-hidden="true"></i>
      </div>
      <div class="page-aside-inner page-aside-scroll">
        <div data-role="container">
          <div data-role="content">
            <div class="page-aside-section">
              <div class="list-group">
                <a class="list-group-item" href="javascript:void(0)">
                  <span class="item-right">61</span><i class="icon fa fa-user-md" aria-hidden="true"></i>Todos os Consultores
                </a>
              </div>
            </div>
            <div class="page-aside-section">
              <h5 class="page-aside-title">Filtrar por Clínicas</h5>
              <div class="list-group has-actions">
                <div class="list-group-item" data-plugin="editlist">
                  <div class="list-content">
                    <span class="item-right">10</span>
                    <span class="list-text">Viva Mais</span>
                  </div>
                </div>
                <div class="list-group-item" data-plugin="editlist">
                  <div class="list-content">
                    <span class="item-right">5</span>
                    <span class="list-text">Status Odontologia</span>
                  </div>
                </div>
                <div class="list-group-item" data-plugin="editlist">
                  <div class="list-content">
                    <span class="item-right">16</span>
                    <span class="list-text">Saúde Agora</span>
                  </div>
                </div>
                <div class="list-group-item" data-plugin="editlist">
                  <div class="list-content">
                    <span class="item-right">30</span>
                    <span class="list-text">Sempre Bela</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Contacts Content -->
    <div class="page-main">
      <!-- Contacts Content Header -->
      <div class="page-header">
        <h1 class="page-title">Lista de Consultores</h1>
        <div class="page-header-actions">
          <form>
            <div class="input-search input-search-dark">
              <i class="input-search-icon md-search" aria-hidden="true"></i>
              <input type="text" class="form-control" name="" placeholder="Buscar Consultor">
            </div>
          </form>
        </div>
      </div>
      <!-- Contacts Content -->
      <div id="contactsContent" class="page-content page-content-table" data-plugin="asSelectable">
        <!-- Actions -->
        <div class="page-content-actions">
          <div class="btn-group btn-group-flat">
            <div class="dropdown">
              <button class="btn btn-icon btn-pure btn-default" data-toggle="dropdown" aria-expanded="false"
              type="button"><i class="icon fa-map-marker" aria-hidden="true"></i> Estado <i class="fa fa-angle-down" aria-hidden="true"></i></button>
              <!-- <div class="dropdown-menu" role="menu">
                <a class="dropdown-item" href="javascript:void(0)">work</a>
                <a class="dropdown-item" href="javascript:void(0)">Family</a>
                <a class="dropdown-item" href="javascript:void(0)">Private</a>
                <a class="dropdown-item" href="javascript:void(0)">Friends</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0)">Trash</a>
                <a class="dropdown-item" href="javascript:void(0)">Spam</a>
              </div> -->
            </div>
            <div class="dropdown">
              <button class="btn btn-icon btn-pure btn-default" data-toggle="dropdown" aria-expanded="false"
              type="button"><i class="icon fa-map-marker" aria-hidden="true"></i> Cidade  <i class="fa fa-angle-down" aria-hidden="true"></i></button>
              <!-- <div class="dropdown-menu" role="menu">
                <a class="dropdown-item" href="javascript:void(0)">work</a>
                <a class="dropdown-item" href="javascript:void(0)">Family</a>
                <a class="dropdown-item" href="javascript:void(0)">Private</a>
                <a class="dropdown-item" href="javascript:void(0)">Friends</a>
              </div> -->
            </div>
          </div>
        </div>
        <!-- Contacts -->
        <table class="table is-indent tablesaw" data-tablesaw-mode="swipe" data-plugin="animateList"
        data-animate="fade" data-child="tr" data-selectable="selectable">
          <thead>
            <tr>
              <th class="pre-cell"></th>
              <th class="cell-30" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">
                <span class="checkbox-custom checkbox-primary checkbox-lg contacts-select-all">
                  <input type="checkbox" class="contacts-checkbox selectable-all" id="select_all"
                  />
                  <label for="select_all"></label>
                </span>
              </th>
              <th class="cell-300" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">Consultor</th>
              <th class="cell-300" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">Telefone</th>
              <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">Clínica(s)</th>
              <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">Comissão</th>
              <th class="suf-cell"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="pre-cell"></td>
              <td class="cell-30">
                <span class="checkbox-custom checkbox-primary checkbox-lg">
                  <input type="checkbox" class="contacts-checkbox selectable-item" id="contacts_1"
                  />
                  <label for="contacts_1"></label>
                </span>
              </td>
              <td class="cell-300">
                <a class="avatar" href="javascript:void(0)">
                  <img class="img-fluid" src="../../../../global/portraits/1.jpg" alt="...">
                </a>
                Tiago Rodrigues
              </td>
              <td class="cell-300">(19) 3485-8025</td>
              <td><a href="">Viva Mais</a>, <a href="">Status Odontologia</a></td>
              <td>R$ 1.250,00</td>
              <td class="suf-cell"></td>
            </tr>
            <tr>
              <td class="pre-cell"></td>
              <td class="cell-30">
                <span class="checkbox-custom checkbox-primary checkbox-lg">
                  <input type="checkbox" class="contacts-checkbox selectable-item" id="contacts_2"
                  />
                  <label for="contacts_2"></label>
                </span>
              </td>
              <td class="cell-300">
                <a class="avatar" href="javascript:void(0)">
                  <img class="img-fluid" src="../../../../global/portraits/2.jpg" alt="...">
                </a>
                Maria Murback
              </td>
              <td class="cell-300">(19) 3871-7963</td>
              <td><a href="">Viva Mais</a></td>
              <td>R$ 1.820,00</td>
              <td class="suf-cell"></td>
            </tr>
            <tr>
              <td class="pre-cell"></td>
              <td class="cell-30">
                <span class="checkbox-custom checkbox-primary checkbox-lg">
                  <input type="checkbox" class="contacts-checkbox selectable-item" id="contacts_3"
                  />
                  <label for="contacts_3"></label>
                </span>
              </td>
              <td class="cell-300">
                <a class="avatar" href="javascript:void(0)">
                  <img class="img-fluid" src="../../../../global/portraits/3.jpg" alt="...">
                </a>
                Marcio Arruda
              </td>
              <td class="cell-300">(19) 3596-7678</td>
              <td><a href="">Status Odontologia</a></td>
              <td>R$ 850,00</td>
              <td class="suf-cell"></td>
            </tr>
            <tr>
              <td class="pre-cell"></td>
              <td class="cell-30">
                <span class="checkbox-custom checkbox-primary checkbox-lg">
                  <input type="checkbox" class="contacts-checkbox selectable-item" id="contacts_4"
                  />
                  <label for="contacts_4"></label>
                </span>
              </td>
              <td class="cell-300">
                <a class="avatar" href="javascript:void(0)">
                  <img class="img-fluid" src="../../../../global/portraits/4.jpg" alt="...">
                </a>
                Julia Marques
              </td>
              <td class="cell-300">(19) 3485-8025</td>
              <td><a href="">Viva Mais</a>, <a href="">Status Odontologia</a></td>
              <td>R$ 1.250,00</td>
              <td class="suf-cell"></td>
            </tr>
            <tr>
              <td class="pre-cell"></td>
              <td class="cell-30">
                <span class="checkbox-custom checkbox-primary checkbox-lg">
                  <input type="checkbox" class="contacts-checkbox selectable-item" id="contacts_5"
                  />
                  <label for="contacts_5"></label>
                </span>
              </td>
              <td class="cell-300">
                <a class="avatar" href="javascript:void(0)">
                  <img class="img-fluid" src="../../../../global/portraits/5.jpg" alt="...">
                </a>
                José Bonfati
              </td>
              <td class="cell-300">(19) 4551-96856</td>
              <td><a href="">Saúde Agora</a>, <a href="">Sempre Bela</a></td>
              <td>R$ 2.250,00</td>
              <td class="suf-cell"></td>
            </tr>
            <tr>
              <td class="pre-cell"></td>
              <td class="cell-30">
                <span class="checkbox-custom checkbox-primary checkbox-lg">
                  <input type="checkbox" class="contacts-checkbox selectable-item" id="contacts_6"
                  />
                  <label for="contacts_6"></label>
                </span>
              </td>
              <td class="cell-300">
                <a class="avatar" href="javascript:void(0)">
                  <img class="img-fluid" src="../../../../global/portraits/6.jpg" alt="...">
                </a>
                Rebeca Gomes
              </td>
              <td class="cell-300">(19) 3698-8965</td>
              <td><a href="">Viva Mais</a></td>
              <td>R$ 1.050,00</td>
              <td class="suf-cell"></td>
            </tr>
            <tr>
              <td class="pre-cell"></td>
              <td class="cell-30">
                <span class="checkbox-custom checkbox-primary checkbox-lg">
                  <input type="checkbox" class="contacts-checkbox selectable-item" id="contacts_7"
                  />
                  <label for="contacts_7"></label>
                </span>
              </td>
              <td class="cell-300">
                <a class="avatar" href="javascript:void(0)">
                  <img class="img-fluid" src="../../../../global/portraits/7.jpg" alt="...">
                </a>
                Luciano Buselli
              </td>
              <td class="cell-300">(19) 9856-8563</td>
              <td><a href="">Sempre Bela</a></td>
              <td>R$ 1.550,00</td>
              <td class="suf-cell"></td>
            </tr>
            <tr>
              <td class="pre-cell"></td>
              <td class="cell-30">
                <span class="checkbox-custom checkbox-primary checkbox-lg">
                  <input type="checkbox" class="contacts-checkbox selectable-item" id="contacts_8"
                  />
                  <label for="contacts_8"></label>
                </span>
              </td>
              <td class="cell-300">
                <a class="avatar" href="javascript:void(0)">
                  <img class="img-fluid" src="../../../../global/portraits/8.jpg" alt="...">
                </a>
                Sabrina Morais
              </td>
              <td class="cell-300">(19) 9685-7858</td>
              <td><a href="">Sempre Bela</a>, <a href=""> Status Odontologia</a></td>
              <td>R$ 550,00</td>
              <td class="suf-cell"></td>
            </tr>
            <tr>
              <td class="pre-cell"></td>
              <td class="cell-30">
                <span class="checkbox-custom checkbox-primary checkbox-lg">
                  <input type="checkbox" class="contacts-checkbox selectable-item" id="contacts_9"
                  />
                  <label for="contacts_9"></label>
                </span>
              </td>
              <td class="cell-300">
                <a class="avatar" href="javascript:void(0)">
                  <img class="img-fluid" src="../../../../global/portraits/9.jpg" alt="...">
                </a>
                Rodrigo Oliveira
              </td>
              <td class="cell-300">(19) 4524-6363</td>
              <td><a href="">Sempre Bela</a></td>
              <td>R$ 2.250,00</td>
              <td class="suf-cell"></td>
            </tr>
            <tr>
              <td class="pre-cell"></td>
              <td class="cell-30">
                <span class="checkbox-custom checkbox-primary checkbox-lg">
                  <input type="checkbox" class="contacts-checkbox selectable-item" id="contacts_10"
                  />
                  <label for="contacts_10"></label>
                </span>
              </td>
              <td class="cell-300">
                <a class="avatar" href="javascript:void(0)">
                  <img class="img-fluid" src="../../../../global/portraits/10.jpg" alt="...">
                </a>
                Cristiano Basso
              </td>
              <td class="cell-300">(19) 75875-7856</td>
              <td><a href=""> <a href=""> Status Odontologia</a></td>
              <td>R$ 1.580,00</td>
              <td class="suf-cell"></td>
            </tr>
          </tbody>
        </table>
        <ul data-plugin="paginator" data-total="10" data-skin="pagination-gap"></ul>
      </div>
    </div>
  </div>

  <!-- Site Action -->
  <div class="site-action" data-plugin="actionBtn">
    <a href="{{ route('admin.consultores.adicionar') }}" class="site-action-toggle btn-raised btn btn-success btn-floating">
      <i class="front-icon md-plus animation-scale-up" aria-hidden="true"></i>
    </a>
  </div>
  <!-- End Site Action -->

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