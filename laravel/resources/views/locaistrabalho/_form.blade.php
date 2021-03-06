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
                <a class="nav-link active" data-toggle="tab" href="#tab1" aria-controls="tab1" role="tab">Dados do Local</a>
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
                        <div class="form-group {{ $errors->has('tipo_id') ? 'has-danger' : '' }}">
                          <label class="form-control-label" for="inputTipo">Tipo</label>
                          <select class="form-control select2-hidden-accessible" data-placeholder="Selecione um Tipo" data-plugin="select2" tabindex="-1" aria-hidden="true" id="inputTipo" name="tipo_id">
                            <option value="">Selecione um Tipo</option> 
                            @foreach($tipos_locais as $value)
                              @if( old('tipo_id') == $value->id )
                                <option selected value="{{ $value->id }}">{{ $value->nome }}</option> 
                              @elseif(isset($registro->tipo_id) and $registro->tipo_id == $value->id)
                                <option selected value="{{ $value->id }}">{{ $value->nome }}</option> 
                              @else
                                <option value="{{ $value->id }}">{{ $value->nome }}</option> 
                              @endif
                            @endforeach
                          </select>
                          @if($errors->has('tipo_id'))
                            <small class="text-help">{{ $errors->first('tipo_id') }}</small>
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