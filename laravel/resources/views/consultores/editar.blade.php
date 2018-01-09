@extends('layout.page')
@section('title', 'Editar Consultor') 

@section('css')
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/dropify/dropify.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/select2/select2.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/bootstrap-datepicker/bootstrap-datepicker.css') }}">
@append

@section('content')
  <body class="animsition site-menubar-hide">

    @include('layout.nav')
    @include('layout.menu')

    <div class="page">

      <div class="page-header">
        <h1 class="page-title">Novo Consultor</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">Home</a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{ route('consultores') }}">Consultores</a>
          </li>
          <li class="breadcrumb-item active">Editar Consultor</li>
        </ol>
      </div>

      <div class="page-content">
        <form name="adicionarConsultor" autocomplete="off" enctype="multipart/form-data" action="{{ route('consultores.atualizar', $registro->id) }}" method="post">
          @include('consultores._form')
          <input type="hidden" name="_method" value="put">
          <div class="row">
            <div class="col-xs-12 col-sm-3"></div>
            <div class="col-xs-12 col-sm-9">
              <a title="Cancelar" href="{{ route('consultores') }}" class="btn btn-default pull-left btn-lg"><i class="fa fa-ban" aria-hidden="true"></i> Cancelar</a>
              <button type="submit" class="btn btn-success pull-right btn-lg"><i class="fa fa-floppy-o" aria-hidden="true"></i> Atualizar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </body>
@endsection