<div class="col-xs-12 col-sm-2"></div>
<div class="col-xs-12 col-sm-8" id="associacoes ">
  <div class="row">
  <div class="col-xs-12 col-sm-12">
    <div class="form-group {{ $errors->has('crm') ? 'has-danger' : '' }}">
      <label class="form-control-label" for="inputCrm">Entidade</label>
        <select class="form-control select2-hidden-accessible" data-placeholder="Selecione uma Entidade" data-plugin="select2" tabindex="-1" aria-hidden="true" id="inputEspecialidade-0" name="especialidades[especialidade_id][]">
          <option value="">Selecione uma Entidade</option> 
          @foreach($entidades as $value)
            @if( old('tipo_id') == $value->id )
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
</div>
<div class="row">
  <div class="col-xs-12 col-sm-6">
    <div class="form-group {{ $errors->has('crm') ? 'has-danger' : '' }}">
      <label class="form-control-label" for="inputCrm">Categoria</label>
      <select class="form-control select2-hidden-accessible" data-placeholder="Selecione uma Associação" data-plugin="select2" tabindex="-1" aria-hidden="true" id="inputEspecialidade-0" name="associacoes[entidade_id][]">
          <option value="">Selecione uma Associação</option> 
          @foreach($categorias as $value)
            @if( old('tipo_id') == $value->id )
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
  <div class="col-xs-12 col-sm-6">
    <div class="form-group {{ $errors->has('crm') ? 'has-danger' : '' }}">
      <label class="form-control-label" for="inputCrm">Sócio</label>
      <input type="text" class="form-control" id="inputCrm" name="crm" placeholder="" value="@if( old('crm') ){{ old('crm') }}@elseif( isset($registro->crm) ){{$registro->crm}}@endif">
    </div>
  </div>
</div>
</div>
<div class="text-right">
  <button id="add-tel" class="btn btn-info btn-inline" style="margin-right: 90px;"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar Associação</button>
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