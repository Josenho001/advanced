<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Last Rights Management System') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            {!! Html::style('css/style.css') !!}
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md  shadow-sm" style="background-color: #000000">
            
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
            </ul>            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <hr>
<div  style="background-image:url({{url('images/fd.jpg')}})">
<div class="container">
<div class="row">
    <div class="col-md-4" style="color: #FFFFFF;">
        Po box 20000 nyeri<br>
        Kenya.<br>
        Tel: 0700000000

        
    </div>
    <div class="col-md-4">
        <ul>
            <li>
        <a href=""  style="color: #FFFFFF;">home</a><br></li>
        <li>
        <a href=""  style="color: #FFFFFF;">about</a><br></li>
        <li>
        <a href=""  style="color: #FFFFFF;">contact</a></li>
        </ul>
    </div>
    <div class="col-md-4">
        <a href="www.facebook.com"><img src="/images/f.png" style="width: 10%; height: 15%;">Facebook</a><br>
        <a href="www.instagram.com"><img src="/images/ia.jpeg" style="width: 10%; height: 18%;">Instagram</a><br>
        <a href="www.twitter.com"><img src="/images/tc.png" style="width: 10%; height: 15%;">Twitter</a>
            
    </div>
</div>
<p class="text-center">Copyright snippet -All Rights Reserved</p>
</div>
</div>

</body>
</html>
