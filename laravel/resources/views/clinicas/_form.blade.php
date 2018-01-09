@section('css')
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/select2/select2.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/css/jquery.fileuploader.css') }}">
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
        @if(isset($registro->accepted))
           <div class="text-left">
             @if(isset($registro->accepted) and $registro->accepted == 1)
              <b>Contrato:</b>
                <p><span class="text-success"><b>Aceito</b></span> por {{ $registro->responsavel }}.</p>
             @else
                <p><b>Contrato:</b> <span class="text-warning">Aguardando.</span></p>
             @endif
           </div>
        @endif
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-lg-9">
    <div class="panel panel-folha">
      <div class="dobra"></div>
      <div class="panel-body">
        <div class="example mgt0">
          <h3 class="example-title">Dados da Clínica</h3>
          <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
            <label class="form-control-label" for="inputName">Nome</label>
            <input type="text" class="form-control" id="inputName" name="name" placeholder="Ex. Status Odontologia" value="@if( old('name') ){{ old('name') }}@elseif( isset($registro->user->name) ){{$registro->user->name}}@endif">
            @if($errors->has('name'))
              <small class="text-help">{{ $errors->first('name') }}</small>
            @endif
          </div>

          <div class="form-group {{ $errors->has('phone') ? 'has-danger' : '' }}">
            <label class="form-control-label" for="inputTelefone">Telefone</label>
            <input type="tel" class="form-control" id="inputTelefone" name="phone" placeholder="Digite apenas números" value="@if( old('phone') ){{ old('phone') }}@elseif( isset($registro->phone) ){{$registro->phone}}@endif">
             @if($errors->has('phone'))
              <small class="text-help">{{ $errors->first('phone') }}</small>
            @endif
          </div>

          <div class="form-group {{ $errors->has('site') ? 'has-danger' : '' }}">
            <label class="form-control-label" for="inputSite">Site</label>
            <input type="url" class="form-control" id="inputSite" name="site" placeholder="http://" value="@if( old('site') ){{ old('site') }}@elseif( isset($registro->site) ){{$registro->site}}@endif" >
            @if($errors->has('site'))
              <small class="text-help">{{ $errors->first('site') }}</small>
            @endif
          </div>
        </div>
        @include('_form.acesso')
        <div class="example">
          <h4 class="example-title">Dados do Responsável</h4>
          <div class="form-group {{ $errors->has('responsavel') ? 'has-danger' : '' }}">
            <label class="form-control-label" for="inputName">Nome</label>
            <input type="text" class="form-control" id="inputName" name="responsavel" placeholder="Ex. João Silva" value="@if( old('responsavel') ){{ old('responsavel') }}@elseif( isset($registro->responsavel) ){{$registro->responsavel}}@endif">
            @if($errors->has('responsavel'))
              <small class="text-help">{{ $errors->first('responsavel') }}</small>
            @endif
          </div>
          <div id="radios" class="form-group form-inline form-material">
            <div class="radio-custom radio-primary">
              <input type="radio" id="inputTipoResponsavelFisico" @if( old('type') == 'fisico' ) checked @endif @if( !old('type')) checked @endif value="fisico" name="type" />
              <label for="inputTipoResponsavelFisico">Pessoa Física</label>
            </div>
            <div class="radio-custom radio-primary" style="margin-left:20px">
              <input type="radio" id="inputTipoResponsavelJuridico" @if( old('type') == 'juridico' ) checked @endif value="juridico" name="type" />
              <label for="inputTipoResponsavelJuridico">Pessoa Jurídica</label>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-6">
              <div class="form-group {{ $errors->has('cpf_cnpj') ? 'has-danger' : '' }}">
                <label id="textCpfCnpj" class="form-control-label" for="inputCPFCNPJ">CPF</label>
                <input type="tel" class="form-control" id="inputCPFCNPJ" name="cpf_cnpj" placeholder="Digite apenas números" value="@if( old('cpf_cnpj') ){{ old('cpf_cnpj') }}@elseif( isset($registro->cpf_cnpj) ){{$registro->cpf_cnpj}}@endif">
                 @if($errors->has('cpf_cnpj'))
                  <small class="text-help">{{ $errors->first('cpf_cnpj') }}</small>
                @endif
              </div>
            </div>
            <div class="col-xs-12 col-sm-6">
              <div class="form-group {{ $errors->has('rg') ? 'has-danger' : '' }}">
                <label class="form-control-label" for="inputRG">RG</label>
                <input type="tel" class="form-control" id="inputRG" name="rg" placeholder="Digite o RG/Órgão Emissor" value="@if( old('rg') ){{ old('rg') }}@elseif( isset($registro->rg) ){{$registro->rg}}@endif">
                 @if($errors->has('rg'))
                  <small class="text-help">{{ $errors->first('rg') }}</small>
                @endif
              </div>
            </div>
          </div>
        </div>
        <div class="example">
          <h4 class="example-title">Endereço Residencial</h4>
          <div class="form-group {{ $errors->has('address_r') ? 'has-danger' : '' }}">
            <label class="form-control-label" for="inputAddressr">Logradouro</label>
            <input type="text" class="form-control" id="inputAddressr" value="@if( old('address_r') ){{ old('address_r') }}@elseif( isset($registro->address_r) ){{$registro->address_r}}@endif" name="address_r" placeholder="Ex. Rua das Oliveiras, 51">
            @if($errors->has('address_r'))
              <small class="text-help">{{ $errors->first('address_r') }}</small>
            @endif
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-6">
              <div class="form-group {{ $errors->has('estador_id') ? 'has-danger' : '' }}">
                <label class="form-control-label" for="inputEstador">Estado</label>
                <select required class="form-control select2-hidden-accessible" data-placeholder="Selecione o Estado" data-plugin="select2" tabindex="-1" aria-hidden="true" id="inputEstador" name="estador_id">
                  <option value="">Selecione o Estado</option> 
                  @foreach($estados as $estado)
                    @if( old('estador_id') == $estado->id )
                      <option selected value="{{ $estado->id }}">{{ $estado->name }}</option> 
                    @elseif(isset($registro->estador_id) and $registro->estador_id == $estado->id)
                      <option selected value="{{ $estado->id }}">{{ $estado->name }}</option> 
                    @else
                      <option value="{{ $estado->id }}">{{ $estado->name }}</option> 
                    @endif
                  @endforeach
                </select>
                @if($errors->has('estador_id'))
                <small class="text-help">{{ $errors->first('estado') }}</small>
                @endif
              </div>
            </div>
            <div class="col-xs-12 col-sm-6">
              <div class="form-group {{ $errors->has('cidader_id') ? 'has-danger' : '' }}">
                <label class="form-control-label" for="inputCidader">Cidade</label>
                <select required class="form-control select2-hidden-accessible" data-placeholder="Escolha um Estado Primeiro" data-plugin="select2" tabindex="-1" aria-hidden="true"  id="inputCidader" name="cidader_id">
                  <option value="">Escolha um Estado Primeiro</option> 
                </select>
                @if($errors->has('cidader_id'))
                  <small class="text-help">{{ $errors->first('cidader_id') }}</small>
                @endif
              </div>
            </div>
          </div>
          <div class="form-group {{ $errors->has('bairro_r') ? 'has-danger' : '' }}">
            <label class="form-control-label" for="inputbairror">Bairro</label>
            <input type="text" class="form-control" id="inputbairror" name="bairro_r" value="@if( old('bairro_r') ){{ old('bairro_r') }}@elseif( isset($registro->bairro_r) ){{$registro->bairro_r}}@endif"  placeholder="Ex. Centro">
            @if($errors->has('bairro_r'))
              <small class="text-help">{{ $errors->first('bairro_r') }}</small>
            @endif
          </div>
        </div>
        <div class="example">
          <h4 class="example-title">Endereço Comercial</h4>
          <div class="form-group {{ $errors->has('address') ? 'has-danger' : '' }}">
            <label class="form-control-label" for="inputText">Logradouro</label>
            <input type="text" class="form-control" id="inputText" value="@if( old('address') ){{ old('address') }}@elseif( isset($registro->address) ){{$registro->address}}@endif" name="address" placeholder="Ex. Rua das Oliveiras, 51">
            @if($errors->has('address'))
              <small class="text-help">{{ $errors->first('address') }}</small>
            @endif
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-6">
              <div class="form-group {{ $errors->has('estado_id') ? 'has-danger' : '' }}">
                <label class="form-control-label" for="inputEstado">Estado</label>
                <select class="form-control select2-hidden-accessible" data-placeholder="Selecione o Estado" data-plugin="select2" tabindex="-1" aria-hidden="true" id="inputEstado" name="estado_id">
                  <option value="">Selecione o Estado</option> 
                  @foreach($estados as $estado)
                    @if( old('estado_id') == $estado->id )
                      <option selected value="{{ $estado->id }}">{{ $estado->name }}</option> 
                    @elseif(isset($registro->estado_id) and $registro->estado_id == $estado->id)
                      <option selected value="{{ $estado->id }}">{{ $estado->name }}</option> 
                    @else
                      <option value="{{ $estado->id }}">{{ $estado->name }}</option> 
                    @endif
                  @endforeach
                </select>
                @if($errors->has('estado'))
                <small class="text-help">{{ $errors->first('estado') }}</small>
                @endif
              </div>
            </div>
            <div class="col-xs-12 col-sm-6">
              <div class="form-group {{ $errors->has('cidade_id') ? 'has-danger' : '' }}">
                <label class="form-control-label" for="inputCidade">Cidade</label>
                <select class="form-control select2-hidden-accessible" data-placeholder="Escolha um Estado Primeiro" data-plugin="select2" tabindex="-1" aria-hidden="true"  id="inputCidade" name="cidade_id">
                  <option value="">Escolha um Estado Primeiro</option> 
                </select>
                @if($errors->has('cidade_id'))
                  <small class="text-help">{{ $errors->first('cidade_id') }}</small>
                @endif
              </div>
            </div>
          </div>
          <div class="form-group {{ $errors->has('bairro') ? 'has-danger' : '' }}">
            <label class="form-control-label" for="inputbairro">Bairro</label>
            <input type="text" class="form-control" id="inputbairro" name="bairro" value="@if( old('bairro') ){{ old('bairro') }}@elseif( isset($registro->bairro) ){{$registro->bairro}}@endif"  placeholder="Ex. Centro">
            @if($errors->has('bairro'))
              <small class="text-help">{{ $errors->first('bairro') }}</small>
            @endif
          </div>
        </div>

        <div class="example">
          <h4 class="example-title">Formas de Pagamento</h4>
          <div id="radios_pagamento" class="form-group mt20 form-inline form-material">
            <div class="radio-custom radio-primary">
              <input type="radio" id="inputPagamentoMensal" @if( old('pagamento') == 'mensal' ) checked @elseif(isset($registro->pagamento) and $registro->pagamento == 'mensal') checked @endif @if( !old('pagamento') and (!isset($registro->pagamento) or empty($registro->pagamento))) checked @endif value="mensal" name="pagamento" />
              <label for="inputPagamentoMensal">Mensal</label>
            </div>
            <div class="radio-custom radio-primary" style="margin-left:20px">
              <input type="radio" id="inputPagamentoQuinzenal" @if( old('pagamento') == 'quinzenal' ) checked @elseif(isset($registro->pagamento) and $registro->pagamento == 'quinzenal') checked @endif value="quinzenal" name="pagamento" />
              <label for="inputPagamentoQuinzenal">Quinzenal</label>
            </div>
            <div class="radio-custom radio-primary" style="margin-left:20px">
              <input type="radio" id="inputPagamentoSemanal" @if( old('pagamento') == 'semanal' ) checked @elseif(isset($registro->pagamento) and $registro->pagamento == 'semanal') checked @endif value="semanal" name="pagamento" />
              <label for="inputPagamentoSemanal">Semanal</label>
            </div>
          </div>
        </div>
        <div class="example">
          <h4 class="example-title">Contrato</h4>
          <input type="file" name="files[]" value="" id="filer_input">
        </div>

        <input type="hidden" id="input_contrato" name="contrato" value="@if( isset($registro->contrato) ){{$registro->contrato}}@endif">
      </div>
    </div>
  </div>
</div>

@section('plugins')
  <script src="{{ URL::asset('global/js/jquery.fileuploader.min.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/select2/select2.full.min.js') }}"></script>
@append

@section('scripts')
  <script src="{{ URL::asset('global/js/Plugin/select2.js') }}"></script>
@append

@section('scriptpersonalizado')
  <script type="text/javascript">
    jQuery(document).ready(function ($) {

      same_type();

      jQuery("#filer_input").fileuploader({
          limit: 1,
          showThumbs: true,
          addMore: false,
          extensions: ["pdf"],
          allowDuplicates: true,
          captions: {
                button: "Selecione um Contrato",
                feedback: "Selecione um arquivo para upload",
                feedback2: "Contrato Cadastrado",
                removeConfirmation: "Tem certeza que deseja apagar este arquivo?",
                errors: {
                    filesLimit: "Somente 1 contrato é permitido por clínica.",
                    filesType: "Somente PDF's são permitidos a serem enviados.",
                    filesSize: "O arquivo que está tentando enviar é muito grande!",
                    filesSizeAll: "O arquivos que vosê escolheu é muito grande!",
                    folderUpload: "Você não tem permissão para fazer upload de pastas."
                }
            },
            @if(isset($registro->contrato) and !empty($registro->contrato))
            files: 
            [
                {
                    name: "{{$registro->contrato}}",
                    size: '',
                    type: "application/pd",
                    file: '{{ URL::asset("img/$registro->contrato") }}',
                    url: '{{ URL::asset("img/$registro->contrato") }}'
                }
            ],
            @endif
            upload: {
              url: '{{ URL::asset("global/src/vendor/fileuploader/ajax_upload_file.php") }}',
              data: null,
              type: "POST",
              enctype: "multipart/form-data",
               start: true,
              synchron: true,
              onSuccess: function(result, item){
                var data = JSON.parse(result);
        
                if(data.isSuccess && data.files[0]) {
                    var nome = data.files[0].name;
                    jQuery("#input_contrato").val(nome);
                }

              alert("Contrato enviado com sucesso");
            },
            onError: function(item) {
              alert('Ops, houve um erro ao enviar o arquivo.');
            },
            statusCode: null,
            onProgress: null,
            onComplete: null,
            onRemove: function(item){
              jQuery("#input_contrato").val();
                jQuery.post('{{ URL::asset("global/src/vendor/fileuploader/ajax_remove_file.php") }}', {file: item.name});
            }
          }
        });

      @if(isset($registro->type) and $registro->type == 'juridico')
        $('#inputTipoResponsavelJuridico').trigger('click');
        $('#textCpfCnpj').html('CNPJ');
        $("#inputCPFCNPJ").val('{{ $registro->cpf_cnpj }}');
      @endif

      $('#radios input').change(function () {
          same_type();
      })

      function same_type () {
          if ($('#inputTipoResponsavelFisico').is(':checked')) {
              $("#inputCPFCNPJ").mask("999.999.999-99");
              $('#textCpfCnpj').html('CPF');
          }

          if ($('#inputTipoResponsavelJuridico').is(':checked')) {
              $("#inputCPFCNPJ").mask("99.999.999/9999-99");
              $('#textCpfCnpj').html('CNPJ');
          }
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


      $('#inputEstado').change(function() {
        var id = $(this).val();
        getCities(id);
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

      $('#inputEstador').change(function() {
        var id = $(this).val();
        getCitiesr(id);
      });

      @if( old('estador_id') )         
        $('#inputEstador').val({{ old('estador_id') }}).select2("destroy").select2();
        getCitiesr({{ old('estador_id') }});
      @elseif( isset($registro->estador_id) and !empty($registro->estador_id) )
        $('#inputEstador').val({{ $registro->estador_id }}).select2("destroy").select2();
        getCitiesr({{ $registro->estador_id }});
      @endif

      function getCitiesr (id) {
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
              $('#inputCidader').html(options).select2("destroy").select2();

              @if( old('cidader_id') )         
                $('#inputCidader').val({{ old('cidader_id') }}).select2("destroy").select2();
              @elseif( isset($registro->cidader_id) and !empty($registro->cidader_id) )
                $('#inputCidader').val({{ $registro->cidader_id }}).select2("destroy").select2();
              @endif
            };
          }
        });
      }
    })
  </script>
@append