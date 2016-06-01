    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{URL::to('/')}}"><b>{{Lang::get('app.header_name')}}</b></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            @if(Auth::check())
              <li><a href="{{URL::to('dashboard')}}">{{Lang::get('app.header_dashboard')}}</a></li>
              <li><a href="{{URL::to('account')}}">{{Lang::get('app.header_account')}}</a></li>
              <li><a href="{{URL::to('logout')}}">{{Lang::get('app.header_logout')}}</a></li>
            @else
              <li><a href="{{URL::to('signup')}}">{{Lang::get('app.header_signup')}}</a></li>
              <li><a href="{{URL::to('login')}}">{{Lang::get('app.header_login')}}</a></li>
            @endif
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>