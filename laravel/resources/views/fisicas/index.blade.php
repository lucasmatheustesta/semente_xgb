@extends('layout.page')
@section('title', 'Pessoas Físicas')

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
        <div class="page-header">
          <h1 class="page-title">Pessoas Físicas</h1>
        </div>
        <!-- Contacts Content -->
        <div id="contactsContent" class="page-content page-content-table">
        
          <div class="page-content-actions">
            <form id="filter" class="form-inline">
                <div class="form-group">
                  <select name="estado" class="form-control select2-hidden-accessible" data-plugin="select2" tabindex="-1" aria-hidden="true" id="inputEstado">
                    <option value="">Estado</option>
                    @foreach($estados as $estado)
                      <option value="{{ $estado->id }}">{{ $estado->name }}</option> 
                    @endforeach
                  </select>
                 </div>
                 <div class="form-group">
                  <select name="cidade" class="form-control select2-hidden-accessible" data-plugin="select2" tabindex="-1" aria-hidden="true" id="inputCidade">
                    <option value="">Cidade</option>
                  </select>
                 </div>
                 <div class="form-group">
                   <button type="submit" class="btn btn-primary"><i class="fa fa-filter" aria-hidden="true"></i> Filtrar</button>
                   @if((isset($_GET['estado']) and !empty($_GET['estado'])) or (isset($_GET['cidade']) and !empty($_GET['cidade'])) )
                    <a style="margin-left:10px;" href="{{ route('pessoasfisicas') }}" title="Limpar" class="btn btn-default">Limpar</a>
                   @endif
                 </div>
            </form>
            <div class="pull-sm-right">
              <form action="{{ route('pessoasfisicas') }}" name="search" id="busca">
                <div class="input-search input-search-dark">
                  <i class="input-search-icon md-search" aria-hidden="true"></i>
                  <input type="text" class="form-control" name="query" value="{{ isset($_GET['query']) ? $_GET['query'] : '' }}" placeholder="Buscar Associado">
                </div>
              </form>
            </div>
          </div>

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
                    <th data-field="tel" data-sortable="false">CRM</th>
                    <th data-field="lucro" data-sortable="true">CPF</th>
                    @can('edit_pesssoafisica', 'delete_pesssoafisica' )
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
                      <td class="cell-300">
                          <a class="avatar" title="{!! $registro->nome !!}" href="{{ route('pessoasfisicas.editar', $registro->id) }}">
                            @if(isset($registro->image) and !empty($registro->image)) 
                              <img class="img-fluid" src="{{ URL::asset($registro->image) }}" alt="{!! $registro->nome !!}">
                            @else
                              <img class="img-fluid img-40" src="{{ URL::asset('img/users/profile.jpg') }}" alt="{!! $registro->nome !!}">
                            @endif
                          </a>                      
                        {{ $registro->nome }}
                      </td>

                      <td>{{ $registro->crm }}</td>

                      <td>{{ $registro->cpf }}</td>
                      
                      @can('edit_pessoafisica', 'delete_pessoafisica' )
                        <td>
                          @can('edit_pessoafisica')
                            <a style="text-decoration:none" title="Editar {!! $registro->nome !!}" href="{{ route('pessoasfisicas.editar', $registro->id) }}" class="btn btn-success"><i class="icon fa fa-pencil"></i> Editar</a>
                          @endcan
                          @can('delete_pessoafisica')
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
            <i style="font-size:5em;margin-bottom:10px;" class="icon fa-warning text-danger"></i>
            <p style="margin-bottom:0">Tem certeza que deseja excluir a Pessoa Física <b id="nameData"></b>?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Não</button>
            <button type="button" id="btn-confirm" data-id="" class="btn btn-success">Sim</button>
          </div>
        </div>
      </div>
    </div>

    @can('add_clinica')
      <div class="site-action" data-plugin="actionBtn">
        <button style="display:none;" type="button" id="deleteLote" data-action="trash" class="btn-raised btn btn-danger btn-floating animation-slide-bottom">
          <i class="icon md-delete" aria-hidden="true"></i>
        </button>
        <a href="{{ route('pessoasfisicas.adicionar') }}" class="btn-raised btn btn-success btn-floating">
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
      $('#inputEstado').change(function() {
        var id = $(this).val();
        getCities(id);
      });

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

      @if(isset($_GET['estado']))
        $('#inputEstado').val({{ $_GET['estado'] }}).select2("destroy").select2();
        getCities({{ $_GET['estado'] }});
      @endif

      function deleteData (id) {
        $.ajax({
          dataType: 'json',
          url: '{{ URL::asset("pessoas-fisicas/deletar") }}/'+id,
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
              toastr.warning('Ops, houve um erro ao excluir a Pessoa Física.');
            }
          },
          error: function () {
            $('#deleteData').modal('hide');
            toastr.warning('Ops, houve um erro ao excluir a Pessoa Física.');
          }
        });
      }

      function getCities (id) {
        $.ajax({
          dataType: 'json',
          url: '{{ URL::asset("estado") }}/'+id,
          type: 'GET',
          success: function (json) {
            if (json.success) {
              var options = '<option value="">Cidade</option>';
              $.each(json.data, function (key, value) {
                options += '<option value="' + value.id + '">' + value.name + '</option>';
              });
              $('#inputCidade').html(options).select2("destroy").select2();

              @if(isset($_GET['cidade']))
                $('#inputCidade').val({{ $_GET['cidade'] }}).select2("destroy").select2();
              @endif
            };
          }
        });
      }
    })
  </script>
@endsection