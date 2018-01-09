<style>
  .remove-especialidade{
    position: absolute;
    top: 42%;
    right: -60px;
  }
</style>
<div class="col-xs-12 col-sm-2"></div>
<div class="col-xs-12 col-sm-8" id="especialidades">
  <div id="especialidade-0" class="bloco">
    <div class="row">
      <div class="col-xs-12">
        <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
          <label class="form-control-label" for="inputEspecialidade-0">Especialidade</label>
          <select class="form-control select2-hidden-accessible" data-placeholder="Selecione uma Especialidade" data-plugin="select2" tabindex="-1" aria-hidden="true" id="inputEspecialidade-0" name="especialidades[especialidade_id][]">
              <option value="">Selecione uma Especialidade</option> 
              @foreach($especialidades as $value)
                @if( old('tipo_id') == $value->id )
                  <option selected value="{{ $value->id }}">{{ $value->nome }}</option> 
                @elseif(isset($registro->tipo_id) and $registro->tipo_id == $value->id)
                  <option selected value="{{ $value->id }}">{{ $value->nome }}</option> 
                @else
                  <option value="{{ $value->id }}">{{ $value->nome }}</option> 
                @endif
              @endforeach
            </select>
          @if($errors->has('name'))
            <small class="text-help">{{ $errors->first('name') }}</small>
          @endif
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-3">
          <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
            <label class="form-control-label" for="inputAno-0">Ano</label>
            <input type="text" class="form-control" id="inputAno-0" name="especialidades[ano][]" placeholder="" value="@if( old('name') ){{ old('name') }}@elseif( isset($registro->user->name) ){{$registro->user->name}}@endif">
            @if($errors->has('name'))
              <small class="text-help">{{ $errors->first('name') }}</small>
            @endif
          </div>
        </div>
        <div class="col-xs-12 col-sm-3">
          <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
            <label class="form-control-label" for="inputRegistro-0">Registro</label>
            <input type="text" class="form-control" id="inputRegistro-0" name="especialidades[registro][]" placeholder="" value="@if( old('name') ){{ old('name') }}@elseif( isset($registro->user->name) ){{$registro->user->name}}@endif">
            @if($errors->has('name'))
              <small class="text-help">{{ $errors->first('name') }}</small>
            @endif
          </div>
        </div>
        <div class="col-xs-12 col-sm-3">
          <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
            <label class="form-control-label" for="inputModelo-0">Modelo</label>
            <input type="text" class="form-control" id="inputModelo-0" name="especialidades[modelo][]" placeholder="" value="@if( old('name') ){{ old('name') }}@elseif( isset($registro->user->name) ){{$registro->user->name}}@endif">
            @if($errors->has('name'))
              <small class="text-help">{{ $errors->first('name') }}</small>
            @endif
          </div>
        </div>
        <div class="col-xs-12 col-sm-3">
          <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
            <label class="form-control-label" for="inputData-0">Data Aprovação</label>
            <input type="text" class="form-control" id="inputData-0" name="especialidades[data_aprovacao][]" placeholder="" value="@if( old('name') ){{ old('name') }}@elseif( isset($registro->user->name) ){{$registro->user->name}}@endif">
            @if($errors->has('name'))
              <small class="text-help">{{ $errors->first('name') }}</small>
            @endif
          </div>
        </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-3">
          <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
            <label class="form-control-label" for="inputRec-0">Rec. req. AMB</label>
            <input type="text" class="form-control" id="inputRec-0" name="especialidades[recamb][]" placeholder="" value="@if( old('name') ){{ old('name') }}@elseif( isset($registro->user->name) ){{$registro->user->name}}@endif">
            @if($errors->has('name'))
              <small class="text-help">{{ $errors->first('name') }}</small>
            @endif
          </div>
        </div>
        <div class="col-xs-12 col-sm-3">
          <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
            <label class="form-control-label" for="inputPress-0">Env. ass. pres</label>
            <input type="text" class="form-control" id="inputPress-0" name="especialidades[envpres][]" placeholder="" value="@if( old('name') ){{ old('name') }}@elseif( isset($registro->user->name) ){{$registro->user->name}}@endif">
            @if($errors->has('name'))
              <small class="text-help">{{ $errors->first('name') }}</small>
            @endif
          </div>
        </div>
        <div class="col-xs-12 col-sm-3">
          <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
            <label class="form-control-label" for="inputAmb-0">Env. ass. AMB</label>
            <input type="text" class="form-control" id="inputAmb-0" name="especialidades[envamb][]" placeholder="" value="@if( old('name') ){{ old('name') }}@elseif( isset($registro->user->name) ){{$registro->user->name}}@endif">
            @if($errors->has('name'))
              <small class="text-help">{{ $errors->first('name') }}</small>
            @endif
          </div>
        </div>
        <div class="col-xs-12 col-sm-3">
          <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
            <label class="form-control-label" for="inputSocio-0">Envio sócio</label>
            <input type="text" class="form-control" id="inputSocio-0" name="especialidades[socio][]" placeholder="" value="@if( old('name') ){{ old('name') }}@elseif( isset($registro->user->name) ){{$registro->user->name}}@endif">
            @if($errors->has('name'))
              <small class="text-help">{{ $errors->first('name') }}</small>
            @endif
          </div>
        </div>
    </div>
  </div>
</div>

<div class="text-right">
  <button id="add-especialidade" class="btn btn-info btn-inline" style="margin-right: 90px;"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar Especialidade</button>
</div>

@section('scriptpersonalizado')
  <script type="text/javascript">
    jQuery(document).ready(function ($) {

      var conter = 1;
      $("#add-especialidade").on("click", function (e) {
          e.preventDefault();

          var cols = "";

          cols += '<div id="especialidade-'+conter+'" class="bloco">';
          cols += '  <div class="row">';
          cols += '    <div class="col-xs-12">';
          cols += '      <div class="form-group ">';
          cols += '        <label class="form-control-label" for="inputEspecialidade-'+conter+'">Especialidade</label>';
          cols += '        <select class="form-control select2-hidden-accessible" data-placeholder="Selecione uma Especialidade" data-plugin="select2" tabindex="-1" aria-hidden="true" id="inputEspecialidade-'+conter+'" name="especialidades[especialidade_id][]">';
          cols += '          <option value="">Selecione uma Especialidade</option> ';
                            @foreach($especialidades as $value)
                                cols += '<option value="{{ $value->id }}">{{ $value->nome }}</option>';
                            @endforeach
          cols += '        </select>';
          cols += '      </div>';
          cols += '    </div>';
          cols += '  </div>';
          cols += '  <div class="row">';
          cols += '    <div class="col-xs-12 col-sm-3">';
          cols += '      <div class="form-group ">';
          cols += '        <label class="form-control-label" for="inputAno-'+conter+'">Ano</label>';
          cols += '        <input type="text" class="form-control" id="inputAno-'+conter+'" name="especialidades[ano][]" placeholder="" value="">';
          cols += '      </div>';
          cols += '    </div>';
          cols += '    <div class="col-xs-12 col-sm-3">';
          cols += '      <div class="form-group ">';
          cols += '        <label class="form-control-label" for="inputRegistro-'+conter+'">Registro</label>';
          cols += '        <input type="text" class="form-control" id="inputRegistro-'+conter+'" name="especialidades[registro][]" placeholder="" value="">';
          cols += '      </div>';
          cols += '    </div>';
          cols += '    <div class="col-xs-12 col-sm-3">';
          cols += '      <div class="form-group ">';
          cols += '        <label class="form-control-label" for="inputModelo-'+conter+'">Modelo</label>';
          cols += '        <input type="text" class="form-control" id="inputModelo-'+conter+'" name="especialidades[modelo][]" placeholder="" value="">';
          cols += '      </div>';
          cols += '    </div>';
          cols += '    <div class="col-xs-12 col-sm-3">';
          cols += '      <div class="form-group ">';
          cols += '        <label class="form-control-label" for="inputData-'+conter+'">Data Aprovação</label>';
          cols += '        <input type="text" class="form-control" id="inputData-'+conter+'" name="especialidades[data_aprovacao][]" placeholder="" value="">';
          cols += '      </div>';
          cols += '    </div>';
          cols += '  </div>';
          cols += '  <div class="row">';
          cols += '    <div class="col-xs-12 col-sm-3">';
          cols += '      <div class="form-group ">';
          cols += '        <label class="form-control-label" for="inputRec-'+conter+'">Rec. req. AMB</label>';
          cols += '        <input type="text" class="form-control" id="inputRec-'+conter+'" name="especialidades[recamb][]" placeholder="" value="">';
          cols += '      </div>';
          cols += '    </div>';
          cols += '    <div class="col-xs-12 col-sm-3">';
          cols += '      <div class="form-group ">';
          cols += '        <label class="form-control-label" for="inputPress-'+conter+'">Env. ass. pres</label>';
          cols += '        <input type="text" class="form-control" id="inputPress-'+conter+' name="especialidades[envpres][]" placeholder="" value="">';
          cols += '      </div>';
          cols += '    </div>';
          cols += '    <div class="col-xs-12 col-sm-3">';
          cols += '      <div class="form-group ">';
          cols += '        <label class="form-control-label" for="inputAmb-'+conter+'">Env. ass. AMB</label>';
          cols += '        <input type="text" class="form-control" id="inputAmb-'+conter+' name="especialidades[envamb][]" placeholder="" value="">';
          cols += '      </div>';
          cols += '    </div>';
          cols += '    <div class="col-xs-12 col-sm-3">';
          cols += '      <div class="form-group ">';
          cols += '        <label class="form-control-label" for="inputSocio-'+conter+'">Envio sócio</label>';
          cols += '        <input type="text" class="form-control" id="inputSocio-'+conter+'" name="especialidades[socio][]" placeholder="" value="">';
          cols += '      </div>';
          cols += '    </div>';
          cols += '  </div>';
          cols += '<button class="btn remove-row remove-especialidade btn-danger waves-effect"><i class="fa fa-trash-o" aria-hidden="true"></i></button>';
          cols += '</div>';

          $("#especialidades").append(cols);
          $('#inputEspecialidade-'+conter).select2();

          conter++;
      });

      $("#especialidades").on("click", ".remove-especialidade", function (event) {
        event.preventDefault();
          $(this).parent().remove();       
          conter -= 1
      });


    })
  </script>
@append