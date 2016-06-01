    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{URL::to('/')}}"><b>VR I | Ando Projekt</b></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            @if(Auth::check())
              <li><a href="{{URL::to('dashboard')}}">Minu töölaud</a></li>
              <li><a href="{{URL::to('account')}}">Minu konto</a></li>
              <li><a href="{{URL::to('logout')}}">Logi välja</a></li>
            @else
              <li><a href="{{URL::to('signup')}}">Registreeru</a></li>
              <li><a href="{{URL::to('login')}}">Logi sisse</a></li>
            @endif
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
