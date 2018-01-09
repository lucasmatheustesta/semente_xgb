<!DOCTYPE html>
<html class="no-js css-menubar" lang="pt-br">
  @extends('layout.head')
  @section('title', 'Nova Clínica')

  @section('css')
    <link rel="stylesheet" href="{{ URL::asset('global/vendor/dropify/dropify.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('global/vendor/select2/select2.css') }}">
  @endsection

  <body class="animsition site-menubar-hide" style="opacity:0">
    @include('layout.nav')
    @include('layout.menu')

    <div class="page">
      <div class="page-header">
        <h1 class="page-title">Nova Clínica</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">Home</a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{ route('clinicas') }}">Clínicas</a>
          </li>
          <li class="breadcrumb-item active">Nova Clínica</li>
        </ol>
      </div>

      <div class="page-content">
        <div class="panel">
          <div class="panel-body container-fluid">
            <div class="example-wrap">
              <form class="edit"  autocomplete="off" enctype="multipart/form-data" action="{{ route('clinicas.salvar') }}" method="post">
                
                @include('clinicas._form')

                <div class="form-group form-material text-center">
                  <a style="margin-right:20px;" title="Cancelar" href="{{ route('clinicas') }}" class="btn btn-default btn-inline btn-lg"><i class="fa fa-ban" aria-hidden="true"></i> Cancelar</a>
                  <button type="submit" class="btn btn-success btn-inline btn-lg"><i class="fa fa-floppy-o" aria-hidden="true"></i> Cadastrar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      
    </div>
    
    @extends('layout.footer')

    @section('plugins')
      <script src="{{ URL::asset('global/vendor/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
      <script src="{{ URL::asset('global/vendor/dropify/dropify.js') }}"></script>
      <script src="{{ URL::asset('global/vendor/select2/select2.full.min.js') }}"></script>
    @endsection

    @section('scripts')
      <script src="{{ URL::asset('global/js/Plugin/select2.js') }}"></script>
    @endsection

    @section('page')
      <script src="{{ URL::asset('global/js/Plugin/dropify.js') }}"></script>
    @endsection

    @section('scriptpersonalizado')
      @yield('script_form')
    @endsection    
  </body>
</html>