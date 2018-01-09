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
                
                <div class="nav-tabs-horizontal nav-tabs-inverse nav-tabs-animate" data-plugin="tabs">
                    <ul class="nav nav-tabs nav-tabs-solid" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-toggle="tab" href="#tab-aluno" aria-controls="tab-aluno" role="tab" aria-expanded="true">Sou Aluno</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-toggle="tab" href="#tab-professor" aria-controls="tab-professor" role="tab" aria-expanded="false">Sou Professor</a>
                        </li>
                    </ul>
                    <div class="tab-content" style="padding: 0">
                        <div class="tab-pane active animation-fade" id="tab-aluno" role="tabpanel">
                            <form role="form" method="POST" action="{{ url('/register') }}" autocomplete="off">
                              {{ csrf_field() }}

                              <div class="form-group {{ $errors->has('nome') ? ' has-error' : '' }}">
                                  <input type="text" placeholder="Nome" class="form-control" name="text" value="{{ old('nome') }}" required autofocus />
                                  @if ($errors->has('nome'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('nome') }}</strong>
                                      </span>
                                  @endif
                              </div>

                               <div class="form-group {{ $errors->has('responsavel') ? ' has-error' : '' }}">
                                  <input type="text" placeholder="Nome do Responsável" class="form-control" name="text" value="{{ old('responsavel') }}" required />
                                  @if ($errors->has('responsavel'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('responsavel') }}</strong>
                                      </span>
                                  @endif
                              </div>

                              <div class="form-group {{ $errors->has('codigo_aluno') ? ' has-error' : '' }}">
                                  <input type="text" placeholder="Código do Aluno" class="form-control" name="text" value="{{ old('codigo_aluno') }}" required />
                                  @if ($errors->has('codigo_aluno'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('codigo_aluno') }}</strong>
                                      </span>
                                  @endif
                              </div>

                              <div class="form-group {{ $errors->has('escola') ? ' has-error' : '' }}">
                                  <input type="text" placeholder="Escola" class="form-control" name="text" value="{{ old('escola') }}" required />
                                  @if ($errors->has('escola'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('escola') }}</strong>
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

                              <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                  <input type="password" placeholder="Confirmar Senha" class="form-control" name="password_confirmation" required />
                                  @if ($errors->has('password_confirmation'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('password_confirmation') }}</strong>
                                  </span>
                                  @endif
                              </div>

                              <button type="submit" class="btn btn-success btn-block btn-lg">Cadastrar</button>
                            </form>
                        </div>
                        <div class="tab-pane animation-fade" id="tab-professor" role="tabpanel">
                            <form role="form" method="POST" action="{{ url('/register') }}" autocomplete="off">
                              {{ csrf_field() }}

                              <div class="form-group {{ $errors->has('nome') ? ' has-error' : '' }}">
                                  <input type="text" placeholder="Nome" class="form-control" name="text" value="{{ old('nome') }}" required autofocus />
                                  @if ($errors->has('nome'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('nome') }}</strong>
                                      </span>
                                  @endif
                              </div>

                              <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                  <input type="text" placeholder="E-mail" class="form-control" name="email" value="{{ old('email') }}" required />
                                  @if ($errors->has('email'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                  @endif
                              </div>

                              <div class="form-group {{ $errors->has('codigo_professor') ? ' has-error' : '' }}">
                                  <input type="text" placeholder="Código do Professor" class="form-control" name="text" value="{{ old('codigo_professor') }}" required />
                                  @if ($errors->has('codigo_professor'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('codigo_professor') }}</strong>
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

                              <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                  <input type="password" placeholder="Confirmar Senha" class="form-control" name="password_confirmation" required />
                                  @if ($errors->has('password_confirmation'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('password_confirmation') }}</strong>
                                  </span>
                                  @endif
                              </div>

                              <button type="submit" class="btn btn-success btn-block btn-lg">Cadastrar</button>
                            </form>
                        </div>
                    </div>
                </div>
              </div>
            </div>

          </div>
      </div>
      <!-- End Page -->
  </body>
@endsection