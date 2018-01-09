@extends('layout.page')
@section('title', 'Contratos')

@section('css')
  <link rel="stylesheet" href="{{ URL::asset('assets/examples/css/apps/contacts.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/select2/select2.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/bootstrap-table/bootstrap-table.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/examples/css/structure/pagination.css') }}">
@append

@section('content')
  <body class="animsition app-consultores app-contacts page-aside-left">

    @include('layout.nav')
    @include('layout.menu')

   <div class="page bg-white" style="max-width: 100%; margin-top:0;margin-bottom:0">
      @can('add_clinica')
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
      @endcan
      <!-- Contacts Content -->
      <div class="page-main">
        <!-- Contacts Content Header -->
        <div class="page-header">
          <h1 class="page-title">Lista de Contratos</h1>
        </div>
        
        <div id="contactsContent" class="page-content page-content-table">
            <div id="registros" class="page-content">
                <table id="registros" class="table table-striped" data-toggle="table" data-sort-name="id" data-sort-order="asc" data-mobile-responsive="true">
                  <thead>
                    <tr>
                      <th class="text-center" data-field="id" data-sortable="true">#ID</th>
                      <th data-field="clinica" data-sortable="true">Clínica</th>
                      <th data-field="consultor" data-sortable="false">Consultor</th>
                      <th data-field="paciente" data-sortable="false">Paciente</th>
                      
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
                            {{ $registro->clinica->user->name }}
                          </td>
                          <td>                 
                            {{ $registro->consultor->user->name }}
                          </td>
                           <td>                 
                            {{ $registro->paciente->name }}
                          </td>



                          <td>
                            @can('view_contrato')
                              <a style="text-decoration:none" title="Relatório" href="{{ route('contratos.relatorio', $registro->id) }}" class="btn btn-primary"><i class="icon fa-eye"></i> Ver</a>
                            @endcan
                            @can('edit_contrato')
                              <a style="text-decoration:none" title="Editar" href="{{ route('contratos.editar', $registro->id) }}" class="btn btn-success"><i class="icon fa-pencil"></i> Editar</a>
                            @endcan
                            @can('delete_contrato')
                              <button class="btn btn-delete btn-danger waves-effect" data-id="{{ $registro->id }}" data-title="Contrato #{{ $registro->id }}" type="button"><i class="icon fa-trash"></i> Excluir</button>
                            @endcan
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
        <div class="modal-dialog modal-center modal-md">
          <div class="modal-content">
            <form id="form-delete" action="" method="post">
              <input id="id_contrato" type="hidden" name="id" value="">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <i class="icon fa fa-times"></i>
                </button>
              </div>
              <div class="modal-body" style="padding-top:0">
    
                <p class="ng-binding">Olá {{ Auth::user()->name }}, você está prestes a excluir um contrato com várias receitas cadastradas.</p>
                <p>Qual operação deseja fazer?</p>
                

                <span class="radio-custom radio-primary">
                  <input type="radio" checked name="excluir" value="1" class="selectable-item" id="check-1">
                  <label for="check-1">Excluir apenas este contrato (As receitas serão mantidas).</label>
                </span>

                <span class="radio-custom radio-primary">
                  <input type="radio" name="excluir" value="2" class="selectable-item" id="check-2">
                  <label for="check-2">Excluir este contrato e as próximas receitas (As receitas do passado serão mantidas).</label>
                </span>

                <span class="radio-custom radio-primary">
                  <input type="radio" name="excluir" value="3" class="selectable-item" id="check-3">
                  <label for="check-3"> Excluir este contrato com todas as receitas.</label>
                </span>   
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btn-confirm" class="btn btn-danger"><i class="icon fa-trash"></i> Excluir</button>
              </div>
            </form>
          </div>
        </div>
    </div>

      @can('add_contrato')
        <div class="site-action" data-plugin="actionBtn">
          <a href="{{ route('contratos.adicionar') }}" class="btn-raised btn btn-success btn-floating">
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
        
      $('.btn-delete').click(function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        $('#id_contrato').val(id);
        $('#deleteData').modal('show');
      });

      $('#btn-confirm').click(function (e) {
        e.preventDefault();
        var id = $('#id_contrato').val();
        $.ajax({
          dataType: 'json',
          url: '{{ URL::asset("contratos/deletar") }}',
          type: 'POST',
          data: $('#form-delete').serialize(),
          success: function (json) {
            console.log(json);
            if (json.success) {
              $('#deleteData').modal('hide');

              $('#registro-'+id).fadeOut( function () {
                $('#registro-'+id).remove();
              });
                
              toastr.success(json.message);
            }
            else{
              $('#deleteData').modal('hide');
              toastr.warning('Ops, houve um erro ao excluir o contrato.');
            }
          },
          error: function (error) {
            console.log(error);
            $('#deleteData').modal('hide');
            toastr.warning('Ops, houve um erro ao excluir o contrato.');
          }
        });

      })
    })
  </script>
@append
