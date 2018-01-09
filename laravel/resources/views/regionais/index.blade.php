@extends('layout.page')
@section('title', 'Regionais')

@section('css')
  <link rel="stylesheet" href="{{ URL::asset('assets/examples/css/apps/contacts.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/select2/select2.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/bootstrap-table/bootstrap-table.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/examples/css/structure/pagination.css') }}">
@endsection

@section('content')
  <body class="animsition app-clinicas app-contacts page-aside-left" style="opacity:0">

    @include('layout.nav')
    @include('layout.menu')

    <div class="page bg-white" style="max-width: 100%; margin-top:0;margin-bottom:0">
      <!-- Contacts Content -->
      <div class="page-main">
        <!-- Contacts Content Header -->
        <div style="overflow: hidden;" class="page-header">
          <h1 style="float: left" class="page-title">Regionais</h1>

          <div class="pull-sm-right">
              <form action="{{ route('regionais') }}" name="search" id="busca">
                <div class="input-search input-search-dark">
                  <i class="input-search-icon md-search" aria-hidden="true"></i>
                  <input type="text" class="form-control" name="query" value="{{ isset($_GET['query']) ? $_GET['query'] : '' }}" placeholder="Buscar Regional">
                </div>
              </form>
            </div>
        </div>

        <div class="clearfix"></div>
        <!-- Contacts Content -->
        <div id="contactsContent" class="page-content page-content-table">
        
          <div id="registros" class="page-content">
              <table id="registros" class="table table-striped" data-toggle="table" data-sort-name="id" data-sort-order="asc" data-mobile-responsive="true">
                <thead>
                  <tr>
                    <th class="pre-cell text-center">
                      <span class="checkbox-custom checkbox-primary checkbox-lg">
                        <input type="checkbox" class="contacts-checkbox selectable-all" id="select_all">
                        <label for="select_all"></label>
                      </span>
                    </th>
                    <th class="text-center" data-field="id" data-sortable="true">#ID</th>
                    <th data-field="name" data-sortable="true">Nome</th>
                    @can('edit_regional', 'delete_regional' )
                      <th class="text-center" data-field="acoes" data-sortable="false">Ações</th>
                    @endcan
                  </tr>
                </thead>
                <tbody>
                  @foreach($registros as $registro)
                    <tr id="registro-{{ $registro->id }}">
                      <td class="pre-cell">
                        <span class="checkbox-custom checkbox-primary checkbox-lg">
                          <input type="checkbox" name="id[]" value="{{ $registro->id }}" class="selectable-item" id="check-registro-{{ $registro->id }}">
                          <label for="check-registro-{{ $registro->id }}"></label>
                        </span>
                      </td>
                      <td class="text-center cell-30">
                        {{ $registro->id }}
                      </td>
                      <td>{{ $registro->nome }}</td>

                      @can('edit_regional', 'delete_regional' )
                        <td>
                          @can('edit_regional')
                            <a style="text-decoration:none" title="Editar {!! $registro->nome !!}" href="{{ route('regionais.editar', $registro->id) }}" class="btn btn-success"><i class="icon fa fa-pencil"></i> Editar</a>
                          @endcan
                          @can('delete_regional')
                            <button class="btn btn-delete btn-danger waves-effect" data-id="{{ $registro->id }}" data-title="{!! $registro->nome !!}" type="button"><i class="icon fa fa-trash"></i> Excluir</button>
                          @endcan
                        </td>
                      @endcan
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
            <i style="font-size:5em;margin-bottom:10px;" class="icon fa fa-warning text-danger"></i>
            <p style="margin-bottom:0">Tem certeza que deseja excluir a regional <b id="nameData"></b>?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Não</button>
            <button type="button" id="btn-confirm" data-id="" class="btn btn-success">Sim</button>
          </div>
        </div>
      </div>
    </div>

    @can('add_regional')
      <div class="site-action" data-plugin="actionBtn">
        <button style="display:none;" type="button" id="deleteLote" data-action="trash" class="btn-raised btn btn-danger btn-floating animation-slide-bottom">
          <i class="icon md-delete" aria-hidden="true"></i>
        </button>
        <a href="{{ route('regionais.adicionar') }}" class="btn-raised btn btn-success btn-floating">
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
@endsection

@section('scriptpersonalizado')
  <script type="text/javascript">
    jQuery(document).ready(function ($) {


      $("#select_all").click(function () {
        $(".selectable-item").prop('checked', $(this).prop('checked')).trigger('change');
      });

      $('.selectable-item').change(function () {
        if ($('.selectable-item').is(':checked')) {
          $('#deleteLote').fadeIn();
        }else{
          $('#deleteLote').fadeOut();
        }
      })

      $('#deleteLote').click(function (e) {
        e.preventDefault();

        $("#registros tbody input:checked").each(function() {
          var id = $(this).val();
          if (id) {
            deleteData(id);
            $("#select_all").removeAttr('checked', 'checked');
          };
        });
      })
        
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
          $("#select_all").removeAttr('checked', 'checked');
        };
      });

      function deleteData (id) {
        $.ajax({
          dataType: 'json',
          url: '{{ URL::asset("regionais/deletar") }}/'+id,
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
              toastr.warning('Ops, houve um erro ao excluir a regional.');
            }
          },
          error: function () {
            $('#deleteData').modal('hide');
            toastr.warning('Ops, houve um erro ao excluir a regional.');
          }
        });
      }
    })
  </script>
@endsection