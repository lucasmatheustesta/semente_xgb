@extends('layout.page')
@section('title', 'Nova Categoria Profissional')

@section('content')
  <body class="animsition site-menubar-hide" style="opacity:0">
    @include('layout.nav')
    @include('layout.menu')

    <div class="page">
      <div class="page-header">
        <h1 class="page-title">Nova Categoria Profissional</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">Home</a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{ route('categoriasprofissional') }}">Categorias Profissionais</a>
          </li>
          <li class="breadcrumb-item active">Nova Categoria Profissional</li>
        </ol>
      </div>

      <div class="page-content">
        <form class="edit"  autocomplete="off" enctype="multipart/form-data" action="{{ route('categoriasprofissional.salvar') }}" method="post">
          @include('categoriasprofissional._form')
          <div class="row">
            <div class="col-xs-12 col-sm-2"></div>
            <div class="col-xs-12 col-sm-8">
              <a title="Cancelar" href="{{ route('categoriasprofissional') }}" class="btn btn-default pull-left btn-lg"><i class="fa fa-ban" aria-hidden="true"></i> Cancelar</a>
              <button type="submit" class="btn btn-success pull-right btn-lg"><i class="fa fa-floppy-o" aria-hidden="true"></i> Cadastrar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </body>
@endsection