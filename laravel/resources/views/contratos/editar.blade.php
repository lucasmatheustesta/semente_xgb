@extends('layout.page')
@section('title', 'Editar Contrato')

@section('content')
<body class="animsition site-menubar-hide">
  @include('layout.nav')
  @include('layout.menu')

  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Editar Contrato</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('dashboard') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{ route('contratos') }}">Contratos</a>
        </li>
        <li class="breadcrumb-item active">Editar Contrato</li>
      </ol>
    </div>
    <div class="page-content">
      <div class="container container-boxed">
            <form id="adicionarContrato" autocomplete="off" action="{{ route('contratos.atualizar', $registro->id) }}" method="post">
              @if($type == 'Clínica')
                @include('contratos._form_clinica')
              @else
                @include('contratos._form')
              @endif
              <input type="hidden" name="_method" value="put">
              
              <div class="row">
                <div class="col-xs-12">
                  <a title="Cancelar" href="{{ route('contratos') }}" class="btn btn-default pull-left btn-lg"><i class="fa fa-ban" aria-hidden="true"></i> Cancelar</a>
                  <button type="submit" class="btn btn-success pull-right btn-lg"><i class="fa fa-floppy-o" aria-hidden="true"></i> Atualizar</button>
                </div>
              </div>
            </form>
          </div>
    </div>
  </div>
</body>
@endsection