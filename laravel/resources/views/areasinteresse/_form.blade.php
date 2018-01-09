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
            <div class="col-xs-12 col-sm-12">
              <div class="form-group {{ $errors->has('nome') ? 'has-danger' : '' }}">
                <label class="form-control-label" for="inputName">Nome</label>
                <input type="text" required class="form-control" id="inputName" name="nome" placeholder="" value="@if( old('nome') ){{ old('nome') }}@elseif( isset($registro->nome) ){{$registro->nome}}@endif">
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