@extends('layouts.header')

<body class="  bg-white">
    <div id="app" class="header-nav">
        {{-- start container --}}
        <div class="container">

            {{-- start header --}}
            <header>
                <nav class="navbar navbar-expand-lg navbar-dark navbar-on ">
                    <div class="container-fluid ">
                        <a class="logo text-decoration-none" href="{{ route('home.index') }}">
                            Dev Team A
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2"
                            aria-expanded="false" aria-label="Toggle navigation"> <span
                                class="navbar-toggler-icon"></span>
                        </button>
                        {{-- start collapse navbar --}}
                        <div class="collapse navbar-collapse" id="navbarSupportedContent2">
                            {{-- start ul navbar --}}
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link {{ $active === 'Dashboard' ? 'active' : '' }} "
                                        aria-current="page" href="{{ route('posts.index') }}">
                                        <i class='bx bx-home-alt me-1'></i>Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ $active === 'Post' ? 'active' : '' }} "
                                        href="{{ route('posts.create') }}">
                                        <i class='bx bx-user me-1'></i>Post</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ $active === 'Category' ? 'active' : '' }} "
                                        href="{{ route('category.index') }}">
                                        <i class='bx bx-category-alt me-1'></i>Category</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ $active === 'Tags' ? 'active' : '' }} "
                                        href="{{ route('tags.index') }}"><i class='bx bx-microphone me-1'></i>Tags</a>
                                </li>

                            </ul>
                            {{-- end ul navbar --}}

                            {{-- start user dropdown --}}
                            <div class="user-box dropdown">

                                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret"
                                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ auth()->user()->photo() }}" alt="..." width="42"
                                        height="42" class="rounded-circle">
                                    <div class="user-info ps-3">
                                        <p class="username-profile user-name mb-0 ">
                                            {{ auth()->user()->name }}
                                        </p>
                                    </div>
                                </a>
                                <ul class="mt-2 dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item"
                                            href="{{ route('profile.show-profile', auth()->user()->username) }}">
                                            <i class="bx bx-user"></i><span>Profile</span></a>
                                    </li>
                                    {{-- <li><a class="dropdown-item {{ $active === 'Post' ? 'active' : '' }} "
                                            href="{{ route('posts.create') }}">
                                            <i class='bx bx-home-circle'></i><span>Create Post</span></a>
                                    </li>
                                    <li><a class="dropdown-item {{ $active === 'Tags' ? 'active' : '' }} "
                                            href="{{ route('tags.create') }}"><i
                                                class='bx bx-dollar-circle'></i><span>Create Tag</span></a>
                                    </li>
                                    <li><a class="dropdown-item {{ $active === 'Category' ? 'active' : '' }} "
                                            href="{{ route('category.create') }}"><i
                                                class='bx bx-dollar-circle'></i><span>Create Category</span></a>
                                    </li> --}}
                                    <li>
                                        <div class="dropdown-divider mb-0"></div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <div class="navbar-nav dropdown-menu-end mt-2" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                                {{ __('Sign Out') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                </ul>

                            </div>
                            {{-- end user dropdown --}}
                        </div>
                        {{-- end collapse navbar --}}
                    </div>
                </nav>

            </header>
            {{-- end header --}}

        </div>
        {{-- end container --}}

    </div>
    {{-- @endguest --}}



    <main class="">
        @yield('content')
    </main>

    @extends('layouts.footer')
</body>

</html>
