@extends('layout.page')
@section('title', 'Serviços') 

@section('css')
  <link rel="stylesheet" href="{{ URL::asset('assets/examples/css/apps/contacts.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/select2/select2.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/bootstrap-table/bootstrap-table.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/examples/css/structure/pagination.css') }}">
@endsection

@section('content')
  <body class="animsition page-aside-left" style="opacity:0">

    @include('layout.nav')
    @include('layout.menu')

    <div class="page bg-white" style="max-width: 100%; margin-top:0; margin-bottom:0">
      <div class="page-main">
        <div class="page-header">
          <h1 class="page-title">Lista de Serviços</h1>
        </div>
        <div id="contactsContent" class="page-content page-content-table">
          <div class="page-content-actions">
            <form id="filter" class="form-inline">
               <div class="form-group">
                <select name="tipo" class="form-control select2-hidden-accessible" data-plugin="select2" tabindex="-1" aria-hidden="true" id="inputTipo">
                  <option value="">Tipo</option>
                  <option value="ortodontia" @if(isset($_GET['tipo']) and $_GET['tipo'] ==  'ortodontia') selected @endif>Ortodontia</option> 
                  <option value="outros" @if(isset($_GET['tipo']) and $_GET['tipo'] ==  'outros') selected @endif>Outros</option> 
                </select>
               </div>
               <div class="form-group">
                 <button type="submit" class="btn btn-primary"><i class="fa fa-filter" aria-hidden="true"></i> Filtrar</button>
                 @if(isset($_GET['tipo']) and !empty($_GET['tipo']))
                  <a title="Limpar" style="margin-left:10px;" class="btn btn-default" href="{{ route('servicos') }}">Limpar</a>
                 @endif
               </div>
            </form>
            <div class="pull-sm-right">
              <form action="{{ route('servicos') }}" name="search" id="busca">
                <div class="input-search input-search-dark">
                  <i class="input-search-icon md-search" aria-hidden="true"></i>
                  <input type="text" class="form-control" name="query" value="{{ isset($_GET['query']) ? $_GET['query'] : '' }}" placeholder="Buscar Serviço">
                </div>
              </form>
            </div>
          </div>

          <div id="registros" class="page-content">
            <table class="table table-striped" data-toggle="table" data-sort-name="id" data-sort-order="asc" data-mobile-responsive="true">
              <thead>
                <tr>
                  <th class="text-center" data-field="id" data-sortable="true">#ID</th>
                  <th data-field="titulo" data-sortable="true">Título</th>
                  <th data-field="tipo" data-sortable="false">Tipo</th>
                  <th class="text-center" data-field="acoes" data-sortable="false">Ações</th>
                </tr>
              </thead>
              <tbody>
                @foreach($registros as $registro)
                    <tr id="registro-{{ $registro->id }}">
                      <td class="text-center cell-30">
                        {{ $registro->id }}
                      </td>
                      <td>
                        {{ $registro->title }}
                      </td>
                      <td><span style="text-transform: capitalize;">{{ $registro->type }}</span></td>
                      <td>
                        <a style="text-decoration:none" href="{{ route('servicos.editar', $registro->id) }}" class="btn btn-success"><i class="icon fa-pencil"></i> Editar</a>
                        <button class="btn btn-delete btn-danger waves-effect" data-id="{{ $registro->id }}" data-title="{!! $registro->title !!}" type="button"><i class="icon fa-trash"></i> Excluir</button>
                      </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
            <div class="text-center mgt30">
              {!! $registros->appends(Request::capture()->except('page'))->render() !!}
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="deleteData" aria-hidden="true" role="dialog" tabindex="-1">
      <div class="modal-dialog modal-center text-center modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <i class="icon fa fa-times"></i>
            </button>
          </div>
          <div class="modal-body" style="padding-top:0">
            <i style="font-size:5em;margin-bottom:10px;" class="icon fa-warning text-danger"></i>
            <p style="margin-bottom:0">Tem certeza que deseja excluir o serviço <b id="nameData"></b>?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Não</button>
            <button type="button" id="btn-confirm" data-id="" class="btn btn-success">Sim</button>
          </div>
        </div>
      </div>
    </div>

    @can('add_servico')
      <div class="site-action">
        <button style="display:none;" type="button" id="deleteLote" data-action="trash" class="btn-raised btn btn-danger btn-floating animation-slide-bottom">
          <i class="icon md-delete" aria-hidden="true"></i>
        </button>
        <a href="{{ route('servicos.adicionar') }}" class="btn-raised btn btn-success btn-floating">
          <i class="front-icon md-plus animation-scale-up" aria-hidden="true"></i>
        </a>
      </div>
    @endcan
  </body>
@endsection

@section('plugins')
  <script src="{{ URL::asset('global/vendor/select2/select2.full.min.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/bootstrap-table/bootstrap-table.min.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/bootstrap-table/extensions/mobile/bootstrap-table-mobile.js') }}"></script>
@endsection

@section('scripts')
  <script src="{{ URL::asset('global/js/Plugin/select2.js') }}"></script>
  <script type="text/javascript">
    jQuery(document).ready(function () {
      $('.btn-delete').click(function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var title = $(this).data('title');
        $('#btn-confirm').data('id', id);
        $('#nameData').html(title);
        $('#deleteData').modal('show');
      });

      $('#btn-confirm').click(function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        if (id) {
          deleteData(id);
        };
      });

      function deleteData (id) {
        $.ajax({
          dataType: 'json',
          url: '{{ URL::asset("servicos/deletar") }}/'+id,
          type: 'GET',
          success: function (json) {
            if (json.success) {
              $('#deleteData').modal('hide');

              $('#registro-'+id).fadeOut( function () {
                $('#registro-'+id).remove();
              });
                
              toastr.success(json.message);
            }
            else{
              $('#deleteData').modal('hide');
              toastr.warning('Ops, houve um erro ao excluir a clínica.');
            }
          },
          error: function () {
            $('#deleteData').modal('hide');
            toastr.warning('Ops, houve um erro ao excluir a clínica.');
          }
        });
      }
    });
  </script>
@endsection