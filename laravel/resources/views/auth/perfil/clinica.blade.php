@extends('layout.page')
@section('title', 'Meu Perfil') 

@section('content')
  <body class="page-profile" style="opacity:0">

    @include('layout.nav')
    @include('layout.menu')

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
          <form autocomplete="off" enctype="multipart/form-data" action="{{ route('user.atualizar')}}" method="post">
            <div class="col-xs-12 col-lg-3">
              <div class="card card-shadow text-xs-center">
                <div class="card-block">
                  <div class="text-left">
                    <h3 class="example-title mgt0">Foto</h3>
                  </div>
                  @include('_form.avatar')
                  <h4 class="profile-user mgb0">{{ $registro->user->name }}</h4>
                  <p>{{ $type }}</p>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-lg-9">
              <div class="panel panel-folha">
                <div class="dobra"></div>
                <div class="panel-body">
                  <div class="example mgt0">
                    <h3 class="example-title mgt0">Clínica</h3>
                    <div class="row">
                      <div class="col-xs-6">
                        <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
                          <label class="form-control-label" for="inputName">Nome</label>
                          <input type="text" required class="form-control" id="inputName" name="name" placeholder="Ex. João da Silva" value="@if( old('name') ){{ old('name') }}@elseif( isset($registro->user->name) ){{$registro->user->name}}@endif">
                          @if($errors->has('name'))
                            <small class="text-help">{{ $errors->first('name') }}</small>
                          @endif
                        </div>
                      </div> 
                      <div class="col-xs-6">
                        <div class="form-group {{ $errors->has('phone') ? 'has-danger' : '' }}">
                          <label class="form-control-label" for="inputTelefone">Telefone</label>
                          <input type="tel" class="form-control" id="inputTelefone" name="phone" placeholder="Digite apenas números" value="@if( old('phone') ){{ old('phone') }}@elseif( isset($registro->phone) ){{$registro->phone}}@endif">
                           @if($errors->has('phone'))
                            <small class="text-help">{{ $errors->first('phone') }}</small>
                          @endif
                        </div>
                      </div> 
                      <div class="col-xs-12">
                        <div class="form-group {{ $errors->has('site') ? 'has-danger' : '' }}">
                          <label class="form-control-label" for="inputSite">Site</label>
                          <input type="url" class="form-control" id="inputSite" name="site" placeholder="http://" value="@if( old('site') ){{ old('site') }}@elseif( isset($registro->site) ){{$registro->site}}@endif" >
                          @if($errors->has('site'))
                            <small class="text-help">{{ $errors->first('site') }}</small>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  @include('_form.acesso')
                  @include('_form.endereco')
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <a title="Cancelar" href="{{ route('dashboard') }}" class="btn btn-default pull-left btn-lg waves-effect"><i class="fa fa-ban" aria-hidden="true"></i> Cancelar</a>
                  <button type="submit" class="btn btn-success pull-right btn-lg waves-effect"><i class="fa fa-floppy-o" aria-hidden="true"></i> Atualizar</button>
                </div>
              </div>
            </div>
            <input type="hidden" name="_method" value="put">
          </form>
        </div>
      </div>
    </div>
  </body>
@endsection

@section('plugins')
  <script src="{{ URL::asset('global/vendor/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
@append

@section('scriptpersonalizado')
  <script type="text/javascript">
    jQuery(document).ready(function ($) {
      $("#inputTelefone").mask("(99) 9999-9999?9");
      $("#inputTelefone").on("blur", function() {
          var last = $(this).val().substr( $(this).val().indexOf("-") + 1 );
          if( last.length == 5 ) {
              var move = $(this).val().substr( $(this).val().indexOf("-") + 1, 1 );
              var lastfour = last.substr(1,4);
              var first = $(this).val().substr( 0, 9 );
              $(this).val( first + move + '-' + lastfour );
          }
      })
    })
  </script>
@append