@extends('layout.page')
@section('title', 'Novo Serviço') 

@section('content')
<body class="animsition site-menubar-hide" style="opacity:0">
  @include('layout.nav')
  @include('layout.menu')

  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Novo Serviço</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('dashboard') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{ route('servicos') }}">Serviços</a>
        </li>
        <li class="breadcrumb-item active">Novo Serviço</li>
      </ol>
    </div>
    <div class="page-content">
      <div class="row">
        <div class="col-xs-12 col-sm-8 offset-sm-2">
          <form autocomplete="off" enctype="multipart/form-data" action="{{ route('servicos.salvar') }}" method="post">
            @include('servicos._form')
            <div class="row">
              <div class="col-xs-12">
                <a title="Cancelar" href="{{ route('servicos') }}" class="btn btn-default pull-left btn-lg"><i class="fa fa-ban" aria-hidden="true"></i> Cancelar</a>
              <button type="submit" class="btn btn-success pull-right btn-lg"><i class="fa fa-floppy-o" aria-hidden="true"></i> Cadastrar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
@endsection