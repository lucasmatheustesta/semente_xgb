@extends('layout.page')
@section('title', 'Redefinir Senha') 

@section('css')
  <link rel="stylesheet" href="{{ URL::asset('css/login.css') }}">
@endsection

@section('content')
    <body class="animsition page-login-v3 layout-full">
      <!--[if lt IE 8]>
          <p class="browserupgrade">
          Você esta usando um navegador <b>desatualizado</b>. <a href="http://browsehappy.com/">Atualize</a> seu navegador para melhorar sua experiência.
          </p>
      <![endif]-->

      <!-- Page -->
      <div class="page vertical-align text-xs-center" data-animsition-in="fade-in" data-animsition-out="fade-out">>
          <div class="page-content vertical-align-middle" style="padding-bottom:0">
            <div class="panel">
              <div class="panel-body">
                <div class="brand">
                  <img class="brand-img" src="{{ URL::asset('assets/images/logotipo-programa-semente_full.png') }}" alt="Programa Semente">
                </div>

                <form class="form-horizontal" role="form" method="POST" autocomplete="off" action="{{ url('/password/reset') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                      <input type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus />
                      <label class="floating-label">E-mail</label>
                      @if ($errors->has('email'))
                          <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                  </div>

                  <div class="form-group form-material floating {{ $errors->has('password') ? ' has-error' : '' }}" data-plugin="formMaterial">
                      <input type="password" class="form-control" name="password" value="{{ old('password') }}" required />
                      <label class="floating-label">Senha</label>
                      @if ($errors->has('password'))
                          <span class="help-block">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif
                  </div>

                  <div class="form-group form-material floating {{ $errors->has('password_confirmation') ? ' has-error' : '' }}" data-plugin="formMaterial">
                      <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" required />
                      <label class="floating-label">Confirmar Senha</label>
                      @if ($errors->has('password_confirmation'))
                          <span class="help-block">
                              <strong>{{ $errors->first('password_confirmation') }}</strong>
                          </span>
                      @endif
                  </div>

                  <div class="form-group clearfix">
                    <a class="pull-xs-right" href="{{ url('/') }}">Entrar</a>
                  </div>

                  <button type="submit" class="btn btn-success btn-block btn-lg m-t-40">Redefinir</button>
                </form>
              </div>
            </div>
          </div>
      </div>
      <!-- End Page -->
  </body>
@endsection
