@extends('layout.page')
@section('title', 'Novo Contrato')

@section('content')
<body class="animsition site-menubar-hide">
  @include('layout.nav')
  @include('layout.menu')

  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Novo Contrato</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('dashboard') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{ route('contratos') }}">Contratos</a>
        </li>
        <li class="breadcrumb-item active">Novo Contrato</li>
      </ol>
    </div>
    <div class="page-content">
      <div class="container container-boxed">
       
            <form name="adicionarConsultor" autocomplete="off" action="{{ route('contratos.salvar') }}" method="post">
              @if($type == 'Clínica')
                @include('contratos._form_clinica')
              @else
                @include('contratos._form')
              @endif
              <div class="row">
                <div class="col-xs-12">
                  <a title="Cancelar" href="{{ route('contratos') }}" class="btn btn-default pull-left btn-lg"><i class="fa fa-ban" aria-hidden="true"></i> Cancelar</a>
                  <button type="submit" class="btn btn-success pull-right btn-lg"><i class="fa fa-floppy-o" aria-hidden="true"></i> Cadastrar</button>
                </div>
              </div>
            </form>
 
      </div>
    </div>
  </div>    
</body>
@endsection