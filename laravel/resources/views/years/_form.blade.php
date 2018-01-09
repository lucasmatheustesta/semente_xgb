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
  <div class="col-xs-12 col-sm-3"></div>
  <div class="col-xs-12 col-lg-6">
    <div class="panel panel-folha">
      <div class="dobra"></div>
      <div class="panel-body">
        <div class="example mgt0">
          <h3 class="example-title">Dados do Ano</h3>
          <div class="form-group {{ $errors->has('title') ? 'has-danger' : '' }}">
            <label class="form-control-label" for="inputTitle">Título</label>
            <input type="text" class="form-control" id="inputTitle" name="title" value="@if( old('title') ){{ old('title') }}@elseif( isset($registro->title) ){{$registro->title}}@endif">
            @if($errors->has('title'))
              <small class="text-help">{{ $errors->first('title') }}</small>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>