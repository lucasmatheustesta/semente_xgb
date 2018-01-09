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
        <div class="example mgt0">
          <h3 class="example-title">Dados do Aviso</h3>
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