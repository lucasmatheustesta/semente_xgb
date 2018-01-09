@extends('layout.page')
@section('title', 'Novo Paciente') 

@section('content')
<body class="animsition site-menubar-hide">
  @include('layout.nav')
  @include('layout.menu')

  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Novo Paciente</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('dashboard') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{ route('pacientes') }}">Pacientes</a>
        </li>
        <li class="breadcrumb-item active">Novo Paciente</li>
      </ol>
    </div>
    <div class="page-content">
        <form name="adicionarPaciente" autocomplete="off" enctype="multipart/form-data" action="{{ route('pacientes.salvar') }}" method="post">
          @include('pacientes._form')
          <div class="row">
            <div class="col-xs-12 col-sm-3"></div>
            <div class="col-xs-12 col-sm-9">
              <a title="Cancelar" href="{{ route('pacientes') }}" class="btn btn-default pull-left btn-lg"><i class="fa fa-ban" aria-hidden="true"></i> Cancelar</a>
              <button type="submit" class="btn btn-success pull-right btn-lg"><i class="fa fa-floppy-o" aria-hidden="true"></i> Cadastrar</button>
            </div>
          </div>
        </form>
    </div>
  </div>    
</body>
@endsection