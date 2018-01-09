<div class="site-menubar">
	<div class="site-menubar-header">
	  <div class="cover overlay">
	    <img class="cover-image" src="{{ URL::asset('assets/examples/images/dashboard-header.jpg') }}" alt="">
	    <div class="overlay-panel vertical-align overlay-background">
	      <div class="vertical-align-middle">
	        <a class="avatar avatar-lg" href="javascript:void(0)">
	          <img src="{{ URL::asset('global/portraits/1.jpg') }}" alt="">
	        </a>
	        <div class="site-menubar-info">
	          <h5 class="site-menubar-user">{{ Auth::user()->name }}</h5>
	          <p class="site-menubar-email">{{ Auth::user()->email }}</p>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="site-menubar-body">
	  <div>
	    <div>
	      <ul class="site-menu" data-plugin="menu">
	        <li class="site-menu-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
	          <a class="animsition-link" title="Dashboard" href="{{ route('admin.dashboard') }}">
	            <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
	            <span class="site-menu-title">Dashboard</span>
	          </a>
	        </li>
	        <li class="site-menu-item {{ Request::is('admin/clinicas') ? 'active' : '' }}">
	          <a class="animsition-link" href="{{ route('admin.clinicas') }}">
	            <i class="site-menu-icon fa fa-hospital-o" aria-hidden="true"></i>
	            <span class="site-menu-title">Clínicas</span>
	          </a>
	        </li>
	        <li class="site-menu-item {{ Request::is('admin/consultores') ? 'active' : '' }}">
	          <a class="animsition-link" title="Consultores" href="{{ route('admin.consultores') }}">
	            <i class="site-menu-icon fa fa-user-md" aria-hidden="true"></i>
	            <span class="site-menu-title">Consultores</span>
	          </a>
	        </li>
	        <li class="site-menu-item {{ Request::is('admin/pacientes') ? 'active' : '' }}">
	          <a class="animsition-link" title="Pacientes" href="{{ route('admin.pacientes') }}">
	            <i class="site-menu-icon fa fa-user" aria-hidden="true"></i>
	            <span class="site-menu-title">Pacientes</span>
	          </a>
	        </li>
	        <li class="site-menu-item {{ Request::is('admin/chat') ? 'active' : '' }}">
	          <a class="animsition-link" title="Chat" href="{{ route('admin.chat') }}">
	            <i class="site-menu-icon fa-comments" aria-hidden="true"></i>
	            <span class="site-menu-title">Chat</span>
	          </a>
	        </li>
	      </ul>
	    </div>
	  </div>
	</div>
</div>