@extends('layout.page')
@section('title', 'Escolas')

@section('css')
  <link rel="stylesheet" href="{{ URL::asset('assets/examples/css/apps/contacts.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/bootstrap-table/bootstrap-table.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/examples/css/structure/pagination.css') }}">
@endsection

@section('content')
  <body class="animsition app-contacts" style="opacity:0">

    @include('layout.nav')
    @include('layout.menu')

    <div class="page" style="max-width: 100%; margin-top:0;margin-bottom:0">

      <div class="page-header">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">Home</a>
          </li>
          <li class="breadcrumb-item active">@yield('title')</li>
        </ol>
        <h1 class="page-title">@yield('title')</h1>
        <a href="{{ route('schools.adicionar') }}" class="btn btn-success btn-lg"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar Escola</a>
      </div>


      <!-- Contacts Content -->
      <div class="page-main">
        <!-- Contacts Content -->
        <div id="contactsContent" class="page-content page-content-table">

         <div class="page-content-actions">

           <div class="row">
             <div class="col-xs-12 col-sm-3">
               <form action="{{ route('schools') }}" name="search" id="busca">
                 <div class="input-search">
                   <button type="submit" class="input-search-btn"><i class="icon md-search" aria-hidden="true"></i></button>
                   <input type="text" class="form-control" name="" placeholder="Buscar Escola">
                 </div>
               </form>
             </div>
             <div class="col-xs-12 col-sm-3"></div>
           </div>
          </div>

          <div class="page-content pdt20">
            <div class="panel">
              <div id="registros" class="panel-body">
                <table id="registros" class="table table-hover" data-toggle="table" data-sort-name="id" data-sort-order="asc" data-mobile-responsive="true">
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
                    <th data-field="email" data-sortable="false">E-mail</th>
                    <th data-field="endereco" data-sortable="false">Endereço</th>
                    <th data-field="code" data-sortable="false">Código</th>
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
                      <td>
                        <a class="avatar" title="{!! $registro->name !!}" href="{{ route('schools.editar', $registro->id) }}">
                          @if(isset($registro->logotype) and !empty($registro->logotype))
                            <img class="img-fluid" src="{{ URL::asset('img/users/profile.jpg') }}" alt="{!! $registro->name !!}">
                          @else
                            <img class="img-fluid img-40" src="{{ URL::asset('img/users/profile.jpg') }}" alt="{!! $registro->name !!}">
                          @endif
                        </a>
                        <span>{{ $registro->name }}</span>
                      </td>

                      <td>{{ $registro->email }}</td>

                      <td>{{ $registro->address }}</td>

                      <td>{{ $registro->student_code }}</td>

                      <td>
                        <a title="Editar {!! $registro->name !!}" href="{{ route('schools.editar', $registro->id) }}" class="btn btn-success"><i class="icon fa fa-pencil"></i> Editar</a>
                        <button class="btn btn-delete btn-danger waves-effect" data-id="{{ $registro->id }}" data-title="{!! $registro->name !!}" type="button"><i class="icon fa fa-trash"></i> Excluir</button>
                      </td>

                    </tr>
                  @endforeach
                  </tbody>
                </table>
                <div class="text-center mgt20">
                  {!! $registros->appends(Request::capture()->except('page'))->render() !!}
                </div>
              </div>
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
            <p style="margin-bottom:0">Tem certeza que deseja excluir a escola <b id="nameData"></b>?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Não</button>
            <button type="button" id="btn-confirm" data-id="" class="btn btn-success">Sim</button>
          </div>
        </div>
      </div>
    </div>

    <div class="site-action" data-plugin="actionBtn">
      <button style="display:none;" type="button" id="deleteLote" data-action="trash" class="btn-raised btn btn-danger btn-floating animation-slide-bottom">
        <i class="icon md-delete" aria-hidden="true"></i>
      </button>
    </div>

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
          url: '{{ URL::asset("escolas/deletar") }}/'+id,
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
              toastr.warning('Ops, houve um erro ao excluir a escola.');
            }
          },
          error: function () {
            $('#deleteData').modal('hide');
            toastr.warning('Ops, houve um erro ao excluir a escola.');
          }
        });
      }
    })
  </script>
@endsection