<style>
  .fa-loader{
    position: absolute;
    bottom: 11px;
    right: 7px;
    font-size: 18px;
  }
  .select2-container{
    width: 100% !important;
  }
</style>

<div class="col-xs-12 col-sm-2"></div>
<div class="col-xs-12 col-sm-8">
  <div id="enderecos">
    <div id="endereco-0" class="bloco">
      
      <div class="row">
        <div class="col-xs-12 col-sm-12">
          <div class="form-group" style="position: relative;">
            <label class="form-control-label" for="inputCep-0">CEP</label>
            <input type="text" class="form-control inputcep" id="inputCep-0" name="enderecos[cep][]" value="@if( old('bairro_r') ){{ old('bairro_r') }}@elseif( isset($registro->bairro_r) ){{$registro->bairro_r}}@endif">
          </div>
        </div>

      </div>

      <div class="row">

        <div class="col-xs-12 col-sm-3">
          <div class="form-group">
            <label class="form-control-label" for="inputTipoLogradouro-0">Tipo Logradouro</label>
            <select class="form-control select2-hidden-accessible" data-placeholder="Tipo" data-plugin="select2" id="inputTipoLogradouro-0" name="enderecos[tipo_id][]">
              <option value="">Tipo Logradouro</option> 
              @foreach($tipos as $value)
                @if( old('logradouro_id') == $value->id )
                  <option selected value="{{ $value->id }}">{{ $value->nome }}</option> 
                @elseif(isset($registro->tipo_id) and $registro->tipo_id == $value->id)
                  <option selected value="{{ $value->id }}">{{ $value->nome }}</option> 
                @else
                  <option value="{{ $value->id }}">{{ $value->nome }}</option> 
                @endif
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-xs-12 col-sm-7">
          <div class="form-group">
            <label class="form-control-label" for="inputEndereco-0">Endereço</label>
            <input type="text" class="form-control" id="inputEndereco-0" value="@if( old('address_r') ){{ old('address_r') }}@elseif( isset($registro->address_r) ){{$registro->address_r}}@endif" name="enderecos[endereco][]">
          </div>
        </div>

        <div class="col-xs-12 col-sm-2">
          <div class="form-group">
            <label class="form-control-label" for="inputNumero-0">Numero</label>
            <input type="text" class="form-control" id="inputNumero-0" value="@if( old('address_r') ){{ old('address_r') }}@elseif( isset($registro->address_r) ){{$registro->address_r}}@endif" name="enderecos[numero][]">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12 col-sm-4">
          <div class="form-group">
            <label class="form-control-label" for="inputPais-0">País</label>
            <select class="form-control inputpais select2-hidden-accessible" data-placeholder="País" data-plugin="select2" id="inputPais-0" name="enderecos[pais_id][]">
              <option value="">País</option> 
              @foreach($paises as $value)
                @if( old('pais_id') == $value->id )
                  <option selected value="{{ $value->id }}">{{ $value->nome }}</option> 
                @elseif(isset($registro->pais_id) and $registro->pais_id == $value->id)
                  <option selected value="{{ $value->id }}">{{ $value->nome }}</option> 
                @elseif(!isset($registro->pais_id) and !old('pais_id') and $value->id == 1)
                  <option selected value="{{ $value->id }}">{{ $value->nome }}</option> 
                @else
                  <option value="{{ $value->id }}">{{ $value->nome }}</option> 
                @endif
              @endforeach
            </select>
          </div>
        </div>

        <div class="type_endereco col-xs-12 col-sm-8">
          <div class="col-xs-12 col-sm-6">
            <div class="form-group">
              <label class="form-control-label" for="inputEstado-0">Estado</label>
              <select class="form-control inputestado select2-hidden-accessible" data-nextfield='inputCidade-0' data-placeholder="Estado" data-plugin="select2" tabindex="-1" aria-hidden="true" id="inputEstado-0" name="enderecos[estador_id][]">
                <option value="">Selecione o Estado</option> 
                @foreach($estados as $estado)
                  @if( old('estador_id') == $estado->id )
                    <option selected value="{{ $estado->id }}">{{ $estado->name }}</option> 
                  @elseif(isset($registro->estador_id) and $registro->estador_id == $estado->id)
                    <option selected value="{{ $estado->id }}">{{ $estado->name }}</option> 
                  @else
                    <option value="{{ $estado->id }}">{{ $estado->name }}</option> 
                  @endif
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6">
            <div class="form-group">
              <label class="form-control-label" for="inputCidade-0">Cidade</label>
              <select class="form-control inputcidade select2-hidden-accessible" data-placeholder="Escolha um Estado Primeiro" data-plugin="select2" id="inputCidade-0" name="enderecos[cidade_id][]">
                <option value="">Escolha um Estado Primeiro</option> 
              </select>
            </div>
          </div>
          <div class="col-xs-12 col-sm-12" style="position: absolute;top: 0; right: 0; z-index: 9;display: none;">
            <div class="form-group {{ $errors->has('address_r') ? 'has-danger' : '' }}">
              <label class="form-control-label" for="inputLocalidade-0">Localidade</label>
              <input type="text" class="form-control" id="inputLocalidade-0" value="@if( old('address_r') ){{ old('address_r') }}@elseif( isset($registro->address_r) ){{$registro->address_r}}@endif" name="enderecos[localidade][]">
              @if($errors->has('address_r'))
                <small class="text-help">{{ $errors->first('address_r') }}</small>
              @endif
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12 col-sm-4">
          <div class="form-group">
            <label class="form-control-label" for="inputBairro-0">Bairro</label>
            <input type="text" class="form-control" id="inputBairro-0" name="enderecos[bairro][]" value="@if( old('bairro_r') ){{ old('bairro_r') }}@elseif( isset($registro->bairro_r) ){{$registro->bairro_r}}@endif">
          </div>
        </div>
        <div class="col-xs-12 col-sm-8">
            <div class="form-group">
              <label class="form-control-label" for="inputComplemento-0">Complemento</label>
              <input type="text" class="form-control" id="inputComplemento-0" name="enderecos[complemento][]" value="@if( old('bairro_r') ){{ old('bairro_r') }}@elseif( isset($registro->bairro_r) ){{$registro->bairro_r}}@endif">
            </div>
        </div>
      </div>
      
    </div>
  </div>
</div>
<div class="text-right">
  <button id="add-endereco" style="margin-right: 90px;" class="btn btn-info btn-inline"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar Endereço</button>
</div>

@section('scriptpersonalizado')
  <script type="text/javascript">
    jQuery(document).ready(function ($) {

      $("#inputTelefone").mask("(99) 9999-9999?9");
      //$(".inputcep").mask("99.999-999");
      $("#inputTelefone").on("blur", function() {
          var last = $(this).val().substr( $(this).val().indexOf("-") + 1 );
          if( last.length == 5 ) {
              var move = $(this).val().substr( $(this).val().indexOf("-") + 1, 1 );
              var lastfour = last.substr(1,4);
              var first = $(this).val().substr( 0, 9 );
              $(this).val( first + move + '-' + lastfour );
          }
      })


      $('.inputestado').change(function() {
        var id = $(this).val();
        var nextfield = $(this).data('nextfield');
        getCities(id, nextfield);
      });

      $('.inputpais').change(function() {
        var id = $(this).val();
        if (id != '1') {
          $(this).parent().parent().parent().find('.col-sm-6').fadeOut();
          $(this).parent().parent().parent().find('.col-sm-12').fadeIn();
        }else{
          $(this).parent().parent().parent().find('.col-sm-6').fadeIn();
          $(this).parent().parent().parent().find('.col-sm-12').fadeOut();
        }
      });

      $(".inputcep").keyup(function(e){
         console.log($(this).val().length);
          if($.trim($(this).val()) != "" && $.trim($(this).val().length) > 10){
            $(this).parent().append('<i style="display:none;" class="fa fa-loader fa-circle-o-notch fa-spin fa-fw"></i>');
              $(this).parent().find('.fa-loader').fadeIn();

              $.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$(this).val(), function(){
                  
                  if(resultadoCEP["resultado"]){
                    console.log(resultadoCEP["resultado"]);
                    setTimeout(function () {
                      $("#input_cep").parent().find('.fa-loader').fadeOut().remove();

                      if (unescape(resultadoCEP["logradouro"]) != "") {
                        $("#input_logradouro").val(unescape(resultadoCEP["tipo_logradouro"])+": "+unescape(resultadoCEP["logradouro"])).attr('readonly', 'readonly');
                      };

                      if (unescape(resultadoCEP["bairro"]) != "") {
                        $("#input_bairro").val(unescape(resultadoCEP["bairro"])).attr('readonly', 'readonly');
                      };

                      if (unescape(resultadoCEP["cidade"]) != "") {
                        $("#input_cidade").val(unescape(resultadoCEP["cidade"])).attr('readonly', 'readonly');
                      };

                      if (unescape(resultadoCEP["uf"]) != "") {
                        $("#input_uf").val(unescape(resultadoCEP["uf"])).attr('readonly', 'readonly');
                      };
              }, 1000);
                      
                  }else{
                    $("#input_cep").parent().find('.fa-loader').fadeOut();
                    setTimeout(function () {
                  $("#input_cep").parent().find('.fa-loader').remove();
              }, 1000);
                  }

              });             
          }
      });

      @if( old('estado_id') )         
        $('#inputEstado').val({{ old('estado_id') }}).select2("destroy").select2();
        getCities({{ old('estado_id') }});
      @elseif( isset($registro->estado_id) and !empty($registro->estado_id) )
        $('#inputEstado').val({{ $registro->estado_id }}).select2("destroy").select2();
        getCities({{ $registro->estado_id }});
      @endif

      function getCities (id, nextfield) {
        $.ajax({
          dataType: 'json',
          url: '{{ URL::asset("estado") }}/'+id,
          type: 'GET',
          success: function (json) {
            if (json.success) {
              var options = '';
              $.each(json.data, function (key, value) {
                options += '<option value="' + value.id + '">' + value.name + '</option>';
              });

              $('#'+nextfield).html(options).select2("destroy").select2();

              @if( old('cidade_id') )         
                $('#'+nextfield).val({{ old('cidade_id') }}).select2("destroy").select2();
              @elseif( isset($registro->cidade_id) and !empty($registro->cidade_id) )
                $('#'+nextfield).val({{ $registro->cidade_id }}).select2("destroy").select2();
              @endif
            };
          }
        });
      }

$(".select").select2();

      var c = 1;
      $("#add-endereco").on("click", function (e) {
          e.preventDefault();

          var cols = "";

          cols += '<div id="endereco-'+c+'" class="bloco">';
          cols += '  <div class="row">';
          cols += '    <div class="col-xs-12 col-sm-12">';
          cols += '      <div class="form-group" style="position: relative;">';
          cols += '        <label class="form-control-label" for="inputCep-'+c+'">CEP</label>';
          cols += '        <input type="text" class="form-control inputcep" id="inputCep-'+c+'" name="enderecos[cep][]" value="">';
          cols += '      </div>';
          cols += '    </div>';
          cols += '  </div>';
          cols += '  <div class="row">';
          cols += '    <div class="col-xs-12 col-sm-3">';
          cols += '      <div class="form-group">';
          cols += '        <label class="form-control-label" for="inputTipoLogradouro-'+c+'">Tipo Logradouro</label>';
          cols += '        <select class="form-control select select2-hidden-accessible" data-placeholder="Tipo Logradouro" data-plugin="select2" id="inputTipoLogradouro-'+c+'" name="enderecos[tipo_id][]">';
          cols += '          <option value="">Tipo Logradouro</option>';
                          @foreach($tipos as $value)
          cols += '              <option value="{{ $value->id }}">{{ $value->nome }}</option>'; 
                          @endforeach
          cols += '         </select>';
          cols += '      </div>';
          cols += '    </div>';
          cols += '    <div class="col-xs-12 col-sm-7">';
          cols += '      <div class="form-group">';
          cols += '        <label class="form-control-label" for="inputEndereco-'+c+'">Endereço</label>';
          cols += '        <input type="text" class="form-control" id="inputEndereco-'+c+'" value="" name="enderecos[endereco][]">';
          cols += '      </div>';
          cols += '    </div>';
          cols += '    <div class="col-xs-12 col-sm-2">';
          cols += '      <div class="form-group">';
          cols += '        <label class="form-control-label" for="inputNumero-'+c+'">Numero</label>';
          cols += '        <input type="text" class="form-control" id="inputNumero-'+c+'" value="" name="enderecos[numero][]">';
          cols += '      </div>';
          cols += '    </div>';
          cols += '  </div>';
          cols += '  <div class="row">';
          cols += '    <div class="col-xs-12 col-sm-4">';
          cols += '      <div class="form-group">';
          cols += '        <label class="form-control-label" for="inputPais-'+c+'">País</label>';
          cols += '        <select class="form-control select inputpais select2 select2-hidden-accessible" data-placeholder="País" data-plugin="select2" id="inputPais-'+c+'" name="enderecos[pais_id][]">';
          cols += '          <option value="">País</option>';
                            @foreach($paises as $value)
                              @if($value->id == 1)
          cols += '              <option selected value="{{ $value->id }}">{{ $value->nome }}</option> ';
                              @else
          cols += '              <option value="{{ $value->id }}">{{ $value->nome }}</option> ';
                              @endif
                           @endforeach                                      
          cols += '        </select>';
          cols += '      </div>';
          cols += '    </div>';
          cols += '    <div class="type_endereco col-xs-12 col-sm-8">';
          cols += '      <div class="col-xs-12 col-sm-6">';
          cols += '        <div class="form-group">';
          cols += '          <label class="form-control-label" for="inputEstado-'+c+'">Estado</label>';
          cols += '          <select class="form-control select inputestado select2 select2-hidden-accessible" data-nextfield="inputCidade-'+c+'" data-placeholder="Estado" data-plugin="select2" tabindex="-1" aria-hidden="true" id="inputEstado-'+c+'" name="enderecos[estador_id][]">';
          cols += '            <option value="">Selecione o País</option>';
                          @foreach($estados as $estado)
          cols += '              <option value="{{ $estado->id }}">{{ $estado->name }}</option>'; 
                          @endforeach
          cols += '        </div>';
          cols += '      </div>';

          cols += '      <div class="col-xs-12 col-sm-6">';
          cols += '        <div class="form-group">';
          cols += '          <label class="form-control-label" for="inputCidade-'+c+'">Cidade</label>';
          cols += '          <select class="form-control select inputcidade select2" id="inputCidade-'+c+'" name="enderecos[cidade_id][]">';
          cols += '            <option value="">Escolha um Estado Primeiro</option> ';
          cols += '          </select>';
          cols += '        </div>';
          cols += '      </div>';

          cols += '      <div class="col-xs-12 col-sm-12" style="position: absolute;top: 0; right: 0; z-index: 9;display: none;">';
          cols += '        <div class="form-group ">';
          cols += '          <label class="form-control-label" for="inputLocalidade-'+c+'">Localidade</label>';
          cols += '          <input type="text" class="form-control" id="inputLocalidade-'+c+'" value="" name="enderecos[localidade][]">';
          cols += '        </div>';
          cols += '      </div>';
          cols += '    </div>';
          cols += '  </div>';
          cols += '  <div class="row">';
          cols += '    <div class="col-xs-12 col-sm-4">';
          cols += '      <div class="form-group">';
          cols += '        <label class="form-control-label" for="inputBairro-'+c+'">Bairro</label>';
          cols += '        <input type="text" class="form-control" id="inputBairro-'+c+'" name="enderecos[bairro][]" value="">';
          cols += '      </div>';
          cols += '    </div>';
          cols += '    <div class="col-xs-12 col-sm-8">';
          cols += '        <div class="form-group">';
          cols += '          <label class="form-control-label" for="inputComplemento-'+c+'">Complemento</label>';
          cols += '          <input type="text" class="form-control" id="inputComplemento-'+c+'" name="enderecos[complemento][]" value="">';
          cols += '        </div>';
          cols += '    </div>';
          cols += '  </div>';
          cols += '</div>';


          $("#enderecos").append(cols);
          $(".select").select2();
          c++;
      });

    })
  </script>
@append