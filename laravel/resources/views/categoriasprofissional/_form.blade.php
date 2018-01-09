@section('css')
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/select2/select2.css') }}">
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
          <div class="example">
          <h4 class="example-title">Informações</h4>
          <div class="row">
            <div class="col-xs-12 col-sm-8">
              <div class="form-group {{ $errors->has('nome') ? 'has-danger' : '' }}">
                <label class="form-control-label" for="inputName">Título</label>
                <input type="text" required class="form-control" id="inputName" name="nome" placeholder="" value="@if( old('nome') ){{ old('nome') }}@elseif( isset($registro->nome) ){{$registro->nome}}@endif">
                @if($errors->has('nome'))
                <small class="text-help">{{ $errors->first('nome') }}</small>
                @endif
              </div>
            </div>
            <div class="col-xs-12 col-sm-4">
              <div class="form-group {{ $errors->has('nome') ? 'has-danger' : '' }}">
                <label class="form-control-label" for="inputName">Tipo de Pessoa</label>
               


               <select class="form-control select2-hidden-accessible" data-placeholder="Selecione um Tipo" data-plugin="select2" tabindex="-1" aria-hidden="true" id="inputClassificacao" name="tipo_pessoa">
                  <option value="">Selecione um Tipo</option> 
                    <option @if( old('tipo_pessoa') == 'f' or (isset($registro->tipo_pessoa) and $registro->tipo_pessoa == 'f')) selected @endif value="f">Física</option> 
                    <option @if( old('tipo_pessoa') == 'j' or (isset($registro->tipo_pessoa) and $registro->tipo_pessoa == 'j')) selected @endif value="j">Jurídica </option>                    
                </select>


                @if($errors->has('nome'))
                <small class="text-help">{{ $errors->first('nome') }}</small>
                @endif
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{ csrf_field() }}

@section('plugins')
  <script src="{{ URL::asset('global/vendor/select2/select2.full.min.js') }}"></script>
@append

@section('scripts')
  <script src="{{ URL::asset('global/js/Plugin/select2.js') }}"></script>
@append