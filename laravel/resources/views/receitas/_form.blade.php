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
      <h3 class="example-title">Dados da Receita</h3>
      <div class="row">
        <div class="col-xs-12 col-sm-8">
          <div class="form-group {{ $errors->has('description') ? 'has-danger' : '' }}">
            <label class="form-control-label" for="inputDescription">Descrição</label>
            <input type="text" class="form-control" id="inputDescription" name="description" placeholder="Ex. Consulta de Emergência" value="@if( old('description') ){{ old('description') }}@elseif( isset($registro->description) ){{$registro->description}}@endif">
            @if($errors->has('description'))
              <small class="text-help">{{ $errors->first('description') }}</small>
            @endif
          </div>
        </div>
        <div class="col-xs-12 col-sm-4">
          <div class="form-group {{ $errors->has('valor') ? 'has-danger' : '' }}">
            <label class="form-control-label" for="inputValor">Valor</label>
            <input required type="text" class="form-control dinheiro" id="inputValor" name="valor" placeholder="Digite apenas números" value="@if( old('valor') ){{ old('valor') }}@elseif( isset($registro->valor) ){{ number_format($registro->valor, 2, ',', '.') }}@endif" />
            @if($errors->has('valor'))
              <small class="text-help">{{ $errors->first('valor') }}</small>
            @endif
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12 col-sm-4">
          <div class="form-group {{ $errors->has('status') ? 'has-danger' : '' }}">
            <label class="form-control-label" for="inputStatus">Status</label>
            <select required class="form-control select2-hidden-accessible" data-plugin="select2" tabindex="-1" aria-hidden="true" id="inputStatus" name="status">
              <option value="0">Aguardando</option> 
              <option value="1">Pago</option> 
            </select>
            @if($errors->has('status'))
            <small class="text-help">{{ $errors->first('status') }}</small>
            @endif
          </div>
        </div>

        <div class="col-xs-12 col-sm-4">
          <div class="form-group {{ $errors->has('user_id') ? 'has-danger' : '' }}">
            <label class="form-control-label" for="inputUser">Usuário</label>
            <select required class="form-control select2-hidden-accessible" data-placeholder="Selecione um Usuário" data-plugin="select2" tabindex="-1" aria-hidden="true" id="inputUser" name="user_id">
              <option value="">Selecione um Usuário</option> 
              @foreach($users as $user)
                @if( old('user_id') == $user->id )
                  <option selected value="{{ $user->id }}">{{ $user->name }}</option> 
                @elseif(isset($registro->user_id) and $registro->user_id == $user->id)
                  <option selected value="{{ $user->id }}">{{ $user->name }}</option> 
                @else
                  <option value="{{ $user->id }}">{{ $user->name }}</option> 
                @endif
              @endforeach
            </select>
            @if($errors->has('user'))
            <small class="text-help">{{ $errors->first('user') }}</small>
            @endif
          </div>
        </div>

        <div class="col-xs-12 col-sm-4">
          <div class="form-group {{ $errors->has('data_cobranca') ? 'has-danger' : '' }}">
            <label class="form-control-label" for="inputData">Data de Pagamento</label>
            <input required type="text" class="form-control" id="inputData" name="data_cobranca" placeholder="Ex. Consulta de Emergência" value="@if( old('data_cobranca') ){{ old('data_cobranca') }}@elseif( isset($registro->data_cobranca) ){{$registro->data_cobranca}}@endif">
            @if($errors->has('data_cobranca'))
              <small class="text-help">{{ $errors->first('data_cobranca') }}</small>
            @endif
          </div>
        </div>
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
        $("#inputData").mask("99/99/9999");

        $(".dinheiro").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
      
      @if( old('status') )         
         $('#inputStatus').val({{ old('consultor_id') }}).select2("destroy").select2();
      @elseif( isset($registro->status) and !empty($registro->status) )
        $('#inputStatus').val({{ $registro->status }}).select2("destroy").select2();
      @endif
    })
  </script>
@append