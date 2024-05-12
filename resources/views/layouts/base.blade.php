<!DOCTYPE html>
<html lang="en">
<head>
    @extends('layouts.header')
</head>
<body>
     <!--::header part start::-->
     <header class="main_menu home_menu">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="col-lg-8">
                            <a class="navbar-brand" href="index.html" style="padding: 0; margin:0"><img src="{{ asset('assets/img/logo.png') }}" width="100"></a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </div>
                        

                        <div class="col-lg-4 collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="/">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('lost.index') }}">Missing</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('found.index') }}">Found</a>
                                </li>
                                @if(Route::has('login'))
                                    @auth
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle  d-none d-sm-block" href="blog.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                @auth{{ Auth::user()->name }}@endauth        
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item special" href="{{ route('app.acconunt') }}">My Account</a>
                                                <a class="dropdown-item special" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout').submit();">Logout</a>
                                                <form id="logout" action="{{ route('logout') }}" method="POST">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                        @else
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle  d-none d-sm-block" href="blog.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                User
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item special" href="{{ route('login') }}">Sign In</a>
                                                <a class="dropdown-item special" href="{{ route('register') }}">Sign Up</a>
                                            </div>
                                        </li>
                                    @endauth
                                @endif
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    @yield('content')

    @extends('layouts.footer')
</body>
</html>