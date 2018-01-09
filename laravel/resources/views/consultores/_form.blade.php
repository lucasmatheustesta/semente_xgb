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
  <div class="col-xs-12 col-lg-3">
    <div class="card card-shadow text-xs-center">
      <div class="card-block">
        <div class="text-left">
          <h3 class="example-title mgt0">Foto</h3>
        </div>
        @include('_form.avatar')
        @if(isset($registro->name) and !empty($registro->name))
          <h4 class="profile-user mgb0">{{ $registro->name }}</h4>
        @endif
        <p></p>
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-lg-9">
    <div class="panel panel-folha">
      <div class="dobra"></div>
      <div class="panel-body">
        <div class="example mgt0">
          <h3 class="example-title">Dados do Consultor</h3>
          <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
            <label class="form-control-label" for="inputName">Nome</label>
            <input type="text" class="form-control" id="inputName" name="name" placeholder="Ex. João da Silva" value="@if( old('name') ){{ old('name') }}@elseif( isset($registro->user->name) ){{$registro->user->name}}@endif">
            @if($errors->has('name'))
              <small class="text-help">{{ $errors->first('name') }}</small>
            @endif
          </div>
          <div class="form-group {{ $errors->has('code') ? 'has-danger' : '' }}">
            <label class="form-control-label" for="inputCode">Código Promocional</label>
            <input type="text" class="form-control upper" id="inputCode" name="code" placeholder="Ex. HO16" value="@if( old('code') ){{ old('code') }}@elseif( isset($registro->code) ){{$registro->code}}@endif">
            @if($errors->has('code'))
              <small class="text-help">{{ $errors->first('code') }}</small>
            @endif
          </div>

          <div class="form-group {{ $errors->has('birthday') ? 'has-danger' : '' }}">
            <label class="form-control-label" for="inputSite">Data de Nascimento</label>     
            <div class="input-group">
              <span class="input-group-addon">
                <i class="icon md-calendar" aria-hidden="true"></i>
              </span>
              <input type="text" class="form-control" id="inputData" value="@if( old('birthday') ){{ old('birthday') }}@elseif( isset($registro->birthday) ){{$registro->birthday}}@endif" name="birthday" placeholder="Digite apenas números">
            </div>

            @if($errors->has('birthday'))
              <small class="text-help">{{ $errors->first('birthday') }}</small>
            @endif
          </div>

          <div class="form-group {{ $errors->has('cpf') ? 'has-danger' : '' }}">
            <label class="form-control-label" for="inputCpf">CPF</label>
            <input type="text" class="form-control" id="inputCpf" name="cpf" placeholder="Digite apenas números" value="@if( old('cpf') ){{ old('cpf') }}@elseif( isset($registro->cpf) ){{$registro->cpf}}@endif">
            @if($errors->has('cpf'))
              <small class="text-help">{{ $errors->first('cpf') }}</small>
            @endif
          </div>

          <div class="form-group {{ $errors->has('phone') ? 'has-danger' : '' }}">
            <label class="form-control-label" for="inputTelefone">Telefone</label>
            <input type="tel" class="form-control" id="inputTelefone" name="phone" placeholder="Digite apenas números" value="@if( old('phone') ){{ old('phone') }}@elseif( isset($registro->phone) ){{$registro->phone}}@endif">
             @if($errors->has('phone'))
              <small class="text-help">{{ $errors->first('phone') }}</small>
            @endif
          </div>

          <div class="form-group {{ $errors->has('mobile') ? 'has-danger' : '' }}">
            <label class="form-control-label" for="inputCelular">Celular</label>
            <input type="tel" class="form-control" id="inputCelular" name="mobile" placeholder="Digite apenas números" value="@if( old('mobile') ){{ old('mobile') }}@elseif( isset($registro->mobile) ){{$registro->mobile}}@endif">
             @if($errors->has('mobile'))
              <small class="text-help">{{ $errors->first('mobile') }}</small>
            @endif
          </div>
        </div>
        
        <div class="example">
          <h4 class="example-title mgb20">Clínicas Associadas</h4>
          <div class="form-group {{ $errors->has('clinicas') ? 'has-danger' : '' }}">
          <select class="form-control select2-hidden-accessible" data-placeholder="Selecione as Clínicas" data-allow-clear="true" data-plugin="select2" tabindex="-1" aria-hidden="true"  id="inputClinicas" multiple="true" name="clinicas[]">
              @foreach($clinicas as $clinica)
                @if(isset($registro->clinicas) and count($registro->clinicas) > 0)
                  @foreach($registro->clinicas as $value)
                    @if($value->id == $clinica->id)
                      <option selected value="{{ $clinica->id }}">{{ $clinica->user->name }}</option> 
                    @else
                      <option value="{{ $clinica->id }}">{{ $clinica->user->name }}</option> 
                    @endif
                  @endforeach
                @else
                  <option value="{{ $clinica->id }}">{{ $clinica->user->name }}</option> 
                @endif
              @endforeach
            </select>
            @if($errors->has('clinicas'))
              <small class="text-help">{{ $errors->first('clinicas') }}</small>
            @endif
          </div>
        </div>
        @include('_form.acesso')
        @include('_form.endereco')
      </div>
    </div>
  </div>
</div>

@section('plugins')
  <script src="{{ URL::asset('global/vendor/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
@append

@section('plugins')
  <script src="{{ URL::asset('global/vendor/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/bootstrap-datepicker/bootstrap-datepicker.pt-BR.min.js') }}"></script>
@append

@section('scripts')
  <script src="{{ URL::asset('global/js/Plugin/bootstrap-datepicker.js') }}"></script>
@append

@section('scriptpersonalizado')
  <script type="text/javascript">
    jQuery(document).ready(function ($) {
      $('#inputData').datepicker({
        format: "dd/mm/yyyy",
        language: "pt-BR",
        startView: 2,
        calendarWeeks: true,
        autoclose: true
      });
      $("#inputTelefone").mask("(99) 9999-9999");
      $("#inputCelular").mask("(99) 99999-9999");
      $("#inputCpf").mask("999.999.999-99");
      $("#inputData").mask("99/99/9999");

      $('#inputEstado').change(function() {
        var id = $(this).val();
        getCities(id);
      });

      $(document).on("click", "#updatePassword", function (e) {
        e.preventDefault();
        $('#inputSenha').removeAttr('disabled').val('').focus();
        $(this).html('Desfazer').attr('id', 'cancelUpdatePassword');
      });

      $(document).on("click", "#cancelUpdatePassword", function (e) {
        e.preventDefault();
        $('#inputSenha').attr('disabled', 'disabled').val('marcosferrarez');
        $(this).html('Alterar Senha').attr('id', 'updatePassword');
      });

      @if( old('estado_id') )         
         $('#inputEstado').val({{ old('estado_id') }}).select2("destroy").select2();
        getCities({{ old('estado_id') }});
      @elseif( isset($registro->estado_id) and !empty($registro->estado_id) )
        $('#inputEstado').val({{ $registro->estado_id }}).select2("destroy").select2();
        getCities({{ $registro->estado_id }});
      @endif

      function getCities (id) {
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
              $('#inputCidade').html(options).select2("destroy").select2();

              @if( old('cidade_id') )         
                $('#inputCidade').val({{ old('cidade_id') }}).select2("destroy").select2();
              @elseif( isset($registro->cidade_id) and !empty($registro->cidade_id) )
                $('#inputCidade').val({{ $registro->cidade_id }}).select2("destroy").select2();
              @endif
            };
          }
        });
      }
      $("#inputTelefone").mask("(99) 9999-9999?9");
      $("#inputTelefone").on("blur", function() {
          var last = $(this).val().substr( $(this).val().indexOf("-") + 1 );
          if( last.length == 5 ) {
              var move = $(this).val().substr( $(this).val().indexOf("-") + 1, 1 );
              var lastfour = last.substr(1,4);
              var first = $(this).val().substr( 0, 9 );
              $(this).val( first + move + '-' + lastfour );
          }
      })
    })
  </script>
@append