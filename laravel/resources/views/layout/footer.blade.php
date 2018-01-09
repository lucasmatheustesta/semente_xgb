	<footer class="site-footer">
	  <div class="site-footer-legal">© {{ date('Y') }} <a title="Dashboard" href="{{ route('dashboard') }}">Maximiza Odonto</a></div>
	  <div class="site-footer-right">
	    Desenvolvido por <a target="_blank" title="Pixel Web" href="http://pixelweb.com.br/">Pixel Web</a>
	  </div>
	</footer>

	<!-- Core  -->
    <script src="{{ URL::asset('global/vendor/babel-external-helpers/babel-external-helpers.js') }}"></script>
    <script src="{{ URL::asset('global/vendor/jquery/jquery.js') }}"></script>
    <script src="{{ URL::asset('global/vendor/tether/tether.js') }}"></script>
    <script src="{{ URL::asset('global/vendor/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ URL::asset('global/vendor/animsition/animsition.js') }}"></script>
    <script src="{{ URL::asset('global/vendor/mousewheel/jquery.mousewheel.js') }}"></script>
    <script src="{{ URL::asset('global/vendor/asscrollbar/jquery-asScrollbar.js') }}"></script>
    <script src="{{ URL::asset('global/vendor/asscrollable/jquery-asScrollable.js') }}"></script>
    <script src="{{ URL::asset('global/vendor/waves/waves.js') }}"></script>
    
    <!-- Plugins -->
    <script src="{{ URL::asset('global/vendor/switchery/switchery.min.js') }}"></script>
    <script src="{{ URL::asset('global/vendor/intro-js/intro.js') }}"></script>
    <script src="{{ URL::asset('global/vendor/screenfull/screenfull.js') }}"></script>
    <script src="{{ URL::asset('global/vendor/slidepanel/jquery-slidePanel.js') }}"></script>
    <script src="{{ URL::asset('global/vendor/tablesaw/tablesaw.jquery.js') }}"></script>
    <script src="{{ URL::asset('global/vendor/slidepanel/jquery-slidePanel.js') }}"></script>
    <script src="{{ URL::asset('global/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>
    <script src="{{ URL::asset('global/vendor/bootbox/bootbox.js') }}"></script>
    <script src="{{ URL::asset('global/vendor/toastr/toastr.js') }}"></script>
	@yield('plugins')

    <!-- Scripts -->
    <script src="{{ URL::asset('global/js/State.js') }}"></script>
    <script src="{{ URL::asset('global/js/Component.js') }}"></script>
    <script src="{{ URL::asset('global/js/Plugin.js') }}"></script>
    <script src="{{ URL::asset('global/js/Base.js') }}"></script>
    <script src="{{ URL::asset('global/js/Config.js') }}"></script>
    <script src="{{ URL::asset('assets/js/Section/Menubar.js') }}"></script>
    <script src="{{ URL::asset('assets/js/Section/Sidebar.js') }}"></script>
    <script src="{{ URL::asset('assets/js/Section/PageAside.js') }}"></script>
    <script src="{{ URL::asset('assets/js/Plugin/menu.js') }}"></script>
    @yield('scripts')

    <!-- Config -->
    <script src="{{ URL::asset('global/js/config/colors.js') }}"></script>
    <script src="{{ URL::asset('assets/js/config/tour.js') }}"></script>
    
    <script>
      Config.set('assets', "{{ URL::asset('assets') }}");
    </script>

    <!-- Page -->
    <script src="{{ URL::asset('assets/js/Site.js') }}"></script>
    <script src="{{ URL::asset('global/js/Plugin/asscrollable.js') }}"></script>
    <script src="{{ URL::asset('global/js/Plugin/slidepanel.js') }}"></script>
    <script src="{{ URL::asset('global/js/Plugin/switchery.js') }}"></script>
    <script src="{{ URL::asset('global/js/Plugin/tablesaw.js') }}"></script>
    <script src="{{ URL::asset('global/js/Plugin/sticky-header.js') }}"></script>
    <script src="{{ URL::asset('global/js/Plugin/action-btn.js') }}"></script>
    <script src="{{ URL::asset('global/js/Plugin/asselectable.js') }}"></script>
    <script src="{{ URL::asset('global/js/Plugin/editlist.js') }}"></script>
    <script src="{{ URL::asset('global/js/Plugin/aspaginator.js') }}"></script>
    <script src="{{ URL::asset('global/js/Plugin/animate-list.js') }}"></script>
    <script src="{{ URL::asset('global/js/Plugin/jquery-placeholder.js') }}"></script>
    <script src="{{ URL::asset('global/js/Plugin/material.js') }}"></script>
    <script src="{{ URL::asset('global/js/Plugin/selectable.js') }}"></script>
    <script src="{{ URL::asset('global/js/Plugin/bootbox.js') }}"></script>
    <script src="{{ URL::asset('assets/js/BaseApp.js') }}"></script>
    <script src="{{ URL::asset('assets/js/App/Contacts.js') }}"></script>
    <script src="{{ URL::asset('assets/examples/js/apps/contacts.js') }}"></script>
    @yield('page')

    <script type="text/javascript">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has($msg))
                toastr.{{ $msg }}('{{ Session::get($msg) }}');
            @endif
        @endforeach
    </script>
	
	@yield('scriptpersonalizado')
    
  </body>
</html>