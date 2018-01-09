@extends('layout.page')
@section('title', 'Editar Paciente') 

@section('content')
<body class="animsition site-menubar-hide">
  @include('layout.nav')
  @include('layout.menu')

  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Editar Paciente</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('dashboard') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{ route('pacientes') }}">Pacientes</a>
        </li>
        <li class="breadcrumb-item active">Editar Paciente</li>
      </ol>
    </div>
    <div class="page-content">
      <form name="adicionarPaciente" autocomplete="off" enctype="multipart/form-data" action="{{ route('pacientes.atualizar', $registro->id) }}" method="post">
        @include('pacientes._form')
        <input type="hidden" name="_method" value="put">
        <div class="row">
          <div class="col-xs-12 col-sm-3"></div>
          <div class="col-xs-12 col-sm-9">
            <a title="Cancelar" href="{{ route('pacientes') }}" class="btn btn-default pull-left btn-lg"><i class="fa fa-ban" aria-hidden="true"></i> Cancelar</a>
            <button type="submit" class="btn btn-success pull-right btn-lg"><i class="fa fa-floppy-o" aria-hidden="true"></i> Atualizar</button>
          </div>
        </div>
      </form>
    </div>
  </div>    
</body>
@endsection