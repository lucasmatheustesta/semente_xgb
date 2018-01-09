@section('css')
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/slim/slim.css') }}">
@append

<div class="slim"
  data-label="Arraste a imagem aqui"
  data-size="240,240"
  data-status-file-size="Ops! Este arquivo é muito grande"
  data-status-file-type="Ops! Tente enviar apenas arquivos .png ou .jpg"
  data-max-file-size="1"
  data-status-file-type="image/jpeg, image/png"
  data-ratio="1:1">
  @if(isset($registro->image) and !empty($registro->image) and file_exists($registro->image))
    <img src="{{ URL::asset($registro->image) }}" alt="">
  @elseif(isset($registro->user->image) and !empty($registro->user->image) and file_exists($registro->user->image))
    <img src="{{ URL::asset($registro->user->image) }}" alt="">
  @endif
  <input type="file" name="slim" />
</div>

@section('plugins')
  <script src="{{ URL::asset('global/vendor/slim/slim.kickstart.min.js') }}"></script>
@append