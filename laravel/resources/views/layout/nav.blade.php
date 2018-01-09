<!--[if lt IE 8]>
  <p class="browserupgrade">Você está usando um navegador<strong>desatualizado</strong>. Por favor, <a href="http://browsehappy.com/">Atualize seu navegador</a> para melhorar sua experiência.</p>
<![endif]-->

<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega navbar-inverse" role="navigation">
  
  <div class="navbar-header">
    <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
    data-toggle="menubar">
      <span class="sr-only">Menu</span>
      <span class="hamburger-bar"></span>
    </button>
    <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
    data-toggle="collapse">
      <i class="icon md-more" aria-hidden="true"></i>
    </button>
  </div>

  <div class="navbar-container container-fluid">
    <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
      <ul class="nav navbar-toolbar">
        <li class="nav-item hidden-float" id="toggleMenubar">
          <a class="nav-link" data-toggle="menubar" href="#" role="button">
            <i class="icon hamburger hamburger-arrow-left">
                <span class="sr-only">Menu</span>
                <span class="hamburger-bar"></span>
              </i>
          </a>
        </li>
        <li class="nav-item hidden-sm-down" id="toggleFullscreen">
          <a class="nav-link icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
            <span class="sr-only">Fullscreen</span>
          </a>
        </li>
      </ul>
      <!-- End Navbar Toolbar -->

      <!-- Navbar Toolbar Right -->
      <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
        
        <li class="nav-item bg-success dropdown">
          <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
          data-animation="scale-up" role="button">
            <span class="avatar avatar-online">
              @if(isset(Auth::user()->image) and !empty(Auth::user()->image))
                <img src="{{ URL::asset(Auth::user()->image) }}" alt="">
              @else
                <img src="{{ URL::asset('img/users/profile.jpg') }}" alt="">
              @endif
              <i></i>
            </span>
            Olá, {{ Auth::user()->name }} <i class="fa fa-angle-down" style="font-size: 20px; position: relative; bottom: -3px;" aria-hidden="true"></i>
          </a>
          <div class="dropdown-menu" role="menu">
            <a class="dropdown-item" title="Perfil" href="{{ route('user.perfil') }}" role="menuitem">
              <i class="icon md-account" aria-hidden="true"></i> Meu Perfil
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" title="Sair" href="{{ route('login.sair') }}" role="menuitem">
              <i class="icon md-power" aria-hidden="true"></i> Sair
            </a>
          </div>
        </li>
      </ul>
      <!-- End Navbar Toolbar Right -->    
  </div>
</nav>