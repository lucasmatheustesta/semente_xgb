@extends('layout.page')
@section('title', 'Consultores')

@section('css')
  <link rel="stylesheet" href="{{ URL::asset('assets/examples/css/apps/contacts.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/select2/select2.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/bootstrap-table/bootstrap-table.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/examples/css/structure/pagination.css') }}">
@endsection

@section('content')
<body class="animsition page-aside-left">
  
  @include('layout.nav')
  @include('layout.menu')

 <div class="page bg-white" style="max-width: 100%; margin-top:0;margin-bottom:0">
    <div class="page-aside">
      <div class="page-aside-switch">
        <i class="icon md-chevron-left" aria-hidden="true"></i>
        <i class="icon md-chevron-right" aria-hidden="true"></i>
      </div>
      <div class="page-aside-inner page-aside-scroll">
        <div data-role="container">
            <div data-role="content">
              <form id="busca-aside" action="{{ route('consultores') }}">
                <div class="page-aside-section pdt0">
                <h5 class="page-aside-title">Filtrar por Clínicas</h5>
                <div class="list-group has-actions">
                  @forelse($clinicas as $clinica)
                    <div class="list-group-item @if(isset($_GET['clinica']) and $_GET['clinica'] == $clinica->id ) active @endif " >
                      <div class="list-content">
                        <button type="submit" name="clinica" @if(isset($_GET['clinica']) and $_GET['clinica'] == $clinica->id ) value="" @else value="{{ $clinica->id }}" @endif  style="display:block;position:relative;" class="btn-block list-text">
                          <span style="border: 1px solid #CCC;" class="avatar" href="javascript:void(0)">
                            @if(isset($clinica->user->image) and !empty($clinica->user->image)) 
                              <img class="img-fluid" src="{{ URL::asset($clinica->user->image) }}" alt="{!! $clinica->user->name !!}">
                            @else
                              <img class="img-fluid img-40" src="{{ URL::asset('img/users/profile.jpg') }}" alt="{!! $clinica->user->name !!}">
                            @endif
                          </span>
                          <span class="span-absolute">{{ $clinica->user->name }}</span>
                        </button>
                      </div>
                    </div>
                  @empty
                    <div class="list-group-item">
                      <div class="list-content">
                        <p>Nenhuma clínica encontrada</p>
                      </div>
                    </div>
                  @endforelse
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="page-main">
      <div class="page-header">
        <h1 class="page-title">Lista de Consultores</h1>
      </div>
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
                    <a style="margin-left:10px;" href="{{ route('consultores') }}" title="Limpar" class="btn btn-default">Limpar</a>
                   @endif
                 </div>
            </form>
            <div class="pull-sm-right">
              <form action="{{ route('consultores') }}" name="search" id="busca">
                <div class="input-search input-search-dark">
                  <i class="input-search-icon md-search" aria-hidden="true"></i>
                  <input type="text" class="form-control" name="query" value="{{ isset($_GET['query']) ? $_GET['query'] : '' }}" placeholder="Buscar Consultor">
                </div>
              </form>
            </div>
          </div>

          <div id="registros" class="page-content">
              <table id="registros" class="table table-striped" data-toggle="table" data-sort-name="id" data-sort-order="asc" data-mobile-responsive="true">
                <thead>
                  <tr>
                    <th class="pre-cell">
                      <span class="checkbox-custom checkbox-primary checkbox-lg">
                        <input type="checkbox" class="contacts-checkbox selectable-all" id="select_all">
                        <label for="select_all"></label>
                      </span>
                    </th>
                    <th class="text-center" data-field="id" data-sortable="true">#ID</th>
                    <th data-field="name" data-sortable="true">Consultor</th>
                    <th data-field="tel" data-sortable="false">Telefone</th>
                    <th data-field="clinica" data-sortable="true">Clínicas</th>
                    <th class="text-center" data-field="acoes" data-sortable="false">Ações</th>
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
                          <a class="avatar" title="{!! $registro->user->name !!}" href="{{ route('consultores.editar', $registro->id) }}">
                            @if(isset($registro->user->image) and !empty($registro->user->image)) 
                              <img class="img-fluid" src="{{ URL::asset($registro->user->image) }}" alt="{!! $registro->user->name !!}">
                            @else
                              <img class="img-fluid img-40" src="{{ URL::asset('img/users/profile.jpg') }}" alt="{!! $registro->user->name !!}">
                            @endif
                          </a>                      
                        {{ $registro->user->name }}
                      </td>

                      <td>{{ $registro->phone }}</td>

                      <td>
                        @foreach($registro->clinicas as $key => $clinica)
                          @if($key == count($registro->clinicas) - 1)
                            {{ $clinica->user->name }}
                          @else
                            {{ $clinica->user->name }}, 
                          @endif
                        @endforeach
                      </td>
                      
                      <td>
                        <a style="text-decoration:none" title="Editar {!! $registro->user->name !!}" href="{{ route('consultores.editar', $registro->id) }}" class="btn btn-success"><i class="icon fa-pencil"></i> Editar</a>
                        <button class="btn btn-delete btn-danger waves-effect" data-id="{{ $registro->id }}" data-title="{!! $registro->user->name !!}" type="button"><i class="icon fa-trash"></i> Excluir</button>
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
            <p style="margin-bottom:0">Tem certeza que deseja excluir o consultor <b id="nameData"></b>?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Não</button>
            <button type="button" id="btn-confirm" data-id="" class="btn btn-success">Sim</button>
          </div>
        </div>
      </div>
  </div>

  @can('add_consultor')
    <div class="site-action" data-plugin="actionBtn">
      <button style="display:none;" type="button" id="deleteLote" data-action="trash" class="btn-raised btn btn-danger btn-floating animation-slide-bottom">
        <i class="icon md-delete" aria-hidden="true"></i>
      </button>
      <a href="{{ route('consultores.adicionar') }}" class="btn-raised btn btn-success btn-floating">
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
@append

@section('scripts')
  <script src="{{ URL::asset('global/js/Plugin/select2.js') }}"></script>
@append

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
          url: '{{ URL::asset("consultores/deletar") }}/'+id,
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
              toastr.warning('Ops, houve um erro ao excluir o consultor.');
            }
          },
          error: function () {
            $('#deleteData').modal('hide');
            toastr.warning('Ops, houve um erro ao excluir o consultor.');
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
@append