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
      <h3 class="example-title">Dados do Serviço</h3>
      <div class="form-group {{ $errors->has('title') ? 'has-danger' : '' }}">
        <label class="form-control-label" for="inputTitle">Título</label>
        <input type="text" class="form-control" id="inputTitle" name="title" placeholder="Ex. Consulta de Emergência" value="@if( old('title') ){{ old('title') }}@elseif( isset($registro->title) ){{$registro->title}}@endif">
        @if($errors->has('title'))
          <small class="text-help">{{ $errors->first('title') }}</small>
        @endif
      </div>
      <div class="form-group {{ $errors->has('description') ? 'has-danger' : '' }}">
        <label class="form-control-label" for="inputDescription">Descrição</label>
        <textarea rows="8" class="form-control" id="inputDescription" name="description" placeholder="Ex.  Drenagem de abcesso, curativo, hemorragias, recolocação de próteses, recolocação de blocos e restaurações.">@if( old('description') ){{ old('description') }}@elseif( isset($registro->description) ){{$registro->description}}@endif</textarea>
         @if($errors->has('description'))
          <small class="text-help">{{ $errors->first('description') }}</small>
        @endif
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-6">
          <div class="form-group form-inline">
            <label class="form-control-label db mgb20">Tipo do Seviço</label>
            <div class="radio-custom radio-primary">
              <input type="radio" id="inputTypeOrtodontia" @if( old('type') == 'ortodontia' ) checked @elseif( isset($registro->type) and $registro->type == 'ortodontia' ) checked @endif value="ortodontia" name="type" />
              <label for="inputTypeOrtodontia">Ortodontia</label>
            </div>
            <div class="radio-custom radio-primary" style="margin-left:20px">
              <input type="radio" id="inputTypeOutros" @if( old('type') == 'outros' ) checked @elseif( isset($registro->type) and $registro->type == 'outros' ) checked @endif  @if( !old('type') and !isset($registro->type) ) checked @endif value="outros" name="type" />
              <label for="inputTypeOutros">Outros</label>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6">
          <div id="row-implante" class="form-group form-inline">
            <label class="form-control-label db mgb20">Este serviço é um implante?</label>
            <div class="radio-custom radio-primary">
              <input type="radio" id="inputImplanteSim" @if( old('implante') == '1' ) checked @elseif( isset($registro->implante) and $registro->implante == '1' ) checked @endif value="1" name="implante" />
              <label for="inputImplanteSim">Sim</label>
            </div>
            <div class="radio-custom radio-primary" style="margin-left:20px">
              <input type="radio" id="inputImplanteNao" @if( old('implante') == '0' ) checked @elseif( isset($registro->implante) and $registro->implante == '0' ) checked @endif value="0" @if( !old('implante') and !isset($registro->implante) ) checked @endif name="implante" />
              <label for="inputImplanteNao">Não</label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>