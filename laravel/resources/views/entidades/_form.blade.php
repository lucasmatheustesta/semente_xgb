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

<div class="row">

  <div class="col-xs-12 col-sm-2"></div>

  <div class="col-xs-12 col-lg-8">
    <div class="panel panel-folha">
      <div class="dobra"></div>
      <div class="panel-body">

        <div class="example-wrap m-lg-0">
          <div class="nav-tabs-animate nav-tabs-horizontal" data-plugin="tabs">
            <ul class="nav nav-tabs nav-tabs-line" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link active" data-toggle="tab" href="#tab1" aria-controls="tab1" role="tab">Dados da Entidade</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" data-toggle="tab" href="#tab2" aria-controls="tab2" role="tab">Endereços</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" data-toggle="tab" href="#tab3" aria-controls="tab3" role="tab">Contatos</a>
              </li>
            </ul>
            <div class="tab-content p-t-20">
              <div class="tab-pane active" id="tab1" role="tabpanel">
                <div class="example mgt0">
                    <div class="row">
                      <div class="col-xs-12 col-sm-8">
                        <div class="form-group {{ $errors->has('nome') ? 'has-danger' : '' }}">
                          <label class="form-control-label" for="inputName">Nome</label>
                          <input type="text" class="form-control" id="inputName" name="nome" placeholder="" value="@if( old('nome') ){{ old('nome') }}@elseif( isset($registro->nome) ){{$registro->nome}}@endif">
                          @if($errors->has('nome'))
                            <small class="text-help">{{ $errors->first('nome') }}</small>
                          @endif
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-4">
                        <div class="form-group {{ $errors->has('sigla') ? 'has-danger' : '' }}">
                          <label class="form-control-label" for="inputSigla">Sigla</label>
                          <input type="text" class="form-control" id="inputSigla" name="sigla" placeholder="" value="@if( old('sigla') ){{ old('sigla') }}@elseif( isset($registro->sigla) ){{$registro->sigla}}@endif">
                          @if($errors->has('sigla'))
                            <small class="text-help">{{ $errors->first('sigla') }}</small>
                          @endif
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-xs-12 col-sm-5">
                        <div class="form-group {{ $errors->has('cnpj') ? 'has-danger' : '' }}">
                          <label class="form-control-label" for="inputCnpj">CNPJ</label>
                          <input type="text" class="form-control" id="inputCnpj" name="cnpj" placeholder="" value="@if( old('cnpj') ){{ old('cnpj') }}@elseif( isset($registro->cnpj) ){{$registro->cnpj}}@endif">
                          @if($errors->has('cnpj'))
                            <small class="text-help">{{ $errors->first('cnpj') }}</small>
                          @endif
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-4">
                        <div class="form-group {{ $errors->has('classificacao_id') ? 'has-danger' : '' }}">
                          <label class="form-control-label" for="inputClassificacao">Classificação</label>
                          <select class="form-control select2-hidden-accessible" data-placeholder="Selecione uma Classificação" data-plugin="select2" tabindex="-1" aria-hidden="true" id="inputClassificacao" name="classificacao_id">
                            <option value="">Selecione uma Classificação</option> 
                            @foreach($classificacoes as $value)
                              @if( old('classificacao_id') == $value->id )
                                <option selected value="{{ $value->id }}">{{ $value->nome }}</option> 
                              @elseif(isset($registro->classificacao_id) and $registro->classificacao_id == $value->id)
                                <option selected value="{{ $value->id }}">{{ $value->nome }}</option> 
                              @else
                                <option value="{{ $value->id }}">{{ $value->nome }}</option> 
                              @endif
                            @endforeach
                          </select>
                          @if($errors->has('classificacao_id'))
                            <small class="text-help">{{ $errors->first('classificacao_id') }}</small>
                          @endif
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-3">
                        <div class="form-group {{ $errors->has('data_fundacao') ? 'has-danger' : '' }}">
                          <label class="form-control-label" for="inputDataFundacao">Data de Fundaçåo</label>
                          <input type="text" class="form-control selectpicker" id="inputDataFundacao" name="data_fundacao" placeholder="" value="@if( old('data_fundacao') ){{ old('data_fundacao') }}@elseif( isset($registro->data_fundacao) ){{$registro->data_fundacao}}@endif">
                          @if($errors->has('data_fundacao'))
                            <small class="text-help">{{ $errors->first('data_fundacao') }}</small>
                          @endif
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-xs-12 col-sm-6">
                        <div class="form-group {{ $errors->has('secretario') ? 'has-danger' : '' }}">
                          <label class="form-control-label" for="inputSecretario">Secretário(a) geral</label>
                          <input type="text" class="form-control" id="inputSecretario" name="secretario" placeholder="" value="@if( old('secretario') ){{ old('secretario') }}@elseif( isset($registro->secretario) ){{$registro->secretario}}@endif">
                          @if($errors->has('secretario'))
                            <small class="text-help">{{ $errors->first('secretario') }}</small>
                          @endif
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-6">
                        <div class="form-group {{ $errors->has('secretaria') ? 'has-danger' : '' }}">
                          <label class="form-control-label" for="inputSecretaria">Secretária</label>
                          <input type="text" class="form-control" id="inputSecretaria" name="secretaria" placeholder="" value="@if( old('secretaria') ){{ old('secretaria') }}@elseif( isset($registro->secretaria) ){{$registro->secretaria}}@endif">
                          @if($errors->has('secretaria'))
                            <small class="text-help">{{ $errors->first('secretaria') }}</small>
                          @endif
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-xs-12 col-sm-8">
                        <div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
                          <label class="form-control-label" for="inputEmail">E-mail</label>
                          <input type="email" class="form-control" id="inputEmail" name="email" placeholder="" value="@if( old('email') ){{ old('email') }}@elseif( isset($registro->email) ){{$registro->email}}@endif">
                          @if($errors->has('email'))
                            <small class="text-help">{{ $errors->first('email') }}</small>
                          @endif
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-4">
                        <div class="form-group {{ $errors->has('website') ? 'has-danger' : '' }}">
                          <label class="form-control-label" for="inputWebsite">Website</label>
                          <input type="url" class="form-control" id="inputWebsite" name="website" placeholder="" value="@if( old('website') ){{ old('website') }}@elseif( isset($registro->website) ){{$registro->website}}@endif">
                          @if($errors->has('website'))
                            <small class="text-help">{{ $errors->first('website') }}</small>
                          @endif
                        </div>
                      </div>
                    </div>                     
                  </div>
              </div>
              <div class="tab-pane" id="tab2" role="tabpanel">
                <div class="example mgt0">
                  @include('_form.enderecos')
                </div>
              </div>
              <div class="tab-pane" id="tab3" role="tabpanel">
                <div class="example mgt0">
                  @include('_form.contatos')
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

{{ csrf_field() }}

@section('plugins')
  <script src="{{ URL::asset('global/vendor/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/select2/select2.full.min.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/matchheight/jquery.matchHeight-min.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/bootstrap-datepicker/bootstrap-datepicker.pt-BR.min.js') }}"></script>
@append

@section('scripts')
  <script src="{{ URL::asset('global/js/Plugin/select2.js') }}"></script>
  <script src="{{ URL::asset('global/js/Plugin/closeable-tabs.js') }}"></script>
  <script src="{{ URL::asset('global/js/Plugin/tabs.js') }}"></script>
  <script src="{{ URL::asset('global/js/Plugin/bootstrap-datepicker.js') }}"></script>
@append

@section('scriptpersonalizado')
  <script type="text/javascript">
    jQuery(document).ready(function ($) {
      $('#inputDataFundacao').datepicker({
        format: "dd/mm/yyyy",
        language: "pt-BR",
        startView: 2,
        calendarWeeks: true,
        autoclose: true
      });
      $("#inputTelefone").mask("(99) 9999-9999?9");
      $("#inputTelefone").on("blur", function() {
          var last = $(this).val().substr( $(this).val().indexOf("-") + 1 );
          if( last.length == 5 ) {
              var move = $(this).val().substr( $(this).val().indexOf("-") + 1, 1 );
              var lastfour = last.substr(1,4);
              var first = $(this).val().substr( 0, 9 );
              $(this).val( first + move + '-' + lastfour );
          }
      })

    })
  </script>
@append