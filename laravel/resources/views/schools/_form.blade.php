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
  <div class="col-xs-12 col-lg-3">
    <div class="card card-shadow text-xs-center">
      <div class="card-block">
        <div class="text-left">
          <h3 class="example-title mgt0">Logotipo</h3>
        </div>
        @include('_form.avatar')
        @if(isset($registro->name) and !empty($registro->name))
          <h4 class="profile-user mgb0">{{ $registro->name }}</h4>
        @endif
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-lg-9">
    <div class="panel panel-folha">
      <div class="dobra"></div>
      <div class="panel-body">
        <div class="example mgt0">
          <h3 class="example-title">Dados da Escola</h3>
          <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
            <label class="form-control-label" for="inputName">Nome</label>
            <input type="text" class="form-control" id="inputName" name="name" value="@if( old('name') ){{ old('name') }}@elseif( isset($registro->name) ){{$registro->name}}@endif">
            @if($errors->has('name'))
              <small class="text-help">{{ $errors->first('name') }}</small>
            @endif
          </div>

          <div class="row">
            <div class="col-xs-12 col-sm-6">
              <div class="form-group {{ $errors->has('phone') ? 'has-danger' : '' }}">
                <label class="form-control-label" for="inputTelefone">Telefone</label>
                <input type="tel" class="form-control" id="inputTelefone" name="phone" value="@if( old('phone') ){{ old('phone') }}@elseif( isset($registro->phone) ){{$registro->phone}}@endif">
                @if($errors->has('phone'))
                  <small class="text-help">{{ $errors->first('phone') }}</small>
                @endif
              </div>
            </div>
            <div class="col-xs-12 col-sm-6">
              <div class="form-group {{ $errors->has('validity') ? 'has-danger' : '' }}">
                <label class="form-control-label" for="inputValidity">Data de Vigência</label>
                <input type="text" class="form-control" id="inputValidity" name="validity" value="@if( old('validity') ){{ old('validity') }}@elseif( isset($registro->validity) ){{$registro->validity}}@endif" >
                @if($errors->has('validity'))
                  <small class="text-help">{{ $errors->first('validity') }}</small>
                @endif
              </div>
            </div>
          </div>
        </div>


        <div class="example">
          <h4 class="example-title">Contato</h4>
          <div class="form-group {{ $errors->has('contact') ? 'has-danger' : '' }}">
            <label class="form-control-label" for="inpuContact">Nome</label>
            <input type="text" class="form-control" id="inputContact" name="contact" value="@if( old('contact') ){{ old('contact') }}@elseif( isset($registro->contact) ){{$registro->contact}}@endif">
            @if($errors->has('contact'))
              <small class="text-help">{{ $errors->first('contact') }}</small>
            @endif
          </div>

          <div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
            <label class="form-control-label" for="inputEmail">E-mail</label>
            <input type="email" class="form-control" id="inputEmail" name="phone" value="@if( old('email') ){{ old('email') }}@elseif( isset($registro->email) ){{$registro->email}}@endif">
            @if($errors->has('email'))
              <small class="text-help">{{ $errors->first('email') }}</small>
            @endif
          </div>
        </div>

        <div class="example">
          <h4 class="example-title">Códigos</h4>

          <div class="row">
            <div class="col-xs-12 col-sm-6">
              <div class="form-group {{ $errors->has('student_code') ? 'has-danger' : '' }}">
                <label class="form-control-label" for="inputStudentCode">Alunos</label>
                <input type="text" class="form-control" id="inputStudentCode" name="student_code" value="@if( old('student_code') ){{ old('student_code') }}@elseif( isset($registro->student_code) ){{$registro->student_code}}@endif">
                @if($errors->has('student_code'))
                  <small class="text-help">{{ $errors->first('student_code') }}</small>
                @endif
              </div>
            </div>
            <div class="col-xs-12 col-sm-6">
              <div class="form-group {{ $errors->has('teacher_code') ? 'has-danger' : '' }}">
                <label class="form-control-label" for="inputTeacherCode">Professores</label>
                <input type="text" class="form-control" id="inputTeacherCode" name="teacher_code" value="@if( old('teacher_code') ){{ old('teacher_code') }}@elseif( isset($registro->teacher_code) ){{$registro->teacher_code}}@endif">
                @if($errors->has('teacher_code'))
                  <small class="text-help">{{ $errors->first('teacher_code') }}</small>
                @endif
              </div>
            </div>
          </div>
        </div>

        <div class="example">
          <h4 class="example-title">Endereço</h4>
          <div class="form-group {{ $errors->has('address') ? 'has-danger' : '' }}">
            <label class="form-control-label" for="inputAddress">Logradouro</label>
            <input type="text" class="form-control" id="inputAddress" value="@if( old('address') ){{ old('address') }}@elseif( isset($registro->address) ){{$registro->address}}@endif" name="address">
            @if($errors->has('address'))
              <small class="text-help">{{ $errors->first('address') }}</small>
            @endif
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-6">
              <div class="form-group {{ $errors->has('state_id') ? 'has-danger' : '' }}">
                <label class="form-control-label" for="inputEstador">Estado</label>
                <select required class="form-control select2-hidden-accessible" data-placeholder="Selecione o Estado" data-plugin="select2" tabindex="-1" aria-hidden="true" id="inputState" name="state_id">
                  <option value="">Selecione o Estado</option> 
                  @foreach($estados as $estado)
                    @if( old('state_id') == $estado->id )
                      <option selected value="{{ $estado->id }}">{{ $estado->name }}</option> 
                    @elseif(isset($registro->state_id) and $registro->state_id == $estado->id)
                      <option selected value="{{ $estado->id }}">{{ $estado->name }}</option> 
                    @else
                      <option value="{{ $estado->id }}">{{ $estado->name }}</option> 
                    @endif
                  @endforeach
                </select>
                @if($errors->has('state_id'))
                <small class="text-help">{{ $errors->first('state_id') }}</small>
                @endif
              </div>
            </div>
            <div class="col-xs-12 col-sm-6">
              <div class="form-group {{ $errors->has('citie_id') ? 'has-danger' : '' }}">
                <label class="form-control-label" for="inputCiy">Cidade</label>
                <select required class="form-control select2-hidden-accessible" data-placeholder="Escolha um Estado Primeiro" data-plugin="select2" tabindex="-1" aria-hidden="true"  id="inputCiy" name="citie_id">
                  <option value="">Escolha um Estado Primeiro</option> 
                </select>
                @if($errors->has('citie_id'))
                  <small class="text-help">{{ $errors->first('citie_id') }}</small>
                @endif
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12 col-sm-4">
              <div class="form-group {{ $errors->has('district') ? 'has-danger' : '' }}">
                <label class="form-control-label" for="inputDistrict">Bairro</label>
                <input type="text" class="form-control" id="inputDistrict" name="district" value="@if( old('district') ){{ old('district') }}@elseif( isset($registro->district) ){{$registro->district}}@endif">
                @if($errors->has('district'))
                  <small class="text-help">{{ $errors->first('district') }}</small>
                @endif
              </div>
            </div>
            <div class="col-xs-12 col-sm-8">
              <div class="form-group {{ $errors->has('complement') ? 'has-danger' : '' }}">
                <label class="form-control-label" for="inputDistrict">Complemento</label>
                <input type="text" class="form-control" id="inputDistrict" name="complement" value="@if( old('complement') ){{ old('complement') }}@elseif( isset($registro->complement) ){{$registro->complement}}@endif">
                @if($errors->has('complement'))
                  <small class="text-help">{{ $errors->first('complement') }}</small>
                @endif
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

@section('plugins')
  <script src="{{ URL::asset('global/vendor/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/select2/select2.full.min.js') }}"></script>
@append

@section('scripts')
  <script src="{{ URL::asset('global/js/Plugin/select2.js') }}"></script>
@append

@section('scriptpersonalizado')
  <script type="text/javascript">
    jQuery(document).ready(function ($) {

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

      $('#inputState').change(function() {
        var id = $(this).val();
        getCities(id);
      });

      @if( old('state_id') )
        $('#inputState').val({{ old('state_id') }}).select2("destroy").select2();
        getCities({{ old('state_id') }});
      @elseif( isset($registro->state_id) and !empty($registro->state_id) )
        $('#inputState').val({{ $registro->state_id }}).select2("destroy").select2();
        getCities({{ $registro->state_id }});
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

              $('#inputCiy').html(options).select2("destroy").select2();

              @if( old('cidade_id') )         
                $('#inputCiy').val({{ old('citie_id') }}).select2("destroy").select2();
              @elseif( isset($registro->citie_id) and !empty($registro->citie_id) )
                $('#inputCiy').val({{ $registro->citie_id }}).select2("destroy").select2();
              @endif
            };
          }
        });
      }
    })
  </script>
@append