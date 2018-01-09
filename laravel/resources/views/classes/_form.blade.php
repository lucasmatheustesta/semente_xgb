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
  <div class="col-xs-12 col-sm-3"></div>
  <div class="col-xs-12 col-lg-6">
    <div class="panel panel-folha">
      <div class="dobra"></div>
      <div class="panel-body">
        <div class="example mgt0">
          <h3 class="example-title">Dados da Classe</h3>
          <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
            <label class="form-control-label" for="inputName">Nome</label>
            <input type="text" class="form-control" id="inputName" name="name" value="@if( old('name') ){{ old('name') }}@elseif( isset($registro->name) ){{$registro->name}}@endif">
            @if($errors->has('name'))
              <small class="text-help">{{ $errors->first('name') }}</small>
            @endif
          </div>

          <div class="row">
            <div class="col-xs-12 col-sm-6">
              <div class="form-group {{ $errors->has('school_id') ? 'has-danger' : '' }}">
                <label class="form-control-label" for="inputSchool">Escola</label>
                <select required class="form-control select2-hidden-accessible" data-placeholder="Selecione a Escola" data-plugin="select2" tabindex="-1" aria-hidden="true" id="inputSchool" name="school_id">
                  <option value="">Selecione a Escola</option>
                  @foreach($schools as $item)
                    @if( old('school_id') == $item->id )
                      <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                    @elseif(isset($registro->school_id) and $registro->school_id == $item->id)
                      <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                    @else
                      <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endif
                  @endforeach
                </select>
                @if($errors->has('school_id'))
                  <small class="text-help">{{ $errors->first('school_id') }}</small>
                @endif
              </div>
            </div>

            <div class="col-xs-12 col-sm-6">
              <div class="form-group {{ $errors->has('year_id') ? 'has-danger' : '' }}">
                <label class="form-control-label" for="inputYear">Ano</label>
                <select required class="form-control select2-hidden-accessible" data-placeholder="Selecione o Ano" data-plugin="select2" tabindex="-1" aria-hidden="true" id="inputYear" name="year_id">
                  <option value="">Selecione o Ano</option>
                  @foreach($years as $item)
                    @if( old('year_id') == $item->id )
                      <option selected value="{{ $item->id }}">{{ $item->title }}</option>
                    @elseif(isset($registro->year_id) and $registro->year_id == $item->id)
                      <option selected value="{{ $item->id }}">{{ $item->title }}</option>
                    @else
                      <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endif
                  @endforeach
                </select>
                @if($errors->has('year_id'))
                  <small class="text-help">{{ $errors->first('year_id') }}</small>
                @endif
              </div>
            </div>
          </div>

          <div class="form-group {{ $errors->has('number') ? 'has-danger' : '' }}">
            <label class="form-control-label" for="inputNumber">Quantidade de Alunos</label>
            <input type="number" class="form-control" id="inputNumber" name="name" value="@if( old('number') ){{ old('number') }}@elseif( isset($registro->number) ){{$registro->number}}@endif">
            @if($errors->has('number'))
              <small class="text-help">{{ $errors->first('number') }}</small>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@section('plugins')
  <script src="{{ URL::asset('global/vendor/select2/select2.full.min.js') }}"></script>
@append

@section('scripts')
  <script src="{{ URL::asset('global/js/Plugin/select2.js') }}"></script>
@append