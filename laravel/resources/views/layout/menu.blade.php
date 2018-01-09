<div class="site-menubar">
	<div class="site-menubar-header">
	  <div class="cover overlay">
	    <img class="cover-image" src="{{ URL::asset('assets/examples/images/dashboard-header.jpg') }}" alt="">
	    <div class="overlay-panel vertical-align overlay-background">
	      <div class="vertical-align-middle">
	        <a class="avatar avatar-lg" href="javascript:void(0)">
	          @if(isset(Auth::user()->image) and !empty(Auth::user()->image))
                <img src="{{ URL::asset(Auth::user()->image) }}" alt="">
              @else
                <img src="{{ URL::asset('img/users/profile.jpg') }}" alt="">
              @endif
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

			<li class="site-menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
				<a class="animsition-link" title="Dashboard" href="{{ route('dashboard') }}">
					<i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
					<span class="site-menu-title">Home</span>
				</a>
			</li>

			<li class="site-menu-item {{ Request::is('escolas') ? 'active' : '' }}">
				<a class="animsition-link" href="{{ route('schools') }}">
					<i class="site-menu-icon fa fa-building-o" aria-hidden="true"></i>
					<span class="site-menu-title">Escolas</span>
				</a>
			</li>



			<li class="site-menu-item {{ Request::is('anos') ? 'active' : '' }}">
				<a class="animsition-link" href="{{ route('years') }}">
					<i class="site-menu-icon fa fa-archive" aria-hidden="true"></i>
					<span class="site-menu-title">Anos</span>
				</a>
			</li>



			<li class="site-menu-item {{ Request::is('classes') ? 'active' : '' }}">
				<a class="animsition-link" href="{{ route('classes') }}">
					<i class="site-menu-icon fa fa-users" aria-hidden="true"></i>
					<span class="site-menu-title">Classes</span>
				</a>
			</li>



				<li class="site-menu-item {{ Request::is('pessoas-fisicas') ? 'active' : '' }}">
					<a class="animsition-link" href="{{ route('schools') }}">
						<i class="site-menu-icon fa fa-play" aria-hidden="true"></i>
						<span class="site-menu-title">Vídeos</span>
					</a>
				</li>



				<li class="site-menu-item {{ Request::is('pessoas-fisicas') ? 'active' : '' }}">
					<a class="animsition-link" href="{{ route('schools') }}">
						<i class="site-menu-icon fa fa-file-o" aria-hidden="true"></i>
						<span class="site-menu-title">Arquivos</span>
					</a>
				</li>



				<li class="site-menu-item {{ Request::is('avisos') ? 'active' : '' }}">
					<a class="animsition-link" href="{{ route('notices') }}">
						<i class="site-menu-icon fa fa-exclamation-triangle" aria-hidden="true"></i>
						<span class="site-menu-title">Avisos</span>
					</a>
				</li>


			  <li class="site-menu-item {{ Request::is('usuarios') ? 'active' : '' }}">
				  <a class="animsition-link" href="javascript:;">
					  <i class="site-menu-icon fa fa-user-md" aria-hidden="true"></i>
					  <span class="site-menu-title">Alunos</span>
				  </a>
			  </li>

			  <li class="site-menu-item {{ Request::is('usuarios') ? 'active' : '' }}">
				  <a class="animsition-link" href="javascript:;">
					  <i class="site-menu-icon fa fa-user-md" aria-hidden="true"></i>
					  <span class="site-menu-title">Professores</span>
				  </a>
			  </li>

			  <li class="site-menu-item {{ Request::is('usuarios') ? 'active' : '' }}">
				  <a class="animsition-link" href="javascript:;">
					  <i class="site-menu-icon fa fa-user-md" aria-hidden="true"></i>
					  <span class="site-menu-title">Gestores</span>
				  </a>
			  </li>

			  <li class="site-menu-item {{ Request::is('usuarios') ? 'active' : '' }}">
				  <a class="animsition-link" href="javascript:;">
					  <i class="site-menu-icon fa fa-user-md" aria-hidden="true"></i>
					  <span class="site-menu-title">Diretores</span>
				  </a>
			  </li>

			<li class="site-menu-item has-sub">
				<a href="javascript:void(0)">
					<i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
					<span class="site-menu-title">Relatórios</span>
					<span class="site-menu-arrow"></span>
				</a>
				<ul class="site-menu-sub">
					
					@can('add_clinica')
						<li class="site-menu-item {{ Request::is('faturas') ? 'active' : '' }}">
							<a class="animsition-link" href="{{ route('schools') }}">
								<i class="site-menu-icon fa fa-money" aria-hidden="true"></i>
								<span class="site-menu-title">Faturas</span>
							</a>
						</li>
					@endcan

					@can('add_clinica')
						<li class="site-menu-item {{ Request::is('transferencias') ? 'active' : '' }}">
							<a class="animsition-link" href="{{ route('schools') }}">
								<i class="site-menu-icon fa fa-random" aria-hidden="true"></i>
								<span class="site-menu-title">Transferências</span>
							</a>
						</li>
					@endcan

					@can('add_clinica')
						<li class="site-menu-item {{ Request::is('saques') ? 'active' : '' }}">
							<a class="animsition-link" href="{{ route('schools') }}">
								<i class="site-menu-icon fa fa-exchange" aria-hidden="true"></i>
								<span class="site-menu-title">Saques</span>
							</a>
						</li>
					@endcan
				</ul>
			</li>
	        
	        

	       
	
	      </ul>
	    </div>
	  </div>
	</div>
</div>