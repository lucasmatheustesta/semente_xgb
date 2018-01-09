@section('css')
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/bootstrap-datepicker/bootstrap-datepicker.css') }}">
@append

<style>
  .remove-escolaridade{
    position: absolute;
    top: 42%;
    right: -60px;
  }
</style>
<div class="col-xs-12 col-sm-2"></div>
<div class="col-xs-12 col-sm-8" id="escolaridades">
  <div id="escolaridade-0" class="bloco">
    <div class="row">
      <div class="col-xs-12 col-sm-6">
        <div class="form-group">
          <label class="form-control-label" for="tipoformacao-0">Tipo de Formação</label>
          <select class="form-control select2-hidden-accessible" data-placeholder="Selecione uma Formação" data-plugin="select2" tabindex="-1" aria-hidden="true" id="tipoformacao-0" name="escolaridades[tipo_formacao][]">
              <option value="">Selecione uma Formação</option> 
              <option value="doutorado">Doutorado</option> 
              <option value="graduacao">Graduação</option> 
              <option value="mestrado">Mestrado</option> 
              <option value="residencia">Residência</option> 
            </select>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6">
        <div class="form-group">
          <label class="form-control-label" for="instituicao-0">Instituição que cursa ou cursou</label>
          <select class="form-control select2-hidden-accessible" data-placeholder="Selecione uma Instituição" data-plugin="select2" tabindex="-1" aria-hidden="true" id="instituicao-0" name="escolaridades[instituicao_id][]">
              <option value="">Selecione uma Instituição</option> 
              @foreach($faculdades as $value)
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
      <div class="col-xs-12 col-sm-4">
          <div class="form-group">
            <label class="form-control-label" for="curso-0">Curso Realizado</label>
            <input type="text" class="form-control" id="curso-0" name="escolaridades[curso][]" placeholder="" value="@if( old('name') ){{ old('name') }}@elseif( isset($registro->user->name) ){{$registro->user->name}}@endif">
          </div>
        </div>
        <div class="col-xs-12 col-sm-4">
          <div class="form-group">
            <label class="form-control-label" for="colocao-0">Data da Colação</label>
            <input type="text" class="form-control inputdate" id="colocao-0" name="escolaridades[data_colacao][]" placeholder="" value="@if( old('name') ){{ old('name') }}@elseif( isset($registro->user->name) ){{$registro->user->name}}@endif">
          </div>
        </div>
        <div class="col-xs-12 col-sm-4">
          <div class="form-group">
            <label class="form-control-label" for="horas-0">Horas/Créditos</label>
            <input type="text" class="form-control" id="horas-0" name="escolaridades[horas_creditos][]" placeholder="" value="@if( old('name') ){{ old('name') }}@elseif( isset($registro->user->name) ){{$registro->user->name}}@endif">
          </div>
        </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label class="form-control-label" for="inicio-0">Início da Residência</label>
            <input type="text" class="form-control inputdate" id="inicio-0" name="escolaridades[inico_residencia][]" placeholder="" value="@if( old('name') ){{ old('name') }}@elseif( isset($registro->user->name) ){{$registro->user->name}}@endif">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label class="form-control-label" for="fim-0">Fim da Residência</label>
            <input type="text" class="form-control inputdate" id="fim-0" name="escolaridades[fim_residencia][]" placeholder="" value="@if( old('name') ){{ old('name') }}@elseif( isset($registro->user->name) ){{$registro->user->name}}@endif">
          </div>
        </div>
    </div>
  </div>
</div>

<div class="text-right">
  <button id="add-escolaridade" class="btn btn-info btn-inline" style="margin-right: 90px;"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar Escolaridade</button>
</div>

@section('plugins')
  <script src="{{ URL::asset('global/vendor/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/bootstrap-datepicker/bootstrap-datepicker.pt-BR.min.js') }}"></script>
@append

@section('scripts')
  <script src="{{ URL::asset('global/js/Plugin/bootstrap-datepicker.js') }}"></script>
@append

@section('scriptpersonalizado')
  <script type="text/javascript">
    jQuery(document).ready(function ($) {
      $('.inputdate').datepicker({
        format: "dd/mm/yyyy",
        language: "pt-BR",
        autoclose: true,
        todayHighlight: true
      });
      $(".inputdate").mask("99/99/9999");
      var counter = 1;
      $("#add-escolaridade").on("click", function (e) {
          e.preventDefault();

          var cols = "";

          cols += '  <div id="escolaridade-'+counter+'" class="bloco">';
          cols += '    <div class="row">';
          cols += '      <div class="col-xs-12 col-sm-6">';
          cols += '        <div class="form-group">';
          cols += '          <label class="form-control-label" for="tipoformacao-'+counter+'">Tipo de Formação</label>';
          cols += '          <select class="form-control select2-hidden-accessible" data-placeholder="Selecione uma Formação" data-plugin="select2" tabindex="-1" aria-hidden="true" id="tipoformacao-'+counter+'" name="escolaridades[tipo_formacao][]">';
          cols += '            <option value="">Selecione uma Formação</option> ';
          cols += '            <option value="doutorado">Doutorado</option> ';
          cols += '            <option value="graduacao">Graduação</option> ';
          cols += '            <option value="mestrado">Mestrado</option> ';
          cols += '            <option value="residencia">Residência</option> ';
          cols += '          </select>';
          cols += '        </div>';
          cols += '      </div>';
          cols += '      <div class="col-xs-12 col-sm-6">';
          cols += '        <div class="form-group">';
          cols += '          <label class="form-control-label" for="instituicao-'+counter+'">Instituição que cursa ou cursou</label>';
          cols += '          <select class="form-control select2-hidden-accessible" data-placeholder="Selecione uma Instituição" data-plugin="select2" tabindex="-1" aria-hidden="true" id="instituicao-'+counter+'" name="escolaridades[instituicao_id][]">';
          cols += '            <option value="">Selecione uma Instituição</option> ';
                                @foreach($faculdades as $value)
                                    cols += '<option value="{{ $value->id }}">{{ $value->nome }}</option> ';
                                @endforeach
          cols += '          </select>';
          cols += '        </div>';
          cols += '      </div>';
          cols += '    </div>';
          cols += '    <div class="row">';
          cols += '      <div class="col-xs-12 col-sm-4">';
          cols += '        <div class="form-group">';
          cols += '          <label class="form-control-label" for="curso-'+counter+'">Curso Realizado</label>';
          cols += '          <input type="text" class="form-control" id="curso-'+counter+'" name="escolaridades[curso][]" placeholder="" value="">';
          cols += '        </div>';
          cols += '      </div>';
          cols += '      <div class="col-xs-12 col-sm-4">';
          cols += '        <div class="form-group">';
          cols += '          <label class="form-control-label" for="colocao-'+counter+'">Data da Colação</label>';
          cols += '          <input type="text" class="form-control inputdate" id="colocao-'+counter+'" name="escolaridades[data_colacao][]" placeholder="" value="">';
          cols += '        </div>';
          cols += '      </div>';
          cols += '      <div class="col-xs-12 col-sm-4">';
          cols += '        <div class="form-group">';
          cols += '          <label class="form-control-label" for="horas-'+counter+'">Horas/Créditos</label>';
          cols += '          <input type="text" class="form-control" id="horas-'+counter+'" name="escolaridades[horas_creditos][]" placeholder="" value="">';
          cols += '        </div>';
          cols += '      </div>';
          cols += '    </div>';
          cols += '    <div class="row">';
          cols += '      <div class="col-xs-12 col-sm-6">';
          cols += '        <div class="form-group">';
          cols += '          <label class="form-control-label" for="inicio-'+counter+'">Início da Residência</label>';
          cols += '          <input type="text" class="form-control inputdate" id="inicio-'+counter+'" name="escolaridades[inico_residencia][]" placeholder="" value="">';
          cols += '        </div>';
          cols += '      </div>';
          cols += '      <div class="col-xs-12 col-sm-6">';
          cols += '        <div class="form-group">';
          cols += '          <label class="form-control-label" for="fim-'+counter+'">Fim da Residência</label>';
          cols += '          <input type="text" class="form-control inputdate" id="fim-'+counter+'" name="escolaridades[fim_residencia][]" placeholder="" value="">';
          cols += '        </div>';
          cols += '      </div>';
          cols += '    </div>';
          cols += '<button class="btn remove-row remove-escolaridade btn-danger waves-effect"><i class="fa fa-trash-o" aria-hidden="true"></i></button>';
          cols += '  </div>';

          $("#escolaridades").append(cols);
          $('#tipoformacao-'+counter).select2();
          $('#instituicao-'+counter).select2();

          $('.inputdate').datepicker({
            format: "dd/mm/yyyy",
            language: "pt-BR",
            autoclose: true,
            todayHighlight: true
          });
          $(".inputdate").mask("99/99/9999");

          counter++;
      });

      $("#escolaridades").on("click", ".remove-escolaridade", function (event) {
        event.preventDefault();
          $(this).parent().remove();       
          counter -= 1
      });


    })
  </script>
@append