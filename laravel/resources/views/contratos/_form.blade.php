@section('css')
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/select2/select2.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/bootstrap-datepicker/bootstrap-datepicker.css') }}">
@append

<div class="row">
  @if(count($errors) > 0)
    <div class="col-xs-12">
      <div class="summary-errors alert alert-danger alert-dismissible">
        <button type="button" class="close" aria-label="Close" data-dismiss="alert">
          <span aria-hidden="true">×</span>
        </button>
        <p>Atenção: </p>
        <ul>
          @foreach($errors->all() as $error )
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    </div>
  @endif
</div>

<div class="panel panel-folha">
  <div class="dobra"></div>
    <div class="panel-body">
      <div class="example mgt0">
        <h3 class="example-title">Dados do Contrato</h3>
        <div class="row">
          <div class="col-xs-12 col-sm-3">
            <div class="form-group">
              <label class="form-control-label" for="inputData">Código do Contrato</label>     
              <input disabled type="text" class="form-control" id="inputCode" value="@if( isset($registro->id) ) #{{$registro->id}} @else #{{ $nextId }} @endif" name="code" placeholder="Digite apenas números">
            </div>
          </div>
          <div class="col-xs-12 col-sm-3"></div>
          <div class="col-xs-12 col-sm-3"></div>
          <div class="col-xs-12 col-sm-3">
            <div class="form-group {{ $errors->has('date') ? 'has-danger' : '' }}">
              <label class="form-control-label" for="inputData">Data do Contrato</label>     
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="icon md-calendar" aria-hidden="true"></i>
                </span>
                <input type="text" class="form-control" id="inputData" value="@if( old('date') ){{ old('date') }}@elseif( isset($registro->date) ){{$registro->date}}@endif" name="date" placeholder="Digite apenas números">
              </div>
              @if($errors->has('date'))
                <small class="text-help">{{ $errors->first('date') }}</small>
              @endif
            </div>
          </div>
        </div>
        <div class="row">
          @if(isset($consultor_id) and !empty($consultor_id))
            <input type="hidden" name="consultor_id" value="{{ $consultor_id }}">
          @else
            <div class="col-xs-12 col-sm-4">
              <div class="form-group {{ $errors->has('consultor_id') ? 'has-danger' : '' }}">
                <label class="form-control-label" for="inputConsultor">Consultor</label>
                <select  name="consultor_id" class="form-control select2-hidden-accessible" data-plugin="select2" tabindex="-1" data-placeholder="Selecione um Consultor" aria-hidden="true"  id="inputConsultor">
                  <option value="">Selecione um Consultor</option> 
                  @foreach($consultores as $clinica)
                      @if(isset($registro->clinicas) and count($registro->clinicas) > 0)
                        @foreach($registro->clinicas as $value)
                          @if($value->id == $clinica->id)
                            <option selected value="{{ $clinica->id }}">{{ $clinica->user->name }}</option> 
                          @else
                            <option value="{{ $clinica->id }}">{{ $clinica->user->name }}</option> 
                          @endif
                        @endforeach
                      @else
                        <option value="{{ $clinica->id }}">{{ $clinica->user->name }}</option> 
                      @endif
                    @endforeach
                </select>
                @if($errors->has('consultor_id'))
                  <small class="text-help">{{ $errors->first('consultor_id') }}</small>
                @endif
                @if(isset($registro->consultor_id) and !empty($registro->consultor_id))
                  <input type="hidden" name="consultor_id" value="{{ $registro->consultor_id }}">
                @endif
              </div>
            </div>
          @endif

          @if(isset($type) and $type == 'Consultor')
            <div class="col-xs-12 @if(isset($consultor_id) and !empty($consultor_id)) col-sm-6 @else col-sm-4 @endif">
              <div class="form-group {{ $errors->has('clinica_id') ? 'has-danger' : '' }}">
                <label class="form-control-label" for="inputClinica">Clínica</label>
                <select name="clinica_id" class="form-control select2-hidden-accessible" data-plugin="select2" data-placeholder="Selecione uma Clínica" tabindex="-1" aria-hidden="true"  id="inputClinica">
                  <option value="">Selecione uma Clínica</option> 
                  @foreach($clinicas as $clinica)
                      @if(isset($registro->clinicas) and count($registro->clinicas) > 0)
                        @foreach($registro->clinicas as $value)
                          @if($value->id == $clinica->id)
                            <option selected value="{{ $clinica->id }}">{{ $clinica->user->name }}</option> 
                          @else
                            <option value="{{ $clinica->id }}">{{ $clinica->user->name }}</option> 
                          @endif
                        @endforeach
                      @else
                        <option value="{{ $clinica->id }}">{{ $clinica->user->name }}</option> 
                      @endif
                    @endforeach
                </select>
                @if($errors->has('clinica_id'))
                  <small class="text-help">{{ $errors->first('clinica_id') }}</small>
                @endif
                @if(isset($registro->clinica_id) and !empty($registro->clinica_id))
                  <input type="hidden" name="clinica_id" value="{{ $registro->clinica_id }}">
                @endif
              </div>
            </div>
          @else
            <div class="col-xs-12 @if(isset($consultor_id) and !empty($consultor_id)) col-sm-6 @else col-sm-4 @endif">
              <div class="form-group {{ $errors->has('clinica_id') ? 'has-danger' : '' }}">
                <label class="form-control-label" for="inputClinica">Clínica</label>
                <select name="clinica_id" class="form-control select2-hidden-accessible" data-plugin="select2" data-placeholder="Selecione um Consultor Primeiro" tabindex="-1" aria-hidden="true"  id="inputClinica">
                  <option value="">Selecione um Consultor Primeiro</option> 
                </select>
                @if($errors->has('clinica_id'))
                  <small class="text-help">{{ $errors->first('clinica_id') }}</small>
                @endif
                @if(isset($registro->clinica_id) and !empty($registro->clinica_id))
                  <input type="hidden" name="clinica_id" value="{{ $registro->clinica_id }}">
                @endif
              </div>
            </div>
          @endif

          <div class="col-xs-12 @if(isset($consultor_id) and !empty($consultor_id)) col-sm-6 @else col-sm-4 @endif">
            <div class="form-group {{ $errors->has('paciente_id') ? 'has-danger' : '' }}">
              <label class="form-control-label" for="inputCidade">Paciente</label>
              <select name="paciente_id" class="form-control select2-hidden-accessible" data-placeholder="Selecione uma Clínica Primeiro" data-plugin="select2" tabindex="-1" aria-hidden="true" id="inputPaciente">
                <option value="">Selecione uma Clínica Primeiro</option> 
              </select>
              @if($errors->has('paciente_id'))
                <small class="text-help">{{ $errors->first('paciente_id') }}</small>
              @endif
              @if(isset($registro->paciente_id) and !empty($registro->paciente_id))
                <input type="hidden" name="paciente_id" value="{{ $registro->paciente_id }}">
              @endif
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-xs-12">
            <div class="example">
              <h4 class="example-title mgb20">Serviços</h4>
              <table id="tableServicos" class="table table-bordered order-list">
                <thead>
                    <tr>
                        <td>Serviço</td>
                        <td>Valor da Primeira Parcela</td>
                        <td>Valor da Pasta Ortodôntica</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                  @if(isset($servico_venda) and !empty($servico_venda))
                    <?php $i = 0; ?>
                    @foreach($servico_venda as $value)
                      <tr id="registro-{{ $value->id }}">
                        <td width="50%">
                            <select required class="form-control select2-hidden-accessible" data-plugin="select2" tabindex="-1" data-placeholder="Selecione um Serviço" aria-hidden="true"  id="inputServico"  onchange="verificaTipo(this)" name="servico_id[]">
                             <option value="">Selecione um Serviço</option> 
                              @foreach($servicos as $servico)
                                @if($value->servico_id == $servico->id)
                                  <option selected value="{{ $servico->id }}">{{ $servico->title }}</option> 
                                @else
                                  <option value="{{ $servico->id }}">{{ $servico->title }}</option> 
                                @endif
                              @endforeach
                          </select>
                        </td>

                        <td>
                            <input required type="text" name="valor[]" value="{{ number_format($value->valor, 2, ',', '.') }}"  class="form-control dinheiro"/>
                        </td>
                        <td>
                            <input required type="text" name="pasta[]" value="{{ number_format($value->pasta, 2, ',', '.') }}"  class="form-control dinheiro"/>
                        </td>
                        <td style="width: 66px;">
                          @if(Auth::user()->id == $value->user_id || Auth::user()->id == 1)
                            <button data-id="{{ $value->id }}" class="btn-delete btn btn-md btn-danger">
                              <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </button>
                          @endif
                        </td>
                      </tr>
                      <?php $i++; ?>
                    @endforeach
                  @else
                    <tr>
                      <td width="50%">
                          <select required class="form-control select2-hidden-accessible" data-plugin="select2" tabindex="-1" data-placeholder="Selecione um Serviço" aria-hidden="true"  id="inputServico"  onchange="verificaTipo(this)" name="servico_id[]">
                           <option value="">Selecione um Serviço</option> 
                           @foreach($servicos as $servico)
                              <option value="{{ $servico->id }}">{{ $servico->title }}</option> 
                            @endforeach
                        </select>
                      </td>
                      <td>
                          <input required type="text" name="valor[]"  class="form-control dinheiro"/>
                      </td>
                      <td>
                          <input required type="text" name="pasta[]"  class="form-control dinheiro"/>
                      </td>
                      <td style="width: 66px;">
                        <a class="deleteRow"></a>
                      </td>
                    </tr>
                  @endif
                    
                </tbody>
                <tfoot>
                    <tr>
                      <td colspan="6" style="text-align: left;">
                        <button class="btn btn-default btn-inline" id="addrow"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar Novo Serviço</button>
                      </td>
                    </tr>
                    <tr>
                    </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12">
             <div class="form-group {{ $errors->has('obs') ? 'has-danger' : '' }}">
              <label class="form-control-label" for="inputObs">Observações</label>
              <textarea name="obs" id="inputObs" cols="30" rows="6" class="form-control"></textarea>
              @if($errors->has('obs'))
                <small class="text-help">{{ $errors->first('obs') }}</small>
              @endif
            </div>
          </div>
        </div>

      </div>
    </div>
</div>

<div class="modal fade" id="deleteData" aria-hidden="true" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-center modal-md">
    <div class="modal-content">
        <input id="id_contrato" type="hidden" name="id" value="">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="icon fa fa-times"></i>
          </button>
        </div>
        <div class="modal-body" style="padding-top:0">

          <p class="ng-binding">Olá {{ Auth::user()->name }}, você está prestes a editar um contrato com várias receitas associadas.</p>
          <p>Qual operação deseja fazer?</p>
        
          <span class="radio-custom radio-primary">
            <input type="radio" name="editar" value="1" class="selectable-item" id="check-1">
            <label for="check-1">Editar apenas este contrato (As receitas serão mantidas).</label>
          </span>

          <span class="radio-custom radio-primary">
            <input type="radio" checked name="editar" value="2" class="selectable-item" id="check-2">
            <label for="check-2">Editar este contrato e as próximas receitas (As receitas do passado serão mantidas).</label>
          </span>

          <span class="radio-custom radio-primary">
            <input type="radio" name="editar" value="3" class="selectable-item" id="check-3">
            <label for="check-3"> Editar este contrato com todas as receitas associadas a ele.</label>
          </span>   
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Cancelar</button>
          <button type="submit" id="btn-confirm" class="btn btn-success"><i class="icon fa-check"></i> Continuar</button>
        </div>
    </div>
  </div>
</div> 

@section('plugins')
  <script src="{{ URL::asset('global/vendor/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/select2/select2.full.min.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/bootstrap-datepicker/bootstrap-datepicker.pt-BR.min.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/jquery.maskMoney/jquery.maskMoney.js') }}"></script>
@append

@section('scripts')
  <script src="{{ URL::asset('global/js/Plugin/select2.js') }}"></script>
  <script src="{{ URL::asset('global/js/Plugin/bootstrap-datepicker.js') }}"></script>
@append

@section('scriptpersonalizado')
  <script type="text/javascript">
    jQuery(document).ready(function ($) {
      $('#inputData').datepicker({
        format: "dd/mm/yyyy",
        language: "pt-BR",
        autoclose: true,
        todayHighlight: true
      });

      $(document).on("change", ".select2-metodo", function () {
         if($(this).find('.inputMetodo1x').is(':checked')) { 
            $(this).parent().find('.form2').fadeIn();
         }
         if($(this).find('.inputMetodo2x').is(':checked')) { 
            $(this).parent().find('.form2').fadeOut();
          }
      });

      $('.btn-delete').click(function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        $('#adicionarContrato').append('<input type="hidden" name="exclui_servicos[]" value="'+id+'" />');
        $('#registro-'+id).fadeOut( function () {
          $('#registro-'+id).remove();
        });
      });

      $('#btn_envia').click(function (e) {
        e.preventDefault();
        $('#deleteData').modal('show');
      })

      $("#inputData").mask("99/99/9999");
      $("input.dinheiro").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});

      $('#inputConsultor').change(function() {
        $('#inputClinica').html('').select2("destroy").select2();
        $('#inputPaciente').html('').select2("destroy").select2();
        var id = $(this).val();
        getClinicas(id, false);
      });


      $('#inputClinica').change(function() {
        $('#inputPaciente').html('').select2("destroy").select2();
        var clinica = $(this).val();
        @if(isset($type) and $type == 'Consultor')
          var consultor = {{ $consultor_id }};
        @else
          var consultor = $('#inputConsultor').val();
        @endif
        getPacientes(consultor, clinica, false);
      });

      @if( old('consultor_id') )         
         $('#inputConsultor').val({{ old('consultor_id') }}).select2("destroy").select2();
        getClinicas({{ old('consultor_id') }}, true);
      @elseif( isset($registro->consultor_id) and !empty($registro->consultor_id) )
        $('#inputConsultor').val({{ $registro->consultor_id }}).select2("destroy").select2();
        getClinicas({{ $registro->consultor_id }}, true);
      @endif

      @if( old('clinica_id') )         
        $('#inputClinica').val({{ old('clinica_id') }}).select2("destroy").select2();
        getPacientes({{ old('consultor_id') }}, {{ old('clinica_id') }}, true);
        $('#inputClinica').val({{ old('clinica_id') }}).select2("destroy").select2();
      @elseif( isset($registro->clinica_id) and !empty($registro->clinica_id) )
        $('#inputClinica').val({{ $registro->clinica_id }}).select2("destroy").select2();
        getPacientes({{ $registro->consultor_id }}, {{ $registro->clinica_id }}, true);
        $('#inputClinica').val({{ $registro->clinica_id }}).select2("destroy").select2();
      @endif

      function getClinicas (id, first) {
        $.ajax({
          dataType: 'json',
          url: '{{ URL::asset("consultor") }}/'+id,
          type: 'GET',
          success: function (json) {
            if (json.success) {
              var options = '<option value="">Selecione uma Clínica</option>';
              $.each(json.data, function (key, value) {
                options += '<option value="' + value.id + '">' + value.name + '</option>';
              });
              
              $('#inputClinica').html(options).select2("destroy").select2();
              $('#inputClinica').parent().find('.select2-selection__placeholder').html('Selecione uma Clínica');
              if (first) {
                @if( old('clinica_id') )         
                  $('#inputClinica').val({{ old('clinica_id') }}).select2("destroy").select2();
                @elseif( isset($registro->clinica_id) and !empty($registro->clinica_id) )
                  $('#inputClinica').val({{ $registro->clinica_id }}).select2("destroy").select2();
                @endif
              };
            }
          }
        });
      }

      function getPacientes (consultor, clinica, first) {
        $.ajax({
          dataType: 'json',
          url: '{{ URL::asset("getpacientes") }}/'+consultor+'/'+clinica,
          type: 'GET',
          success: function (json) {
            if (json.success) {
              var options = '<option value="">Selecione um Paciente</option>';
              $.each(json.data, function (key, value) {
                options += '<option value="' + value.id + '">' + value.name + '</option>';
              });
              
              $('#inputPaciente').html(options).select2("destroy").select2();
              $('#inputPaciente').parent().find('.select2-selection__placeholder').html('Selecione um Paciente');
              
              if(first){
                @if( old('paciente_id') )         
                  $('#inputPaciente').val({{ old('paciente_id') }}).select2("destroy").select2();
                @elseif( isset($registro->paciente_id) and !empty($registro->paciente_id) )
                  $('#inputPaciente').val({{ $registro->paciente_id }}).select2("destroy").select2();
                @endif
              }
            }
          }
        });
      }

      var counter = 1;

      $("#addrow").on("click", function (e) {
          e.preventDefault();
          var newRow = $("<tr>");
          var cols = "";

          cols += '<td width="50%">';
          cols += '<select required class="form-control select2-'+counter+' select2-hidden-accessible" tabindex="-1" data-placeholder="Selecione um Serviço" aria-hidden="true"  id="inputServico-'+counter+'" name="servico_id[]" onchange="verificaTipo(this)">';
          cols += '<option value="">Selecione um Serviço</option>';
            @foreach($servicos as $servico)
              cols +='<option value="{{ $servico->id }}">{{ $servico->title }}</option>';
            @endforeach
          cols +='</select>';
          cols +='</td>';

          cols += '<td>';
          cols += '<input required type="text" name="valor[]"  class="form-control  dinheiro-'+counter+'"/>';
          cols += '</td>';
          
          cols += '<td>';
          cols += '<input required type="text" name="pasta[]"  class="form-control  dinheiro-'+counter+'"/>';
          cols += '</td>';


          cols += '<td><button class="ibtnDel btn btn-md btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>';
          
          newRow.append(cols);

          $("table.order-list").append(newRow);
          
          $('.select2-'+counter).select2();
          $('.dinheiro-'+counter).maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});

          counter++;
      });

      $("table.order-list").on("click", ".ibtnDel", function (event) {
          $(this).closest("tr").remove();       
          counter -= 1
      });


    })
    function verificaTipo(id) {
      return false;
        $.ajax({
          dataType: 'json',
          url: '{{ URL::asset("servicos/tipo") }}/'+id.value,
          type: 'GET',
          success: function (json) {
            if (json.type == 1) {
              //$(id).parent().parent().find('.valor_manutencao').removeAttr('disabled');
            }else{
              //$(id).parent().parent().find('.valor_manutencao').attr('disabled', 'disabled').val('');
            }
          }
        });
      }
  </script>
@append