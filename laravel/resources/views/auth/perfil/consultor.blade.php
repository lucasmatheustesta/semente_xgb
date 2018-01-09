@extends('layout.page')
@section('title', 'Meu Perfil') 

@section('css')
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/bootstrap-datepicker/bootstrap-datepicker.css') }}">
@append

@section('content')
  <body class="page-profile" style="opacity:0">

    @include('layout.nav')
    @include('layout.menu')

    <div class="page">
      <div class="page-header">
        <h1 class="page-title">Meu Perfil</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">Home</a>
          </li>
          <li class="breadcrumb-item active">Meu Perfil</li>
        </ol>
      </div>
      <div class="page-content container-fluid">
        <div class="row">
          <form autocomplete="off" enctype="multipart/form-data" action="{{ route('user.atualizar')}}" method="post">
            <div class="col-xs-12 col-lg-3">
              <div class="card card-shadow text-xs-center">
                <div class="card-block">
                  <div class="text-left">
                    <h3 class="example-title mgt0">Foto</h3>
                  </div>
                  @include('_form.avatar')
                  <h4 class="profile-user mgb0">{{ $registro->user->name }}</h4>
                  <p>{{ $type }}</p>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-lg-9">
              <div class="panel panel-folha">
                <div class="dobra"></div>
                <div class="panel-body">
                  <div class="example mgt0">
                    <h3 class="example-title mgt0">Dados Pessoais</h3>
                    <div class="row">
                      <div class="col-xs-6">
                        <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
                          <label class="form-control-label" for="inputName">Nome</label>
                          <input type="text" required class="form-control" id="inputName" name="name" placeholder="Ex. João da Silva" value="@if( old('name') ){{ old('name') }}@elseif( isset($registro->user->name) ){{$registro->user->name}}@endif">
                          @if($errors->has('name'))
                            <small class="text-help">{{ $errors->first('name') }}</small>
                          @endif
                        </div>
                      </div> 
                      <div class="col-xs-6">
                        <div class="form-group {{ $errors->has('code') ? 'has-danger' : '' }}">
                          <label class="form-control-label" for="inputCode">Código Promocional</label>
                          <input readonly type="text" class="form-control upper" id="inputCode" name="code" placeholder="Ex. HO16" value="@if( old('code') ){{ old('code') }}@elseif( isset($registro->code) ){{$registro->code}}@endif">
                          @if($errors->has('code'))
                            <small class="text-help">{{ $errors->first('code') }}</small>
                          @endif
                        </div>
                      </div> 
                    </div>
                    <div class="row">
                      <div class="col-xs-12 col-sm-6">
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
                      </div>

                      <div class="col-xs-12 col-sm-6">
                        <div class="form-group {{ $errors->has('cpf') ? 'has-danger' : '' }}">
                          <label class="form-control-label" for="inputCpf">CPF</label>
                          <input type="text" class="form-control" id="inputCpf" name="cpf" placeholder="Digite apenas números" value="@if( old('cpf') ){{ old('cpf') }}@elseif( isset($registro->cpf) ){{$registro->cpf}}@endif">
                          @if($errors->has('cpf'))
                            <small class="text-help">{{ $errors->first('cpf') }}</small>
                          @endif
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-xs-12 col-sm-6">
                        <div class="form-group {{ $errors->has('phone') ? 'has-danger' : '' }}">
                          <label class="form-control-label" for="inputTelefone">Telefone</label>
                          <input type="tel" class="form-control" id="inputTelefone" name="phone" placeholder="Digite apenas números" value="@if( old('phone') ){{ old('phone') }}@elseif( isset($registro->phone) ){{$registro->phone}}@endif">
                           @if($errors->has('phone'))
                            <small class="text-help">{{ $errors->first('phone') }}</small>
                          @endif
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-6">
                        <div class="form-group {{ $errors->has('mobile') ? 'has-danger' : '' }}">
                          <label class="form-control-label" for="inputCelular">Celular</label>
                          <input type="tel" class="form-control" id="inputCelular" name="mobile" placeholder="Digite apenas números" value="@if( old('mobile') ){{ old('mobile') }}@elseif( isset($registro->mobile) ){{$registro->mobile}}@endif">
                           @if($errors->has('mobile'))
                            <small class="text-help">{{ $errors->first('mobile') }}</small>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  @include('_form.acesso')
                  @include('_form.endereco')
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <a title="Cancelar" href="{{ route('dashboard') }}" class="btn btn-default pull-left btn-lg waves-effect"><i class="fa fa-ban" aria-hidden="true"></i> Cancelar</a>
                  <button type="submit" class="btn btn-success pull-right btn-lg waves-effect"><i class="fa fa-floppy-o" aria-hidden="true"></i> Atualizar</button>
                </div>
              </div>
            </div>
            <input type="hidden" name="_method" value="put">
          </form>
        </div>
      </div>
    </div>
  </body>
@endsection

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
    })
  </script>
@append