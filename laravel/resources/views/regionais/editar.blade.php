@extends('layout.page')
@section('title', 'Editar Regional')

@section('content')
  <body class="animsition site-menubar-hide" style="opacity:0">
    @include('layout.nav')
    @include('layout.menu')

    <div class="page">
      <div class="page-header">
        <h1 class="page-title">Editar Regional</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">Home</a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{ route('regionais') }}">Regionais</a>
          </li>
          <li class="breadcrumb-item active">Editar Regional</li>
        </ol>
      </div>

      <div class="page-content">
        <form class="edit" name="editarClinica" autocomplete="off" enctype="multipart/form-data" action="{{ route('regionais.atualizar', $registro->id) }}" method="post">
          @include('regionais._form')
          <input type="hidden" name="_method" value="put">
          <div class="row">
            <div class="col-xs-12 col-sm-2"></div>
            <div class="col-xs-12 col-sm-8">
              <a title="Cancelar" href="{{ route('regionais') }}" class="btn btn-default pull-left btn-lg"><i class="fa fa-ban" aria-hidden="true"></i> Cancelar</a>
            <button type="submit" class="btn btn-success pull-right btn-lg"><i class="fa fa-floppy-o" aria-hidden="true"></i> Atualizar</button>
            </div>
          </div>
        </form>
      </div>
    </div>  
  </body>
@endsection