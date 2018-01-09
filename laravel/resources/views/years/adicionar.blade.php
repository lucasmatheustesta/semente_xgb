@extends('layout.page')
@section('title', 'Novo Ano')

@section('content')
  <body class="animsition site-menubar-hide" style="opacity:0">
    @include('layout.nav')
    @include('layout.menu')

    <div class="page">
      <div class="page-header pdb0">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">Home</a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{ route('years') }}">Anos</a>
          </li>
          <li class="breadcrumb-item active">@yield('title')</li>
        </ol>
        <h1 class="page-title">@yield('title')</h1>
      </div>

      <div class="page-content">
        <form class="edit" autocomplete="off" action="{{ route('years.salvar') }}" method="post">
          @include('years._form')
          <div class="row">
            <div class="col-xs-12 col-sm-3"></div>
            <div class="col-xs-12 col-sm-6">
              <a title="Cancelar" href="{{ route('years') }}" class="btn btn-default pull-left btn-lg"><i class="fa fa-ban" aria-hidden="true"></i> Cancelar</a>
              <button type="submit" class="btn btn-success pull-right btn-lg"><i class="fa fa-floppy-o" aria-hidden="true"></i> Cadastrar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </body>
@endsection