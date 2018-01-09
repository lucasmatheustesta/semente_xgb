<!DOCTYPE html>
<html class="no-js css-menubar" lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Meu Perfil | Maximiza Odonto</title>

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

<body class="animsition page-profile">
  <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->

  @include('layout.nav')
    
  @include('layout.menu')
  
    <!-- Page -->
  <div class="page">
    <div class="page-header">
        <h1 class="page-title">Meu Perfil</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">Home</a>
          </li>
          <li class="breadcrumb-item active">Meu Perfil</li>
        </ol>
      </div>
    <div class="page-content container-fluid">

      <div class="row">
        <div class="col-xs-12 col-lg-3">
          <!-- Page Widget -->
          <div class="card card-shadow text-xs-center">
            <div class="card-block">
              <a class="avatar avatar-lg" href="javascript:void(0)">
                <img src="../../../global/portraits/3.jpg" alt="...">
              </a>
              <h4 class="profile-user">Maurício Souza</h4>
              <p></p>
              <button type="button" class="btn btn-default"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Alterar Foto</button>
            </div>
          </div>
          <!-- End Page Widget -->
        </div>
        <div class="col-xs-12 col-lg-9">
            <!-- Panel -->
            <div class="panel">
              <div class="panel-body nav-tabs-animate nav-tabs-horizontal" data-plugin="tabs">
                <div class="example">
                  <h4 class="example-title">Clínica</h4>
                  <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-4">
                      <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}" data-plugin="formMaterial">
                        <label class="form-control-label" for="inputName">Nome</label>
                        <input type="text" class="form-control" id="inputName" name="name" placeholder="Ex. Status Odontologia" value="@if( old('name') ){{ old('name') }}@elseif( isset($registro->user->name) ){{$registro->user->name}}@endif">
                        @if($errors->has('name'))
                          <small class="text-help">{{ $errors->first('name') }}</small>
                        @endif
                      </div>
                    </div> 
                    
                    <div class="col-xs-12 col-md-6 col-lg-4">
                      <div class="form-group {{ $errors->has('phone') ? 'has-danger' : '' }}" data-plugin="formMaterial">
                        <label class="form-control-label" for="inputTelefone">Telefone</label>
                        <input type="tel" class="form-control" id="inputTelefone" name="phone" placeholder="Digite apenas números" value="@if( old('phone') ){{ old('phone') }}@elseif( isset($registro->phone) ){{$registro->phone}}@endif">
                         @if($errors->has('phone'))
                          <small class="text-help">{{ $errors->first('phone') }}</small>
                        @endif
                      </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-4">
                      <div class="form-group {{ $errors->has('site') ? 'has-danger' : '' }}" data-plugin="formMaterial">
                        <label class="form-control-label" for="inputSite">Site</label>
                        <input type="url" class="form-control" id="inputSite" name="site" placeholder="http://" value="@if( old('site') ){{ old('site') }}@elseif( isset($registro->site) ){{$registro->site}}@endif" >
                        @if($errors->has('site'))
                          <small class="text-help">{{ $errors->first('site') }}</small>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>

                <div class="example">
                  <h4 class="example-title">Dados de Acesso</h4>
                  <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-6">
                      <div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }}" data-plugin="formMaterial">
                        <label class="form-control-label" for="inputEmail">E-mail</label>
                        <input disabled type="email" class="form-control" id="inputEmail" name="email" placeholder="Ex. contato@statusodontologia.com.br" value="@if( old('email') ){{ old('email') }}@elseif( isset($registro->user->email) ){{$registro->user->email}}@endif" >
                         @if($errors->has('email'))
                          <small class="text-help">{{ $errors->first('email') }}</small>
                        @endif
                      </div>
                    </div> 

                    <div class="col-xs-12 col-md-6 col-lg-6">
                      <div class="form-group @if(!isset($registro->id)) @endif {{ $errors->has('password') ? 'has-danger' : '' }}" data-plugin="formMaterial">
                        <label class="form-control-label" for="inputSenha">Senha</label> 
                        @if(isset($registro->id))
                          <button id="updatePassword" class="btn btn-xs btn-dark pull-right" style="position: relative;top: 10px;">Alterar Senha</button>
                        @endif
                        <input type="password" @if(isset($registro->id)) disabled @endif  class="form-control" id="inputSenha" name="password" placeholder="Digite uma senha para acesso" value="@if(isset($registro->id)) marcosferrarez @endif" >
                        @if($errors->has('password'))
                          <small class="text-help">{{ $errors->first('password') }}</small>
                        @endif
                      </div>
                    </div> 
                    
                  </div>
                </div>

                <div class="example">
                  <h4 class="example-title">Endereço</h4>
                  <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-6">
                      <div class="form-group {{ $errors->has('estado_id') ? 'has-danger' : '' }} form-material" data-plugin="formMaterial">
                        <label class="form-control-label" for="inputEstado">Estado</label>
                        <select class="form-control select2-hidden-accessible" data-placeholder="Selecione o Estado" data-plugin="select2" tabindex="-1" aria-hidden="true" id="inputEstado" name="estado_id">
                          <option value="">Selecione o Estado</option> 
                          @foreach($estados as $estado)
                            @if( old('estado_id') == $estado->id )
                              <option selected value="{{ $estado->id }}">{{ $estado->name }}</option> 
                            @elseif(isset($registro->estado_id) and $registro->estado_id == $estado->id)
                              <option selected value="{{ $estado->id }}">{{ $estado->name }}</option> 
                            @else
                              <option value="{{ $estado->id }}">{{ $estado->name }}</option> 
                            @endif
                          @endforeach
                        </select>
                        @if($errors->has('estado'))
                          <small class="text-help">{{ $errors->first('estado') }}</small>
                        @endif
                      </div>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-6">
                      <div class="form-group {{ $errors->has('cidade_id') ? 'has-danger' : '' }} form-material" data-plugin="formMaterial">
                        <label class="form-control-label" for="inputCidade">Cidade</label>
                        <select class="form-control select2-hidden-accessible" data-placeholder="Escolha um Estado Primeiro" data-plugin="select2" tabindex="-1" aria-hidden="true"  id="inputCidade" name="cidade_id">
                          <option value="">Escolha um Estado Primeiro</option> 
                        </select>
                        @if($errors->has('cidade_id'))
                          <small class="text-help">{{ $errors->first('cidade_id') }}</small>
                        @endif
                      </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-6">
                      <div class="form-group {{ $errors->has('address') ? 'has-danger' : '' }} form-material" data-plugin="formMaterial">
                        <label class="form-control-label" for="inputText">Logradouro</label>
                        <input type="text" class="form-control" id="inputText" value="@if( old('address') ){{ old('address') }}@elseif( isset($registro->address) ){{$registro->address}}@endif" name="address" placeholder="Ex. Rua das Oliveiras, 51">
                        @if($errors->has('address'))
                          <small class="text-help">{{ $errors->first('address') }}</small>
                        @endif
                      </div>
                    </div> 
                    <div class="col-xs-12 col-md-6 col-lg-6">
                      <div class="form-group {{ $errors->has('bairro') ? 'has-danger' : '' }} form-material" data-plugin="formMaterial">
                        <label class="form-control-label" for="inputbairro">Bairro</label>
                        <input type="text" class="form-control" id="inputbairro" name="bairro" value="@if( old('bairro') ){{ old('bairro') }}@elseif( isset($registro->bairro) ){{$registro->bairro}}@endif"  placeholder="Ex. Centro">
                        @if($errors->has('bairro'))
                          <small class="text-help">{{ $errors->first('bairro') }}</small>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>

                <div style="text-align:center;" class="col-xs-12 col-md-12 col-lg-12">
                  <button type="submit" class="btn btn-inline btn-success waves-effect"><i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar Perfil</button>
                </div>

              </div>
            </div>
            <!-- End Panel -->
            <div class="modal fade modal-fade-in-scale-up" id="modal-edit-image-profile" aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form action="" method="">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                      </button>
                      <h4 class="modal-title">Imagem de Perfil</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-12">
                          <input type="file" id="input-file-now" data-plugin="dropify" data-default-file="" />
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-success waves-effect">Salvar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- End Modals -->
          </div>
      </div>
    </div>
  </div>
  <!-- End Page -->

  <footer class="site-footer">
    <div class="site-footer-legal">© {{ date('Y') }} <a title="Dashboard" href="{{ route('dashboard') }}">Maximiza Odonto</a></div>
    <div class="site-footer-right">
      Desenvolvido por <a target="_blank" title="Pixel Web" href="http://pixelweb.com.br/">Pixel Web</a>
    </div>
  </footer>

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