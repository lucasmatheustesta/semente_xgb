@extends('layout.page')
@section('title', 'Editar Pessoa Física')

@section('content')
  <body class="animsition site-menubar-hide" style="opacity:0">
    @include('layout.nav')
    @include('layout.menu')

    <div class="page">
      <div class="page-header">
        <h1 class="page-title">Editar Pessoa Física</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">Home</a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{ route('pessoasfisicas') }}">Pessoa Físicas</a>
          </li>
          <li class="breadcrumb-item active">Editar Pessoa Física</li>
        </ol>
      </div>

      <div class="page-content">
        <form class="edit" name="editarClinica" autocomplete="off" enctype="multipart/form-data" action="{{ route('pessoasfisicas.atualizar', $registro->id) }}" method="post">
          @include('fisicas._form')
          <input type="hidden" name="_method" value="put">
          <div class="row">
            <div class="col-xs-12 col-sm-3"></div>
            <div class="col-xs-12 col-sm-9">
              <a title="Cancelar" href="{{ route('pessoasfisicas') }}" class="btn btn-default pull-left btn-lg"><i class="fa fa-ban" aria-hidden="true"></i> Cancelar</a>
            <button type="submit" class="btn btn-success pull-right btn-lg"><i class="fa fa-floppy-o" aria-hidden="true"></i> Atualizar</button>
            </div>
          </div>
        </form>
      </div>
    </div>  
  </body>
@endsection