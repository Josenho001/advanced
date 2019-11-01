
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="{{ Request::is('/') ? "active" : ""}}">
                <h4><a class="nav-link" href="/">Home</a></h4>
              </li>
              <li class="{{ Request::is('about') ? "active" : ""}}">
                <h4><a class="nav-link" href="/about" >About</a></h4>
              </li>
              <li class="{{ Request::is('contact') ? "active" : ""}}">
               <h4> <a class="nav-link" href="/contact">Contact</a></h4>
              </li>
            </ul>            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">User Login</a>
                        <a href="{{ route('admin.login') }}">Admin Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </nav>