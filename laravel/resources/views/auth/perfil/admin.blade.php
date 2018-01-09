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
                    <h4 class="profile-user mgb0">{{ $registro->name }}</h4>
                    <p>{{ $type }}</p>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-lg-9">
                <div class="panel panel-folha">
                  <div class="dobra"></div>
                  <div class="panel-body">
                    <div class="example mgt0">
                      <h4 class="example-title mgt0">Dados Pessoais</h4>
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
                            <label class="form-control-label" for="inputName">Nome</label>
                            <input type="text" required class="form-control" id="inputName" name="name" placeholder="Ex. João da Silva" value="@if( old('name') ){{ old('name') }}@elseif( isset($registro->name) ){{$registro->name}}@endif">
                            @if($errors->has('name'))
                              <small class="text-help">{{ $errors->first('name') }}</small>
                            @endif
                          </div>
                        </div> 
                      </div>
                    </div>
                    @include('_form.acesso')
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
