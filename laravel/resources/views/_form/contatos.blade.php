
<div class="col-xs-12 col-sm-2"></div>
<div class="col-xs-12 col-sm-8" id="telefones">
  @if(isset($registro->contatos) and count($registro->contatos) > 0)
    @foreach($registro->contatos as $key => $value)
      <div id="telefone-{{ $key }}" class="bloco">
        <div class="row">
          <div class="col-xs-12 col-sm-12">
            <div class="form-group {{ $errors->has('contato') ? 'has-danger' : '' }}">
              <label class="form-control-label" for="inputContato">Contato</label>
              <input type="text" class="form-control" id="inputContato" name="contatos[contato][]" placeholder="" value="@if( old('contato') ){{ old('contato') }}@elseif( isset($value->contato) ){{$value->contato}}@endif">
              @if($errors->has('contato'))
                <small class="text-help">{{ $errors->first('contato') }}</small>
              @endif
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-4">
            <div class="form-group {{ $errors->has('tipo') ? 'has-danger' : '' }}">
              <label class="form-control-label" for="inputTipo">Tipo</label>
              <select class="form-control select2-hidden-accessible" data-placeholder="Selecione" data-plugin="select2" tabindex="-1" aria-hidden="true" id="inputTipo" name="contatos[tipo][]">
                <option value="">Selecione um Tipo</option> 
                  <option @if( old('tipo') == 'tel' or (isset($value->tipo) and $value->tipo == 'tel')) selected @endif value="tel">Telefone</option> 
                  <option @if( old('tipo') == 'cel' or (isset($value->tipo) and $value->tipo == 'cel')) selected @endif value="cel">Celular</option>
                  <option @if( old('tipo') == 'fax' or (isset($value->tipo) and $value->tipo == 'fax')) selected @endif value="fax">Fax</option>       
              </select>
              @if($errors->has('name'))
                <small class="text-help">{{ $errors->first('tipo') }}</small>
              @endif
            </div>
          </div>
          <div class="col-xs-12 col-sm-8">
            <div class="form-group {{ $errors->has('fone') ? 'has-danger' : '' }}">
              <label class="form-control-label" for="inputFone">Fone</label>
              <input type="text" class="form-control inputTelefone" id="inputFone" name="contatos[fone][]" placeholder="" value="@if( old('fone') ){{ old('fone') }}@elseif( isset($value->fone) ){{$value->fone}}@endif">
              @if($errors->has('fone'))
                <small class="text-help">{{ $errors->first('fone') }}</small>
              @endif
            </div>
          </div>
        </div>
        @if($key != 0)
          <button class="btn remove-row remove-tell btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
        @endif
      </div>
    @endforeach
  @else
    <div id="telefone-1" class="bloco">
      <div class="row">
        <div class="col-xs-12 col-sm-12">
          <div class="form-group {{ $errors->has('contato') ? 'has-danger' : '' }}">
            <label class="form-control-label" for="inputContato">Contato</label>
            <input type="text" class="form-control" id="inputContato" name="contatos[contato][]" placeholder="" value="@if( old('contato') ){{ old('contato') }}@endif">
            @if($errors->has('contato'))
              <small class="text-help">{{ $errors->first('contato') }}</small>
            @endif
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-4">
          <div class="form-group {{ $errors->has('tipo') ? 'has-danger' : '' }}">
            <label class="form-control-label" for="inputTipo">Tipo</label>
            <select class="form-control select2-hidden-accessible" data-placeholder="Selecione" data-plugin="select2" tabindex="-1" aria-hidden="true" id="inputTipo" name="contatos[tipo][]">
              <option value="">Selecione um Tipo</option> 
                <option @if( old('tipo') == 'tel') selected @endif value="tel">Telefone</option> 
                <option @if( old('tipo') == 'cel') selected @endif value="cel">Celular</option>
                <option @if( old('tipo') == 'fax') selected @endif value="fax">Fax</option>       
            </select>
            @if($errors->has('name'))
              <small class="text-help">{{ $errors->first('tipo') }}</small>
            @endif
          </div>
        </div>
        <div class="col-xs-12 col-sm-8">
          <div class="form-group {{ $errors->has('fone') ? 'has-danger' : '' }}">
            <label class="form-control-label" for="inputFone">Fone</label>
            <input type="text" class="form-control inputTelefone" id="inputFone" name="contatos[fone][]" placeholder="" value="@if( old('fone') ){{ old('fone') }}@endif">
            @if($errors->has('fone'))
              <small class="text-help">{{ $errors->first('fone') }}</small>
            @endif
          </div>
        </div>
      </div>
    </div> 
  @endif
</div>
<div class="text-right">
  <button id="add-tel" class="btn btn-info btn-inline" style="margin-right: 90px;"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar Contato</button>
</div>



@section('scriptpersonalizado')
  <script type="text/javascript">
    jQuery(document).ready(function ($) {

      $(".inputTelefone").mask("(99) 9999-9999?9");
      $(".inputTelefone").on("blur", function() {
          var last = $(this).val().substr( $(this).val().indexOf("-") + 1 );
          if( last.length == 5 ) {
              var move = $(this).val().substr( $(this).val().indexOf("-") + 1, 1 );
              var lastfour = last.substr(1,4);
              var first = $(this).val().substr( 0, 9 );
              $(this).val( first + move + '-' + lastfour );
          }
      })

      var counter = 2;
      $("#add-tel").on("click", function (e) {
          e.preventDefault();

          var cols = "";
          cols += '<div id="telefone-'+counter+'" class="bloco">';
          cols += '  <div class="row">';
          cols += '    <div class="col-xs-12 col-sm-12">';
          cols += '      <div class="form-group ">';
          cols += '        <label class="form-control-label" for="inputContato">Contato</label>';
          cols += '        <input type="text" class="form-control" id="inputContato" name="contatos[contato][]" placeholder="" value="">';
          cols += '                </div>';
          cols += '    </div>';
          cols += '  </div>';
          cols += '  <div class="row">';
          cols += '    <div class="col-xs-12 col-sm-4">';
          cols += '      <div class="form-group ">';
          cols += '        <label class="form-control-label" for="inputTipo">Tipo</label>';
          cols += '        <select class="form-control select2-'+counter+'" data-placeholder="Selecione" data-plugin="select2" tabindex="-1" aria-hidden="true" id="inputTipo" name="contatos[tipo][]">';
          cols += '          <option value="">Selecione um Tipo</option> ';
          cols += '            <option value="tel">Telefone</option>'; 
          cols += '            <option value="cel">Celular</option>';
          cols += '            <option value="fax">Fax</option> ';      
          cols += '        </select>';
          cols += '      </div>';
          cols += '    </div>';
          cols += '    <div class="col-xs-12 col-sm-8">';
          cols += '      <div class="form-group ">';
          cols += '        <label class="form-control-label" for="inputFone">Fone</label>';
          cols += '        <input type="text" class="form-control inputTelefone-'+counter+'" id="inputFone" name="contatos[fone][]" placeholder="" value="">';
          cols += '      </div>';
          cols += '    </div>';
          cols += '  </div> <button class="btn remove-row remove-tell btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>';
          cols += '</div>';

          $("#telefones").append(cols);
          
          $(".inputTelefone-"+counter).mask("(99) 9999-9999?9");
          $(".inputTelefone-"+counter).on("blur", function() {
              var last = $(this).val().substr( $(this).val().indexOf("-") + 1 );
              if( last.length == 5 ) {
                  var move = $(this).val().substr( $(this).val().indexOf("-") + 1, 1 );
                  var lastfour = last.substr(1,4);
                  var first = $(this).val().substr( 0, 9 );
                  $(this).val( first + move + '-' + lastfour );
              }
          })
          $('.select2-'+counter).select2();

          counter++;
      });

      $("#telefones").on("click", ".remove-tell", function (event) {
        event.preventDefault();
          $(this).parent().remove();       
          counter -= 1
      });


    })
  </script>
@append