@extends('layout.page')
@section('title', 'Esqueci Minha Senha') 

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

                  @if (session('status'))
                      <div class="alert alert-success">
                          {{ session('status') }}
                      </div>
                  @endif

                <form method="POST" action="{{ url('/password/email') }}" autocomplete="off">
                  {{ csrf_field() }}
                  <p style="margin-bottom:15px;font-weight:bold;">Insira seu e-mail abaixo para redefinir sua senha:</p>
                  <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                      <input type="email" class="form-control" name="email" placeholder="E-mail" value="{{ old('email') }}" required autofocus />
                      @if ($errors->has('email'))
                          <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                  </div>
                  <button type="submit" class="btn btn-success btn-block btn-lg">Enviar</button>
                </form>

              </div>
            </div>
          </div>
      </div>
      <!-- End Page -->
  </body>
@endsection
