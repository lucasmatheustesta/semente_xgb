<div class="row">
  <div class="col-xs-12 col-sm-8">
    <div class="example">
      <h4 class="example-title">Dados do Consultor</h4>

      <div class="form-group form-material" data-plugin="formMaterial">
        <label class="form-control-label" for="inputName">Consultor</label>
        <input type="text" class="form-control" id="inputName" name="nome" placeholder="Ex. João Silva" value="{{ isset($registro->nome) ? $registro->nome : '' }}">
      </div>

      <div class="form-group form-material" data-plugin="formMaterial">
        <label class="form-control-label" for="inputTelefone">Telefone</label>
        <input type="text" class="form-control" id="inputTelefone" name="telefone" placeholder="Digite apenas números" value="{{ isset($registro->telefone) ? $registro->telefone : '' }}">
      </div>

      <div class="form-group form-material" data-plugin="formMaterial">
        <label class="form-control-label" for="inputEmail">E-mail</label>
        <input type="text" class="form-control" id="inputEmail" name="email" placeholder="Ex. marcos@statusodontologia.com.br" value="{{ isset($registro->email) ? $registro->email : '' }}">
      </div>

      <div class="form-group form-material" data-plugin="formMaterial">
        <label class="form-control-label" for="inputSite">Site</label>
        <input type="text" class="form-control" id="inputSite" name="site" placeholder="http://" value="{{ isset($registro->site) ? $registro->site : '' }}">
      </div>
    </div>

    <div class="example">
      <h4 class="example-title">Endereço</h4>
      <div class="form-group form-material" data-plugin="formMaterial">
        <label class="form-control-label" for="inputText">Logradouro</label>
        <input type="text" class="form-control" id="inputText" name="endereco" placeholder="Ex. Rua das Oliveiras, 51">
      </div>
      <div class="form-group form-material" data-plugin="formMaterial">
        <label class="form-control-label" for="inputText">Estado</label>
        <select class="form-control" name="estado">
          <option value="">Selecione o Estado</option> 
          @foreach($estados as $estado)
            @if(isset($registro->estado) and $registro->estado == $estado->id)
              <option selected value="{{ $estado->id }}">{{ $estado->name }}</option> 
            @else
              <option value="{{ $estado->id }}">{{ $estado->name }}</option> 
            @endif
          @endforeach
        </select>
      </div>
      <div class="form-group form-material" data-plugin="formMaterial">
        <label class="form-control-label" for="inputCidade">Cidade</label>
        <input type="text" class="form-control" id="inputCidade" name="cidade" placeholder="Ex. São Paulo">
      </div>
      <div class="form-group form-material" data-plugin="formMaterial">
        <label class="form-control-label" for="inputbairro">Bairro</label>
        <input type="text" class="form-control" id="inputbairro" name="bairro" placeholder="Ex. Centro">
      </div>

    </div>
  </div>
  <div class="col-xs-12 col-sm-4">
    <div class="example">
      <h4 class="example-title" style="margin-left: 25%;">Foto</h4>
      <input type="file" id="input-file-now" data-plugin="dropify" data-default-file="Foto" name="foto" />
    </div>
  </div>
</div>