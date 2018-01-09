@extends('layout.page')
@section('title', 'Relatório do Contrato') 

@section('css')
  <link rel="stylesheet" href="{{ URL::asset('assets/examples/css/apps/contacts.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/select2/select2.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/bootstrap-table/bootstrap-table.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/examples/css/structure/pagination.css') }}">
@endsection

@section('content')
<body class="animsition">

  @include('layout.nav')
  @include('layout.menu')
  
 <div class="page">
    <div class="page-header">
      <h1 class="page-title">Relatório do Contrato</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('dashboard') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{ route('contratos') }}">Contratos</a>
        </li>
        <li class="breadcrumb-item active">Relatório do Contrato</li>
      </ol>
    </div>

    <div id="tableServicos" class="page-content">
      
      @php ($vm = 0)
      @php ($vp = 0)
      @php ($vco = 0)
      @php ($vc = 0)


      <div class="row">
        <div class="col-xs-12 col-sm-2"></div>
        <div class="col-xs-12 col-sm-8">
          <div class="panel panel-folha">
            <div class="dobra"></div>
            <div class="panel-body">
              <div class="example-wrap">
                <div class="example">
                  <h2 class="example-title">
                    Contrato #{{ $registro->id }}
                    <div class="pull-right">
                      <small>Data: {{ Carbon\Carbon::parse($registro->date)->format('d/m/Y') }}</small>
                    </div>
                  </h2>
                  <div class="row">
                    <div class="col-xs-12 col-sm-4">
                      <h4 class="example-title">Clínica</h4>
                      <a class="avatar pull-left" href="javascript:void(0)">
                        @if(isset($clinica->user->image) and !empty($clinica->user->image) and file_exists($clinica->user->image))
                          <img class="img-fluid" src="{{ URL::asset($clinica->user->image) }}" alt="">
                        @else
                          <img class="img-fluid" src="{{ URL::asset('img/users/profile.jpg') }}" alt="">
                        @endif
                      </a>
                      <span style="position: relative;top: 10px;left: 10px;">
                        {{ $registro->clinica->user->name }}
                      </span>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                      <h4 class="example-title">Consultor</h4>
                      <a class="avatar pull-left" href="javascript:void(0)">
                        @if(isset($consultor->user->image) and !empty($consultor->user->image) and file_exists($consultor->user->image))
                          <img class="img-fluid" src="{{ URL::asset($consultor->user->image) }}" alt="">
                        @else
                          <img class="img-fluid" src="{{ URL::asset('img/users/profile.jpg') }}" alt="">
                        @endif
                      </a>
                      <span style="position: relative;top: 10px;left: 10px;">
                        {{ $registro->consultor->user->name }}
                      </span>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                      <h4 class="example-title">Paciente</h4>
                      <a class="avatar pull-left" href="javascript:void(0)">
                        @if(isset($paciente->image) and !empty($paciente->image) and file_exists($paciente->image))
                          <img class="img-fluid" src="{{ URL::asset($paciente->image) }}" alt="">
                        @else
                          <img class="img-fluid" src="{{ URL::asset('img/users/profile.jpg') }}" alt="">
                        @endif
                      </a>
                      <span style="position: relative;top: 10px;left: 10px;">
                        {{ $registro->paciente->name }}
                      </span>
                    </div>
                  </div>

                </div>

                <div class="exemple">
                  <div class="row relatorio">
                    <div class="col-xs-12">
                      <h4 class="example-title mgt40 mgb20">Serviços do Contrato</h4>
                      <table style="border:0" class="table table-bordered">
                        <thead>
                          <tr>
                            <td>Serviço</td>
                            <td>Valor</td>
                            <td>Pasta Ortodôntica</td>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($servicos as $servico)
                          <tr>
                            <td style="width:50%">{{ $servico->servico->title }}</td>
                            <td>R$ {{ number_format($servico->valor, 2, ',', '.') }}</td>
                            <td>R$ {{ number_format($servico->pasta, 2, ',', '.') }} </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>


                <div class="exemple">
                  @if($type == 'Consultor')
                    @if(isset($receitas_consultor) and !empty($receitas_consultor) and count($receitas_consultor) > 0)
                      <h2 style="margin-bottom:30px;" class="example-title mgt40">
                        Receitas
                      </h2>
                    @endif
                  @else
                    <h2 style="margin-bottom:30px;" class="example-title mgt40">
                        Receitas
                      </h2>
                  @endif

                  @can('add_clinica')
                    <div class="row relatorio">
                      <div class="col-xs-12">
                        <h4 class="example-title mgb20">Maximiza Odonto <span class="text-success">(Receber)</span></h4>
                        <table style="border:0" class="table table-bordered">
                          <thead>
                            <tr>
                              <td>Data</td>
                              <td>Serviço</td>
                              <td>Valor</td>
                              <td>Status</td>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($receitas_marcos as $receita)
                            @php ($vm += $receita->valor)
                            <tr>
                              <td>{{ Carbon\Carbon::parse($receita->data_cobranca)->format('d/m/Y') }}</td>
                              <td>{{ $receita->servico->title }}</td>
                              <td>R$ {{ number_format($receita->valor, 2, ',', '.') }} @if(isset($receita->description) and !empty($registro->description)) <small>({{ $registro->description }})</small>@endif</td>
                              <td>
                                @if($receita->status == '0')
                                  <span class="tag tag-warning">Aguardando</span>
                                @else
                                  <span class="tag tag-success">Pago</span>
                                @endif
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                          <tfoot>
                            <tr>
                              <td class="text-right" colspan="3">
                                Total: <b>R$ {{ number_format($vm, 2, ',', '.') }}</b>
                              </td>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                  @endcan
                  
                  @if($type == 'Admin' || $type == 'Consultor')
                    @if(isset($receitas_consultor) and !empty($receitas_consultor) and count($receitas_consultor) > 0)
                    <div class="row relatorio">
                      <div class="col-xs-12">
                        <h4 class="example-title  @can('add_clinica') mgt40 @endcan mgb20">Consultor <span class="text-success">(Receber)</span></h4>
                        <table style="border:0" class="table table-bordered">
                          <thead>
                            <tr>
                              <td>Data</td>
                              <td>Servico</td>
                              <td>Valor</td>
                              <td>Status</td>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($receitas_consultor as $receita)
                            @php ($vco += $receita->valor)
                            <tr>
                              <td>{{ Carbon\Carbon::parse($receita->data_cobranca)->format('d/m/Y') }}</td>
                              <td>{{ $receita->servico->title }}</td>
                              <td>R$ {{ number_format($receita->valor, 2, ',', '.') }} @if(isset($receita->description) and !empty($registro->description)) <small>({{ $registro->description }})</small>@endif</td>
                              <td>
                                @if($receita->status == '0')
                                  <span class="tag tag-warning">Aguardando</span>
                                @else
                                  <span class="tag tag-success">Pago</span>
                                @endif
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                          <tfoot>
                            <tr>
                              <td class="text-right" colspan="3">
                                Total: <b>R$ {{ number_format($vco, 2, ',', '.') }}</b>
                              </td>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                    @endif
                  @endif

                  @if($type == 'Clínica' or $type == "Admin")
                    @if(isset($receitas_clinica) and !empty($receitas_clinica) and count($receitas_clinica) > 0)
                    <div class="row relatorio">
                      <div class="col-xs-12">
                        <h4 class="example-title @if($type == 'Admin') mgt40 @endif mgb20">Clínica <span class="text-danger">(Pagar)</span></h4>
                        <table style="border:0" class="table table-bordered">
                          <thead>
                            <tr>
                              <td>Data</td>
                              <td>Serviço</td>
                              <td>Valor</td>
                              <td>Status</td>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($receitas_clinica as $receita)
                            @php ($vc += $receita->valor)
                            <tr>
                              <td>{{ Carbon\Carbon::parse($receita->data_cobranca)->format('d/m/Y') }}</td>
                              <td>{{ $receita->servico->title }}</td>
                              <td>R$ {{ number_format($receita->valor, 2, ',', '.') }} @if(isset($receita->description) and !empty($registro->description)) <small>({{ $registro->description }})</small>@endif</td>
                              <td>
                                @if($receita->status == '0')
                                  <span class="tag tag-warning">Aguardando</span>
                                @else
                                  <span class="tag tag-success">Pago</span>
                                @endif
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                          <tfoot>
                            <tr>
                              <td class="text-right" colspan="3">
                                Total: <b>R$ {{ number_format($vc, 2, ',', '.') }}</b>
                              </td>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                    @endif
                  @endif
                </div>
              </div>
            </div>
          </div>

          <a title="Cancelar" href="{{ route('contratos') }}" class="btn btn-default pull-left btn-lg"><i class="fa fa-reply" aria-hidden="true"></i> Voltar</a>
          <a title="Editar" href="{{ route('contratos.editar', $registro->id) }}" class="btn btn-default pull-right btn-lg"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
              
        </div>
      </div>
    </div>
  </div>
  </body>
@endsection

@section('plugins')
  <script src="{{ URL::asset('global/vendor/select2/select2.full.min.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/bootstrap-table/bootstrap-table.min.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/bootstrap-table/extensions/mobile/bootstrap-table-mobile.js') }}"></script>
@append

@section('scripts')
  <script src="{{ URL::asset('global/js/Plugin/select2.js') }}"></script>
@append