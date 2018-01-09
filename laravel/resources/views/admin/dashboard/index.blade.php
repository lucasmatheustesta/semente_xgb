<!DOCTYPE html>
<html class="no-js css-menubar" lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Dashboard | Maximiza Odonto</title>

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
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/chartist/chartist.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/jvectormap/jquery-jvectormap.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/examples/css/dashboard/v1.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/examples/css/charts/flot.css') }}">
  
  <!-- Fonts -->
  <link rel="stylesheet" href="{{ URL::asset('global/fonts/material-design/material-design.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/fonts/font-awesome/font-awesome.min.css') }}">
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

<body class="animsition dashboard">
  <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->

  @include('layout._includes.nav')
    
  @include('layout._includes.menu')


  <!-- Page -->
  <div class="page">
    <div class="page-content container-fluid">
      <div class="row" data-plugin="matchHeight" data-by-row="true">
<div class="col-md-3 col-xs-12 p-b-30">
          <!-- Card -->
          <div class="card card-block p-30 bg-red-700">
            <div class="card-watermark darker font-size-60 m-15"><i class="icon fa-money" aria-hidden="true"></i></div>
            <div class="counter counter-md counter-inverse text-xs-left">
              <div class="counter-number-group">
                <span class="counter-number">20</span>
                <span class="counter-number-related text-capitalize">Clínicas</span>
              </div>
              <div class="counter-label text-capitalize">Cadastrados no Sistema</div>
            </div>
          </div>
          <!-- End Card -->
        </div>

        <div class="col-md-3 col-xs-12 p-b-30">
          <!-- Card -->
          <div class="card card-block p-30 bg-orange-600">
            <div class="card-watermark darker font-size-60 m-15"><i class="icon fa-user-md" aria-hidden="true"></i></div>
            <div class="counter counter-md counter-inverse text-xs-left">
              <div class="counter-number-group">
                <span class="counter-number">15</span>
                <span class="counter-number-related text-capitalize">Consultores</span>
              </div>
              <div class="counter-label text-capitalize">Cadastrados no Sistema</div>
            </div>
          </div>
          <!-- End Card -->
        </div>

        <div class="col-md-3 col-xs-12 p-b-30">
          <!-- Card -->
          <div class="card card-block p-30 bg-blue-600">
            <div class="card-watermark darker font-size-60 m-15"><i class="icon fa-user" aria-hidden="true"></i></div>
            <div class="counter counter-md counter-inverse text-xs-left">
              <div class="counter-number-group">
                <span class="counter-number">520</span>
                <span class="counter-number-related text-capitalize">Pacientes</span>
              </div>
              <div class="counter-label text-capitalize">Cadastrados no sistema</div>
            </div>
          </div>
          <!-- End Card -->
        </div>

        <div class="col-md-3 col-xs-12 p-b-30">
          <!-- Card -->
          <div class="card card-block p-30 bg-green-600">
            <div class="card-watermark darker font-size-60 m-15"><i class="icon fa-money" aria-hidden="true"></i></div>
            <div class="counter counter-md counter-inverse text-xs-left">
              <div class="counter-number-group">
                <span class="counter-number">R$</span>
                <span class="counter-number-related text-capitalize">56.755,88</span>
              </div>
              <div class="counter-label text-capitalize">No Mês de Novembro</div>
            </div>
          </div>
          <!-- End Card -->
        </div>

        <div class="clearfix"></div>
        <div class="col-xs-12 col-lg-7">
            <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">Gráfico Anual de Faturamento
                <span class="tag tag-primary">2016</span>
              </h3>
            </div>
            <div class="panel-body">
              <div class="example-wrap">
                <div class="example example-responsive">
                  <div class="w-sm-400" id="exampleFlotFullBg"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xxl-5 col-lg-5">
          <!-- Widget Current Chart -->
          <div class="card card-shadow" id="widgetCurrentChart">
            <div class="p-30 white bg-green-500">
              <div class="font-size-20 m-b-20">Gráfico Semanal de Faturamento</div>
              <div class="ct-chart h-200">
              </div>
            </div>
            <div class="bg-white p-30 font-size-14">
              <div class="counter counter-lg text-xs-left">
                <div class="counter-label m-b-5">Faturamento Total de:</div>
                <div class="counter-number-group">
                  <span class="counter-number">R$ 15.785,50</span>
                  <span class="counter-number-related text-uppercase font-size-14">Nesta Semana</span>
                </div>
              </div>
            <!--   <button type="button" class="btn-raised btn btn-info btn-floating">
                <i class="icon md-plus" aria-hidden="true"></i>
              </button> -->
            </div>
          </div>
          <!-- End Widget Current Chart -->
        </div>
        <style type="text/css">
          #projects .media-body{
            vertical-align: middle;
          }
          #projects .media-body h5{
            margin-bottom:0;
          }
          #projects .tag{
            font-size: 100%;
          }
          .avatar{
            border:1px solid #CCC;
          }
        </style>
        <div class="col-xxl-5 col-lg-12">
          <!-- Panel Projects -->
          <div class="panel" id="projects">
            <div class="panel-heading">
              <h3 class="panel-title">Últimas Clínicas Cadastrados</h3>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th width="35%">Clínica</th>
                    <th>Telefone</th>
                    <th>Data</th>
                    <th>Lucro</th>
                    <th>Comisão</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <div class="media">
                        <div class="media-left">
                          <span class="avatar">
                            <img src="../../global/portraits/21.jpg" alt="">
                          </span>
                        </div>
                        <div class="media-body">
                          <h5 class="list-group-item-heading">
                           Status Odontologia
                          </h5>
                        </div>
                      </div>
                    </td>
                    <td class="text-center">
                      (19) 5236-8585
                    </td>
                    <td>
                        09/10/2016
                    </td>
                    <td>
                      R$ 4.250,00
                    </td>
                    <td class="text-success">
                        R$ 2.110,00
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="media">
                        <div class="media-left">
                          <span class="avatar">
                            <img src="../../global/portraits/22.png" alt="">
                          </span>
                        </div>
                        <div class="media-body">
                          <h5 class="list-group-item-heading">
                             Sorridente
                          </h5>
                        </div>
                      </div>
                    </td>
                    <td class="text-center">
                        (19) 4562-4254
                    </td>
                    <td>
                        15/10/2016
                    </td>
                    <td>
                      R$ 3.180,20
                    </td>
                    <td class="text-success">
                          R$ 1.200,00
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="media">
                        <div class="media-left">
                          <span class="avatar">
                            <img src="../../global/portraits/23.png" alt="">
                          </span>
                        </div>
                        <div class="media-body">
                          <h5 class="list-group-item-heading">
                            Oral Forma
                          </h5>
                        </div>
                      </div>
                    </td>
                    <td class="text-center">
                      (19) 8567-7588
                    </td>
                    <td>
                        14/10/2016
                    </td>
                    <td>
                      R$ 2.520,00
                    </td>
                    <td class="text-success">
                          R$ 1.010,00
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="media">
                        <div class="media-left">
                          <span class="avatar">
                            <img src="../../global/portraits/24.png" alt="">
                          </span>
                        </div>
                        <div class="media-body">
                          <h5 class="list-group-item-heading">
                             DentalUp
                          </h5>
                        </div>
                      </div>
                    </td>
                    <td class="text-center">
                     (19) 5245-4524
                    </td>
                    <td>
                        25/10/2016
                    </td>
                    <td>
                      R$ 5.570,80
                    </td>
                    <td class="text-success">
                        R$ 3.200,20
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="media">
                        <div class="media-left">
                          <span class="avatar">
                            <img src="../../global/portraits/25.png" alt="">
                          </span>
                        </div>
                        <div class="media-body">
                          <h5 class="list-group-item-heading">
                            OdontoFácil
                          </h5>
                        </div>
                      </div>
                    </td>
                    <td class="text-center">
                      (19) 5463-4524
                    </td>
                    <td>
                        31/10/2016
                    </td>
                    <td>
                      R$ 6.150,00
                    </td>
                    <td class="text-success">
                          R$ 1.110,00
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            </div>
          </div>
          <!-- End Panel Projects -->
        </div>

        <div class="col-xxl-5 col-lg-6">
          <div class="panel" id="followers">
            <div class="panel-heading">
              <h3 class="panel-title">
               Últimos Consultores Cadastrados
              </h3>
            </div>
            <div class="panel-body">
              <ul class="list-group list-group-dividered list-group-full">
                <li class="list-group-item">
                  <div class="media">
                    <div class="media-left">
                      <a class="avatar" href="javascript:void(0)">
                        <img src="../../global/portraits/9.jpg" alt="">
                      </a>
                    </div>
                    <div class="media-body">
                      <div class="pull-xs-right">
                        <button type="button" class="btn btn-info btn-sm waves-effect">97 Pacientes</button>
                      </div>
                      <div><a class="name" href="javascript:void(0)">Tiago Rodrigues</a></div>
                      <small>tiagoadriano.rodrigues@gmail.com</small>
                    </div>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="media">
                    <div class="media-left">
                      <a class="avatar" href="javascript:void(0)">
                        <img src="../../global/portraits/11.jpg" alt="">
                      </a>
                    </div>
                    <div class="media-body">
                      <div class="pull-xs-right">
                        <button type="button" class="btn btn-info btn-sm waves-effect">85 Pacientes</button>
                      </div>
                      <div><a class="name" href="javascript:void(0)">Rebeca Gomes</a></div>
                      <small>rebeca_gomes@hotmail.com</small>
                    </div>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="media">
                    <div class="media-left">
                      <a class="avatar" href="javascript:void(0)">
                        <img src="../../global/portraits/10.jpg" alt="">
                      </a>
                    </div>
                    <div class="media-body">
                      <div class="pull-xs-right">
                        <button type="button" class="btn btn-info btn-sm waves-effect">105 Pacientes</button>
                      </div>
                      <div><a class="name" href="javascript:void(0)">José Bonfati</a></div>
                      <small>jose_bonfati@gmail.com</small>
                    </div>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="media">
                    <div class="media-left">
                      <a class="avatar" href="javascript:void(0)">
                        <img src="../../global/portraits/13.jpg" alt="">
                      </a>
                    </div>
                    <div class="media-body">
                      <div class="pull-xs-right">
                        <button type="button" class="btn btn-info btn-sm waves-effect">252 Pacientes</button>
                      </div>
                      <div><a class="name" href="javascript:void(0)">Sabrina Morais</a></div>
                      <small>sah_morais@gmail.com</small>
                    </div>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="media">
                    <div class="media-left">
                      <a class="avatar" href="javascript:void(0)">
                        <img src="../../global/portraits/12.jpg" alt="">
                      </a>
                    </div>
                    <div class="media-body">
                      <div class="pull-xs-right">
                        <button type="button" class="btn btn-info btn-sm waves-effect">187 Pacientes</button>
                      </div>
                      <div><a class="name" href="javascript:void(0)">Luciano Busselli</a></div>
                      <small>lusselli.luciano@gmail.com</small>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-xxl-5 col-lg-6">
          <!-- Panel Projects -->
          <div class="panel" id="projects">
            <div class="panel-heading">
              <h3 class="panel-title">Últimos Pacientes Cadastrados</h3>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th width="35%">Paciente</th>
                    <th class="text-center">Serviço</th>
                    <th>Status</th>
                    <th>Comissão</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <div class="media">
                        <div class="media-left">
                          <span class="avatar">
                            <img src="../../global/portraits/1.jpg" alt="">
                          </span>
                        </div>
                        <div class="media-body">
                          <h5 class="list-group-item-heading">
                            Ricardo Reis
                          </h5>
                          <p class="list-group-item-text">22 anos</p>
                        </div>
                      </div>
                    </td>
                    <td class="text-center">
                      <span class="tag tag-primary">Clínica Geral</span>
                    </td>
                    <td>
                      <span data-plugin="peityPie" data-skin="red">7/10</span>
                    </td>
                    <td>
                      R$ 44,00
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="media">
                        <div class="media-left">
                          <span class="avatar">
                            <img src="../../global/portraits/2.jpg" alt="">
                          </span>
                        </div>
                        <div class="media-body">
                          <h5 class="list-group-item-heading">
                            Ana Luiz Perez
                          </h5>
                          <p class="list-group-item-text">38 anos</p>
                        </div>
                      </div>
                    </td>
                    <td><span class="tag tag-warning">Ortodontia</span></td>
                    <td>
                      <span data-plugin="peityPie" data-skin="blue">3/10</span>
                    </td>
                    <td>
                      R$ 63,00
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="media">
                        <div class="media-left">
                          <span class="avatar">
                            <img src="../../global/portraits/3.jpg" alt="">
                          </span>
                        </div>
                        <div class="media-body">
                          <h5 class="list-group-item-heading">
                            João Pereira
                          </h5>
                          <p class="list-group-item-text">68 anos</p>
                        </div>
                      </div>
                    </td>
                    <td><span class="tag tag-info">Prótese</span></td>
                    <td>
                      <span data-plugin="peityPie" data-skin="green">9/10</span>
                    </td>
                    <td>
                      R$ 32,00
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="media">
                        <div class="media-left">
                          <span class="avatar">
                            <img src="../../global/portraits/4.jpg" alt="">
                          </span>
                        </div>
                        <div class="media-body">
                          <h5 class="list-group-item-heading">
                            Vilma Rodrigues
                          </h5>
                          <p class="list-group-item-text">34 anos</p>
                        </div>
                      </div>
                    </td>
                    <td><span class="tag tag-success">Clareamento</span></td>
                    <td>
                      <span data-plugin="peityPie" data-skin="orange">5/10</span>
                    </td>
                    <td>
                      R$ 50,00
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="media">
                        <div class="media-left">
                          <span class="avatar">
                            <img src="../../global/portraits/6.jpg" alt="">
                          </span>
                        </div>
                        <div class="media-body">
                          <h5 class="list-group-item-heading">
                            Maria Gonçalves
                          </h5>
                          <p class="list-group-item-text">25 anos</p>
                        </div>
                      </div>
                    </td>
                    <td><span class="tag tag-primary">Clínica Geral</span></td>
                    <td>
                      <span data-plugin="peityPie" data-skin="brown">2/10</span>
                    </td>
                    <td>
                      R$ 25,00
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            </div>
          </div>
          <!-- End Panel Projects -->
        </div>

        
     
      </div>
    </div>
  </div>
  <!-- End Page -->

  @include('layout._includes.footer')

  <!-- Core  -->
  <script src="../../global/vendor/babel-external-helpers/babel-external-helpers.js"></script>
  <script src="../../global/vendor/jquery/jquery.js"></script>
  <script src="../../global/vendor/tether/tether.js"></script>
  <script src="../../global/vendor/bootstrap/bootstrap.js"></script>
  <script src="../../global/vendor/animsition/animsition.js"></script>
  <script src="../../global/vendor/mousewheel/jquery.mousewheel.js"></script>
  <script src="../../global/vendor/asscrollbar/jquery-asScrollbar.js"></script>
  <script src="../../global/vendor/asscrollable/jquery-asScrollable.js"></script>
  <script src="../../global/vendor/waves/waves.js"></script>
  <!-- Plugins -->
  <script src="../../global/vendor/switchery/switchery.min.js"></script>
  <script src="../../global/vendor/intro-js/intro.js"></script>
  <script src="../../global/vendor/screenfull/screenfull.js"></script>
  <script src="../../global/vendor/slidepanel/jquery-slidePanel.js"></script>
  <script src="../../global/vendor/chartist/chartist.min.js"></script>
  <script src="../../global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.min.js"></script>
  <script src="../../global/vendor/jvectormap/jquery-jvectormap.min.js"></script>
  <script src="../../global/vendor/jvectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
  <script src="../../global/vendor/matchheight/jquery.matchHeight-min.js"></script>
  <script src="../../global/vendor/peity/jquery.peity.min.js"></script>


<script src="../../global/vendor/flot/jquery.flot.js"></script>
  <script src="../../global/vendor/flot/jquery.flot.resize.js"></script>
  <script src="../../global/vendor/flot/jquery.flot.time.js"></script>
  <script src="../../global/vendor/flot/jquery.flot.stack.js"></script>
  <script src="../../global/vendor/flot/jquery.flot.pie.js"></script>
  <script src="../../global/vendor/flot/jquery.flot.selection.js"></script>
  



  <!-- Scripts -->
  <script src="../../global/js/State.js"></script>
  <script src="../../global/js/Component.js"></script>
  <script src="../../global/js/Plugin.js"></script>
  <script src="../../global/js/Base.js"></script>
  <script src="../../global/js/Config.js"></script>
  <script src="../assets/js/Section/Menubar.js"></script>
  <script src="../assets/js/Section/Sidebar.js"></script>
  <script src="../assets/js/Section/PageAside.js"></script>
  <script src="../assets/js/Plugin/menu.js"></script>
  <!-- Config -->
  <script src="../../global/js/config/colors.js"></script>
  <script src="../assets/js/config/tour.js"></script>
  <script>
  Config.set('assets', '../assets');
  </script>
  <!-- Page -->
  <script src="../assets/js/Site.js"></script>
  <script src="../../global/js/Plugin/asscrollable.js"></script>
  <script src="../../global/js/Plugin/slidepanel.js"></script>
  <script src="../../global/js/Plugin/switchery.js"></script>
  <script src="../../global/js/Plugin/matchheight.js"></script>
  <script src="../../global/js/Plugin/jvectormap.js"></script>
  <script src="../../global/js/Plugin/peity.js"></script>
  <script src="../assets/examples/js/dashboard/v1.js"></script>
  <script src="../assets/examples/js/charts/flot.js"></script>
</body>
</html>