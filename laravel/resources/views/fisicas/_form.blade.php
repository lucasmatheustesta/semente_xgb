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
          <h3 class="example-title mgt0">Foto</h3>
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

        <div class="example-wrap m-lg-0">
          <div class="nav-tabs-animate nav-tabs-horizontal" data-plugin="tabs">
                  
            <ul class="nav nav-tabs nav-tabs-line" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link active" data-toggle="tab" href="#dados" aria-controls="dados" role="tab">Dados Pessoais</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" data-toggle="tab" href="#enderecos" aria-controls="enderecos" role="tab">Endereços</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" data-toggle="tab" href="#escolaridades" aria-controls="escolaridades" role="tab">Escolaridade</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" data-toggle="tab" href="#associacoes" aria-controls="associacoes" role="tab">Associações</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" data-toggle="tab" href="#especialidades" aria-controls="especialidades" role="tab">Especialidades</a>
              </li>
            </ul>



                  <div class="tab-content p-t-20">
                    <div class="tab-pane active" id="dados" role="tabpanel">
                      
                      <div class="example mgt0">
                        <div class="row">
                          <div class="col-xs-12 col-sm-6">
                            <div class="form-group {{ $errors->has('nome') ? 'has-danger' : '' }}">
                              <label class="form-control-label" for="inputNome">Nome</label>
                              <input type="text" class="form-control" id="inputNome" required name="nome" placeholder="" value="@if( old('nome') ){{ old('nome') }}@elseif( isset($registro->nome) ){{$registro->nome}}@endif">
                              @if($errors->has('nome'))
                                <small class="text-help">{{ $errors->first('nome') }}</small>
                              @endif
                            </div>
                          </div>
                          <div class="col-xs-12 col-sm-4">
                            <div class="form-group {{ $errors->has('crm') ? 'has-danger' : '' }}">
                              <label class="form-control-label" for="inputCrm">CRM</label>
                              <input type="text" class="form-control" id="inputCrm" name="crm" placeholder="" value="@if( old('crm') ){{ old('crm') }}@elseif( isset($registro->crm) ){{$registro->crm}}@endif">
                              @if($errors->has('crm'))
                                <small class="text-help">{{ $errors->first('crm') }}</small>
                              @endif
                            </div>
                          </div>

                          <div class="col-xs-12 col-sm-2">
                            <div class="form-group {{ $errors->has('ufcrm') ? 'has-danger' : '' }}">
                              <label class="form-control-label" for="inputUfcrm">UF CRM</label>
                              <input type="text" class="form-control" id="inputUfcrm" name="ufcrm" placeholder="" value="@if( old('ufcrm') ){{ old('ufcrm') }}@elseif( isset($registro->ufcrm) ){{$registro->ufcrm}}@endif">
                              @if($errors->has('ufcrm'))
                                <small class="text-help">{{ $errors->first('ufcrm') }}</small>
                              @endif
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-xs-12 col-sm-4">
                            <div class="form-group {{ $errors->has('cpf') ? 'has-danger' : '' }}">
                              <label class="form-control-label" for="inputCPF">CPF</label>
                              <input type="text" class="form-control" id="inputCPF" name="cpf" placeholder="" value="@if( old('cpf') ){{ old('cpf') }}@elseif( isset($registro->cpf) ){{$registro->cpf}}@endif">
                              @if($errors->has('cpf'))
                                <small class="text-help">{{ $errors->first('cpf') }}</small>
                              @endif
                            </div>
                          </div>
                          <div class="col-xs-12 col-sm-4">
                            <div class="form-group {{ $errors->has('data_nascimento') ? 'has-danger' : '' }}">
                              <label class="form-control-label" for="inputDatanascimento">Data de Nascimento</label>
                              <input type="text" class="form-control" id="inputDatanascimento" name="data_nascimento" placeholder="" value="@if( old('data_nascimento') ){{ old('data_nascimento') }}@elseif( isset($registro->data_nascimento) ){{$registro->data_nascimento}}@endif">
                              @if($errors->has('data_nascimento'))
                                <small class="text-help">{{ $errors->first('data_nascimento') }}</small>
                              @endif
                            </div>
                          </div>

                          <div class="col-xs-12 col-sm-4">
                            <div class="form-group {{ $errors->has('sexo') ? 'has-danger' : '' }}">
                              <label class="form-control-label" for="inputSexo">Sexo</label>
                              <select class="form-control select2-hidden-accessible" data-placeholder="Selecione uma Opçåo" data-plugin="select2" id="inputSexo" name="sexo">
                                <option value="">Selecione uma Opçåo</option>
                                <option value="doutorado">Masculino</option> 
                                <option value="graduacao">Feminino</option> 
                              </select>
                              @if($errors->has('sexo'))
                                <small class="text-help">{{ $errors->first('sexo') }}</small>
                              @endif
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12 col-sm-4">
                            <div class="form-group {{ $errors->has('rg') ? 'has-danger' : '' }}">
                              <label class="form-control-label" for="inputRg">RG</label>
                              <input type="text" class="form-control" id="inputRg" name="rg" placeholder="" value="@if( old('rg') ){{ old('rg') }}@elseif( isset($registro->rg) ){{$registro->rg}}@endif">
                              @if($errors->has('rg'))
                                <small class="text-help">{{ $errors->first('rg') }}</small>
                              @endif
                            </div>
                          </div>
                          <div class="col-xs-12 col-sm-2">
                            <div class="form-group {{ $errors->has('orgao_emissor') ? 'has-danger' : '' }}">
                              <label class="form-control-label" for="inputOrgaoEmissor">Orgão Emissor</label>
                              <input type="text" class="form-control" id="inputOrgaoEmissor" name="orgao_emissor" placeholder="" value="@if( old('orgao_emissor') ){{ old('orgao_emissor') }}@elseif( isset($registro->orgao_emissor) ){{$registro->orgao_emissor}}@endif">
                              @if($errors->has('orgao_emissor'))
                                <small class="text-help">{{ $errors->first('orgao_emissor') }}</small>
                              @endif
                            </div>
                          </div>

                          <div class="col-xs-12 col-sm-3">
                            <div class="form-group {{ $errors->has('estado_civil') ? 'has-danger' : '' }}">
                              <label class="form-control-label" for="inputEstadoCivil">Estado Civil</label>
                              <input type="text" class="form-control" id="inputEstadoCivil" name="estado_civil" placeholder="" value="@if( old('estado_civil') ){{ old('estado_civil') }}@elseif( isset($registro->estado_civil) ){{$registro->estado_civil}}@endif">
                              @if($errors->has('estado_civil'))
                                <small class="text-help">{{ $errors->first('estado_civil') }}</small>
                              @endif
                            </div>
                          </div>

                          <div class="col-xs-12 col-sm-3">
                            <div class="form-group {{ $errors->has('matricula') ? 'has-danger' : '' }}">
                              <label class="form-control-label" for="inputMatricula">Matricula</label>
                              <input type="text" class="form-control" id="inputMatricula" name="matricula" placeholder="" value="@if( old('matricula') ){{ old('matricula') }}@elseif( isset($registro->matricula) ){{$registro->matricula}}@endif">
                              @if($errors->has('matricula'))
                                <small class="text-help">{{ $errors->first('matricula') }}</small>
                              @endif
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-xs-12 col-sm-4">
                            <div class="form-group {{ $errors->has('entidade') ? 'has-danger' : '' }}">
                              <label class="form-control-label" for="inputEntidade">Entidade</label>
                              <input type="text" class="form-control" id="inputEntidade" name="entidade" placeholder="" value="@if( old('entidade') ){{ old('entidade') }}@elseif( isset($registro->entidade) ){{$registro->entidade}}@endif">
                              @if($errors->has('entidade'))
                                <small class="text-help">{{ $errors->first('entidade') }}</small>
                              @endif
                            </div>
                          </div>
                          <div class="col-xs-12 col-sm-4">
                            <div class="form-group {{ $errors->has('categoria_profissional') ? 'has-danger' : '' }}">
                              <label class="form-control-label" for="inputCategoriaProfissional">Categoria Profissional</label>
                              <input type="text" class="form-control" id="inputCategoriaProfissional" name="categoria_profissional" placeholder="" value="@if( old('categoria_profissional') ){{ old('categoria_profissional') }}@elseif( isset($registro->categoria_profissional) ){{$registro->categoria_profissional}}@endif">
                              @if($errors->has('categoria_profissional'))
                                <small class="text-help">{{ $errors->first('categoria_profissional') }}</small>
                              @endif
                            </div>
                          </div>
                          <div class="col-xs-12 col-sm-4">
                            <div class="form-group {{ $errors->has('data_cadastro') ? 'has-danger' : '' }}">
                              <label class="form-control-label" for="inputDataCadastro">Data de Cadastro</label>
                              <input type="text" class="form-control" id="inputDataCadastro" name="data_cadastro" placeholder="" value="@if( old('data_cadastro') ){{ old('data_cadastro') }}@elseif( isset($registro->data_cadastro) ){{$registro->data_cadastro}}@endif">
                              @if($errors->has('data_cadastro'))
                                <small class="text-help">{{ $errors->first('data_cadastro') }}</small>
                              @endif
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-xs-12 col-sm-4">
                            <div class="form-group {{ $errors->has('nacionalidade') ? 'has-danger' : '' }}">
                              <label class="form-control-label" for="inputNacionalidade">Nacionalidade</label>
                              <input type="text" class="form-control" id="inputNacionalidade" name="nacionalidade" placeholder="" value="@if( old('nacionalidade') ){{ old('nacionalidade') }}@elseif( isset($registro->nacionalidade) ){{$registro->nacionalidade}}@endif">
                              @if($errors->has('nacionalidade'))
                                <small class="text-help">{{ $errors->first('nacionalidade') }}</small>
                              @endif
                            </div>
                          </div>
                          <div class="col-xs-12 col-sm-4">
                            <div class="form-group {{ $errors->has('uf') ? 'has-danger' : '' }}">
                              <label class="form-control-label" for="inputUf">UF</label>
                              <input type="text" class="form-control" id="inputUf" name="uf" placeholder="" value="@if( old('uf') ){{ old('uf') }}@elseif( isset($registro->uf) ){{$registro->uf}}@endif">
                              @if($errors->has('uf'))
                                <small class="text-help">{{ $errors->first('uf') }}</small>
                              @endif
                            </div>
                          </div>

                          <div class="col-xs-12 col-sm-4">
                            <div class="form-group {{ $errors->has('naturalidade') ? 'has-danger' : '' }}">
                              <label class="form-control-label" for="inputNaturalidade">Naturalidade</label>
                              <input type="text" class="form-control" id="inputNaturalidade" name="naturalidade" placeholder="" value="@if( old('naturalidade') ){{ old('naturalidade') }}@elseif( isset($registro->naturalidade) ){{$registro->naturalidade}}@endif">
                              @if($errors->has('naturalidade'))
                                <small class="text-help">{{ $errors->first('naturalidade') }}</small>
                              @endif
                            </div>
                          </div>
                        </div>

                       
                      </div>

                      @include('_form.acesso')

                        <div class="example">
                          <h4 class="example-title">Obs</h4>
                          <div class="form-group">
                            <textarea name="obs" id="" cols="30" rows="5" class="form-control"></textarea>
                          </div>
                        </div>


                      <div class="example">
                        <div class="row">
                          <div class="col-xs-12 col-sm-3">
                              <label for="">Receber E-mails?</label> <br>
                              <input type="checkbox" id="inputBasicOff" name="" data-plugin="switchery" />
                          </div>
                          <div class="col-xs-12 col-sm-3">
                              <label for="">Receber Revista?</label> <br>
                              <input type="checkbox" id="inputBasicOff" name="" data-plugin="switchery" />
                          </div>
                          <div class="col-xs-12 col-sm-3">
                              <label for="">Falecido?</label> <br>
                              <input type="checkbox" id="inputBasicOff" name="" data-plugin="switchery" />
                          </div>
                        </div>
                      </div>

                    </div>
                  <div class="tab-pane" id="enderecos" role="tabpanel">
                    <div class="example mgt0">
                      @include('_form.enderecos')
                    </div>

                      <div class="example">
                        <h4 class="example-title">Telefones</h4>
                        @include('_form.contatos')
                      </div>
                    </div>

                    <div class="tab-pane" id="escolaridades" role="tabpanel">
                      @include('_form.faculdades')
                    </div>

                    <div class="tab-pane" id="associacoes" role="tabpanel">
                      @include('_form.associacoes')
                    </div>

                    <div class="tab-pane" id="especialidades" role="tabpanel">
                      @include('_form.especialidades')
                    </div>
                  </div>
                </div>
        </div>

        <div class="clearfix"></div>

      </div>
    </div>
  </div>
</div>

{{ csrf_field() }}

@section('plugins')
  <script src="{{ URL::asset('global/vendor/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/select2/select2.full.min.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/matchheight/jquery.matchHeight-min.js') }}"></script>
@append

@section('scripts')
  <script src="{{ URL::asset('global/js/Plugin/select2.js') }}"></script>
  <script src="{{ URL::asset('global/js/Plugin/closeable-tabs.js') }}"></script>
  <script src="{{ URL::asset('global/js/Plugin/tabs.js') }}"></script>
@append

@section('scriptpersonalizado')
  <script type="text/javascript">
    jQuery(document).ready(function ($) {

      $("#inputTelefone").mask("(99) 9999-9999?9");
      $("#inputCPF").mask("999.999.999-99");
      $("#inputDatanascimento").mask("99/99/9999");
      $('#inputDatanascimento').datepicker({
        format: "dd/mm/yyyy",
        language: "pt-BR",
        autoclose: true,
        todayHighlight: true
      });
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