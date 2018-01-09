@extends('layout.page')
@section('title', 'Entrar') 

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
            <div class="panel" style="margin-bottom:0">
              <div class="panel-body">
                <div class="brand">
                  <img class="brand-img" src="{{ URL::asset('assets/images/logotipo-programa-semente_full.png') }}" alt="Programa Semente">
                </div>

                <form method="POST" action="{{ url('/login') }}" autocomplete="off">
                  {{ csrf_field() }}
                  <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                      <input type="text" placeholder="E-mail" class="form-control" name="email" value="{{ old('email') }}" required autofocus />
                      @if ($errors->has('email'))
                          <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                  </div>

                  <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                      <input type="password" placeholder="Senha" class="form-control" name="password" required />
                      @if ($errors->has('password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                      @endif
                  </div>

                  <div class="form-group clearfix">
                    <div class="checkbox-custom checkbox-inline checkbox-primary checkbox-lg pull-xs-left">
                      <input type="checkbox" id="inputCheckbox" name="remember">
                      <label for="inputCheckbox">Lembrar-me</label>
                    </div>
                  </div>

                  <button type="submit" class="btn btn-success btn-block btn-lg">Login</button>
                  <a class="pull-xs-right" title="Esqueceu sua Senha?" href="{{ url('/password/reset') }}">Esqueceu sua Senha?</a>
                  <div class="clearfix"></div>
                </form>

              </div>
              <footer class="panel-footer">
                    <p>Ainda não tem cadastro? <a title="Cadastre-se" href="{{ url('/register') }}">Cadastre-se</a></p>
                  </footer>
            </div>
          </div>
      </div>
      <!-- End Page -->
  </body>
@endsection
