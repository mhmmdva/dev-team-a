@extends('layouts.header')

<body class="  bg-white">
    <div id="app" class="header-nav">
        <div class="container">
            {{-- <header
                class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between mb-4 navbar-one">

                <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-decoration-none logo">
                    Dev-Team A
                </a>

                <nav class="navbar navbar-expand-lg navbar-two">

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav navbars">
                            <li class="nav-item ">
                                <a class="nav-link {{ $active === 'Home' ? 'active' : '' }} " aria-current="page"
                                    href="{{ route('home.index') }}">Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $active === 'Post' ? 'active' : '' }} "
                                    href="{{ route('posts.create') }}">Post
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $active === 'Category' ? 'active' : '' }}"
                                    href="{{ route('category.index') }}">Category
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  {{ $active === 'Tags' ? 'active' : '' }}"
                                    href="{{ route('tags.index') }}">Tags</a>
                            </li>
                        </ul>
                    </div>

                </nav>

                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                    <div class="dropdown text-end">

                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle text-white"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32"
                                class="rounded-circle">
                        </a>

                        <ul class="dropdown-menu text-small">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('posts.create') }}">Create Post</a></li>
                            <li>
                                <hr class="dropdown-divider">
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

                </div>


            </header> --}}


            <nav class="navbar navbar-expand-lg navbar-dark navbar-on">
                <div class="container-fluid "> <a class="logo text-decoration-none" href="{{ route('home.index') }}">Dev
                        Team A</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2"
                        aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarSupportedContent2">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item"> <a class="nav-link {{ $active === 'Home' ? 'active' : '' }} "
                                    aria-current="page" href="{{ route('home.index') }}"><i
                                        class='bx bx-home-alt me-1'></i>Home</a>
                            </li>
                            <li class="nav-item"> <a class="nav-link {{ $active === 'Post' ? 'active' : '' }} "
                                    href="{{ route('posts.create') }}"><i class='bx bx-user me-1'></i>Post</a>
                            </li>
                            <li class="nav-item"> <a class="nav-link {{ $active === 'Category' ? 'active' : '' }} "
                                    href="{{ route('category.index') }}"><i
                                        class='bx bx-category-alt me-1'></i>Category</a>
                            </li>
                            <li class="nav-item"> <a class="nav-link {{ $active === 'Tags' ? 'active' : '' }} "
                                    href="{{ route('tags.index') }}"><i class='bx bx-microphone me-1'></i>Tags</a>
                            </li>

                        </ul>
                        <div class="user-box dropdown">
                            <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://github.com/mdo.png" alt="mdo" width="42" height="42"
                                    class="rounded-circle">
                                <div class="user-info ps-3">
                                    <p class="username-profile user-name mb-0 ">
                                        Pauline Seitz
                                    </p>
                                </div>
                            </a>
                            <ul class="mt-2 dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#"><i
                                            class="bx bx-user"></i><span>Profile</span></a>
                                </li>
                                <li><a class="dropdown-item {{ $active === 'Post' ? 'active' : '' }} "
                                        href="{{ route('posts.create') }}"><i
                                            class='bx bx-home-circle'></i><span>Create New Post</span></a>
                                </li>
                                <li><a class="dropdown-item {{ $active === 'Tags' ? 'active' : '' }} "
                                        href="{{ route('tags.create') }}"><i
                                            class='bx bx-dollar-circle'></i><span>Create New Tag</span></a>
                                </li>
                                <li><a class="dropdown-item {{ $active === 'Category' ? 'active' : '' }} "
                                        href="{{ route('category.create') }}"><i
                                            class='bx bx-dollar-circle'></i><span>Create New Category</span></a>
                                </li>
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
                    </div>
                </div>
            </nav>


        </div>
    </div>


    <main class="py-4">
        @yield('content')
    </main>




    @extends('layouts.footer')
</body>

</html>
