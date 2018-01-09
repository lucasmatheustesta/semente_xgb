@extends('layout.page')
@section('title', 'Financeiro')

@section('css')
  <link rel="stylesheet" href="{{ URL::asset('assets/examples/css/apps/contacts.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/select2/select2.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/bootstrap-table/bootstrap-table.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/examples/css/structure/pagination.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/bootstrap-datepicker/bootstrap-datepicker.css') }}">
@append

@section('content')
  <body class="animsition app-receitas app-contacts page-aside-left" style="opacity:0">

    @include('layout.nav')
    @include('layout.menu')

    
      <div class="page bg-white" style="max-width: 100%; margin-top:0;margin-bottom:0">
        <form action="{{ route('financeiro') }}">
        @can('add_consultor')
        <div class="page-aside">
          <div class="page-aside-switch">
            <i class="icon md-chevron-left" aria-hidden="true"></i>
            <i class="icon md-chevron-right" aria-hidden="true"></i>
          </div>
          <div class="page-aside-inner page-aside-scroll">
              <div data-role="container">
                  <div id="busca-aside" data-role="content">
                      <div class="page-aside-section pdt0">
                      @can('add_consultor')
                        <h5 class="page-aside-title">Filtrar por Clínicas</h5>
                        <div class="list-group has-actions">
                          @forelse($clinicas as $clinica)
                            <div class="list-group-item @if(isset($_GET['clinica']) and $_GET['clinica'] == $clinica->id ) active @endif " >
                              <div class="list-content">
                                <button type="submit" name="clinica" @if(isset($_GET['clinica']) and $_GET['clinica'] == $clinica->id ) value="" @else value="{{ $clinica->id }}" @endif  style="display:block;position:relative" class="btn-block list-text">
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
                      @endcan
                    </div>
                </div>
              </div>
          </div>
        </div>
        @endcan
     
          <div class="page-main">
            <div class="page-header">
              <h1 class="page-title">Receitas de 
                @if(isset($_GET['de']) and !empty($_GET['de']))
                  {{ $_GET['de'] }} 
                @else
                  Março
                @endif
                @if(isset($_GET['ate']) and !empty($_GET['ate']))
                  até {{ $_GET['ate'] }} 
                @endif
              </h1>
            </div>

            <div id="contactsContent" class="page-content page-content-table">
              <div class="page-content-actions">
                <div id="filter" class="form-inline">
                    <input type="hidden" name="busca" value="1" />
                    <div class="input-daterange">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="icon md-calendar" aria-hidden="true"></i>
                          </span>
                          <input type="text" class="form-control" name="de" value="@if(isset($_GET['de']) and !empty($_GET['de'])){{ $_GET['de'] }}@endif" />
                        </div>
                        <div class="input-group">
                          <span class="input-group-addon">Até</span>
                          <input type="text" class="form-control" name="ate" value="@if(isset($_GET['ate']) and !empty($_GET['ate'])){{ $_GET['ate'] }}@endif" />
                        </div>
                      </div>
                     <div class="form-group pull-left">
                       <button type="submit" class="btn btn-primary"><i class="fa fa-filter" aria-hidden="true"></i> Filtrar</button>
                       @if((isset($_GET['de']) and !empty($_GET['de'])) or (isset($_GET['ate']) and !empty($_GET['ate'])) or (isset($_GET['consultor']) and !empty($_GET['consultor'])) or (isset($_GET['clinica']) and !empty($_GET['clinica'])) )
                        <a style="margin-left:10px;" href="{{ route('financeiro') }}" title="Limpar" class="btn btn-default">Limpar</a>
                       @endif
                     </div>
                </div>
              </div>
              <div id="registros" class="page-content" style="padding-bottom:0px">
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
                        @can('edit_clinica')
                          <th data-field="name" data-sortable="true">Nome</th>
                        @endcan
                        <th data-field="descricao" data-sortable="true">Descrição</th>
                        <th data-field="valor" data-sortable="true">Valor</th>
                        <th data-field="cobranca" data-sortable="true">Data p/ Pagto</th>
                        <th data-field="status" data-sortable="true">Status</th>
                        @can('edit_clinica', 'delete_clinica' )
                          <th class="text-center" data-field="acoes" data-sortable="false">Ações</th>
                        @endcan
                      </tr>
                    </thead>
                    <tbody>
                      @if(isset($registros) and !empty($registros) and count($registros) > 0)
                        @foreach($registros as $registro)
                          <tr id="registro-{{ $registro->id }}">
                            <td class="pre-cell">
                              <span class="checkbox-custom checkbox-primary checkbox-lg">
                                <input type="checkbox" name="id[]" value="{{ $registro->id }}" class="selectable-item" id="check-registro-{{ $registro->id }}">
                                <label for="check-registro-{{ $registro->id }}"></label>
                              </span>
                            </td>
                            <td class="text-center cell-30">
                              #{{ $registro->id }}
                            </td>
                            @can('edit_clinica')
                              <td width="35%">
                                  <a class="avatar" title="{!! $registro->user->name !!}" href="{{ route('clinicas.editar', $registro->id) }}">
                                    @if(isset($registro->user->image) and !empty($registro->user->image)) 
                                      <img class="img-fluid" src="{{ URL::asset($registro->user->image) }}" alt="{!! $registro->user->name !!}">
                                    @else
                                      <img class="img-fluid img-40" src="{{ URL::asset('img/users/profile.jpg') }}" alt="{!! $registro->user->name !!}">
                                    @endif
                                  </a>                      
                                {{ $registro->user->name }}
                              </td>
                            @endcan

                            <td>
                              Contrato #{{ $registro->venda->id }} <br>Paciente {{ $registro->venda->paciente->name }}
                            </td>

                            <td>R$ {{ number_format($registro->valor, 2, ',', '.') }}</td>

                            <td>{{ Carbon\Carbon::parse($registro->data_cobranca)->format('d/m/Y') }}</td>
                            <td id="status-{{ $registro->id }}">
                              @if($registro->status == '0')
                                  <span class="tag tag-warning">Aguardando</span>
                                @else
                                  <span class="tag tag-info">Pago</span>
                                @endif
                            </td>
                            
                            @can('edit_receita' )
                              <td>
                                @if($registro->status == '0')
                                  <a style="text-decoration:none" id="pago-{{ $registro->id }}" style="text-decoration:none" title="" href="#" data-id="{{ $registro->id }}" class="btn btn-pago btn-primary"><i class="icon fa-check"></i> Receber</a><br>
                                @else
                                  <a id="pago-{{ $registro->id }}" style="text-decoration:none" title="" href="#" data-id="{{ $registro->id }}" class="btn btn-info"><i class="icon fa-check"></i> Pago</a><br>
                                @endif

                                  <a style="text-decoration:none; margin-top: 5px;" title="Editar Receita #{!! $registro->id !!}" href="{{ route('receitas.editar', $registro->id) }}" class="btn btn-success"><i class="icon fa-pencil"></i> Editar</a>
                              </td>
                            @endcan
                          </tr>
                        @endforeach
                      @endif
                    </tbody>
                  </table>
                  @if(isset($registros) and !empty($registros) and count($registros) > 0)
                    <div class="text-center mgt30">
                      {!! $registros->appends(Request::capture()->except('page'))->render() !!}
                    </div>
                  @endif


                  <div class="row">
                    <div class="col-md-6 col-xs-12">
                      <div class="card card-block p-30 bg-warning" style="margin-bottom:0">
                        <div class="card-watermark darker font-size-60 m-15"><i class="icon fa-money" aria-hidden="true"></i></div>
                        <div class="counter counter-md counter-inverse text-xs-left">
                          <div class="counter-number-group" style="line-height: 35px;">
                            <span class="counter-number" style="font-size:20px;">Aguardando</span><br>
                            <span class="counter-number-related text-capitalize">R$ {{ number_format($aguardando->sum, 2, ',', '.') }}</span>
                          </div>
                          @if(isset($_GET['de']) and !empty($_GET['de']) and isset($_GET['ate']) and !empty($_GET['ate']))
                            De {{ $_GET['de'] }} até {{ $_GET['ate'] }}
                          @else
                            <div class="counter-label text-capitalize">No Total</div>
                          @endif
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6 col-xs-12">
                      <div class="card card-block p-30 bg-info" style="margin-bottom:0">
                        <div class="card-watermark darker font-size-60 m-15"><i class="icon fa-money" aria-hidden="true"></i></div>
                        <div class="counter counter-md counter-inverse text-xs-left">
                          <div class="counter-number-group" style="line-height: 35px;">
                            <span class="counter-number" style="font-size:20px;">Pago</span><br>
                            <span class="counter-number-related text-capitalize">R$ {{ number_format($pago->sum, 2, ',', '.') }}</span>
                          </div>
                          @if(isset($_GET['de']) and !empty($_GET['de']) and isset($_GET['ate']) and !empty($_GET['ate']))
                            De {{ $_GET['de'] }} até {{ $_GET['ate'] }}
                          @else
                            <div class="counter-label text-capitalize">No Total</div>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
        </div>
        </form>
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
            <p style="margin-bottom:0">Tem certeza que deseja excluir a receita <b id="nameData"></b>?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Não</button>
            <button type="button" id="btn-confirm" data-id="" class="btn btn-success">Sim</button>
          </div>
        </div>
      </div>
    </div>
  </body>
@endsection

@section('plugins')
  <script src="{{ URL::asset('global/vendor/bootstrap-table/bootstrap-table.min.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/bootstrap-table/extensions/mobile/bootstrap-table-mobile.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/bootstrap-datepicker/bootstrap-datepicker.pt-BR.min.js') }}"></script>
@append

@section('scripts')
  <script src="{{ URL::asset('global/js/Plugin/bootstrap-datepicker.js') }}"></script>
@append

@section('scriptpersonalizado')
  <script type="text/javascript">
    jQuery(document).ready(function ($) {
      $('.btn-pago').click(function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        setPago(id);
      })
      $('.input-daterange').datepicker({
          format: "dd/mm/yyyy",
          startDate: "",
          endDate: "",
          language: "pt-BR",
          autoclose: true
      });

      function setPago(id) {
        $.ajax({
          dataType: 'json',
          url: '{{ URL::asset("receitas/pago") }}/'+id,
          type: 'GET',
          success: function (json) {
            console.log(json);
            if (json.success) {
              $('#status-'+id).html('<span class="tag tag-info">Pago</span>');
              $('#pago-'+id).addClass('btn-info').removeClass('btn-pago, btn-primary').html('<i class="icon fa-check"></i> Pago');
            };
          }
        });
      }
    })
  </script>
@append