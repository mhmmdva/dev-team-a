@extends('layouts.header')

<body>
    <div id="app" class="headers">
        <div class="container">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom headers-two">

                <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-decoration-none logo">
                    Dev-Team A
                </a>

                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 navbars-link">
                    <li><a href="{{ route('home') }}" class="nav-link active">Home</a></li>
                    <li><a href="#" class="nav-link">Features</a></li>
                    <li><a href="#" class="nav-link">Pricing</a></li>
                    <li><a href="#" class="nav-link">FAQs</a></li>
                    <li><a href="#" class="nav-link">About</a></li>
                </ul>

                <div class="col-md-3 text-end btn-right">
                    <a type="button" class="btn" style="color: white;" href="{{ route('posts.create') }}">Create Post</a>
                    <a type="button" class="btn" style="color: white;" href="{{ route('profile.show', auth()->user()->username) }}">Profile</a>

                    <button type="button" class="badge btn btn-outline-light">

                        <ul class="navbar-nav ms-auto">

                            <!-- Authentication Links -->
                            @guest
                            @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @endif

                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end px-2" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                            @endguest


                        </ul>
                    </button>
                </div>
            </header>
        </div>
    </div>


    <main class="py-4">
        @yield('content')
    </main>




    @extends('layouts.footer')
</body>

</html>
