<nav class="navbar navbar fixed-top navbar-expand-lg" style="background-color: #00004d">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                      <li class="{{ Request::is('/') ? "active" : ""}}">
                        <a class="nav-link" href="/">Home</a>
                      </li>

                      <li class="{{ Request::is('about') ? "active" : ""}}">
                        <a class="nav-link" href="/about" >About</a>
                      </li>
                      <li class="{{ Request::is('contact') ? "active" : ""}}">
                        <a class="nav-link" href="/contact">Contact</a>
                      </li>
                      <li class="{{ Request::is('contact') ? "active" : ""}}">
                        <a class="nav-link" href="#">Depots</a>
                      </li>

                      <li class="{{ Request::is('contact') ? "active" : ""}}">
                        <a class="nav-link" href="/contact">Blog</a>
                      </li>
                    </ul>
                      @if (Auth::check())

                    <ul class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #000000">
                          Hello {{Auth::user()->name }}
                        </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown" >
                    <a class="dropdown-item" href="#">Posts</a>
                    <a class="dropdown-item" href="#">Categories</a>
                    <a class="dropdown-item" href="#">Tags</a><hr>
                     <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                  </div>
                      
                  </ul>
                  @else
                  <a href="{{ route('login') }}" class="btn btn-default">Login </a>
                  @endif 
              </div>
        </nav>
        