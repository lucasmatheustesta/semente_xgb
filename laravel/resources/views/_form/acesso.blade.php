<div class="example">
  <h4 class="example-title">Dados de Acesso</h4>
  <div class="row">
    <div class="col-xs-12 col-sm-6">
      <div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
        <label class="form-control-label" for="inputEmail">E-mail</label>
        <input @if(isset($registro->id) and !empty($registro->id)) readonly @endif type="email" class="form-control" id="inputEmail" name="email" value="@if( old('email') ){{ old('email') }}@elseif( isset($registro->email) ){{$registro->email}}@elseif( isset($registro->user->email) ){{$registro->user->email}}@endif" >
         @if($errors->has('email'))
          <small class="text-help">{{ $errors->first('email') }}</small>
        @endif
      </div>
    </div>
    <div class="col-xs-12 col-sm-6">
      <div class="form-group @if(!isset($registro->id)) @endif {{ $errors->has('password') ? 'has-danger' : '' }}">
        <label class="form-control-label" for="inputSenha">Senha</label> 
        @if(isset($registro->id))
          <button id="updatePassword" class="btn btn-xs btn-dark pull-right" style="position: relative;top: 2px;">Alterar Senha</button>
        @endif
        <input type="password" @if(isset($registro->id)) disabled @endif  class="form-control" id="inputSenha" name="password" value="@if(isset($registro->id)) marcosferrarez @endif" >
        @if($errors->has('password'))
          <small class="text-help">{{ $errors->first('password') }}</small>
        @endif
      </div>
    </div>
  </div>
</div>

@section('scriptpersonalizado')
  <script type="text/javascript">
    jQuery(document).ready(function ($) {
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
    })
  </script>
@append