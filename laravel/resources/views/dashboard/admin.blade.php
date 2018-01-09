@extends('layout.page')
@section('title', 'Dashboard')

@section('css')
  <link rel="stylesheet" href="{{ URL::asset('global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/examples/css/dashboard/v1.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/examples/css/charts/flot.css') }}">
@append

@section('content')
<body class="animsition dashboard">
  
  @include('layout.nav')
  @include('layout.menu')

  <div class="page">
    <div class="page-content container-fluid" style="display: none;">
      <div class="row" data-plugin="matchHeight" data-by-row="true">
     
      </div>
    </div>
  </div>
</body>
@endsection

@section('plugins')
  <script src="{{ URL::asset('global/vendor/chartist/chartist.min.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.min.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/matchheight/jquery.matchHeight-min.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/peity/jquery.peity.min.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/flot/jquery.flot.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/flot/jquery.flot.resize.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/flot/jquery.flot.time.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/flot/jquery.flot.stack.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/flot/jquery.flot.pie.js') }}"></script>
  <script src="{{ URL::asset('global/vendor/flot/jquery.flot.selection.js') }}"></script>
@append

@section('page')
  <script src="{{ URL::asset('global/js/Plugin/matchheight.js') }}"></script>
  <script src="{{ URL::asset('global/js/Plugin/peity.js') }}"></script>
@append 

@section('scriptpersonalizado')
  <script type="text/javascript">
  jQuery(document).ready(function($) {
    Site.run();
  });
  </script>
@append