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
                <input type="text" @if( isset($registro->date) and !empty($registro->date)) readonly @endif class="form-control" id="inputData" value="@if( old('date') ){{ old('date') }}@elseif( isset($registro->date) ){{$registro->date}}@endif" name="date" placeholder="Digite apenas números">
                @if( isset($registro->date) and !empty($registro->date))
                <input type="hidden" name="date" value="{{ $registro->date }}">
                @endif
              </div>
              @if($errors->has('date'))
                <small class="text-help">{{ $errors->first('date') }}</small>
              @endif
            </div>
          </div>
        </div>
        <div class="row">
          
          <input type="hidden" name="clinica_id" value="{{ $clinica_id }}">
          <input type="hidden" name="consultor_id" value="{{ $consultor_id }}">

          <div class="col-xs-12">
            <div class="form-group {{ $errors->has('paciente_id') ? 'has-danger' : '' }}">
              <label class="form-control-label" for="inputCidade">Paciente</label>
              <select  name="paciente_id" class="form-control select2-hidden-accessible" data-plugin="select2" tabindex="-1" data-placeholder="Selecione um Paciente" aria-hidden="true"  id="inputPaciente">
                  <option value="">Selecione um Paciente</option> 
                  @foreach($pacientes as $paciente)
                    @if(isset($registro->paciente_id) and $registro->paciente_id == $paciente->id or  isset($id) and $id == $paciente->id)
                      <option selected value="{{ $paciente->id }}">{{ $paciente->name }}</option> 
                    @else
                      <option value="{{ $paciente->id }}">{{ $paciente->name }}</option> 
                    @endif
                  @endforeach
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

      $('.btn-delete').click(function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        $('#adicionarContrato').append('<input type="hidden" name="exclui_servicos[]" value="'+id+'" />');
        $('#registro-'+id).fadeOut( function () {
          $('#registro-'+id).remove();
        });
        // var id = $(this).data('id');
        // $('#id_contrato').val(id);
        // $('#deleteData').modal('show');
      });

      $(document).on("change", ".select2-metodo", function () {
         if($(this).find('.inputMetodo1x').is(':checked')) { 
            $(this).parent().find('.form2').fadeIn();
         }
         if($(this).find('.inputMetodo2x').is(':checked')) { 
            $(this).parent().find('.form2').fadeOut();
          }
      });

      $('#btn_envia').click(function (e) {
        e.preventDefault();
        $('#deleteData').modal('show');
      })

      $("#inputData").mask("99/99/9999");
      $("input.dinheiro").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});


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

      function calculateRow(row) {
          var price = +row.find('input[name^="price"]').val();

      }

      function calculateGrandTotal() {
          var grandTotal = 0;
          $("table.order-list").find('input[name^="price"]').each(function () {
              grandTotal += +$(this).val();
          });
          $("#grandtotal").text(grandTotal.toFixed(2));
      }
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