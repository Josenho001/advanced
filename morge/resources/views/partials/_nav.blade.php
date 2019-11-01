
    <nav class="navbar navbar fixed-top navbar-expand-lg " style="background-color: #000000">
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto" >
              <li class="{{ Request::is('/') ? "active" : ""}}">
                <h4><a class="nav-link" href="/" style="color: #FFFFFF">Home</a></h4>
              </li>
              <li class="{{ Request::is('about') ? "active" : ""}}">
                <h4><a class="nav-link" href="/about" style="color: #FFFFFF">About</a></h4>
              </li>
              <li class="{{ Request::is('contact') ? "active" : ""}}">
               <h4> <a class="nav-link" href="/contact" style="color: #FFFFFF">Contact</a></h4>
              </li>
            </ul>            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}" style="color: #FFFFFF">User Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" style="color: #FFFFFF">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </nav>